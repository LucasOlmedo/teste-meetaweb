@extends('layout')
@section('title', 'Lista de Usuários')
@section('content')
<div class="row-fluid">
    <div class="col">
        <h1>Lista de usuários</h1>
        <a class="btn btn-primary" href="{{route('create')}}" role="button">Novo usuário</a>
        <hr>
        <table class="table mt-5">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">nome</th>
                    <th scope="col">email</th>
                    <th scope="col">sexo</th>
                    <th scope="col">CPF</th>
                </tr>
            </thead>
            <tbody>
                @forelse($usuarios as $usuario)
                <tr>
                    <th scope="row">{{$usuario->id}}</th>
                    <td>{{$usuario->nome}}</td>
                    <td>{{$usuario->email}}</td>
                    <td>{{$usuario->sexo == 'M' ? 'Masculino' : 'Feminino'}}</td>
                    <td>{{$usuario->cpf}}</td>
                </tr>
                @empty
                <tr>
                    <td colspan="5">
                        <i>Nenhum usuário encontrado.</i>
                    </td>
                </tr>
                @endforelse

            </tbody>
        </table>
    </div>
</div>
@endsection