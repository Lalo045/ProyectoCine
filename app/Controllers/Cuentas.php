<?php

namespace App\Controllers;

class Cuentas extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];


    public function index()
    {

        $usuarioM = model('UsuarioM'); 
        $data['cuentasD'] = $usuarioM->findAll(); 

        return view('head') .
            view('menu') .
            view('cuentas/show', $data) .
            view('footer');
    }

    public function add()
    {
        return view('head') .
            view('menu') .
            view('cuentas/add') .
            view('footer');
    }

    public function insert()
    {
        if (!$this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'user' => 'required',
            'pass' => 'required',
            'tipo' => 'required',
        ];

        $data = [
            "user" => $_POST['user'],
            "pass" => $_POST['pass'],
            "tipo" => $_POST['tipo'],
        ];

        if (!$this->validate($rules)) {
            return
                view('head') .
                view('menu') .
                view('cuentas/add', [
                    'validation' => $this->validator,
                ]) .
                view('footer');
        } else {
            $usuarioM = model('UsuarioM');
            $usuarioM->insert($data);
            return redirect()->to(base_url('/cuentas'));
        }
    }

    public function delete($idUsuario)
    {
        $usuarioM = model('UsuarioM');
        $usuarioM->delete($idUsuario);
        return redirect()->to(base_url('/cuentas'));
    }

    public function edit($idUsuario)
    {
        $data['idUsuario'] = $idUsuario; 
        $usuarioM = model('UsuarioM');
        $data['cuenta'] = $usuarioM->where('idUsuario', $idUsuario)->findAll();

        return view('head') .
            view('menu') .
            view('cuentas/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $cuentaM = model('UsuarioM');
        $idUsuario = $_POST['idUsuario'];
        $data = [
            "user" => $_POST['user'],
            "pass" => $_POST['pass'],
            "tipo" => $_POST['tipo'],
        ];
        $cuentaM->set($data)->where('idUsuario', $idUsuario)->update();
        return redirect()->to(base_url('/cuentas'));
    }
}
