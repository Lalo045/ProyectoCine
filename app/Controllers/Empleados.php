<?php

namespace App\Controllers;

class Empleados extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];
    
    public function index(): string
    {

        $empleadoM = model('EmpleadoM');
        $data['empleadosD'] = $empleadoM->findAll();
        return view('head') .
                view('menu') . 
                view('empleados/show', $data) .
                view('footer');
    }


    public function add(){   //get
        return view('head') .
        view('menu') . 
        view('empleados/add') .
        view('footer');
    }

    public function insert(){ 
 
        
        $rules = [
            'nombre' => 'required' ,
            'apellidoP' => 'required',
            'apellidoM'=> 'required',
            'sexo' => 'required',
            'fechaNacimiento'=> 'required',
            'rfc' => 'required',
            'noTelefono' => 'required',
            'direccion'=> 'required',
            'puesto'=> 'required',
            'fechaContratacion'=> 'required',
            'salario'=> 'required',
            'turno'=> 'required',
            'correoElectronico'=> 'required',
        ];

        $data = [
            "nombre" => $_POST['nombre'],
            "apellidoP" => $_POST['apellidoP'],
            "apellidoM" => $_POST['apellidoM'],
            "sexo" => $_POST['sexo'], 
            "fechaNacimiento" => $_POST['fechaNacimiento'],
            "rfc" => $_POST['rfc'], 
            "noTelefono" => $_POST['noTelefono'], 
            "direccion" => $_POST['direccion'],
            "puesto" => $_POST['puesto'],
            "fechaContratacion" => $_POST['fechaContratacion'],
            "salario" => $_POST['salario'],
            "turno" => $_POST['turno'],
            "correoElectronico" => $_POST['correoElectronico'],
          ];

        // Valida los datos
            if (! $this->validate($rules)) {
                // Si la validación falla, vuelve a cargar la vista con los errores
                return     
                view('head') .
                view('menu') . 
                view('empleados/add',[
                    'validation' => $this->validator
                ]) .
                view('footer'); 
            }
            else{
                $empleadoM = model('EmpleadoM');
                $empleadoM->insert($data);
                return redirect()->to(base_url('/empleados'));
            }

        
    }

    public function delete($idEmpleado){
       
        $empleadoM = model('EmpleadoM');
        $empleadoM->delete($idEmpleado);
        return redirect()->to(base_url('/empleados'));
    }

    public function edit($idEmpleado){   //get
        $idEmpleado = $data['idEmpleado'] = $idEmpleado;
        $empleadoM = model('EmpleadoM'); 
        $data['empleado'] = $empleadoM->where('idEmpleado', $idEmpleado)->findAll();
        
        return view('head') .
               view('menu') . 
               view('empleados/edit', $data) .  
               view('footer');
    }

    public function update(){
        $empleadoM = model('EmpleadoM');
        $idEmpleado = $_POST['idEmpleado'];
        
        $data = [
            'nombre' => $_POST['nombre'],
            'apellidoP' => $_POST['apellidoP'],
            'apellidoM' => $_POST['apellidoM'],
            'sexo' => $_POST['sexo'],
            'fechaNacimiento' => $_POST['fechaNacimiento'],
            'rfc' => $_POST['rfc'],
            'noTelefono' => $_POST['noTelefono'],
            'direccion' => $_POST['direccion'],
            'puesto' => $_POST['puesto'],
            'fechaContratacion' => $_POST['fechaContratacion'],
            'salario' => $_POST['salario'],
            'turno' => $_POST['turno'],
            'correoElectronico' => $_POST['correoElectronico'],
        ];
    
        $empleadoM->set($data)->where('idEmpleado', $idEmpleado)->update();
    
        return redirect()->to(base_url('/empleados'));
    }
    
}
