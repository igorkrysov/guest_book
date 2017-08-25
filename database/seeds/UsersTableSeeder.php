<?php

use Illuminate\Database\Seeder;
use App\Group;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        DB::table('users')->insert([
          'name' => 'admin',
          'email' => 'admin@domain.com',
          'password' => Hash::make('123456Qw'),
          'group_id' => Group::where('group','administrator')->take(1)->get()->pluck('id')[0]
        ]);
    }
}
