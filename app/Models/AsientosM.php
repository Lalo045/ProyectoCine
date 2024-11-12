<?php

namespace App\Models;

use CodeIgniter\Model;

class AsientosM extends Model
{
    protected $DBGroup = 'default';
    protected $table = 'asientos';
    protected $primaryKey = 'idAsiento';
    protected $useAutoIncrement = true;
    protected $returnType = 'object';
    protected $useSoftDeletes = false;
    protected $protectFields = true;
    protected $allowedFields = ['idAsiento', 'idSala', 'numeroAsiento', 'estado'];

    // Dates
    protected $useTimestamps = false;
    protected $dateFormat = 'datetime';
    protected $createdField = 'created_at';
    protected $updatedField = 'updated_at';
    protected $deletedField = 'deleted_at';

    // Validation
    protected $validationRules = [];
    protected $validationMessages = [];
    protected $skipValidation = false;
    protected $cleanValidationRules = true;

    // Callbacks
    protected $allowCallbacks = true;
    protected $beforeInsert = [];
    protected $afterInsert = [];
    protected $beforeUpdate = [];
    protected $afterUpdate = [];
    protected $beforeFind = [];
    protected $afterFind = [];
    protected $beforeDelete = [];
    protected $afterDelete = [];

    public function getCOUNTAsientosDisponibles2()
    {
        $db = db_connect();

        // Con esta consulta que obtiene la cantidad de asientos disponibles por cada sala
        $sql = "SELECT COUNT(idAsiento) AS cantidad_disponible
        FROM asientos
        WHERE estado = 'disponible' AND idSala = 7";

        $query = $db->query($sql);
        return $query->getResult();
    }

//Con este query obtengo la catidad de asientos disponibles para la idSala espeficica
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
