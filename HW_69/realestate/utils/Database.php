<?php
    class Database{
        private $cs;
        private $user;
        private $password;
        private $options;
        private $db;
        private function __construct(){
        }
        public static function getInstance(){
            if (!isset($getInstance))
                $getInstance = new Database();
            return $getInstance;
        }
        public function getDb(){
            $cs = "mysql:host=localhost;dbname=test";
            $user = "test";
            $password = 'password';
            $options = [PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION];
            try {
                $db = new PDO($cs, $user, $password, $options);
            } catch (PDOException $e) {
                $error = "Something went wrong " . $e->getMessage();
            }
            return $db;
        }
    }
?>