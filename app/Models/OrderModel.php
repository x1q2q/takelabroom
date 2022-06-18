<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class OrderModel extends Model
{
    protected $table            = 'orders';
    protected $primaryKey       = 'id_order';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['reserv_id','status_order','total_payment'];

    protected $column_order = ['id_order','total_payment','status_order'];
    protected $column_search = ['status_order','total_payment'];
    protected $order = ['id_order' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;

    // Dates
    protected $useTimestamps = false;

    public function initDatatables(RequestInterface $request){
        parent::__construct();
        $this->db = db_connect();
        $this->request = $request;
        $builder = $this->db->table($this->table);
            $builder->join('reservations','reservations.code_reserv = orders.code_reserv');
            $builder->join('labrooms', 'labrooms.id_lab = reservations.lab_id');
            $builder->join('users', 'users.id_user = reservations.user_id');
            $builder->select('*');
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
    public function getWhereDetail($id){
        $query = $this->dt->where('id_order', $id);
        $data = $query->get()->getResult();
        return $data;
    }
}