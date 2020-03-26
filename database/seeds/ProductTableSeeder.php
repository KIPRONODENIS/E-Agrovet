<?php

use Illuminate\Database\Seeder;
use App\Product;
class ProductTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Product::Create([
          'name'=>"DAP Fertilizers",

          'price'=>3000,
          'stock'=>200,
          'description'=>'Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, Lorem ipsum dolor sit amet, ',
          'image'=>'Products/fertilizer.jpeg',
          'user_id'=>1,

               ]);
        Product::Create([
          'name'=>"Syngenta Sprayer",
         'stock'=>200,
          'price'=>300,
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do . cillum dolore eu fugiat nulla pariatur',
          'image'=>'Products/medicine.jpeg',
          'user_id'=>1,

               ]);
        Product::Create([
          'name'=>"Cattle Sprayer",
          'stock'=>200,
          'price'=>500,
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor ',
          'image'=>'Products/sprayer.jpeg',
          'user_id'=>1,
               ]);
        Product::Create([
          'name'=>"Cultar Medicine",
            'stock'=>200,
          'price'=>500,
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt',
          'image'=>'Products/sprayer.jpeg',
          'user_id'=>1,
               ]);
        Product::Create([
          'name'=>"Cultar spayers",
          'stock'=>200,
          'price'=>1500,
          'image'=>'Products/cultar.jpeg',
          'description'=>'Lorem ipsum dolor sit amet, consectetur adipisicing ',
          'user_id'=>1,

               ]);
        Product::Create([
          'name'=>"NPK Fertilizer",
        'stock'=>200,
          'price'=>2500,
          'description'=>'Lorem ipsum dolor sit amet, s aute irure dolor in reprehenderit in ulla pariatur',
          'image'=>'Products/fertilizer1.jpeg',
          'user_id'=>1,

               ]);


    }
}
