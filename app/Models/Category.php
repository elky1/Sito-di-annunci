<?php

namespace App\Models;

use App\Models\Adv;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
    ];

    public function advs(){
        return $this->hasMany(Adv::class);
    }
}
