<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\marcas;


class eletrodomesticos extends Model
{
    use HasFactory;

    protected $fillable = ['nome', 'descricao', 'tensao', 'marca_id'];

    public function marca()
    {
        return $this->belongsTo(marcas::class);
    }
}
