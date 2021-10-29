<?php
    class Database{
        public $isConn;
        protected $datab;

        //Connect to database
        public function __construct($username = "root",  $password = "", $host = "localhost", $dbname = "makeTime", $option = []){
        $this->isConn = TRUE;   
            try {
                $this->datab = new PDO("mysql:host={$host};dbname={$dbname};charset=utf8", $username, $password, $option);
                $this->datab->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $this->datab->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            } catch (PDOException $e){
                throw new PDOException($e->getMessage(), (int)$e->getCode());
            }
        }

        //disconnect from database
        public function Disconnect(){
            $this->datab = NULL;
            $this->datab = FALSE;
        }

        //get row
        public function getRow($query, $params = []){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $stmt->fetch();
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
        }


        //get rows
        public function getRows($query, $params = []){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return $stmt->fetchAll();
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }  
        }

        //insert rows
        public function insertRow($query, $params = []){
            try{
                $stmt = $this->datab->prepare($query);
                $stmt->execute($params);
                return TRUE;
            }catch(PDOException $e){
                throw new Exception($e->getMessage());
            }
         
        }

        //update rows
        public function updateRow($query, $params = []){
           $this->insertRow($query,$params);
         
        }

        //delete rows
        public function deleteRow($query, $params = []){
            $this->insertRow($query,$params);
         
        }
    }  

?>