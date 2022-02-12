<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class About extends Model{
    use HasFactory;
    protected $table = 'abouts';

    protected $fillable = ['title', 'image', 'description', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
