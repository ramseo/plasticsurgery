<?php

namespace Database\Seeders\Auth;

use App\Events\Backend\UserCreated;
use App\Models\User;
use Carbon\Carbon as Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;

/**
 * Class UserTableSeeder.
 */
class UserTableSeeder extends Seeder
{
    /**
     * Run the database seed.
     *
     * @return void
     */
    public function run()
    {
        Schema::disableForeignKeyConstraints();

        $faker = \Faker\Factory::create();

        // Add the master administrator, user id of 1
        $users = [
            [
                'first_name'        => 'Super',
                'last_name'         => 'Admin',
                'name'              => 'Super Admin',
                'email'             => 'super@admin.com',
                'password'          => Hash::make('secret'),
                'username'          => 'super_admin',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Admin',
                'last_name'         => 'Istrator',
                'name'              => 'Admin Istrator',
                'email'             => 'admin@admin.com',
                'password'          => Hash::make('secret'),
                'username'          => 'admin',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Vendor',
                'last_name'         => 'User User',
                'name'              => 'Vendor',
                'email'             => 'vendor@vendor.com',
                'password'          => Hash::make('secret'),
                'username'          => 'vendor',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'Executive',
                'last_name'         => 'User',
                'name'              => 'Executive User',
                'email'             => 'executive@executive.com',
                'password'          => Hash::make('secret'),
                'username'          => 'executive',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
            [
                'first_name'        => 'General',
                'last_name'         => 'User',
                'name'              => 'General User',
                'email'             => 'user@user.com',
                'password'          => Hash::make('secret'),
                'username'          => 'user',
                'mobile'            => $faker->phoneNumber,
                'date_of_birth'     => $faker->date,
                'avatar'            => 'img/default-avatar.jpg',
                'gender'            => $faker->randomElement(['Male', 'Female', 'Other']),
                'email_verified_at' => Carbon::now(),
                'created_at'        => Carbon::now(),
                'updated_at'        => Carbon::now(),
            ],
        ];

        foreach ($users as $user_data) {
            $user = User::create($user_data);

            event(new UserCreated($user));
        }

        Schema::enableForeignKeyConstraints();
    }
}
