<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class FacilityModel extends Model
{
    protected $table            = 'facilities';
    protected $primaryKey       = 'id_facility';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['name_facility','qty_facility','price','thumb_facility'];

    protected $column_order = ['id_facility', 'name_facility','qty_facility','price'];
    protected $column_search = ['name_facility','qty_facility','price'];
    protected $order = ['id_facility' => 'DESC'];
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
    public function getListFacility($arrDataId){
        $query = $this->db->table($this->table)->whereIn('id_facility', $arrDataId);
        $data = $query->get()->getResult();
        return $data;
    }
}
