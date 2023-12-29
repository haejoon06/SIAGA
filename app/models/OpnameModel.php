<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class OpnameModel extends Database
{
    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_s_opname');
        $this->setColumn([
            'id_tso',
            'id_tmd',
            'stock_tso',
            'real_tso',
            'difference_tso',
            'description_tso',
            'time_tso',
            'created_by_tso',
            'created_date_tso',
            'updated_by_tso',
            'updated_date_tso',
        ]);
    }
    public function getAll()
    {
        return $this->get()->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'id_tmd' => $data['id_tmd'],
            'real_tso' => $data['real_tso'],
            'description_tso' => $data['description_tso'],
            'time_tso' => $data['time_tso'],
            'created_by_tso' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tso' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'real_tso' => $data['real_tso'],
            'description_tso' => $data['description_tso'],
            'time_tso' => $data['time_tso'],
            'updated_by_tso' => $updatedBy
        ];
        $key = [
            'id_tso' => $data['id_tso']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        return $this->deleteData($id)->fetch(PDO::FETCH_ASSOC);
    }
}
