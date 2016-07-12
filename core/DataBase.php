<?php
class DataBase extends CommonST{
    private static $hInst = null;
    private static $pdo = null;
    public static function getInstance() {
        if (!empty(self::$hInst = null)) {
            return self::$hInst;
        } else {
            return self::$hInst = new self();
        }
    }
    protected function __construct() {
        try {
            self::$pdo = new PDO('mysql:host=localhost;dbname=etrade;charset=utf8','root','');
        } catch (PDOException $e) {
            print "Error connect to database! =(";
            die();
        }
    }
    public function getAllTableObj($name,$className) {
        $stmt = self::$pdo->query("SELECT * FROM {$name}");
        return $stmt->fetchAll(PDO::FETCH_CLASS,$className);
    }


}