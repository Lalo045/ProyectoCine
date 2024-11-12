<?php

namespace App\Models;

use CodeIgniter\Model;

class UsuarioM extends Model
{
    protected $DBGroup          = 'default';
    protected $table            = 'usuario';
    protected $primaryKey       = 'idUsuario';
    protected $useAutoIncrement = true;
    protected $returnType       = 'object';
    protected $useSoftDeletes   = true;
    protected $protectFields    = true;
    protected $allowedFields    = ['user', 'pass','tipo'];

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

    public function valida($user, $pass){
        $db = db_connect();
        $sql ="select user, tipo
        from usuario 
        where user = '".$user."' and pass ='". $pass."'";
        //print $sql;
        $query= $db->query($sql);
        //print $db->lastQuery;
        return $query->getResult();
     }
}