<?php

namespace App\Models;

use CodeIgniter\Model;

class DashboardModel extends Model
{
    protected $table;
    protected $db;
    public function __construct($table)
    {
        $this->table = $table;
    }
    public function connectDB(){
        parent::__construct();
        $this->db = db_connect();
    }
    public function nWhere($where=[],$joinOnUsers=false){
        $this->connectDB();
        $this->strQuery = $this->db->table($this->table);
        if($joinOnUsers){
            $this->strQuery->join('users', 'users.id_user = reservations.user_id');
        }
        foreach($where as $key => $val){
            $this->strQuery->where($key, $val);
        }
        $result = $this->strQuery->countAllResults();
        return $result;
    }
    public function resWhere($where=[]){
        $this->connectDB();
        $this->strQuery = $this->db->table($this->table);
        foreach($where as $key => $val){
            $this->strQuery->where($key,$val);
        }
        $result = $this->strQuery->get()->getResultArray();
        return $result;
    }
}
