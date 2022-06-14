<?php

namespace App\Models;

use CodeIgniter\Model;
use CodeIgniter\HTTP\RequestInterface;

class LabroomModel extends Model
{
    protected $table            = 'labrooms';
    protected $primaryKey       = 'id_lab';
    protected $useAutoIncrement = true;
    protected $allowedFields    = ['category_id','name_lab',
    'code_facility','desc_lab','capacity','status_lab'];

    protected $column_order = ['id_lab','category_id','name_lab','desc_lab'];
    protected $column_search = ['category_id','name_lab','desc_lab','status_lab', 'capacity'];
    protected $order = ['id_lab' => 'DESC'];
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
            $builder->select('*');
            $builder->join('categories', 'categories.id_category = labrooms.category_id');
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
        $query = $this->dt->where('id_lab', $id);
        $data = $query->get()->getResult();
        return $data;
    }
}
