@extends('master')

@section('content')
    <div class="row">
        <div class="col">

            <h1>Editar Produto</h1>

            <div class="col">
                {!! Form::model($produto, ['route' => ['produtos.update', $produto->id], 'method' => 'PUT', 'files' => true]) !!}
                <hr>
                @include('produto.partials.form')

                <div class="box-footer">
                    <button type="submit" class="btn btn-primary">Salvar</button>
                </div>

                {!! Form::close() !!}
            </div>

        </div>
    </div>
@stop
