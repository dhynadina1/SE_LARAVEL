<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class animal extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'class',
        'cage_id',
    ];

    public function cage()
    {
        return $this->hasOne(Cage::class, "id", "cage_id");
    }
}
