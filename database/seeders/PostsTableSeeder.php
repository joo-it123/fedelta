<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
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
}
