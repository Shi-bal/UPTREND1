<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // The table associated with the model (optional if the table name is 'categories')
    protected $table = 'categories';

    // The attributes that are mass assignable
    protected $fillable = [
        'category_name', // Add other columns as needed
    ];
}
