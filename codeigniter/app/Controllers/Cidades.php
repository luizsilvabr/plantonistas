<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Cidades extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $this->db = db_connect();
        $sql = "SELECT cidades.id, cidades.nome, cidades.sigla, regioes.nome AS nomeRegiao FROM cidades
            JOIN regioes ON cidades.regioes_id = regioes.id";
        $query = $this->db->query($sql);
        $data['cidades'] = $query->getResult();
        $data['msg'] = $this->session->getFlashdata('msg');
        return view('cidades', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Adicionar';

        if ($this->request->getMethod() === 'post') {
            $cidadesModel = new \App\Models\CidadesModel();
            $dadosCidade = $this->request->getPost();
            if ($cidadesModel->insert($dadosCidade)) {
                $data['msg'] = 'Cidade inserida com sucesso!';
            } else {
                $data['msg'] = 'Erro ao inserir cidade';
                $data['errors'] = $cidadesModel->errors();
            }
        }
        $regioesModel = new \App\Models\RegioesModel();
        $listaRegioes = $regioesModel->findAll();
        $data['selectRegioes'] = $listaRegioes;
        return view('adicionarCidade', $data);
    }

    public function editar($id)
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Editar';
        $cidadesModel = new \App\Models\CidadesModel();
        $cidade = $cidadesModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $cidade->nome = $this->request->getPost('nome');
            $cidade->sigla = $this->request->getPost('sigla');
            $cidade->regioes_id = $this->request->getPost('regioes_id');
            if ($cidadesModel->update($id, $cidade)) {
                $data['msg'] = 'Cidade Atualizada com sucesso!';
            } else {
                $data['errors'] = $cidadesModel->errors();
                $data['msg'] = 'Erro ao Atualizar cidade';
            }
        }
        $regioesModel = new \App\Models\RegioesModel();
        $listaRegioes = $regioesModel->findAll();
        $data['selectRegioes'] = $listaRegioes;
        $data['cidade'] = $cidade;
        return view('adicionarCidade', $data);
    }

    public function excluir($id = null)
    {

        if (is_null($id)) {
            $this->session->setFlashdata('msg', 'Cidade não encontrada...');
            return redirect()->to(base_url('cidades'));
        }
        $cidadesModel = new \App\Models\CidadesModel();
        if ($cidadesModel->delete($id)) {
            $this->session->setFlashdata('msg', 'Cidade deletada com sucesso');
        } else {
            $this->session->setFlashdata('msg', 'Erro ao deletar cidade');
        }
        return redirect()->to(base_url('cidades'));
    }
}
