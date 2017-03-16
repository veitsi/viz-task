<?php
echo '<table border="1">';
foreach ($rows as $item) {
    echo "<tr>";
    echo "<td>".$item['username']."</td>";
    echo "<td>".$item['email']."</td>";
    echo "<td>".$item['description']."</td>";
    echo "<td><img src='"."image1.jpeg"."'></td>";
    echo "</tr>";
};
echo '</table>';