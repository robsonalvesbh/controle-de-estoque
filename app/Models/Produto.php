<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Produto extends Model
{

    protected $fillable = ['foto', 'nome', 'valor', 'descricao'];

    public function estoque()
    {
        return $this->hasMany(Estoque::class)->where('estado', 'D');
    }

    public function estoqueDisponivel()
    {
        return DB::table('estoque')->where('estado', '=', 'D');
    }
}
