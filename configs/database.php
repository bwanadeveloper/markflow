<?php
class database{
    public $con;

function __construct(){
    try{
    $con =new PDO("mysql:host=localhost; dbname=marks_reconsiliation","root","");

    }
    catch(PDOException $e){
    echo $e->getMessage();
    }
}

private function connection(){
    
    
    try{
        $this->con =new PDO("mysql:host=localhost; dbname=marks_reconsiliation","root","");
        return $this->con;
        
        }
        catch(PDOException $e){
        echo $e->getMessage();
        return;
        }
        
    }

public function read($query , $arr=[]){
$this->connection();
$stm = $this->con->prepare($query);
$stm->execute($arr);
$result = $stm->fetchAll(PDO::FETCH_OBJ);
return $result;


}
public function write($query,$arr=[]){
    $this->connection();
    $statement=$this->con->prepare($query);
    $result=$statement->execute($arr);
    if($result){
        return true;
    }
    return false;
}




}

function getRandomNumber($max, $time) {
    $randStr = '';
    for($i = 0; $i < $time; $i++) {
        $rand = rand(4, $max);
        $randStr .= $rand; // Concatenate each random number to the string
    }
    return $randStr;
}
