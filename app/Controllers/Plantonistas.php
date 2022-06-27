<?php

namespace App\Controllers;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use Psr\Log\LoggerInterface;

class Plantonistas extends BaseController
{

    public function initController(RequestInterface $request, ResponseInterface $response, LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->session = \Config\Services::session();
    }
    public function index()
    {
        $plantonistasModel = new \App\Models\PlantonistasModel();
        $data['plantonistas'] = $plantonistasModel->find();
        $data['msg'] = $this->session->getFlashdata('msg');
        return view('plantonistas', $data);
    }

    public function adicionar()
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Adicionar';
        if ($this->request->getMethod() === 'post') {
            $plantonistasModel = new \App\Models\PlantonistasModel();
            $plantonistasModel->set($this->request->getPost());

            if ($plantonistasModel->insert()) {
                $data['msg'] = 'Plantonista inserido com sucesso!';
            } else {
                $data['msg'] = 'Erro ao inserir plantonista';
                $data['errors'] = $plantonistasModel->errors();
            }
        }

        return view('adicionarPlantonista', $data);
    }

    public function editar($id)
    {
        $data['msg'] = '';
        $data['errors'] = '';
        $data['title'] = 'Editar';
        $plantonistasModel = new \App\Models\PlantonistasModel();
        $plantonista = $plantonistasModel->find($id);

        if ($this->request->getMethod() === 'post') {
            $plantonista->nome = $this->request->getPost('nome');
            $plantonista->telefone_pessoal = $this->request->getPost('telefone_pessoal');
            $plantonista->telefone_empresa = $this->request->getPost('telefone_empresa');

            if ($plantonistasModel->update($id, $plantonista)) {
                $data['msg'] = 'Plantonista Atualizado com sucesso!';
            } else {
                $data['msg'] = 'Erro ao Atualizar plantonista';
                $data['errors'] = $plantonistasModel->errors();
            }
        }
        $data['plantonista'] = $plantonista;
        return view('adicionarPlantonista', $data);
    }

    public function excluir($id = null)
    {
        if (is_null($id)) {
            $this->session->setFlashdata('msg', 'Plantonista não encontrada...');
            return redirect()->to(base_url('plantonistas'));
        }
        $plantonistasModel = new \App\Models\PlantonistasModel();
        if ($plantonistasModel->delete($id)) {
            $this->session->setFlashdata('msg', 'Plantonista deletado com sucesso');
        } else {
            $this->session->setFlashdata('msg', 'Erro ao deletar plantonista');
        }
        return redirect()->to(base_url('plantonistas'));
    }
}
