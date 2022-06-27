<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Listagem extends BaseController
{
    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        if (session('isLoggedIn')) {
            return redirect()->to(base_url('/home'));
        } else {
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
        GROUP BY regioes.id, plantoes.id";
            $query = $this->db->query($sql);
            $data['plantoes'] = $query->getResult();
            $data['msgLogin'] = $this->session->getFlashdata('msgLogin');
            return view('listagem', $data);
        }
    }
}
