<?php

namespace MyApp\Models;

use MyApp\Core\Database;
use PDO;

class ExpierModel extends Database
{

    public function __construct()
    {
        parent::__construct();
        $this->setTableName('tbl_m_expire');
        $this->setColumn([
            'id_tmed',
            'id_tmd',
            'expire_date_tme',
            'status_deactivated_tme',
            'status_deleted_tme',
            'created_by_tme',
            'created_date_tme',
        ]);
    }

    public function getAll()
    {
        $params = [
            'status_deactivated_tme' => 0,
            'status_deleted_tme' => 0
        ];
        return $this->get($params)->fetchAll(PDO::FETCH_ASSOC);
    }

    public function insert($data)
    {
        $createdBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'id_tmd' => $data['id_tmd'],
            'expire_date_tme' => $data['expire_date_tme'],
            'created_by_tme' => $createdBy
        ];
        return $this->insertData($table);
    }

    public function getById($id)
    {
        return $this->get(['id_tmed' => $id])->fetch(PDO::FETCH_ASSOC);
    }

    public function update($data)
    {
        $updatedBy = isset($_SESSION['id_tmu']) ? $_SESSION['id_tmu'] : null;
        $table = [
            'id_tmd' => $data['id_tmd'],
            'expire_date_tme' => $data['expire_date_tme'],
            'updated_by_tme' => $updatedBy
        ];
        $key = [
            'id_tme' => $data['id_tme']
        ];
        return $this->updateData($table, $key);
    }

    public function delete($id)
    {
        $today = date('Y-m-d');

        $expiredData = $this->get(['expire_date_tme' => $today])->fetchAll(PDO::FETCH_ASSOC);

        foreach ($expiredData as $data) {
            $table = [
                'status_deactivated_tme' => 1,
                'status_deleted_tme' => 1
            ];
            $key = [
                'id_tme' => $id
            ];
            $updateResult = $this->updateData($table, $key);

            if ($updateResult) {
                $table = 1;
            } else {
                $table = 0;
            }
            return $table;
        }
    }
}
