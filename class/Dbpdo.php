<?php
class Dbpdo
{
    private string $_server;
    private string $_user;
    private string $_password;
    private string $_db;
    private bool $_on;

    public function __construct($server, $user, $password, $db)
    {
        $this->_server = $server;
        $this->_user = $user;
        $this->_password = $password;
        $this->_db = $db;
        $this->_on = true;
    }

    public function connexion(): ?PDO
    {
        try {
            $db = new PDO("mysql:host=$this->_server;dbname=$this->_db", $this->_user, $this->_password);
            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            echo "<p>!!!</p>";
        }
        catch (Exception $e) {
            echo "<p>Erreur : " . $e->getMessage() . "</p>";
            return null;
        }
        return $db;
    }

    public function getOff() :bool{
       return $this->_on = false;
    }

    public function setOff($on_off) :bool{
        return $this->_on = $on_off;
    }
}