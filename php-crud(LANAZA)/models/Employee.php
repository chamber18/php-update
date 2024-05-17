<?php 
    class Employee{
        public $id;
        public $lname;
        public $fname;
        public $position;
        public static $tblName = "tblemployee";

        function __construct($f=null, $l=null, $p=null){
            $this->fname = $f;
            $this->lname = $l;
            $this->position = $p;
        }

        public function save(){
            require("dbconfig.php");
            $sql = "INSERT INTO ".self::$tblName." (lname,fname,position) 
            VALUES ('".$this->lname."', '".$this->fname."', '".$this->position."')";
           
            if ($conn->query($sql)===TRUE){
                echo "Employee Succesfully inserted";
            }
            else{
                echo "Error";
            }
            $conn->close();
        }
        
        public static function getAll(){
            require ("dbconfig.php");
                $sql = "SELECT * FROM ".self::$tblName;
                $result = $conn->query($sql);
            $conn->close();

            return $result;
        }

        public static function search($id){
            require("dbconfig.php");

            $sql = "SELECT * FROM ".self::$tblName." WHERE id = $id";

            $result = $conn->query($sql);
            if($result->num_rows > 0){
                $emp = new Employee();
                while ($row = $result ->fetch_assoc()){
                    $emp->id = $row["ID"];
                    $emp->lname = $row["lname"];
                    $emp->fname = $row["fname"];
                    $emp->position = $row["position"];
                }
                return $emp;

            }else {
                echo "no record found";
            }

            $conn->close();
        }

        public function update(){
            require("dbconfig.php");
                $sql = "UPDATE ".self::$tblName." SET lname = '$this->lname', fname = '$this->fname', position = '$this->position' WHERE id = $this->id";

                if($conn->query($sql)===TRUE){
                    header("location:index.php");
                }else {
                    echo "error";
                }
            $conn->close();
        }
    }
?>