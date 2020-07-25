<!DOCTYPE html>
<html>
    <head>
        <style>
            table, td, th {
                border: 1px solid black;
            }
        </style>
    </head>
    <body>
        <table>
            <thead>
                <tr>
                    <th>Number</th>
                    <th>Name</th>
                    <th>Cuteness</th>
                </tr>
            </thead>
            <tbody>
                <?php
                    $ip = 'localhost';
                    $username = 'god';
                    $password = '904325sv';

                    $connection = mysqli_connect($ip, $username, $password, 'test') or die('An Issue Has Accured');
                    if ($connection) {
                        $data = mysqli_query($connection, 'select * from test');
                    }
                    while ($row = mysqli_fetch_assoc($data)) {
                        echo"<tr>";
                        foreach ($row as $collumn) echo "<td>$collumn</td>";
                        echo"</tr>";
                    }

                    mysqli_close($connection);
                ?>
            </tbody>
        </table>
    </body>
</html>