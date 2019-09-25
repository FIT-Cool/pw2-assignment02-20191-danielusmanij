<?php
//Block below for fetch data
$med_record_number=filter_input(INPUT_GET,'id');
if(isset($med_record_number)){
    $patient=getPatient($med_record_number);
}
//Block Below for update
$submitted = filter_input(INPUT_POST,'btnUpdate');
if(isset($submitted)){
    $name_class = filter_input(INPUT_POST,'insurance');
    updatePatient($id,$name_class);
    header("location:index.php?menu=ab");
}
?>

<form  method="post">
    <legend>Update Insurance</legend>
    <input type="text" name="patient"autofocus required placeholder="Ketik" value="<?php echo $patient['name_class']; ?>">
    <input type="submit"name="btnUpdate" value="Update Patient">
</form>