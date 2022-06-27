<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Plantoes extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        // Do Not Edit This Line
        parent::initController($request, $response, $logger);

        // Preload any models, libraries, etc, here.

        $this->session = \Config\Services::session();
    }
    public function index()
    {
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
            GROUP BY regioes.id";
        $query = $this->db->query($sql);
        $data['plantoes'] = $query->getResult();
        $data['msg'] = $this->session->getFlashdata('msg');
        return view('plantoes', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Adicionar';
        if ($this->request->getMethod() === 'post') {
            $plantoesModel = new \App\Models\PlantoesModel();
            $dadosPlantao = $this->request->getPost();


            if ($plantoesModel->insert($dadosPlantao)) {
                $data['msg'] = 'Plantão inserido com sucesso!';
            } else {
                $data['errors'] = $plantoesModel->errors();
                $data['msg'] = 'Erro ao inserir plantão';
            }
        }

        $regioesModel = new \App\Models\RegioesModel();
        $listaRegioes = $regioesModel->findAll();
        $data['selectRegioes'] = $listaRegioes;

        $plantonistasModel = new \App\Models\PlantonistasModel();
        $listaPlantonistas = $plantonistasModel->findAll();
        $data['selectPlantonistas'] = $listaPlantonistas;

        return view('adicionarPlantao', $data);
    }

    public function editar($id)
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Editar';
        $plantoesModel = new \App\Models\PlantoesModel();
        $plantao = $plantoesModel->find($id);

        $regioesModel = new \App\Models\RegioesModel();
        $listaRegioes = $regioesModel->findAll();
        $data['selectRegioes'] = $listaRegioes;

        $plantonistasModel = new \App\Models\PlantonistasModel();
        $listaPlantonistas = $plantonistasModel->findAll();
        $data['selectPlantonistas'] = $listaPlantonistas;

        if ($this->request->getMethod() === 'post') {
            $plantao->nome = $this->request->getPost('nome');
            $plantao->regioes_id = $this->request->getPost('regioes_id');
            $plantao->plantonistas_id = $this->request->getPost('plantonistas_id');

            if ($plantoesModel->update($id, $plantao)) {
                $data['msg'] = 'Plantão Atualizado com sucesso!';
            } else {
                $data['errors'] = $plantoesModel->errors();
                $data['msg'] = 'Erro ao Atualizar plantão';
            }
        }
        $data['plantao'] = $plantao;
        return view('adicionarPlantao', $data);
    }

    public function excluir($id = null)
    {
        if (is_null($id)) {
            $this->session->setFlashdata('msg', 'Plantão não encontrado...');
            return redirect()->to(base_url('plantoes'));
        }
        $plantoesModel = new \App\Models\PlantoesModel();
        if ($plantoesModel->delete($id)) {
            $this->session->setFlashdata('msg', 'Plantão deletado com sucesso');
        } else {
            $this->session->setFlashdata('msg', 'Erro ao deletar plantão');
        }
        return redirect()->to(base_url('plantoes'));
    }
}
