<?php
function getAllInsurance(){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT * FROM insurance';
    $result = $link->query($query);
    return $result;
}

function addInsurance($name_class){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = 'INSERT INTO insurance(name_class) values(?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $name_class,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
}
function deleteInsurance($id){
    $link= new PDO("mysql:host=localhost;dbname= prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM insurance WHERE id = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
}
function updateInsurance($id,$name_class){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE insurance SET name_class=? WHERE id=?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $name_class,PDO::PARAM_STR);
    $statement->bindParam(2, $id,PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
}

function getInsurance($id){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM insurance WHERE id = ? LIMIT 1";
    $statement = $link ->prepare($query);
    $statement ->bindParam(1,$id,PDO::PARAM_STR);
    $statement ->execute();
    $result = $statement->fetch();
    $link=null;
    return $result;
}
?>

