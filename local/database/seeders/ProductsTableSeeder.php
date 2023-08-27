<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;
class ProductsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('products')->insert([
            'name' => 'sp1',
            'slug' => 'lsp-1',
            'cate_id' =>  1,
        ]);
    }
}
