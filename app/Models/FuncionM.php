<?php

namespace App\Models;

use CodeIgniter\Model;

class FuncionM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Funcion';
    protected $primaryKey       = 'idFuncion';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['idFuncion', 'idPelicula','idSala','formato','horario','fecha'];

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

    public function getFunciones()
    {
        $db = db_connect();

        // Consulta que obtiene la cantidad de asientos de la sala
        $sql = "SELECT funcion.*, sala.cantidadAsientos
                FROM funcion
                JOIN sala ON funcion.idSala = sala.idSala";

        $query = $db->query($sql);

        return $query->getResult();
    }
    }
   
