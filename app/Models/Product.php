<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';
    public $timestamps = false; 
    protected $fillable = [
        'name',
        'weight',
        'expiration_date',
        'cost',
        'price_sale',
        'stock',
        'status',
        'category',
        'image',
        
        
        
        'added_by',
        'description'
    ];
}
