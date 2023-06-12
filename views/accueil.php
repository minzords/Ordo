<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ordo</title>
</head>
<body>
    <style  type="text/css">
        table,td,tr {
            border: 2px solid black;
            border-collapse: collapse;
            font-size: 20px;
            padding: 10px;
        }
    </style>

    <h1>Ordo</h1>
    <table>
        <?php
            foreach ($calendarium as $key => $value) {
                echo('<tr><td>' . $key . '</td><td>' . $value . '</td></tr>');
            }
        ?>
    </table>
</body>
</html>