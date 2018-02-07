<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Estoque extends Model
{
    protected $fillable = ['produto_id', 'estado'];

    const ESTADO_DISPONIVEL = 'D';
    const ESTADO_NAO_DISPONIVEL = 'ND';

    public function pecas()
    {
        return $this->belongsTo(Produto::class);
    }

    public function saveMultiplesProducts(Produto $produtos, $quantidadeEmEstoque)
    {
        $data = [];

        for ($i = 0; $i < $quantidadeEmEstoque; $i++) {
            array_push($data, ['produto_id' => $produtos->id, 'estado' => self::ESTADO_DISPONIVEL]);
        }

        return Estoque::insert($data);
    }
}
