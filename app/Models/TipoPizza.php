<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TipoPizza extends Model
{
    use HasFactory;

    protected $table = "tipo_pizza";
    protected $fillable = [
        'sabor',
        'tamanho',
        'tipo',
        'preco',
    ];
}
