<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Gallery extends Model{
    use HasFactory;
    protected $table = 'galleries';

    protected $fillable = ['category_id', 'image', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
