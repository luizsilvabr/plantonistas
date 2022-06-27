<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Geral extends BaseController
{
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $usuariosModel = new \App\Models\UsuariosModel();
        $data['usuarios'] = $usuariosModel->find();
        $this->db = db_connect();
        $sql = "SELECT plantoes.id,
            plantonistas.nome AS nomePlantonista,
            plantonistas.telefone_empresa,
            plantonistas.telefone_pessoal,
            regioes.nome AS nomeRegiao,
            (SELECT regioes.nome FROM cidades JOIN regioes ON cidades.regioes_id = regioes.id WHERE cidades.regioes_id = plantoes.regioes_id LIMIT 1) AS regiaoNomes,
            (SELECT GROUP_CONCAT(cidades.sigla) FROM cidades JOIN regioes ON cidades.regioes_id = regioes.id WHERE cidades.regioes_id = plantoes.regioes_id LIMIT 1) AS siglas
            FROM plantoes
            JOIN plantonistas ON plantoes.plantonistas_id = plantonistas.id
            JOIN regioes ON plantoes.regioes_id = regioes.id
            GROUP BY regioes.id, plantoes.id
            ORDER BY plantoes.id";
        $query = $this->db->query($sql);
        $data['msg'] = '';
        $data['msgLogin'] = $this->session->getFlashdata('msgLogin');
        $data['plantoes'] = $query->getResult();
        return view('home', $data);
    }
}
