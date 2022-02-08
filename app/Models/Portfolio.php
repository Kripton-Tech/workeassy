<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Portfolio extends Model{
    use HasFactory;
    protected $table = 'portfolios';

    protected $fillable = ['category_id', 'title', 'image', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
