@extends('master')

@section('content')
    <div class="row">
        <div class="col">

            <h1>Produtos Cadastrado</h1>

            <a href="{{ route('produtos.create') }}">
                <button class="btn btn-primary mb-3">Cadastrar Novo Produto</button>
            </a>

            <table class="table table-bordered table-striped">
                <thead>
                <tr>
                    <th>foto</th>
                    <th>Nome</th>
                    <th>Valor</th>
                    <th>Descricao</th>
                    <th>qtd em estoque</th>
                    <th>Ação</th>
                </tr>
                </thead>
                <tbody>
                @foreach($produtos as $produto)
                    <tr class="{{ $produto->estoque->count() < 5 ? 'table-danger' : '' }}">
                        <td><img src="{{ asset('storage/' .  str_replace('public/', '', $produto->foto))  }}" alt="{{ $produto->nome }}"
                                 class="img-fluid" style="height: 64px;"></td>
                        <td>{{ $produto->nome }}</td>
                        <td>R$ {{ number_format($produto->valor, 2, ',', '.') }}</td>
                        <td>{{ $produto->descricao }}</td>
                        <td>{{ $produto->estoque->count() }}</td>
                        <td>

                            <a class="pull-left text-white btn btn-primary"
                               href="{{ route('estoque.show', ['id' => $produto->id]) }}"
                               style="margin-right: 15px">
                                <i class="fa fa-cart-plus"></i>
                            </a>

                            <a class="pull-left text-white btn btn-primary"
                               href="{{ route('produtos.edit', ['id' => $produto->id]) }}"
                               style="margin-right: 15px">
                                <i class="fa fa-pencil"></i>
                            </a>

                            {!! Form::open(['method' => 'DELETE', 'route' => ['produtos.destroy', $produto->id], 'class'=>'form-destroy']) !!}
                            <button class="pull-left text-white btn btn-primary" type="submit" title="Excluir">
                                <i class="fa fa-trash"></i>
                            </button>
                            {!! Form::close() !!}

                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>

        </div>
    </div>

@stop
