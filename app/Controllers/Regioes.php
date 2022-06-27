<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Regioes extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $regioesModel = new \App\Models\RegioesModel();
        $data['regioes'] = $regioesModel->get()->getResult();
        $data['msg'] = $this->session->getFlashdata('msg');
        return view('regioes', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        $data['title'] = 'Adicionar';
        $data['errors'] = '';
        if ($this->request->getMethod() === 'post') {
            $regioesModel = new \App\Models\RegioesModel();
            $dadosRegiao = $this->request->getPost();


            if ($regioesModel->insert($dadosRegiao)) {
                $data['msg'] = 'Região inserida com sucesso!';
            } else {
                $data['msg'] = 'Erro ao inserir região';
                $data['errors'] = $regioesModel->errors();
            }
        }
        return view('adicionarRegiao', $data);
    }

    public function editar($id)
    {
        $data['msg'] = '';
        $data['title'] = 'Editar';
        $data['errors'] = '';
        $regioesModel = new \App\Models\RegioesModel();
        $regiao = $regioesModel->find($id);
        if ($this->request->getMethod() === 'post') {
            $regiao->nome = $this->request->getPost('nome');
            if ($regioesModel->update($id, $regiao)) {
                $data['msg'] = 'Região Atualizada com sucesso!';
            } else {
                $data['msg'] = 'Erro ao Atualizar região';
                $data['errors'] = $regioesModel->errors();
            }
        }
        $data['regiao'] = $regiao;
        return view('adicionarRegiao', $data);
    }

    public function excluir($id = null)
    {
        if (is_null($id)) {
            $this->session->setFlashdata('msg', 'Região não encontrada...');
            return redirect()->to(base_url('regioes'));
        }
        $regioesModel = new \App\Models\RegioesModel();
        if ($regioesModel->delete($id)) {
            $this->session->setFlashdata('msg', 'Região deletada com sucesso');
        } else {
            $this->session->setFlashdata('msg', 'Erro ao deletar região');
        }
        return redirect()->to(base_url('regioes'));
    }
}
