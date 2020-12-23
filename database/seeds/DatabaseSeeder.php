<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use PhpParser\Builder\Class_;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call(TagTableSeeder::class);
        $this->call(PostTableSeeder::class);

        Model::reguard();
    }
}

