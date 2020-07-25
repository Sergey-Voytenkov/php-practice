<?php
    $dir = "C:/Apache24/htdocs/";
    $scan = scandir($dir);
?><!doctype html>
<html>
    <body>
        <?php
            $size = sizeof($scan);
            foreach($scan as $row) {
                if (is_file($row)) {
                    echo "<a href='$row'>$row</a><br/>";
                }
                elseif (is_dir($row)) {
                    echo "<a href='/$row'>$row</a><br/>";
                }
            }
        ?>
    </body>
</html>