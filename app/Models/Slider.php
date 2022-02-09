<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Slider extends Model{
    use HasFactory;
    protected $table = 'sliders';

    protected $fillable = ['title', 'image', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
