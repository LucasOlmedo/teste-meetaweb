<?php

namespace App\Http\Controllers;

use App\Models\Usuario;
use Illuminate\Http\Request;
use App\Repositories\UsuariosRepository;

class UsuarioController extends Controller
{
    private $repo;

    public function __construct()
    {
        $this->repo = new UsuariosRepository;
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $result = $this->repo->listUser();
        return view('usuarios.index', [
            'usuarios' => $result,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('usuarios.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'nome' => 'required|string',
            'email' => 'required|email',
            'sexo' => 'required|in:M,F',
            'cpf' => 'required|string',
            'telefone' => 'array',
        ]);

        try {
            $novoUsuario = $this->repo->save(
                new Usuario,
                $request->only(['nome', 'email', 'sexo', 'cpf']),
                $request->input('telefone')
            );

            if ($novoUsuario instanceof Usuario) {
                return response()->json([
                    'error' => false,
                    'message' => 'Usuário cadastrado com sucesso!',
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'error' => true,
                'message' => $e->getMessage(),
            ]);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $usuario = $this->repo->findById($id);

        if ($usuario instanceof Usuario) {
            return view('usuario.show');
        }

        return view('usuario.not_found');
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function edit(Usuario $usuario)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Usuario  $usuario
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Usuario $usuario)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $usuario = $this->repo->findById($id);
        if ($usuario instanceof Usuario) {
            $this->repo->delete($usuario);
            return view('usuario.deleted', [
                'error' => false
            ]);
        }
        return view('usuario.deleted', [
            'error' => true
        ]);
    }
}
