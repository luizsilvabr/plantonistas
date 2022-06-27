<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuariosModel extends Model
{

    protected $table = 'usuarios';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'senha', 'ts'];


    public function getByNome(string $nome): array
    {
        $rq =  $this->where('nome', $nome)->first();

        return !is_null($rq) ? $rq : [];
    }
}
