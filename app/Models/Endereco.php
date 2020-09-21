<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Endereco extends Model
{
    use SoftDeletes;
    use HasFactory;

    public function cliente(){
        return $this->belongsTo('App\Models\Cliente');
        //utilizado para quando a nomenclatura do laravel
        //return $this->belongsTo('App\Models\Cliente', 'cliente_id', 'id');
    }

    protected $fillable = ['cliente_id','rua','numero','bairro','cidade','uf','cep'];
}
