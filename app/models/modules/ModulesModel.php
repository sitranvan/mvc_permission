<?php
class ModulesModel extends Model
{
    public function getAllModules()
    {
        return $this->fetchAll('modules');
    }
}
