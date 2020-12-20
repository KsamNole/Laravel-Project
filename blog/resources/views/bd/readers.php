<?php
$STH = $DBH->query("SELECT * FROM readers");
$STH->setFetchMode(PDO::FETCH_ASSOC);
while($row = $STH->fetch()){
echo "<tr>
    <td>".$row['id']."</td>
    <td>".$row['last_name']."</td>
    <td>".$row['first_name']."</td>
</tr>";
}
