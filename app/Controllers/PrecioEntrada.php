<?php

namespace App\Controllers;

class PrecioEntrada extends BaseController
{

    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string{
        $precioEntradaM = model('PrecioEntradaM');
        $data['precioED'] = $precioEntradaM->findAll();

            return view('head') .
            view('menu') .
            view('precioE/show', $data) .  
            view('footer');
        
    }

    public function add()
    {   
        return view('head') .
               view('menu') .
               view('precioE/add') .
               view('footer');
    }

    public function insert()
    { 
        if (! $this->request->is('post')) {
            return $this->add();
        }

        $rules = [
            'tipoEntrada' => 'required',
            'precio' => 'required',
            'descripcion' => 'required'
        ];

        if (! $this->validate($rules)) {
            return view('head') .
                   view('menu') .
                   view('precioE/add', [
                       'validation' => $this->validator
                   ]) .
                   view('footer');
        } else {
            $precioEM = model('PrecioEntradaM');
            $data = [
                "tipoEntrada" => $this->request->getPost('tipoEntrada'),
                "precio" => $this->request->getPost('precio'),
                "descripcion" => $this->request->getPost('descripcion')
            ];

            $precioEM->insert($data);
            return redirect()->to(base_url('/precioEntrada'));
        }
    }


    public function delete($idPrecioEntrada) {
        $precioEM = model('PrecioEntradaM');
        $precioEM->delete($idPrecioEntrada);
        return redirect()->to(base_url('/precioEntrada'));
    }
    
    public function edit($idPrecioEntrada) { //get
        $idPrecioEntrada = $data['idPrecioEntrada'] = $idPrecioEntrada;
        $precioEM = model('PrecioEntradaM');
        $data['precioEntrada'] = $precioEM->where('idPrecioEntrada', $idPrecioEntrada)->findAll();
        
        return view('head') .
               view('menu') . 
               view('precioE/edit', $data) .
               view('footer');
    }
    
    public function update() {
        $precioEM = model('PrecioEntradaM');
        $idPrecioEntrada = $_POST['idPrecioEntrada'];
        
        $data = [
            'tipoEntrada' => $_POST['tipoEntrada'],
            'precio' => $_POST['precio'],
            'descripcion' => $_POST['descripcion']
        ];
    
        $precioEM->set($data)->where('idPrecioEntrada', $idPrecioEntrada)->update();
        
        return redirect()->to(base_url('/precioEntrada'));
    }
}
