<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;

    protected $fillable = ['brand', 'type', 'comment'];

    public $brands = ['mercedes' => 'Mercedes' ,'ferrari' => 'Ferrari', 'audi' => 'Audi', 'opel' => 'Opeltje'];

    public function getBrands() {
        return $this->brands;
    }
}
