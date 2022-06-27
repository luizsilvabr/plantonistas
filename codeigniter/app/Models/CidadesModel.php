<?php

namespace App\Models;

use CodeIgniter\Model;

class CidadesModel extends Model
{

    protected $table = 'cidades';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'sigla', 'ts', 'regioes_id'];
    protected $returnType = 'object';

    protected $validationRules = [
        'nome' => 'required|min_length[2]|is_unique[cidades.nome,id,{id}]',
        'sigla' => 'required|min_length[2]|max_length[5]|is_unique[cidades.sigla,id,{id}]'
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório.',
            'min_length' => 'O campo nome deve ter mais de 2 caracteres.',
            'is_unique' => 'Já existe uma Cidade com este nome.'
        ],
        'sigla' => [
            'required' => 'O campo sigla é obrigatório.',
            'min_length' => 'O campo sigla deve ter mais de 2 caracteres.',
            'max_length' => 'O campo sigla não pode ter mais de 5 caracteres.',
            'is_unique' => 'Já existe uma Cidade com esta sigla.'
        ],
    ];
}
