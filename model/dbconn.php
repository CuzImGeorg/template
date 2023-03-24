<?php 

    class DB {
        private static $db = null;
        
        private function __construct()
        {
            
        } 

        public static function getDB() {

            if(self::$db == null) {
                try {
                    self::$db = new PDO('pgsql:host=localhost;port=5432;dbname=groupchat;', 'postgres', "adm"); //Postgres
                    self::$db = new PDO('mysql:host=localhost;dbname=bibliothek2;', 'root');                    //Mysql

                    self::$db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch (PDOException $e) {
                    echo $e->getMessage();
                }


            }
            return self::$db;
        }


    }


?>