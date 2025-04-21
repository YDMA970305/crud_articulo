<?php
namespace Libs;
class Database
{
    private $conn;
    private $host = 'localhost';
    private $dbname = 'desarrolloweb';
    private $username = 'root';
    private $password = '';

    public function getConnection()
    {
        $this->conn = null;
        try {
            $this->conn = new \PDO("mysql:host={$this->host};dbname={$this->dbname}", $this->username, $this->password);
            $this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
        } catch (\PDOException $exception) {
            echo "Connection error: " . $exception->getMessage();
        }
        return $this->conn;
    }
}

?>