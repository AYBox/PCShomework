<?php
class Db {

    private $db;
    private static $instance;

    private function __construct() {
        $info = parse_ini_file("../setup.ini");
        $dbname = $info['dbname'];
        $cs = "mysql:host=localhost;dbname=$dbname";
        $user = $info['user'];
        $password = $info['password'];

        try {
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            $this->db = new PDO($cs, $user, $password, $options);
        } catch (PDOException $e) {
            $error = "Something went wrong " . $e->getMessage();
        }
    }

    private function __clone() {}

    public static function getDb() {
        if(empty(Db::$instance)) {
            Db::$instance = new Db();
        }
        return Db::$instance;
    }

    public function prepare($query) {
        return $this->db->prepare($query);
    }
    public function query($query) {
        return $this->db->query($query);
    }
}
?>