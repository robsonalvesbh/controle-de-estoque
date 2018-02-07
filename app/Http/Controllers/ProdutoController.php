<?php

namespace App\Http\Controllers;

use App\Models\Estoque;
use App\Models\Produto;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProdutoController extends Controller
{
    public function index()
    {
        $produto = Produto::with('estoque')
            ->get();

        return view('produto.index')->with('produtos', $produto);
    }

    public function create()
    {
        return view('produto.create');
    }

    public function store(Request $request)
    {
        try {
            $productData = $request->only(['nome', 'valor', 'descricao']);

            $produto = Produto::create($productData);
            $produto->foto = $this->storeFiles($request);
            $produto->save();

            (new Estoque())->saveMultiplesProducts($produto, $request->input(['estoque']));

            return redirect()
                ->route('produtos.index');

        } catch (Exception $e) {
            return response()
                ->json(['status' => false]);
        }
    }

    private function storeFiles(Request $request)
    {

        $file = $request->file('foto');

        if (is_null($file)) {
            return null;
        }

        return Storage::put('public/produtos', $file);
    }

    public function edit($id)
    {
        $produto = Produto::findOrFail($id);

        return view('produto.edit')->with('produto', $produto);
    }

    public function update(Request $request, $id)
    {
        try {

            $produto = Produto::findOrFail($id);
            $produto->fill($request->only(['nome', 'valor', 'descricao']));
            $produto->foto = $this->storeFiles($request);
            $produto->save();

            return redirect()
                ->route('produtos.index');

        } catch (Exception $e) {

            return redirect()
                ->route('produtos.index');

        }
    }

    public function destroy($id)
    {
        try {

            $produto = Produto::findOrFail($id);
            $produto->delete();

            return redirect()
                ->route('produtos.index');

        } catch (Exception $e) {

            return redirect()
                ->route('produtos.index');

        }

    }
}
