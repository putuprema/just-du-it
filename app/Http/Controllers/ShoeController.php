<?php

namespace App\Http\Controllers;

use App\Shoe;
use Exception;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Http\UploadedFile;
use Illuminate\Routing\Redirector;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;
use Illuminate\Validation\ValidationException;
use Illuminate\View\View;

/**
 * Controller for shoe listings and management
 *
 * For listing, all users (including guests) are permitted.
 *
 * Only authenticated admins can access the shoe management routes (add, edit, delete),
 * validated with `Gate::authorize("isAdmin");` in related controller methods.
 *
 * @package App\Http\Controllers
 */
class ShoeController extends Controller
{
    /**
     * ShoeController constructor.
     */
    public function __construct()
    {
        // Add auth middleware with the exception for index and show route
        $this->middleware('auth', ['except' => ["index", "show"]]);
    }


    /**
     * Homepage of the website. Displays the shoe listing.
     *
     * @param Request $request
     * @return Application|Factory|View
     */
    public function index(Request $request)
    {
        // search query parameter
        $query = $request->input("search");

        // get from database where shoe name match the query pattern and
        // paginate by 6 items per page. also, append current request query strings to the pagination link
        $shoes = Shoe::where("name", "LIKE", "%" . $query . "%")->paginate(6)->withQueryString();

        return view('shoes.index', [
            "shoes" => $shoes
        ]);
    }

    /**
     * Show the form for creating a new shoe.
     *
     * @return Application|Factory|Response|View
     * @throws AuthorizationException
     */
    public function create()
    {
        Gate::authorize('isAdmin');
        return view("shoes.create");
    }

    /**
     * Store a newly created shoe in storage.
     *
     * @param Request $request
     * @return Application|RedirectResponse|Redirector
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function store(Request $request)
    {
        Gate::authorize('isAdmin');

        $this->validateInput($request, -1);

        $shoe_image = $request->file("image");

        $shoe = new Shoe();
        $shoe->name = $request->input("name");
        $shoe->description = $request->input("description");
        $shoe->price = $request->input("price");

        $this->saveShoeImage($shoe, $shoe_image);
        $shoe->save();

        return redirect(route("home"))->with("success", "Shoe " . $shoe->name . " created successfully");
    }

    /**
     * Validate input for shoes create and update operation
     * If creating, supply `-1` to $shoeId parameter
     *
     * @param Request $request
     * @param int $shoeId
     * @throws ValidationException
     */
    private function validateInput(Request $request, int $shoeId)
    {
        $rule = [
            "name" => ["required", "unique:shoes"],
            "description" => "required",
            "price" => ["required", "integer", "min:100"],
            "image" => ["required", "image"]
        ];

        // if want to update, then shoe image input is not mandatory
        // since the old image will be used instead.
        if ($shoeId != -1) {
            // the new name must also not already been used by other shoes
            $rule["name"] = ["required", Rule::unique("shoes")->ignore($shoeId)];
            $rule["image"] = ["image"];
        }

        $this->validate($request, $rule, [
            "name.required" => "Shoe name must be filled",
            "name.unique" => "Shoe name has already been taken",
            "description.required" => "Shoe description must be filled",
            "price.required" => "Shoe price must be filled",
            "price.integer" => "Shoe price must be integer",
            "price.min" => "Minimum shoe price is Rp 100",
            "image.required" => "Shoe image is required",
            "image.image" => "Uploaded file is not an image"
        ]);
    }

    /**
     * Save shoe image to server storage. If shoe image file already exist and new one is uploaded,
     * replace the old image with the newly uploaded one.
     *
     * After the file is saved, save its path to corresponding Shoe entity.
     *
     * @param Shoe $shoe
     * @param UploadedFile $shoe_image
     */
    private function saveShoeImage(Shoe $shoe, UploadedFile $shoe_image)
    {
        if ($shoe->image != null) {
            Storage::delete($shoe->image);
        }

        $shoe->image = $shoe_image->storePublicly("/public/shoes");
    }

    /**
     * Get shoe details by ID
     *
     * @param int $id
     * @return Application|Factory|View|void
     */
    public function show(int $id)
    {
        $shoe = $this->getShoe($id);

        return view("shoes.details", [
            "shoe" => $shoe
        ]);
    }

    /**
     * Get shoe by ID.
     * Throws 404 if shoe does not exist.
     *
     * @param int $id
     * @return Shoe|Model
     */
    private function getShoe(int $id)
    {
        $shoe = Shoe::find($id);
        if ($shoe == null) abort(404);
        return $shoe;
    }

    /**
     * Show the form for editing the specified shoe.
     *
     * @param int $id
     * @return Application|Factory|Response|View|void
     * @throws AuthorizationException
     */
    public function edit(int $id)
    {
        Gate::authorize('isAdmin');

        $shoe = $this->getShoe($id);

        return view("shoes.edit", [
            "shoe" => $shoe
        ]);
    }

    /**
     * Update the specified shoe in storage.
     *
     * @param Request $request
     * @param int $id
     * @return Application|RedirectResponse|Redirector|void
     * @throws ValidationException
     * @throws AuthorizationException
     */
    public function update(Request $request, int $id)
    {
        Gate::authorize('isAdmin');

        $this->validateInput($request, $id);

        $shoe = $this->getShoe($id);
        $shoe->name = $request->input("name");
        $shoe->description = $request->input("description");
        $shoe->price = $request->input("price");

        // If new image is supplied, replace existing shoe image
        // with the new one
        if ($request->hasFile("image")) {
            $this->saveShoeImage($shoe, $request->file("image"));
        }

        $shoe->save();

        return redirect(route("shoes.show", [$id]))
            ->with("success", "Shoe " . $shoe->name . " updated successfully");
    }

    /**
     * Remove the specified shoe from storage.
     *
     * @param int $id
     * @return Application|RedirectResponse|Redirector|void
     * @throws Exception
     */
    public function destroy(int $id)
    {
        Gate::authorize('isAdmin');

        $shoe = $this->getShoe($id);
        $shoe->delete();

        return redirect(route("home"))
            ->with("success", "Shoe " . $shoe->name . " deleted successfully");
    }

    /**
     * Show add to cart page (for members only).
     *
     * @param int $id
     * @return Application|Factory|View
     * @throws AuthorizationException
     */
    public function addToCart(int $id)
    {
        Gate::authorize("isMember");

        $shoe = $this->getShoe($id);

        return view("shoes.add-to-cart", [
            "shoe" => $shoe
        ]);
    }
}
