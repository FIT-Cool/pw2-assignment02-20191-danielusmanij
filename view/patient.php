<?php
$submitted = filter_input(INPUT_POST,'btnsubmit');
if(isset($submitted)){
    $citizen_id_number = filter_input(INPUT_POST,'txtcitizenidnumber');
    $name =  filter_input(INPUT_POST, 'txtname');
    $address = filter_input(INPUT_POST, 'txtaddress');
    $birth_place = filter_input(INPUT_POST, 'txtbirthplace'); 
    $birth_date = filter_input(INPUT_POST, 'txtbirthdate'); 
    $insurance_id =  filter_input(INPUT_POST, 'txtinsuranceid'); 
    addPatient($citizen_id_number,$name,$address,$birth_place,$birth_date,$insurance_id);
}
?>

<form  method="post">
    <table>
    <td><input type="text" name="txtcitizenidnumber"autofocus required placeholder="Citizen_ID_Number"></td>
    <td><input type="text" name="txtname"autofocus required placeholder="name"></td>
    <td><input type="text" name="txtaddress"autofocus required placeholder="address"></td>
    <td><input type="text" name="txtbirthplace"autofocus required placeholder="birth_place"></td>
    <td><input type="date" name="txtbirthdate"autofocus required placeholder="birth_date"></td>
    <td><input type="text" name="txtinsuranceid"autofocus required placeholder="insurance_id"></td>
        <select name="Name Insurance">
            <?php
                foreach($insurances as $insurance){
                echo '<td>'.$insurance['name_class'].'</td>';
            ?>
    <td><input type="submit"name="btnsubmit"></td>
    </table>
</form>
<table id="MyTable">
    <thead>
        <tr>
            <th>citizen_id_number</th>
            <th>name</th>
            <th>address</th>
            <th>birth_place</th>
            <th>birth_date</th>
            <th>insurance_id</th>
    
        </tr>
    </thead>
    <tbody>
    <?php
    $patients = getAllPatient();
    foreach($patients as $patient){
        echo '<tr>';
        echo '<td>'.$patient['citizen_id_number'].'</td>';
        echo '<td>'.$patient['name'].'</td>';
        echo '<td>'.$patient['address'].'</td>';
        echo '<td>'.$patient['birth_place'].'</td>';
        echo '<td>'.$patient['birth_date'].'</td>';
        echo '<td>'.$patient['insurance_id'].'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>