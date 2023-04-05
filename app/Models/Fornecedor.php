<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Fornecedor extends Model
{
    use HasFactory;

    protected $table= 'fornecedores';
    protected $fillable = ['nome', 'site', 'uf', 'email'];

    public function produtos(){
        //para classes mapeadas com nome diferente 
        return $this->hasMany('App\Models\Produto', 'fornecedor_id', 'id');
        //return $this->hasMany('App\Models\Produto');
    }
}
