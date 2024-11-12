<?php

namespace App\Controllers;

class Funciones extends BaseController
{

    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];


    public function index()
    {
        $funcionModel = model('FuncionM');
        $data['funcionesD'] = $funcionModel->getFunciones();
        //Para utilizar el query que obtinen la cantidad de asientos disponibles

        // Modelo de Asientos -En donde esta el query que cuenta los asientos disponibles
        $asientosM = model('AsientosM');
        $asientosDisponibles = $asientosM->getCOUNTAsientosDisponibles2();

        $peliculaM = model('PeliculaM');
        $peliculasD = $peliculaM->findAll();

        $peliculasMap = [];
        foreach ($peliculasD as $pelicula) {
            $peliculasMap[$pelicula->idPelicula] = $pelicula->nombre;
        }

        $salaM = model('SalaM');
        $salaD = $salaM->findAll();

        $salasMap = [];
        foreach ($salaD as $salaa) {
            $salasMap[$salaa->idSala] = $salaa->numeroSala;
        }

        //  foreach ($data['funcionesD'] as &$funcion) {
        //      $funcion->nombrePelicula = $peliculasMap[$funcion->idPelicula] ?? 'Desconocida';

        //      $funcion->numeroSala = $salasMap[$funcion->idSala] ?? 'Desconocida';

        //$sala = $salaM->find($funcion->idSala);
        //$totalAsientos = $sala->cantidadAsientos;

        //$ventaM = model('VentaM');
        //$noAsientosVendidos = $ventaM->where('idFuncion', $funcion->idFuncion)
        //                            ->selectSum('noAsientos')
        //                          ->first()
        //                        ->noAsientos;


        //$funcion->asientosDisponibles = $totalAsientos - ($noAsientosVendidos ?? 0);
        //}

        return
            view('head') .
            view('menu') .
            view('funciones/show', ['funcionesD' => $data['funcionesD']]) .
            view('footer');
    }
    public function add()
    {
        $peliculaM = model('PeliculaM');
        $peliculasD = $peliculaM->findAll();

        $salaM = model('SalaM');
        $salasD = $salaM->findAll();

        return view('head') .
            view('menu') .
            view('funciones/add', ['peliculasD' => $peliculasD, 'salasD' => $salasD]) .
            view('footer');
    }
    public function insert()
    {
        if (!$this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'idPelicula' => 'required',
            'idSala' => 'required',
            'formato' => 'required',
            'horario' => 'required',
            'fecha' => 'required',
        ];

        $data = [
            "idPelicula" => $_POST['idPelicula'],
            "idSala" => $_POST['idSala'],
            "formato" => $_POST['formato'],
            "horario" => $_POST['horario'],
            "fecha" => $_POST['fecha'],
        ];


        if (!$this->validate($rules)) {

            return view('head') .
                view('menu') .
                view('funciones/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $funcionM = model('FuncionM');
            $funcionM->insert($data);
            return redirect()->to(base_url('/funciones'));
        }
    }
    public function delete($idFuncion)
    {
        $funcionM = model('FuncionM');
        $funcionM->delete($idFuncion);
        return redirect()->to(base_url('/funciones'));
    }
    public function edit($idFuncion)
    {
        $funcionM = model('FuncionM');
        $peliculasM = model('PeliculaM');
        $salasM = model('SalaM');

        $data['funcion'] = $funcionM->where('idFuncion', $idFuncion)->findAll();
        $data['peliculasD'] = $peliculasM->findAll();
        $data['salasD'] = $salasM->findAll();
        $data['horarios'] = ["10:00", "12:00", "14:00", "16:00", "18:00", "20:00", "22:00"];

        return view('head') .
            view('menu') .
            view('funciones/edit', $data) .
            view('footer');
    }
    public function update()
    {
        $funcionM = model('FuncionM');
        $idFuncion = $_POST['idFuncion'];

        $data = [
            "idPelicula" => $_POST['idPelicula'],
            "idSala" => $_POST['idSala'],
            "formato" => $_POST['formato'],
            "horario" => $_POST['horario'],
            "fecha" => $_POST['fecha'],
        ];

        $funcionM->set($data)->where('idFuncion', $idFuncion)->update();

        return redirect()->to(base_url('/funciones'));
    }
}
