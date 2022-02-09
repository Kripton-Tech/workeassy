<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Video extends Model{
    use HasFactory;
    protected $table = 'videos';

    protected $fillable = ['link', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
