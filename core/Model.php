<?php
class Model extends DataBase
{
    public function insertRecord($table = '', $data = [])
    {
        return $this->insert($table, $data);
    }
    public function deleteRecord($table = '', $condition = '')
    {
        return $this->delete($table, $condition);
    }
    public function updateRecord($table = '', $data = [], $condition = '')
    {
        return $this->update($table, $data, $condition);
    }
    public function fetchAll($table = '', $field = '*')
    {
        return $this->getAll("SELECT $field FROM $table");
    }
    public function fetchAllCondition($table = '', $field = '*', $condition = '')
    {
        return $this->getAll("SELECT $field FROM $table $condition");
    }
    public function fetchJoin($table = '', $field = '*', $condition = '')
    {
        return $this->get("SELECT $field FROM $table  $condition");
    }
    public function fetch($table = '', $field = '*', $condition = '')
    {
        return $this->get("SELECT $field FROM $table WHERE $condition");
    }
    public function checkExists($table = '', $field = '*', $condition = '')
    {
        return $this->exists("SELECT $field FROM $table WHERE $condition");
    }
    public function countAllCondition($table = '', $field = 'COUNT(*)', $condition = '')
    {
        return $this->getAll("SELECT $field FROM $table $condition");
    }
}
