<?php
class CategoriesModel extends Model
{
    public function getAllCategories($keyword = '')
    {
        $condition = '';
        if (isset($keyword) && !empty($keyword)) {
            $condition .= " WHERE name LIKE '%$keyword%'";
        }
        return $this->fetchAllCondition('categories', '*', $condition);
    }
    public function insertCategories($data = [])
    {
        return $this->insertRecord('categories', $data);
    }
    public function getCategories($condition = '')
    {
        return $this->fetch('categories', '*', $condition);
    }
    public function updateCategories($data = [], $condition = '')
    {
        return $this->updateRecord('categories', $data, $condition);
    }
    public function deleteCategories($condition = '')
    {
        return $this->deleteRecord('categories', $condition);
    }
}
