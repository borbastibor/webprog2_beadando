<?php

class Felhasznalok extends AbstractModel {

    public function getAll(): array {
        $stmt = $dbconnection->prepare("SELECT * FROM felhasznalok");
        $stmt->execute();
        $result = $stmt->setFetchMode(PDO::FETCH_ASSOC);
        $resultDAOArray = array();
        foreach ($result as $item) {
            $newDao = new FelhasznaloDAO();
            array_push($resultDAOArray, $newDao->setValues($item));
        }
        return $resultDAOArray;
    }

    public function getById($id): FelhasznaloDAO {
        $stmt = $dbconnection->prepare("SELECT * FROM felhasznalok WHERE id = $id");
        $stmt->execute();
        $result = new FelhasznaloDAO();
        $result->setValues($stmt->setFetchMode(PDO::FETCH_ASSOC));
        return $result;
    }

    public function insert($felhasznalo) {
        //TODO
    }

    public function update($felhasznalo) {
        //TODO
    }

    public function delete($id) {
        //TODO
    }

}