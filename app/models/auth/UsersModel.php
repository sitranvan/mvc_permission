<?php
class UsersModel extends Model
{
    private $totalPages;
    public function __construct()
    {
        parent::__construct();
        $this->totalPages = 0;
    }
    public function getAllUser($keyword = '', $role = '', $currentPage = '')
    {
        $condition = "JOIN roles  ON users.role_id=roles.id";
        if (isset($keyword) && !empty($keyword)) {
            $condition .= " WHERE fullname LIKE '%$keyword%' OR username LIKE '%$keyword%'";
        }

        if (isset($role) && $role == 'all') {
            $condition .= "";
        } elseif (isset($role) && !empty($role)) {
            $condition .= " AND role_id = $role";
        }

        $countArr = $this->countAllCondition('users', condition: $condition);
        $countNumber = $countArr[0]['COUNT(*)'];
        $this->totalPages = ceil($countNumber / 6);

        $perPage = 6;
        $offset = ($currentPage - 1) * $perPage;
        $condition .= " LIMIT $perPage OFFSET $offset";
        return $this->fetchAllCondition('users', 'users.*, name', $condition);
    }

    public function getTotalPages()
    {
        return $this->totalPages;
    }

    public function insertUser($data = [])
    {
        return $this->insertRecord('users', $data);
    }
    public function deleteUser($condition = '')
    {
        return $this->deleteRecord('users', $condition);
    }

    public function updateUser($data = [], $condition = '')
    {
        return $this->updateRecord('users', $data, $condition);
    }

    public function getUser($condition = '')
    {

        return $this->fetch('users', '*', $condition);
    }
}
