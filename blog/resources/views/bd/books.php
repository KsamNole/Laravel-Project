<?php
$b = $DBH->query("SELECT name, id, pub_date FROM books");
$b->setFetchMode(PDO::FETCH_ASSOC);
while($row = $b->fetch()){
    $id = $row['id'];
    $a = $DBH->query("SELECT taken_at, returned_at, last_name FROM log_taking, readers
WHERE log_taking.book_id = $id AND log_taking.reader_id = readers.id ORDER BY log_taking.id DESC LIMIT 1 ");
    while($log = $a->fetch()){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['pub_date']."</td>";
        if ($log['returned_at'] == Null){
            echo "<td>Взята</td>";
            echo "<td>". $log['taken_at']. "</td>";
            echo "<td>". $log['last_name']. "</td>";
        }
        else{
            echo "<td>Не взята</td>";
            echo "<td>-</td>";
            echo "<td>-</td>";
        }
    }
    echo "</tr>";
}
?>
