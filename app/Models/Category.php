<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'categories'; // or the correct table name
    
    protected $fillable = [
        "name",

    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
