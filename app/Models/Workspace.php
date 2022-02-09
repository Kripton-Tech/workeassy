<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Workspace extends Model{
    use HasFactory;
    protected $table = 'workspaces';

    protected $fillable = ['title', 'sub_title', 'image', 'cover_image', 'description', 'status', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
