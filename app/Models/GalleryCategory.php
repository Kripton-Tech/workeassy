<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GalleryCategory extends Model{
    use HasFactory;
    protected $table = 'galleries_categories';

    protected $fillable = ['title', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
