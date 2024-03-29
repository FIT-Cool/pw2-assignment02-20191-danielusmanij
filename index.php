<?php
include_once 'db_function/insurance_func.php';
include_once 'db_function/patient_func.php';
?>
<html>
    <head>
        <link rel="stylesheet" href="view/datatables.css">
        <script type="text/javascript" src="view/datatables.js"></script>
        <meta charset="UTF-8">
        <title>Asuransi Daniel Eliezer</title>
        <meta name="author" content="Daniel(1772040">
        <meta name="description" content= "PHP navigation and data object"
    </head>
    <body>
        <div class="page">
            <header>
                <h2>Asuransi Rumah Sakit</h2>
            </header>
            <nav>
                <ul>
                    <li><a href="?menu=hm">Insurance</a></li>
                    <li><a href="?menu=ab">Patient</a></li>
                </ul>
            </nav>
    <main>
        <?php
        $targetMenu=  filter_input(INPUT_GET, 'menu');
                switch($targetMenu){
                    case 'hm':
                        include_once 'view/insurance.php';
                        break;
                    case 'ab':
                        include_once 'view/patient.php';
                        break;
                    case 'hmr':
                        include_once 'view/insurance_update.php';
                        break;
                    case 'abr';
                        include_once 'view/patient_update.php';
                        break;
                    default:
                        include_once 'index.php';
                        break;
                }
        ?>
    </main>
    </body>
    <script >
        $(document).ready(function(){
            $('#patient').DataTable();
            $('#insurance').DataTable();
        });
    </script>
    <footer>
        Pemograman Web 2 Daniel Eliezer(1772040) &copy;2019
    </footer>
    </div>
</html>
