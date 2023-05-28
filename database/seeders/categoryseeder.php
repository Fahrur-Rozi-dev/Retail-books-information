<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class categoryseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Schema::disableForeignKeyConstraints();
        Category::truncate();
        Schema::enableForeignKeyConstraints();

        $data = [
            'comic',
            'fantasy',
            'horror',
            'romance',
            'mystery',
            'fiction',
            'novel',
            'western',
            'magical',
        ];
        foreach ($data as $key) {
            Category::insert([
                'name'=>$key
            ]);
            # code...
        }
    }
}
