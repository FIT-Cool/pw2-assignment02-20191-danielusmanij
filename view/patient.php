<?php
//Block below for delete
$deleteCommand = filter_input(INPUT_GET, 'delCom');
if (isset($deleteCommand) && $deleteCommand = 1) {
    $med_record_number = filter_input(INPUT_GET, 'id');
    deletePatient($med_record_number);
}

//Block below for insert
$add = filter_input(INPUT_POST, 'btnSubmit');
if (isset($add)) {
    $num = filter_input(INPUT_POST, 'txtNo');
    $id = filter_input(INPUT_POST, 'txtID');
    $name = filter_input(INPUT_POST, 'txtName');
    $address = filter_input(INPUT_POST, 'txtAlamat');
    $city = filter_input(INPUT_POST, 'txtKota');
    $date = filter_input(INPUT_POST, 'txtTanggal');
    $type = filter_input(INPUT_POST, 'NamaAsuransi');
    addPatient ( $num,$id, $name, $address, $city, $date, $type);
}
?>
<br/>
<br/>
<Form action="" method="post">
    <fieldset>
        <legend><b>Add Patient</b></legend>
        <table>
            <tr>
                <td>Number Patient</td>
                <td>:</td>
                <td><input type="text" placeholder="Number Patient" name="txtNo"></td>
            </tr>
            <tr>
                <td>ID</td>
                <td>:</td>
                <td><input type="text" placeholder="ID Patient" name="txtID"></td>
            </tr>
            <tr>
                <td>Name</td>
                <td>:</td>
                <td><input type="text" placeholder="Patient Name" name="txtName"></td>
            </tr>
            <tr>
                <td>Address</td>
                <td>:</td>
                <td><input type="text" placeholder="Patient Address" name="txtAlamat"></td>
            </tr>
            <tr>
                <td>Born</td>
                <td>:</td>
                <td><input type="text" placeholder="Born" name="txtKota"></td>
            </tr>
            <tr>
                <td>Born Date</td>
                <td>:</td>
                <td><input type="date" name="txtTanggal"></td>
            </tr>
            <tr>
                <td>Insurance Type</td>
                <td>:</td>
                <!-- <input type="text" placeholder="Jenis Asuransi" name="txtJenis"> -->
                <td><select name="Insurance Type">
                        <?php
                        $insurances = getAllInsurance();
                        foreach ($insurances as $incurance) {
                            echo '<option value="' . $incurance['id'] . '">' . $incurance['name_class'] . '</option>';
                        }
                        ?>
                    </select>
                </td>
            </tr>
        </table>
        <br/>
        <button type="submit" name="btnSubmit">Insert</button>
    </fieldset>
</Form>
<br/>
<br/>
<table id="myTable" text-align="center">
    <thead>
    <tr>
        <th>Checkup Number</th>
        <th>ID</th>
        <th>Name</th>
        <th>Address</th>
        <th>Born</th>
        <th>Born Date</th>
        <th>Insurance</th>
    </tr>
    </thead>
    <tbody>
    <?php
    $patients = getAllPatient();
    foreach ($patients as $patient) {
        echo '<tr>';
        echo '<td>' . $patient['med_record_number'] . '</td>';
        echo '<td>' . $patient['citizen_id_number'] . '</td>';
        echo '<td>' . $patient['name'] . '</td>';
        echo '<td>' . $patient['address'] . '</td>';
        echo '<td>' . $patient['birth_place'] . '</td>';
        echo '<td>' . $patient['birth_date'] . '</td>';
        echo '<td>' . $patient['name_class'] . '</td>';
        echo '<td><button onclick="deletePatient('. $patient['citizen_id_number'].');">Delete</button>
        <button onclick="updatePatient('. $patient['id'].');">Update</button></td>';
        echo '</tr>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>