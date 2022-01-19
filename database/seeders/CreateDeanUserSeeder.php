<?php
  
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateDeanUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Dean', 
        	'email' => 'dean@dean.com',
            'department_id' => '1',
        	'password' => bcrypt('arcreactor2021')
        ]);
  
        $role = Role::create(['name' => 'Dean']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}