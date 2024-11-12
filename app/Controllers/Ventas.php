<?php

namespace App\Controllers;
use App\Models\VentaM;
use CodeIgniter\Database\Config;
class Ventas extends BaseController
{
    public $csrfProtection = 'session';
    public $tokenRandomize = true;
    protected $helpers = ['form'];

    public function index(): string
    {
        $ventaM = model('VentaM');
        $data['ventasD'] = $ventaM->findAll();
        $ventasD = $ventaM->findAll();

        $clienteM = model('ClienteM');
        $clientesD = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $empleadosD = $empleadoM->findAll();

        $funcionM = model('FuncionM');
        $funcionesD = $funcionM->findAll();

        $clientesMap = [];
        foreach ($clientesD as $cliente) {
            $clientesMap[$cliente->idCliente] = $cliente->nombre;
        }

        $empleadosMap = [];
        foreach ($empleadosD as $empleado) {
            $empleadosMap[$empleado->idEmpleado] = $empleado->nombre;
        }

        $funcionesMap = [];
        foreach ($funcionesD as $funcion) {
            $funcionesMap[$funcion->idFuncion] = $funcion->idPelicula;
        }

        $data['ventasD'] = array_map(function ($venta) {
            return (object) $venta;
        }, $data['ventasD']);

        foreach ($data['ventasD'] as $venta) {
            $venta->nombre = $clientesMap[$venta->idCliente] ?? 'Desconocido';
            $venta->nombre = $empleadosMap[$venta->idEmpleado] ?? 'Desconocido';
            $venta->descripcionFuncion = $funcionesMap[$venta->idFuncion] ?? 'Desconocida';
        }

        return view('head') .
            view('menu') .
            view('ventas/show', $data) .
            view('footer');
    }

    public function add()
    {
        $clienteM = model('ClienteM');
        $clientesD = $clienteM->findAll();

        $empleadoM = model('EmpleadoM');
        $empleadosD = $empleadoM->findAll();

        $funcionM = model('FuncionM');
        $funcionesD = $funcionM->getFunciones();

        $precioEntradaM = model('PrecioEntradaM');
        $precioEntradaD = $precioEntradaM->findAll();

        $peliculaM = model('PeliculaM');
        $peliculasD = $peliculaM->findAll();

        $asientosM = model('AsientosM');
        $asientosD = $asientosM->findAll();
        $asientosDisponibles = $asientosM->getCOUNTAsientosDisponibles2();

        return view('head') .
            view('menu') .
            view('ventas/add', [
                'peliculasD' => $peliculasD,
                'precioEntrada' => $precioEntradaD,
                'clientesD' => $clientesD,
                'empleadosD' => $empleadosD,
                'funcionesD' => $funcionesD,
                'asientosDisponibles' => $asientosDisponibles,
                'asientosD' => $asientosD
            ]) .
            view('footer');
    }

    public function __construct()
    {
        $this->VentaM = new VentaM();
        $this->db = \Config\Database::connect();
    }

    public function insert()
    {
        $data = [
            'idCliente' => $this->request->getPost('idCliente'),
            'idEmpleado' => $this->request->getPost('idEmpleado'),
            'idFuncion' => $this->request->getPost('idFuncion'),
            'cantidadAsientos' => $this->request->getPost('cantidadAsientos'),
            'total' => $this->request->getPost('total'),
            'fechaVenta' => date('Y-m-d H:i:s')
        ];

        $this->VentaM->insert($data);
        $idVenta = $this->VentaM->insertID();

        $asientosSeleccionados = $this->request->getPost('idAsiento');

        if ($asientosSeleccionados) {
            $asientosArray = explode(',', $asientosSeleccionados);
    
            foreach ($asientosArray as $idAsiento) {
                $this->db->table('venta_asiento')->insert([
                    'idVenta' => $idVenta,
                    'idAsiento' => $idAsiento
                ]);
    
                $this->db->table('asientos')->update(['estado' => 'vendido'], ['idAsiento' => $idAsiento]);
            }
        }

        return redirect()->to(base_url('ventas'));
    }

    public function delete($idVenta)
    {
        $ventaM = model('VentaM');
        $asientoM = model('AsientosM');
        $ventaAsientoM = model('VentasAsientoM');

        $venta = $ventaM->find($idVenta);

        if ($venta) {
            $asientos = $ventaAsientoM->where('idVenta', $idVenta)->findAll();

            $ventaAsientoM->where('idVenta', $idVenta)->delete();

            foreach ($asientos as $asiento) {
                $asientoM->update($asiento->idAsiento, ['estado' => 'disponible']);
            }

            $ventaM->delete($idVenta);

            session()->setFlashdata('success', 'Venta eliminada correctamente y asientos actualizados.');
        } else {
            session()->setFlashdata('error', 'La venta no existe.');
        }

        return redirect()->to(base_url('/ventas'));
    }

    public function edit($idVenta)
    {
        $ventaM = model('VentaM');
        $clienteM = model('ClienteM');
        $empleadoM = model('EmpleadoM');
        $funcionM = model('FuncionM');
        $asientosM = model('AsientosM');
        $precioEntradaM = model('PrecioEntradaM');
    
        $venta = $ventaM->find($idVenta);
        if (is_array($venta)) {
            $venta = (object) $venta;
        }
    
        $data['venta'] = $venta;
        $data['clientesD'] = $clienteM->findAll();
        $data['empleadosD'] = $empleadoM->findAll();
        $data['funcionesD'] = $funcionM->findAll();
        $data['asientosD'] = $asientosM->where('estado', 'disponible')->findAll();
        $data['precioEntradaM'] = $precioEntradaM->findAll();
    
        $data['asientosDisponibles'] = $asientosM->select('COUNT(*) as cantidad_disponible')->where('estado', 'disponible')->get()->getResult();
    
        return view('head') .
            view('menu') .
            view('ventas/edit', $data) .
            view('footer');
    }
    
    public function update($idVenta)
    {
        $ventaM = model('VentaM');
        $asientoM = model('AsientosM');

        $ventaActual = $ventaM->find($idVenta);

        if ($ventaActual->idAsiento != $this->request->getPost('idAsiento')) {
            $asientoM->update($ventaActual->idAsiento, ['estado' => 'disponible']);
        }

        $ventaData = [
            'idCliente' => $this->request->getPost('idCliente'),
            'idEmpleado' => $this->request->getPost('idEmpleado'),
            'idFuncion' => $this->request->getPost('idFuncion'),
            'idAsiento' => $this->request->getPost('idAsiento'),
            'total' => $this->request->getPost('total')
        ];

        $ventaM->update($idVenta, $ventaData);

        $asientoM->update($this->request->getPost('idAsiento'), ['estado' => 'vendido']);

        return redirect()->to(base_url('/ventas'));
    }
}
