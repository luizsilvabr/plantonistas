<?php

namespace App\Models;

use CodeIgniter\Model;

class PlantoesModel extends Model
{

    protected $table = 'plantoes';
    protected $primaryKey = 'id';
    protected $allowedFields = ['plantonistas_id', 'regioes_id', 'ts'];
    protected $returnType = 'object';

    protected $validationRules = [
        'plantonistas_id' => 'required',
        'regioes_id' => 'required|is_unique[plantoes.regioes_id,id,{id}]',
    ];

    protected $validationMessages = [
        'plantonistas_id' => [
            'required' => 'O campo plantonista é obrigatório.'
        ],
        'regioes_id' => [
            'required' => 'O campo regiões é obrigatório.',
            'is_unique' => 'Esta região já foi cadastrada.'
        ]
    ];
}
