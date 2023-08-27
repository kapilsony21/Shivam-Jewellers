<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = "products";
    protected $guarded = [];

    public function getImageAttribute($value) {
        if($value !== null) {
            if (strpos($value, 'http://') === 0 || strpos($value, 'https://') === 0) {
                return $value; // Return the original URL
            }else {
                return asset('storage/'.$value);
            }
        }else{
            return null;
        }
       
        
    }

    public function setImageAttribute($value) {
                if($value !== null) {
                    if (strpos($value, 'http://') === 0 || strpos($value, 'https://') === 0) {
                        return $this->attributes['image'] = $value; // Return the original URL
                    }else {
                        $this->attributes['image'] = asset('storage/'.$value);
                    }
                }else{
                    
                return null;
                }

    }

    public function stock() {
        return $this->hasMany(InventoryTransaction::class);
    }
}
