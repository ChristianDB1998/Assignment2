<?php
class MyDatabase
{
    private $servername;
    private $username;
    private $password;
    private $dbname;
    private $config;

    function __construct()
    {
        $this->config = parse_ini_file("../../400001568_NonWebAccess/config/MyDataConfig.ini");
		$this->servername = $this->config["servername"];
		$this->username = $this->config["username"];
		$this->password = $this->config["password"];
		$this->dbname = $this->config["dbname"];
    }
    public function createConnection()
    {
        return new PDO("mysql:host=$this->servername;dbname=$this->dbname", $this->username, $this->password);
    }
}