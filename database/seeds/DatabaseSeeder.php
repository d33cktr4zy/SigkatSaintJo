<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        // $this->call(UserTableSeeder::class);
        $this->call('BeritaSeeder');
        $this->call('ForumPostSeeder');
        $this->call('KategorialSeeder');
        $this->call('PengumumanSeeder');
        $this->call('SakramenSeeder');
        $this->call('UserSeeder');
        Model::reguard();
    }
}
