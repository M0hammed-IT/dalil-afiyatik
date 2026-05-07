<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    // هذا السطر هو اللي يخلي لارافل يسمح بمرور التصنيف للداتا بيس
    protected $fillable = ['title', 'category', 'content', 'image'];
}