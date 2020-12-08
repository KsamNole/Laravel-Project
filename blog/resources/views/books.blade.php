@extends('layouts.app')

@section('title-block', 'Книги')

@section('content')
    <h1>Таблица книг</h1>
    <table>
        <tr>
            <th>Номер</th>
            <th>Название</th>
            <th>Год публиции</th>
            <th>Состояние</th>
            <th>Дата взятия</th>
            <th>Читатель</th>
        </tr>
        <?php
        require 'D:\Fast access\Desktop\Games and programms\OpenServer\domains\home\blog\resources\views\bd\bd.php';
        try {
            $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
        }
        catch(PDOException $e) {
            echo $e->getMessage();
        }
        $b = $DBH->query("SELECT name, id, pub_date FROM books");
        $b->setFetchMode(PDO::FETCH_ASSOC);
        while($row = $b->fetch()){
            echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['name']."</td>
                <td>".$row['pub_date']."</td>";
            $id = $row['id'];
            $a = $DBH->query("SELECT taken_at, returned_at, last_name FROM log_taking, readers
WHERE log_taking.book_id = $id AND log_taking.reader_id = readers.id ORDER BY log_taking.id DESC LIMIT 1 ");
            while($log = $a->fetch()){
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
    </table>
    <p></p>
    <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Vestibulum feugiat, elit quis dapibus pretium, orci turpis blandit purus, iaculis malesuada purus augue non massa. Mauris consequat congue libero. Fusce et orci at orci venenatis interdum. Aenean ut lorem sit amet nisi ullamcorper gravida. Nunc euismod dui nec risus ultricies finibus. Aliquam tincidunt lectus dui, quis mattis nibh maximus sagittis. Phasellus tincidunt turpis et ipsum accumsan, sed ornare ipsum cursus.

        Morbi sagittis leo at enim egestas rutrum. Etiam congue aliquet odio, euismod euismod nibh pellentesque et. Fusce est orci, condimentum eget velit id, laoreet interdum lorem. Duis posuere diam ut orci interdum, ac tristique velit mattis. Nam quis eros sagittis, dictum elit in, tincidunt felis. Nullam tellus tortor, scelerisque pulvinar ipsum sit amet, volutpat vehicula sapien. Ut eget neque erat. Sed at tristique ante, eu pretium enim. Donec euismod mollis velit at faucibus. Duis quis tortor id turpis pharetra mattis. Aliquam bibendum rhoncus metus, a pulvinar metus laoreet accumsan. Nam a sapien eu tortor gravida porttitor.

        Proin dictum est at nulla imperdiet, nec molestie ex lobortis. Quisque nec tincidunt leo. Cras porttitor pellentesque turpis sollicitudin porta. Aenean pretium turpis quis vestibulum interdum. Ut consequat elit lacus, sed ornare urna fermentum ut. Vestibulum sed iaculis nibh, non pulvinar metus. Sed et ex ipsum. Proin ullamcorper, turpis ac rhoncus tincidunt, velit velit tincidunt nisl, id maximus risus enim nec mi.</p>
@endsection
