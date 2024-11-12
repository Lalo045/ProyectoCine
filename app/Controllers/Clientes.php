<?php

namespace App\Controllers;

class Clientes extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {

        $clienteM = model('ClienteM');
        $data['clientesD'] = $clienteM->findAll();
        return view('head') .
                view('menu') . 
                view('clientes/show', $data) .
                view('footer');
    }

    public function add(){   
        return view('head') .
        view('menu') . 
        view('clientes/add') .
        view('footer');
    }

    public function insert(){ 
        if (! $this->request->is('post')) {
            $this->index();
        }
        
        // Reglas de validación para los datos del cliente
        $rules = [
            'nombre' => 'required',
            'apellidoP' => 'required',
            'apellidoM' => 'required',
            'sexo' => 'required',
            'fechaNacimiento' => 'required',
        ];
    
        // Recopilación de datos del cliente
        $data = [
            "nombre" => $_POST['nombre'],
            "apellidoP" => $_POST['apellidoP'],
            "apellidoM" => $_POST['apellidoM'],
            "sexo" => $_POST['sexo'],
            "fechaNacimiento" => $_POST['fechaNacimiento'],
        ];
    
        // Validación de los datos
        if (! $this->validate($rules)) {
            // Si la validación falla, recarga la vista con errores
            return     
            view('head') .
            view('menu') . 
            view('clientes/add', [
                'validation' => $this->validator
            ]) .
            view('footer'); 
        } else {
            // Inserta los datos en la base de datos
            $clienteM = model('ClienteM');
            $clienteM->insert($data);
            return redirect()->to(base_url('/clientes'));
        }
    }

    
    public function delete($idCliente){
        $clienteM = model('ClienteM');
        $clienteM->delete($idCliente);
        return redirect()->to(base_url('/clientes'));
    }

    public function edit($idCliente){  
        $idCliente = $data['idCliente'] = $idCliente;
        $clienteM = model('ClienteM'); 
        $data['cliente'] = $clienteM->where('idCliente', $idCliente)->findAll();
        
        return view('head') .
               view('menu') . 
               view('clientes/edit', $data) . 
               view('footer');
    }
    

    public function update() {
        $clienteM = model('ClienteM');
        $idCliente = $_POST['idCliente'];
    
        $data = [
            'nombre' => $_POST['nombre'],
            'apellidoP' => $_POST['apellidoP'],
            'apellidoM' => $_POST['apellidoM'],
            'sexo' => $_POST['sexo'],
            'fechaNacimiento' => $_POST['fechaNacimiento'],
        ];
    
        $clienteM->set($data)->where('idCliente', $idCliente)->update();
    
        return redirect()->to(base_url('/clientes'));
    }
    
}
