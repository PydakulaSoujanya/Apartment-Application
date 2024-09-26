<?php
  
namespace Database\Seeders;
  
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;
  
class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(): void
    {
        $users = [

         [
            'name'=>'Superadmin',
            'email'=>'superadmin@itsolutionstuff.com',
            'type'=>0,
            'password'=> bcrypt('123456'),
         ],
            [
               'name'=>'Admin User',
               'email'=>'admin@itsolutionstuff.com',
               'type'=>1,
               'password'=> bcrypt('123456'),
            ],

            [
               'name'=>'Manager User',
               'email'=>'manager@itsolutionstuff.com',
               'type'=> 2,
               'password'=> bcrypt('123456'),
            ],

           

            [
                'name'=>'Resident',
                'email'=>'resident@itsolutionstuff.com',
                'type'=>3,
                'password'=> bcrypt('123456'),
             ],

             [
                'name'=>'Watchman',
                'email'=>'watchman@itsolutionstuff.com',
                'type'=>4,
                'password'=> bcrypt('123456'),
             ],

             
            [
               'name'=>'User',
               'email'=>'user@itsolutionstuff.com',
               'type'=>5,
               'password'=> bcrypt('123456'),
            ],
        ];
    
        foreach ($users as $key => $user) {
            User::create($user);
        }
    }
}