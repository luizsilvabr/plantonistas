<?php

namespace App\Models;

use CodeIgniter\Model;

class RegioesModel extends Model
{

    protected $table = 'regioes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'ts', 'cidades_id'];
    protected $returnType = 'object';

    protected $validationRules = [
        'nome' => 'required|min_length[2]|is_unique[regioes.nome,id,{id}]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório.',
            'min_length' => 'O campo nome deve ter mais de 2 caracteres.',
            'is_unique' => 'Já existe uma região com este nome.'
        ]
    ];
}
