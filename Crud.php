<?php

include_once 'DataBase.php';

class Crud extends DataBase
{
    public function __construct()
    {
        parent::__construct();
    }

    public function create($name, $description)
    {
        $query = "INSERT INTO posts ( name, description )
VALUES ($name, $description)";

        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot insert data to table posts';
            return false;
        } else {
            return true;
        }
    }

    public function read()
    {
        $query = "SELECT * FROM posts";
        $result = $this->connection->query($query);

        if ($result == false) {
            return false;
        }

        $rows = array();

        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }

        return $rows;
    }

    public function update($id, $name, $description)
    {
        $query = "UPDATE posts SET name = $name, description = $description WHERE id = $id";

        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot update data in table posts';
            return false;
        } else {
            return true;
        }
    }

    public function delete($id)
    {
        $query = "DELETE FROM posts WHERE id = $id";

        $result = $this->connection->query($query);

        if ($result == false) {
            echo 'Error: cannot delete id ' . $id . ' from table posts';
            return false;
        } else {
            return true;
        }
    }

}