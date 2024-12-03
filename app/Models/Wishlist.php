<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory; // Import HasFactory
use Illuminate\Database\Eloquent\Model;

class Wishlist extends Model
{
    use HasFactory;

    protected $table = 'wishlist'; // Table name (optional if using Laravel's naming convention)

    protected $fillable = [
        'user_id',
        'product_id',
    ];
}
