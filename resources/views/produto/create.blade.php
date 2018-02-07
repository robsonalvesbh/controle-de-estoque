@extends('master')

@section('content')
    <div class="row">
        <div class="col">

            <h1>Cadastrar Produto</h1>

            <div class="col" ng-controller="produtoController">
                {!! Form::open(['route' => 'produtos.store', 'method' => 'POST', 'ng-submit' => 'createProduct($event.target)', 'files' => true]) !!}
                <hr>
                @include('produto.partials.form')
                <div class="form-group">

                    {!! Form::label('estoque', 'Quantidade de produtos em estoque') !!}
                    {!! Form::number('estoque', null, ['class' => 'form-control']) !!}

                </div>


                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

                {!! Form::close() !!}

            </div>

        </div>
    </div>
@stop
