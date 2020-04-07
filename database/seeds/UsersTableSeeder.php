<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

use App\User;
use App\Agrovet;
use App\service_orders;
use App\Service;
class UsersTableSeeder extends Seeder
{
    /**
     * Auto generated seed file.
     *
     * @return void
     */
    public function run()
    {
        if (User::count() == 0) {
          //  $role = Role::where('name', 'admin')->firstOrFail();

            User::create([
                'name'           => 'Admin',
                'email'          => 'admin@admin.com',
                'password'       => bcrypt('12345678'),
                'remember_token' => Str::random(60),
                //'role_id'        => 1,
                'user_type'=>'admin'
            ]);


                        $user2=User::create([
                            'name'           => 'VET',
                            'email'          => 'vet@vet.com',
                            'password'       => bcrypt('12345678'),
                            'remember_token' => Str::random(60),
                            //'role_id'        => 1,
                            'user_type'=>'VET'
                        ]);
        }
        factory(App\User::class,4)->create();

       Agrovet::create(['name'=>'MALUKE',
                    'user_id'=>1,
                    'town'=>"Meru"
     ]);

     service_orders::create([
"user_id"=>1,
"service_id"=>1,
"description"=>"I have a sick cattle",
"phone"=>"07999012907",
"location"=>"kitembene",
"service_provider"=>$user2->id

     ]);


Service::create([
  'name'=>'Ai Services',
  'details'=>'Treating of Animals',
  'image'=>'/images/services/ai.jpeg',
  'user_id'=>2,
  
  'location'=>'Meru'
]);


    }

}
