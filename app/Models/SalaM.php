<?php

namespace App\Models;

use CodeIgniter\Model;

class SalaM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'Sala';
    protected $primaryKey       = 'idSala';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['idSala','numeroSala', 'tipo','cantidadAsientos','noSalidas','tamaño','descripcion'];

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

    public function updateCantidadAsientos($idSala)
    {
        $db = db_connect();
        $query = "UPDATE sala 
                  SET cantidadAsientos = (SELECT COUNT(*) FROM asientos WHERE idSala = ?) 
                  WHERE idSala = ?";
        $db->query($query, [$idSala, $idSala]);
    }

}
