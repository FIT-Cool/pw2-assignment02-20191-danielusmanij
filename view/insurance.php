<?php
$submitted = filter_input(INPUT_POST,'submit');
if(isset($submitted)){
    $name_class = filter_input(INPUT_POST,'nameclass');
    addInsurance($name_class);
}
?>

<form  method="post">
    <input type="text" name="Insurance"autofocus required placeholder="Insert Insurance">
    <input type="submit"name="submit">
</form>
<table id="myTable">
    <thead>
        <tr>
            <th>ID</th>
            <th>Name Insurance</th>
        </tr>
    </thead>
    <tbody>
    <?php
    $insurances = getAllInsurance();
    foreach($insurances as $insurance){
        echo '<tr>';
        echo '<td>'.$insurance['id'].'</td>';
        echo '<td>'.$insurance['name_class'].'</td>';
        echo '</tr>';
    }
    ?>
    </tbody>
</table>

