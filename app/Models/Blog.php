<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    use HasFactory;
    protected $fillable = ['category_id', 'heading', 'body', 'cover_image', 'tags', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];

    protected $dates = ['created_at', 'updated_at'];
}
