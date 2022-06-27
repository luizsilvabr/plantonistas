<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantonistasModel extends Model
{

    protected $table = 'plantonistas';
    protected $primaryKey = 'id';
    protected $allowedFields = ['nome', 'ts', 'telefone_pessoal', 'telefone_empresa'];
    protected $returnType = 'object';

    protected $validationRules = [
        'nome' => 'required|min_length[3]|is_unique[plantonistas.nome,id,{id}]',
        'telefone_pessoal' => 'required|min_length[11]|max_length[15]|is_unique[plantonistas.telefone_pessoal,id,{id}]',
        'telefone_empresa' => 'required|min_length[11]|max_length[15]|is_unique[plantonistas.telefone_empresa,id,{id}]',
    ];

    protected $validationMessages = [
        'nome' => [
            'required' => 'O campo nome é obrigatório.',
            'min_length' => 'O campo nome deve ter mais de 3 caracteres.',
            'is_unique' => 'Já existe um plantonistas com este nome.'
        ],
        'telefone_pessoal' => [
            'required' => 'O campo telefone pessoal é obrigatório.',
            'min_length' => 'O campo telefone pessoal deve ter menos de 15 caracteres.',
            'max_length' => 'O campo telefone pessoal não pode ter mais de 15 caracteres.',
            'is_unique' => 'Já existe um telefone pessoal com este número.'
        ],
        'telefone_empresa' => [
            'required' => 'O campo telefone empresarial é obrigatório.',
            'min_length' => 'O campo telefone empresarial deve ter mais de 15 caracteres.',
            'max_length' => 'O campo telefone empresarial não pode ter mais de 15 caracteres.',
            'is_unique' => 'Já existe um telefone empresa com este número.'
        ]
    ];
}
