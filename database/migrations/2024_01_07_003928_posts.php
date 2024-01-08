 

<?php
 
 
 use Illuminate\Support\Facades\Schema;
  
 use Illuminate\Database\Schema\Blueprint;
  
 use Illuminate\Database\Migrations\Migration;
  
 //以下一行追加
  
 use Illuminate\Support\Facades\DB;
  
  
 class Posts extends Migration
 
 {
  
 /**
  
  * Run the migrations.
  
  *
  
  * @return void
  
  */
  
 public function up()
  
 {
  
 //以下追加
  
 Schema::create('posts', function (Blueprint $table) {
  
 $table->increments('id');
  
 $table->string('post', 255);
  
 $table->timestamp('created_at')->default(DB::raw('CURRENT_TIMESTAMP'));
  
 $table->timestamp('updated_at')->default(DB::raw('CURRENT_TIMESTAMP on update CURRENT_TIMESTAMP'));
  
 });
  
 }
  
  
 /**
  
  * Reverse the migrations.
  
  *
  
  * @return void
  
  */
  
 public function down()
  
 {
  
 //
  
 Schema::drop('posts');
  
 }
  
 }