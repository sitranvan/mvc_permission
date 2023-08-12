<?php
class RolesModel extends Model
{

    public function getAllRole($keyword = '')
    {
        $condition = '';
        if (isset($keyword) && !empty($keyword)) {
            $condition .= " WHERE name LIKE '%$keyword%'";
        }
        return $this->fetchAllCondition('roles', '*', $condition);
    }

    public function insertRole($data = [])
    {
        return $this->insertRecord('roles', $data);
    }
    public function getRole($condition = '')
    {
        return $this->fetch('roles', '*', $condition);
    }
    public function updateRole($data = [], $condition = '')
    {
        return $this->updateRecord('roles', $data, $condition);
    }
    public function deleteRole($condition = '')
    {
        return $this->deleteRecord('roles', $condition);
    }
}
