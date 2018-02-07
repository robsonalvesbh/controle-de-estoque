<label for="nome">Escolha a foto do produto</label>
<div class="input-group mb-3">
    <div class="input-group-prepend">
        <span class="input-group-text">Upload</span>
    </div>
    <div class="custom-file">
        <input type="file" class="custom-file-input" name="foto">
        <label class="custom-file-label" for="inputGroupFile01">Escolha a foto</label>
    </div>
</div>

<div class="form-group">

    {!! Form::label('nome', 'Nome') !!}
    {!! Form::text('nome', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('valor', 'Valor do produto') !!}
    {!! Form::text('valor', null, ['class' => 'form-control']) !!}

</div>

<div class="form-group">

    {!! Form::label('descricao', 'Descrição') !!}
    {!! Form::textarea('descricao', null, ['class' => 'form-control']) !!}

</div>

