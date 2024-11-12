<?php

namespace App\Controllers;

class Salas extends BaseController
{

    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];



    public function index(): string
    {
        $salaM = model('SalaM');
        $data['salasD'] = $salaM->findAll();
        return view('head') .
                view('menu') . 
                view('salas/show', $data) .
                view('footer');
    }

    public function add(){   //get
        return view('head') .
        view('menu') . 
        view('salas/add') .
        view('footer');
    }

    public function insert(){ 
        if (! $this->request->is('post')) {
                $this->index();
        }
        
        $rules = [
            'numeroSala' => 'required' ,
            'tipo' => 'required',
            'cantidadAsientos'=> 'required',
            'noSalidas' => 'required',
            'tamaño'=> 'required',
            'descripcion' => 'required',
        ];

        $data = [
            "numeroSala" => $_POST['numeroSala'],
            "tipo" => $_POST['tipo'],
            "cantidadAsientos" => $_POST['cantidadAsientos'],
            "noSalidas" => $_POST['noSalidas'], 
            "tamaño" => $_POST['tamaño'],
            "descripcion" => $_POST['descripcion'], 
          ];

            if (! $this->validate($rules)) {
             
                return     
                view('head') .
                view('menu') . 
                view('salas/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $salaM = model('SalaM');
                $salaM->insert($data);
                return redirect()->to(base_url('/salas'));
            }
    }

    public function delete($idSala){
       
        $salaM = model('SalaM');
        $salaM->delete($idSala);
        return redirect()->to(base_url('/salas'));
    }

    public function edit($idSala){   
        $idSala = $data['idSala'] = $idSala;
        $salaM = model('SalaM');  
        $data['sala'] = $salaM->where('idSala', $idSala)->findAll();
        
        return view('head') .
               view('menu') . 
               view('salas/edit', $data) .  
               view('footer');
    }

    public function update(){
        $salaM = model('SalaM');
        $idSala = $_POST['idSala'];
        $data = [
            "numeroSala" => $_POST['numeroSala'],
            "tipo" => $_POST['tipo'],
            "cantidadAsientos" => $_POST['cantidadAsientos'],
            "noSalidas" => $_POST['noSalidas'], 
            "tamaño" => $_POST['tamaño'],
            "descripcion" => $_POST['descripcion'], 
          ];
        $salaM->set($data)->where('idSala', $idSala)->update();
        return redirect()->to(base_url('/salas'));
    }

}