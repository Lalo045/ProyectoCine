<?php

namespace App\Controllers;

class Asientos extends BaseController {

    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    
    public function index(): string
    {
       $asientosM = model('AsientosM');
        $data['asientos']= $asientosM->findAll();
        return view ('head').
                view('menu').
                view('asientos/show', $data).
                view('footer');
    }

    public function add(){   //get

        $salaM = model('SalaM'); 
        $salasD = $salaM->findAll(); 

        return view('head') .
        view('menu') . 
        view('asientos/add', ['salasD' => $salasD]) .
        view('footer');
    }

    public function insert()
{
    if (! $this->request->is('post')) {
        $this->index();
    }
    
    $rules = [
        'idSala' => 'required',
        'numeroAsiento' => 'required',
        'estado' => 'required'
    ];

    $data = [
        'idSala' => $_POST['idSala'],
        'numeroAsiento' => $_POST['numeroAsiento'],
        'estado' => $_POST['estado']
    ];

    if (! $this->validate($rules)) {
        return view('head') .
               view('menu') . 
               view('asientos/add', [
                   'validation' => $this->validator
               ]) .
               view('footer');
    } else {
        $asientosM = model('AsientosM');
        $asientosM->insert($data);

        // Actualizar la cantidad de asientos en la tabla sala
        $salaM = model('SalaM');
        $salaM->updateCantidadAsientos($data['idSala']); // Llama al método de actualización

        return redirect()->to(base_url('/asientos'));
    }
}

public function delete($idAsiento) {
    $asientosM = model('AsientosM');
    
    // Obtener el idSala del asiento que se va a eliminar
    $asiento = $asientosM->find($idAsiento);
    $idSala = $asiento->idSala; // Asegúrate de que 'idSala' es el nombre correcto del campo
    
    // Eliminar el asiento
    $asientosM->delete($idAsiento);

    // Actualizar la cantidad de asientos en la sala correspondiente
    $salaM = model('SalaM');
    $salaM->updateCantidadAsientos($idSala);

    return redirect()->to(base_url('/asientos'));
}
    
}
