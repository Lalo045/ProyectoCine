<?php

namespace App\Controllers;

class Peliculas extends BaseController
{
    public function valida()
    {
        $session = session();
        $session->has('logged_in');

        if ($session->has('logged_in')) {
            return redirect()->to(base_url('/usuario'));

        }

        print_r($_SESSION);
    }




    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index()
    {
        $session = session();
        if ($session->get('logged_in') != true || $session->get('tipo') != 0) {
            return redirect()->to(base_url('/usuario'));
        }
        $data1['user'] = $session->get('user');

        $peliculaM = model('PeliculaM');
        $data['peliculasD'] = $peliculaM->findAll();
        return view('head') .
            view('menu') .
            view('peliculas/show', $data) .
            view('footer');
    }

    public function add()
    {   //get
        return view('head') .
            view('menu') .
            view('peliculas/add') .
            view('footer');
    }


    public function insert()
    { //post
        if (!$this->request->is('post')) {
            $this->index();
        }

        $rules = [
            'nombre' => 'required',
            'duracion' => 'required|numeric',
            'descripcion' => 'required',
            'clasificacion' => 'required',
        ];

        $data = [
            "nombre" => $_POST['nombre'],
            "duracion" => $_POST['duracion'],
            "descripcion" => $_POST['descripcion'],
            "clasificacion" => $_POST['clasificacion'],
        ];

        // Valida los datos
        if (!$this->validate($rules)) {

            return view('head') .
                view('menu') .
                view('peliculas/add', [
                    'validation' => $this->validator
                ]) .
                view('footer');
        } else {
            $peliculaM = model('PeliculaM');
            $peliculaM->insert($data);
            return redirect()->to(base_url('/peliculas'));
        }
    }

    public function delete($idPelicula)
    {
        $peliculaM = model('PeliculaM');
        $peliculaM->delete($idPelicula);
        return redirect()->to(base_url('/peliculas'));
    }

    public function edit($idPelicula)
    { //get
        $idPelicula = $data['idPelicula'] = $idPelicula;
        $peliculaM = model('PeliculaM');
        $data['pelicula'] = $peliculaM->where('idPelicula', $idPelicula)->findAll();

        return view('head') .
            view('menu') .
            view('peliculas/edit', $data) .
            view('footer');
    }

    public function update()
    {
        $peliculaM = model('PeliculaM');
        $idPelicula = $_POST['idPelicula'];

        $data = [
            'nombre' => $_POST['nombre'],
            'duracion' => $_POST['duracion'],
            'descripcion' => $_POST['descripcion'],
            'clasificacion' => $_POST['clasificacion'],
        ];

        $peliculaM->set($data)->where('idPelicula', $idPelicula)->update();

        return redirect()->to(base_url('/peliculas'));
    }

}