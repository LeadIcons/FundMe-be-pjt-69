<?php

class Database
{

    private $db_conn;
    private $magic_quotes;

    private const DB_NAME = 'fundme';
    private const DB_SERVER = 'localhost';
    private const DB_USER = 'root';
    private const DB_PASS = '';

    public function __construct()
    {
        
         $this->dbConnect();
         $this->magic_quotes = get_magic_quotes_gpc();
    }
    
    public function dbConnect()
    {
        $dsn  = 'mysql:host='.self::DB_SERVER.';port=3306;'.'dbname='.self::DB_NAME.';charset=utf8';
        try{

            $this->db_conn = new PDO($dsn,self::DB_USER, self::DB_PASS);
            $this->db_conn->setattribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);

         }catch(PDOException $e){
            die('***DATABASE CONNECTION FAILED*** DUE TO '.$e->getmessage());
         }

         return $this->db_conn;
    }

    public function query($sql,array $params=[])
    {
        $query = $this->db_conn->prepare($sql);
        $this->confirmQuery($query->execute($params));
        return $query;
    }

    public function confirmQuery($result)
    {
        if (!$result) {
            die('DATABASE QUERY FAILED ');
        }
        
    }


}
