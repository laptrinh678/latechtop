<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('posts')->insert([
            'name' => 'bái viết 1',
            'slug' => 'lsp-1',
            'cate_id' =>  1,
        ]);
    }
}
