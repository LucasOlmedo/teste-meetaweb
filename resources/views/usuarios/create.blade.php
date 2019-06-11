@extends('layout')
@section('title', 'Novo Usuário')
@section('content')
<div class="row-fluid">
    <div class="col">
        <h1>Cadastro de usuário</h1>
        <a class="btn btn-secondary" href="{{route('index')}}" role="button">Voltar</a>
        <hr>
        <form name="novo-usuario">
            @csrf
            <div class="form-group">
                <label>Nome do usuário</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Digite o nome do usuário" name="nome">
            </div>
            <div class="form-group">
                <label>Email</label>
                <input type="email" class="form-control" aria-describedby="emailHelp" placeholder="Digite o email" name="email">
            </div>
            <div class="form-group">
                <label>CPF</label>
                <input type="text" class="form-control" aria-describedby="emailHelp" placeholder="Digite o CPF" name="cpf">
            </div>
            <label for="">Sexo</label>
            <br>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline1" name="sexo" value="M" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline1">Masculino</label>
            </div>
            <div class="custom-control custom-radio custom-control-inline">
                <input type="radio" id="customRadioInline2" name="sexo" value="F" class="custom-control-input">
                <label class="custom-control-label" for="customRadioInline2">Feminino</label>
            </div>
            <br>
            <br>
            <div class="form-row tel-added"></div>
            <div class="form-row">
                <div class="form-group col-md-4">
                    <label>Telefone</label>
                    <input type="text" class="form-control tel-original" placeholder="Digite o Telefone">
                </div>
                <div class="form-group col-md-4">
                    <label>&nbsp;</label>
                    <br>
                    <button type="button" class="btn btn-primary add-tel">Adicionar telefone</button>
                </div>
            </div>
            <hr>
            <button type="submit" class="btn btn-success">Salvar</button>
        </form>
    </div>
</div>
@endsection