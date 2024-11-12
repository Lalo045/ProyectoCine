<?php

namespace App\Models;

use CodeIgniter\Model;

class VentaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Venta';
    protected $primaryKey       = 'idVenta';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = true;
    protected $allowedFields    = ['idCliente', 'idEmpleado', 'idFuncion', 'total', 'fechaVenta'
                                  ,'idAsiento' ,'cantidadAsientos'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';
    protected $deletedField  = 'deleted_at';

    // Validation
    protected $validationRules      = [];
    protected $validationMessages   = [];
    protected $skipValidation       = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert   = [];
    protected $afterInsert    = [];
    protected $beforeUpdate   = [];
    protected $afterUpdate    = [];
    protected $beforeFind     = [];
    protected $afterFind      = [];
    protected $beforeDelete   = [];
    protected $afterDelete    = [];

    public function getCOUNTAsientosDisponiblesParaVenta()
    {
        
        return $this->db->table('asientos')
                        ->selectCount('idAsiento', 'cantidad_disponible')
                        ->where('estado', 'disponible')
                        ->get()
                        ->getRow();
    }

    public function getCOUNTAsientosDisponiblesParaVenta2()
{
    
    return $this->db->table('asientos')
                    ->selectCount('idAsiento', 'cantidad_disponible')
                    ->where('estado', 'disponible')
                    ->where('idSala', 7)
                    ->get()
                    ->getRow();
}




    
}
