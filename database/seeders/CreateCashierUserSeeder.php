<?php
 
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use App\User;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
  
class CreateCashierUserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = User::create([
        	'name' => 'Cashier', 
        	'email' => 'cashier@cashier.com',
            'department_id' => '1',
        	'password' => bcrypt('arcreactor2021')
        ]);
  
        $role = Role::create(['name' => 'Cashier']);
   
        $permissions = Permission::pluck('id','id')->all();
  
        $role->syncPermissions($permissions);
   
        $user->assignRole([$role->id]);
    }
}