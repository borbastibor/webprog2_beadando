<?php

abstract class AbstractModel {

    private $tablename = '';
    private $primarykey = '';
    private $dbconnection;

    public function __construct($dbconnection, $tablename, $primarykey) {
        $this->tablename = $tablename;
        $this->primarykey = $primarykey;
        $this->dbconnection = $dbconnection;
    }

    abstract function getAll();

    abstract function getById($id);

    abstract function insert($model);

    abstract function update($model);

    abstract function delete($id);

}