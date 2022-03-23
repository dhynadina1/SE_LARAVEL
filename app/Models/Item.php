<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class item extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'quantity',
        'category_id'
    ];

    public function category()
    {
        return $this->hasOne(Category::class, "id", "category_id");
    }
}
