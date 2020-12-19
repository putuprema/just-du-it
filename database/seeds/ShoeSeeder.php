<?php

use App\Shoe;
use Illuminate\Database\Seeder;

class ShoeSeeder extends Seeder
{
    /**
     * Adds example shoes to the database
     *
     * @return void
     */
    public function run()
    {
        Shoe::create([
            "name" => "Nike Air Max 1",
            "description" => "The Nike Air Max 1 reboots the legendary design that has reigned supreme since 1987. Crossing street fashion with sport, it takes the same lightweight cushioning and classic silhouette of the OG and boldly reworks it with salvaged materials, fresh colours and exposed stitching.",
            "price" => 2099000,
            "image" => "public/shoes/Jflv526z941jqeEfmXgPU9WeJ13FBGtjTNdTGUST.jpg"
        ]);

        Shoe::create([
            "name" => "Fila Tennis Shoes - White",
            "description" => "A great style tennis shoe from sportswear giant Fila. Ideal for casual weekend styling.",
            "price" => 700000,
            "image" => "public/shoes/KJglgDdfHfcLVhSHOAbLCKP9WZBDpDzSYgDxkruQ.jpg"
        ]);

        Shoe::create([
            "name" => "Adidas Ultraboost 20 Shoes",
            "description" => "Always one step ahead of the curve. Since the release of the Ultraboost in 2015, the world of running shoes has never been the same. These adidas shoes refine the legendary fit and feel of Ultraboost. The foot-hugging knit upper has stitched-in reinforcement for a locked-in fit. Responsive cushioning adds energy to your stride for that I-could-run-forever feeling. Good for the oceans Primeblue features Parley Ocean PlasticÂ® which is made from recycled waste that's intercepted from beaches and coastal communities before it reaches the ocean.",
            "price" => 1800000,
            "image" => "public/shoes/tlpkMh7VsHD17uK9gf7uRsCqr8LeJC4abMYHv6Vh.jpg"
        ]);

        Shoe::create([
            "name" => "Girls' Little Kids' Superstar Shoes",
            "description" => "Your little superstar can get big style and total comfort with the throwback Girls' Little Kids' adidas Originals Superstar Casual Shoes. Sweet and fun, these shoes are inspired by the 1980s-era basketball sneakers of the same name. With an ultra-soft synthetic leather upper and classic shell toe, she'll get plenty of comfort for all day wear.",
            "price" => 600000,
            "image" => "public/shoes/Bz5S5q0GrDwzb1ZcLqRMIy7yqlTOyEKTV4Eu6biI.jpg"
        ]);

        Shoe::create([
            "name" => "Question Mid Men's Basketball Shoes",
            "description" => "Crave that retro B-ball look? We've got you. Borrow fresh style from basketball legend Allen \"The Answer\" Iverson when you wear these men's Reebok Question Mid Shoes. Hot neon colors set your sneaker game on fire. Feel the supple flexibility with a luxe full grain leather upper. Hits of gloss and shine are a total win. Slam dunk.",
            "price" => 1000000,
            "image" => "public/shoes/TpR1C9BGXXmaQjKaO9MvGLJ0XEPLlzN1EiJYPlrH.jpg"
        ]);

        Shoe::create([
            "name" => "Nano X Women's Training Shoes",
            "description" => "To celebrate the 10th anniversary of the Nano, Reebok has reimagined this iconic shoe. This women's version has a soft woven textile upper with targeted areas of support and stretch. Lightweight cushioning keeps you fast on your feet.",
            "price" => 1500000,
            "image" => "public/shoes/8QRJiKqrFL1Mod9DCEXhAkf2VvrGi2KMjzodKsfE.jpg"
        ]);

        Shoe::create([
            "name" => "Tom and Jerry Club C Revenge Shoes - Toddler",
            "description" => "The simple design of the Reebok Club C Revenge has made it a clean canvas for tributes and remakes. This toddlers' version of the shoes celebrates Tom and Jerry. The low-cut, leather upper features cartoon graphics, giving the sneakers a playful vibe to match your little one's mood.",
            "price" => 75000,
            "image" => "public/shoes/tyjO876rW1oUSkxiNyPVkFe7DxcOgl5IglSoEBUR.jpg"
        ]);

        Shoe::create([
            "name" => "RS-X Mid Militia Sneakers",
            "description" => "RS-X celebrates re-invention and re-imagining to the extreme. This season, we remix the retro-inspired silhouette with a functional new mid-top cut and 3M reflective hits for added visibility.",
            "price" => 1200000,
            "image" => "public/shoes/j5y4mA3G95vhHjfpUQnF5eHDlKRgEU75NFLzKlsK.jpg"
        ]);
    }
}
