<?php

class Database
{
    private function connection()
    {
        $dsn = DBDRIVER . ":host=" . DBHOST . ";dbname=" . DBNAME;
        $connection = new PDO($dsn, DBUSER, DBPWD);
        return $connection;
    }

    public function query($query, $params = [])
    {
        $connection = $this->connection();
        $stmt = $connection->prepare($query);
        $check = $stmt->execute($params);
        if ($check) {
            $result = $stmt->fetchAll(PDO::FETCH_OBJ);
            if (is_array($result) && count($result)) {
                return $result;
            }
        }
        return false;
    }
}
