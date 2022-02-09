<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model{
    use HasFactory;
    protected $table = 'blogs';

    protected $fillable = ['title', 'description', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
