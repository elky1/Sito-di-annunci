<?php

namespace Database\Seeders;

use Illuminate\Support\Carbon;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();
        $categories = [
            0 => ['Elettronica'],
            1 => ['Libri'],
            2 => ['Musica'],
            3 => ['Sport'],
            4 => ['Abbigliamento'],
            5 => ['Arredamento'],
            6 => ['Immobili'],
            7 => ['Automobili'],
            8 => ['Bigiotteria'],
            9 => ['Cucina'],
            10 => ['Giocattoli'],
            11 => ['Fai da te'],
        ];


        foreach ($categories as $category){
            DB::table('categories') -> insert([
                'category_name' => $category[0],
                'created_at' => Carbon::now(),
            ]);
        }
    }
}
