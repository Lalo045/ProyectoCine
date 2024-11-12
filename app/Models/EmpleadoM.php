<?php

namespace App\Models;

use CodeIgniter\Model;

class EmpleadoM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'empleado';
    protected $primaryKey       = 'idEmpleado';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = false;
    protected $protectFields    = false;
    protected $allowedFields    = ['idEmpleado', 'nombre', 'apellidoP', 'apellidoM', 
                                    'sexo', 'fechaNacimiento', 'rfc' ,'noTelefono', 'direccion',
                                    'puesto', 'fechaContratacion', 'turno', 'correoElectronico', 'salario'];

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
}
