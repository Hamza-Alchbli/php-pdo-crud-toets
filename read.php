<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "php-pdo-crud-toets";
try {
    $pdo = new PDO("mysql:host=$servername;dbname=$dbname;charset=UTF8", $username, $password);
    // set the PDO error mode to exception
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    // echo "Connected successfully";
    $sql = 'select * from DureAuto order by Prijs DESC';
    $q = $pdo->query($sql);
    $q->setFetchMode(PDO::FETCH_ASSOC);
} catch (PDOException $e) {
    die("Could not connect to the database $dbname :" . $e->getMessage());
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php-pdo-proeftoets</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.3.1/dist/css/bootstrap.min.css">
</head>

<body>
    <table class="table table-bordered table-condensed">
        <thead>
            <tr>
                <th>Merk</th>
                <th>Model</th>
                <th>Topsnelheid</th>
                <th>Prijs</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $q->fetch()) : ?>
                <tr>
                    <td><?php echo htmlspecialchars($row['Merk']); ?></td>
                    <td><?php echo htmlspecialchars($row['Model']); ?></td>
                    <td><?php echo htmlspecialchars($row['Topsnelheid']); ?></td>
                    <td><?php echo htmlspecialchars($row['Prijs']); ?></td>
                    <td>
                        <a href="delete.php?deleteid=<?= $row['Id'] ?>" class="text-light"><img src="kruis.webp" style="width: 50px;"></a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</body>

</html> 