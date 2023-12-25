<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;


    public function category()
    {
        return $this->belongsTo(Categories::class);
    }
    public function subcategory()
    {
        return $this->belongsTo(subcategories::class);
    }
    public function comment(){
        return $this->belongsTo(Comments::class);
    }
    public function seller(){
        return $this->belongsTo(User::class);
    }
    
}
