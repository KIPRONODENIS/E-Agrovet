<?php

use Illuminate\Database\Seeder;
use App\Service;
class ServicesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      Service::Create([
        'name'=>"Ai Services",
        'location'=>'Meru county',
        'details'=>'I provide AI services within Igembe south area',
        'image'=>'services/ai.jpeg',
        'user_id'=>1,

        ]);
      Service::Create([
        'name'=>"Veterinary services",
        'location'=>'Meru county',
        'details'=>'I provide AI services within Imenti south area',
        'image'=>'services/vet.jpeg',
        'user_id'=>1,

        ]);
      Service::Create([
        'name'=>"Crop spraying",
        'location'=>'Meru county',
        'details'=>'I provide AI services within Maua area',
        'image'=>'services/images.jpeg',
        'user_id'=>1,

        ]);
    }
}
