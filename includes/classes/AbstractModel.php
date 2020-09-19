<?php

abstract class AbstractModel {

    abstract function getAll();

    abstract function getById($id);

    abstract function insert($model);

    abstract function update($model);

    abstract function delete($id);

}