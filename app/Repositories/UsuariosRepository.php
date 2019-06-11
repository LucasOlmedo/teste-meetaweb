<?php

namespace App\Repositories;

use App\Models\Usuario;

class UsuariosRepository
{
    private $model;

    public function __construct()
    {
        $this->model = app(\App\Models\Usuario::class);
    }

    private function query()
    {
        return $this->model::query();
    }

    public function listUser($filters = [])
    {
        $query = $this->query();

        // filter implementation

        return $query->get();
    }

    public function findById($id)
    {
        return $this->model::find($id);
    }

    public function save(Usuario $model, $data = [], $phones = [])
    {
        $model->fill($data);
        if ($model->save()) {
            $model->telefones()->delete();
            if (count($phones) > 0) {
                foreach ($phones as $tel) {
                    $model->telefones()->create([
                        'usuario_id' => $model->id,
                        'telefone' => $tel,
                    ]);
                }
            }
            return $model;
        }
        return false;
    }

    public function delete(Usuario $model)
    {
        return $model->delete();
    }
}
