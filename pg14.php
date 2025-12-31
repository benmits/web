<?php

$cricketers = ["Sachin Tendulkar", "Virat Kohli", "MS Dhoni", "Brian Lara", "Jacques Kallis"];
?>
<html>
<head>
    <title>Cricketers Array</title>
</head>
<body>
<table border="1" cellpadding="10" cellspacing="0">
    <tr><th>Si No.</th>
    <th>Cricketers Name</th></tr>
    <?php
    $count=1;
    foreach ($cricketers as $cricketer) {
        echo "<tr><td>$count</td>";
        echo "<td>$cricketer</td></tr>";
        $count++;
    }
    ?>
</table>
</body>
</html>
