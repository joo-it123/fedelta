<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
<<<<<<< HEAD
=======

>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
use Illuminate\Support\Facades\DB;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
<<<<<<< HEAD
        // 他のシーダーファイルを呼び出す場合
        // $this->call(OtherSeeder::class);

        // ここで投稿のデータを挿入
        DB::table('posts')->insert([
            ['post' => '1つ目の投稿になります'],
            ['post' => 'Laravelの投稿ページを作りました'],
            ['post' => '投稿についてのCRUD一式を作っています'],
            ['post' => 'MVCの役割を体験中です'],
            ['post' => '初期レコードがこれで終わりです。']
        ]);
    }
=======
        $this->call(PostsTableSeeder::class);
        //
        DB::table('posts')->insert([
 
            ['post' => '1つ目の投稿になります'],
             
            ['post' => 'Laravelの投稿ページを作りました'],
             
            ['post' => '投稿についてのCRUD一式を作っています'],
             
            ['post' => 'MVCの役割を体験中です'],
             
            ['post' => '初期レコードがこれで終わりです。']
             
            ]);
             
            }
    
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
}
