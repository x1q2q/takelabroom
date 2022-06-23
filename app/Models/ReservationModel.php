<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class ReservationModel extends Model
{
    protected $table            = 'reservations';
    protected $primaryKey       = 'id_reserv';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['lab_id','user_id','code_reserv',
    'time_start','time_end','status_reserv'];

    protected $column_order = ['id_reserv', 'lab_id','user_id','code_reserv',
    'time_start','time_end'];
    protected $column_search = ['code_reserv',
    'time_start','time_end','status_reserv'];
    protected $order = ['id_reserv' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;

    // Dates
    protected $useTimestamps = true;
    protected $dateFormat    = 'datetime';
    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function connectDB(){
        parent::__construct();
        $this->db = db_connect();
    }
    public function initDatatables(RequestInterface $request, $joinOnOrder=false){
        $this->connectDB();
        $this->request = $request;
        $builder = $this->db->table($this->table);
            $builder->join('labrooms', 'labrooms.id_lab = reservations.lab_id');
            $builder->join('users', 'users.id_user = reservations.user_id');
        if($joinOnOrder){
            $builder->join('orders','orders.code_reserv = reservations.code_reserv','left'); // left join
            $builder->select('orders.total_payment');
        }
            $builder->select('reservations.*');
            $builder->select('labrooms.*');
            $builder->select('users.*');
        $this->dt = $builder;
    }
    private function getDatatablesQuery()
    {
        $i = 0;
        foreach ($this->column_search as $item) {
            if ($this->request->getPost('search')['value']) {
                if ($i === 0) {
                    $this->dt->groupStart();
                    $this->dt->like($item, $this->request->getPost('search')['value']);
                } else {
                    $this->dt->orLike($item, $this->request->getPost('search')['value']);
                }
                if (count($this->column_search) - 1 == $i)
                    $this->dt->groupEnd();
            }
            $i++;
        }

        if ($this->request->getPost('order')) {
            $this->dt->orderBy($this->column_order[$this->request->getPost('order')['0']['column']], $this->request->getPost('order')['0']['dir']);
        } else if (isset($this->order)) {
            $order = $this->order;
            $this->dt->orderBy(key($order), $order[key($order)]);
        }
    }

    public function getDatatables()
    {
        $this->getDatatablesQuery();
        if ($this->request->getPost('length') != -1)
            $this->dt->limit($this->request->getPost('length'), $this->request->getPost('start'));
        $query = $this->dt->get();
        return $query->getResult();
    }

    public function countFiltered()
    {
        $this->getDatatablesQuery();
        return $this->dt->countAllResults();
    }

    public function countAll()
    {
        $tbl_storage = $this->db->table($this->table);
        return $tbl_storage->countAllResults();
    }
    public function getWhereDetail($field,$val){
        $this->getDatatablesQuery();
        $query = $this->dt->where($field,$val);
        $data = $query->get()->getResult();
        return $data;
    }
}
