@extends('master')

@section('content')
    <div class="row">
        <div class="col">

            @if ($produto->estoque->count() < 5)
                <div class="col">
                    <div class="alert alert-danger">
                        Este produto possui apenas {{ $produto->estoque->count() }} itens no estoque
                    </div>
                </div>
            @endif

            <h1>
                Produto: {{ $produto->nome }} <br>
                Estoque: {{ $produto->estoque->count() }}
            </h1>

            <hr>

            <div class="row">
                <div class="col-6" style="border-right: 1px solid #ccc">
                    {!! Form::open(['route' => 'estoque.store', 'method' => 'POST', 'files' => true]) !!}

                    <h2>Adicionar mais produtos ao estoque</h2>
                    <div class="form-group">

                        {!! Form::label('estoque', 'Quantidade de produtos em estoque') !!}
                        {!! Form::number('estoque', null, ['class' => 'form-control']) !!}

                    </div>

                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-primary">Salvar</button>
                    </div>

                    {!! Form::close() !!}

                </div>

                <div class="col-6">
                    {!! Form::open(['route' => ['estoque.update', $produto->id], 'method' => 'PUT', 'files' => true]) !!}

                    <h2>Remover produtos do estoque</h2>
                    <div class="form-group">

                        {!! Form::label('estoque', 'Quantidade de produtos em estoque') !!}
                        {!! Form::number('estoque', null, ['class' => 'form-control']) !!}

                    </div>

                    <input type="hidden" name="produto_id" value="{{ $produto->id }}">

                    <div class="box-footer">
                        <button type="submit" class="btn btn-danger">Remover</button>
                    </div>

                    {!! Form::close() !!}

                </div>
            </div>

        </div>
    </div>

@stop
