<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class LaporanModel extends Model
{
    protected $table            = 'categories';
    protected $primaryKey       = 'id_category';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name_category', 'slug', 
        'thumb_category','desc_category'];

    protected $column_order = ['id_category', 'name_category', 'desc_category'];
    protected $column_search = ['name_category','desc_category'];
    protected $order = ['id_category' => 'DESC'];
    protected $request;
    protected $db;
    protected $dt;

    // Dates
    protected $useTimestamps = false;

    public function connectDB(){
        parent::__construct();
        $this->db = db_connect();
    }
    public function initDatatables(RequestInterface $request){
        $this->connectDB();
        $this->request = $request;
        $this->dt = $this->db->table($this->table);
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
    public function getWhere($field,$id){
        $query = $this->db->table($this->table)->select($field)->where('id_category',$id);
        $data = $query->get();
        return $data->getResult();
    }
}
