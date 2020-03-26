<?php

use Illuminate\Database\Seeder;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\User;
class RolePermissionSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
  app()[\Spatie\Permission\PermissionRegistrar::class]->forgetCachedPermissions();

      // create permissions
Permission::create(['name' => 'add Agrovet']);
Permission::create(['name' => 'delete Agrovet']);
Permission::create(['name' => 'update Agrovet']);
//permission concerning cases
Permission::create(['name' => 'add Vet service']);
Permission::create(['name' => 'delete vet service']);
Permission::create(['name' => 'update vet service']);

//role creation
$role = Role::create(['name' => 'vet']);
$role1 = Role::create(['name' => 'agrovet']);
$role2 = Role::create(['name' => 'admin']);
$role3 = Role::create(['name' => 'user']);

$role->givePermissionTo(['add Agrovet','delete Agrovet','update Agrovet']);
$role1->givePermissionTo(['add Vet service','delete vet service','update vet service']);

//ASSIGN SOME USERS RoleS
User::find(2)->assignRole('vet');
User::find(1)->assignRole('agrovet');
User::find(3)->assignRole('admin');

    }
}
