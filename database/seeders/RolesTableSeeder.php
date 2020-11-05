<?php

namespace Database\Seeders;

use App\Models\Role;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Database\Seeder;
use Faker\Factory;

class RolesTableSeeder extends Seeder
{

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Factory::create();
        $adminRole = Role::create([
            'name' => 'admin',
            'display_name' => 'Adminstrator',
            'description' => 'System Adminstrator',
            'allowed_route' => 'admin'
        ]);
        $editorRole = Role::create([
            'name' => 'editor',
            'display_name' => 'Superviser',
            'description' => 'System SuperViser',
            'allowed_route' => 'admin'
        ]);
        $userRole = Role::create([
            'name' => 'user',
            'display_name' => 'User',
            'description' => 'Normal User',
            'allowed_route' => null
        ]);
        $admin = User::create(
            [
                'name' => 'Admin',
                'username' => 'admin',
                'email' => 'admin@blog.test',
                'mobile' => '0658029719',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('1234512345'),
                'status' => 1,
            ]
        );
        $admin->atachRole($adminRole);

        $editor = User::create(
            [
                'name' => 'Editor',
                'username' => 'editor',
                'email' => 'editor@blog.test',
                'mobile' => '0776247137',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('1234512345'),
                'status' => 1,
            ]
        );
        $editor->atachRole($editorRole);

        $user1 = User::create(
            [
                'name' => 'Mohammed Amin',
                'username' => 'amineboos36',
                'email' => 'amineboos36@blog.test',
                'mobile' => '0667764562',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('1234512345'),
                'status' => 1,
            ]
        );
        $user1->atachRole($userRole);
        $user2 = User::create(
            [
                'name' => 'Mohammed Amin.2',
                'username' => 'amineboos36.2',
                'email' => 'amineboos362@blog.test',
                'mobile' => '0667645622',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('1234512345'),
                'status' => 1,
            ]
        );
        $user2->atachRole($userRole);
        $user3 = User::create(
            [
                'name' => 'Mohammed Amin.3',
                'username' => 'amineboos36.3',
                'email' => 'amineboos36.30@blog.test',
                'mobile' => '0667645623',
                'email_verified_at' => Carbon::now(),
                'password' => bcrypt('1234512345'),
                'status' => 1,
            ]
        );
        $user3->atachRole($userRole);

        for ($i = 0; $i < 10; $i++) {
            $user = User::create(
                [
                    'name' => $faker->name,
                    'username' => $faker->userName,
                    'email' => $faker->email,
                    'mobile' => '066764' . random_int(1000, 9999),
                    'email_verified_at' => Carbon::now(),
                    'password' => bcrypt('1234512345'),
                    'status' => 1,
                ]
            );
            $user->atachRole($userRole);
        }
    }
}