<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
<<<<<<< HEAD
=======

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');// userリレーション
    }
>>>>>>> 49d5b26f76c9414c5c664dcc334c8910e1fdb7a1
}
