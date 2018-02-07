<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;


class EstoqueController extends Controller
{
    public function show($id)
    {
        $produto = Produto::where('id', $id)
            ->with('estoque')
            ->first();

        return view('estoque.show')->with('produto', $produto);
    }

    public function store(Request $request)
    {
        $produto = Produto::findOrFail($request->input(['produto_id']));

        (new Estoque())->saveMultiplesProducts($produto, $request->input(['estoque']));

        return redirect()
            ->route('produtos.index');
    }

    public function update(Request $request)
    {
        try {

            $data = $request->all();


            for ($i = 0; $i < $data['estoque']; $i++) {
                $produto = Estoque::whereRaw("produto_id = {$data['produto_id']} and estado = 'D'")
                    ->firstOrFail();
                $produto->estado = 'ND';
                $produto->save();
            }

            return redirect()
                ->route('produtos.index');

        } catch (Exception $e) {

            return redirect()
                ->route('produtos.index');

        }

    }
}
