<?php
function getAllPatient()
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $query = "SELECT b.med_record_number,b.citizen_id_number,b.name,b.address,b.birth_place,b.phone_number,b.photo,b.birth_date,j.id,j.name_class 
              FROM patient b JOIN insurance j ON b.insurance_id = j.id";
    $result = $link->query($query);
    return $result;
}

function addPatient($med_record_number, $citizen_id_number, $name, $address, $birth_place, $birth_date, $insurance_id)
{
    $link = new PDO("mysql:host=localhost;dbname=prakpw220191", "root", "");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT, false);
    $link->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "INSERT INTO patient (med_record_number,citizen_id_number,name,address,birth_place,birth_date,insurance_id) VALUES (?,?,?,?,?,?,?)";
    $statement = $link->prepare($query);;
    $statement->bindParam(1, $med_record_number, PDO::PARAM_STR);
    $statement->bindParam(2, $citizen_id_number, PDO::PARAM_INT);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birth_place, PDO::PARAM_STR);
    $statement->bindParam(6, $birth_date, PDO::PARAM_STR);
    $statement->bindParam(7, $insurance_id, PDO::PARAM_INT);
    if ($statement->execute()) {
        $link->commit();
    } else {
        $link->rollBack();
    }
    $link = null;
    header("location:index.php?menu=ab");
}
function deletePatient($med_record_number){
    $link= new PDO("mysql:host=localhost;dbname= prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "DELETE FROM patient WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $med_record_number,PDO::PARAM_STR);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
}
function updatePatient($med_record_number, $citizen_id_number, $name, $address, $birth_place, $birth_date, $insurance_id){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $link->beginTransaction();
    $query = "UPDATE patient SET citizen_id_number = ?, name = ?, address = ?, birth_place = ?, birth_date = ?, insurance_id = ? WHERE med_record_number = ?";
    $statement = $link->prepare($query);
    $statement->bindParam(1, $citizen_id_number, PDO::PARAM_STR);
    $statement->bindParam(2, $med_record_number, PDO::PARAM_STR);
    $statement->bindParam(3, $name, PDO::PARAM_STR);
    $statement->bindParam(4, $address, PDO::PARAM_STR);
    $statement->bindParam(5, $birth_place, PDO::PARAM_STR);
    $statement->bindParam(6, $birth_date, PDO::PARAM_INT);
    $statement->bindParam(7, $insurance_id, PDO::PARAM_INT);
    if ($statement->execute()){
        $link->commit();
    }
    else{
        $link->rollBack();
    }
    $link=null;
}

function getPatient($med_record_number){
    $link= new PDO("mysql:host=localhost;dbname=prakpw220191","root","");
    $link->setAttribute(PDO::ATTR_AUTOCOMMIT,false );
    $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    $query = "SELECT * FROM patient WHERE med_record_number = ? LIMIT 1";
    $statement = $link ->prepare($query);
    $statement ->bindParam(1,$med_record_number,PDO::PARAM_STR);
    $statement ->execute();
    $result = $statement->fetch();
    $link=null;
    return $result;
}
?>



?>