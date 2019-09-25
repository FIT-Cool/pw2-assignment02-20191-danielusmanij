<?php
//Block below for delete
$deleteCommand = filter_input(INPUT_GET,'delCom');
if(isset($deleteCommand)&& $deleteCommand = 1){
    $id=filter_input(INPUT_GET,'id');
    deleteInsurance($id);
}
//Block Below For insert
$submitted = filter_input(INPUT_POST,'submit');
if(isset($submitted)){
    $name = filter_input(INPUT_POST,'nameclass');
    addInsurance($name);
}
?>

<form  method="post">
    <legend><b>Add Insurance</b></legend>
    <table>
        <tr>
                <input type="text" name="nameclass"autofocus required placeholder="Insert Insurance">
        </tr>
        <tr>
                <input type="submit"name="submit">
        </tr>
    </table>
</form>
<table id="MyTable" class="display" >
    <thead>
        <tr>
            <th>ID</th>
            <th>Name Insurance</th>
            <th>Action</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $insurances = getAllInsurance();
    foreach($insurances as $insurance){
        echo '<tr>';
        echo '<td>'.$insurance['id'].'</td>';
        echo '<td>'.$insurance['name_class'].'</td>';
        echo '<td><button onclick="deleteInsurance('. $insurance['id'].');">Delete</button>
        <button onclick="updateInsurance('. $insurance['id'].');">Update</button></td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

