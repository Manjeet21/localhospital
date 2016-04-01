<?php

use Illuminate\Database\Seeder;
use App\Model\User;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('user')->delete();
		User::insert([
			[
				'name' => 'manjeet',
				'mobile' => '7788225566',
				'email' => 'graaj58@gmail.com',
				'password' => bcrypt('123456'),
				'address' => 'New Society',
				'user_type'=>'doctor',
				'gender' => 'male',
				'dob'=>'22-02-1988',
				'created_at' => new DateTime,
				'updated_at' => new DateTime,
			],
			[
				'name' => 'sohib',
				'mobile' => '7788225566',
				'email' => 'asdf@gmail.com',
				'password' => bcrypt('123456'),
				'address' => 'New Society asad',
				'gender' => 'male',
				'user_type'=>'patient',
				'dob'=>'22-02-1988',
				'created_at' => new DateTime,
				'updated_at' => new DateTime,
			],
		]);
    }
}
