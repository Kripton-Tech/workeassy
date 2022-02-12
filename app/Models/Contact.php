<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model{
    use HasFactory;
    protected $table = 'contact_us';

    protected $fillable = ['name', 'email', 'subject', 'message', 'is_read', 'created_by', 'created_at', 'updated_by', 'updated_at'];
}
