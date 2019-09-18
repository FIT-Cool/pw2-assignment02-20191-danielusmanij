<?php
function getAllPatient(){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = 'SELECT b.citizen_id_number,b.name,b.address,'
            . 'b.birth_place,b.birth_date,b.insurance_id,b.insurance_id'
            . 'FROM insurance b JOIN patient g ON b.insurance_id = g.id ';
    $result = $link->query($query);
    return $result;
}

function addPatient($citizen_id_number,$name,$address,$birth_place,$birth_date,$insurance_id){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = 'INSERT INTO patient(citizen_id_number,'
            . 'name,'
            . 'address,'
            . 'birth_place,'
            . 'birth_date),'
            . 'insurance_id)'
            . 'values(?,?,?,?,?)';
    $statement = $link->prepare($query);
    $statement->bindParam(1, $citizen_id_number,PDO::PARAM_STR);
    $statement->bindParam(2, $name,PDO::PARAM_INT);
    $statement->bindParam(3, $address,PDO::PARAM_STR);
    $statement->bindParam(4, $birth_place,PDO::PARAM_STR);
    $statement->bindParam(5, $birth_date,PDO::PARAM_STR);
    $statement->bindParam(6, $insurance_id,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
    header("location:index.php?menu=ab");
}
