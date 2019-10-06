<?php

namespace App;

use App;

class Db
{

    public $pdo;

    public function __construct()
    {

        $settings = $this->getPDOSettings();
        try {
            $this->pdo = new \PDO("{$settings['dsn']}", $settings['user'], $settings['pass']);
            // set the PDO error mode to exception
            $this->pdo->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
            }
        catch(PDOException $e)
            {
                echo "Connection failed: " . $e->getMessage();
            }
    }

    protected function getPDOSettings()
    {

        $config = include ROOTPATH.DIRECTORY_SEPARATOR.'Config'.DIRECTORY_SEPARATOR.'Db.php';
        $result['dsn'] = "{$config['type']}:host={$config['host']};dbname={$config['dbname']};charset={$config['charset']}";
        $result['user'] = $config['user'];
        $result['pass'] = $config['pass'];
        return $result;
    }

    public function execute($query, array $params=null)
    {

        if(is_null($params)){
            $stmt = $this->pdo->prepare($query)->execute();
            return $stmt->fetchAll();
        }
        $stmt = $this->pdo->prepare($query);
        $stmt->execute($params);
        return $stmt->fetchAll();

    }
    public function insert($query)
    {
        $stmt = $this->pdo->prepare($query)->execute();
        return true;
    }
}