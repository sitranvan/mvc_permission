<?php
class LoginsModel extends Model
{
    public function getAllLogin()
    {
        return $this->fetchAll('logins');
    }

    public function insertLogin($data = [])
    {
        return $this->insertRecord('logins', $data);
    }

    public function checkUserLogin($condition = '')
    {
        return $this->checkExists('logins', 'id', $condition);
    }

    public function deleteUserLogin($condition = '')
    {
        return $this->deleteRecord('logins', $condition);
    }
    public function updateLogin($data = [], $condition = '')
    {
        return $this->updateRecord('logins', $data, $condition);
    }
}
