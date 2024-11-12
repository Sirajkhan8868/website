<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment_Replies extends Model
{
    use HasFactory;
    protected $table = 'comment__replies';
    protected $fillable = ['comment_id','user_id','comment'];
}
