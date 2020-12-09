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
        require 'D:\Fast access\Desktop\Games and programms\OpenServer\domains\home\blog\resources\views\bd\bd-connect.php';
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
    <p><h3>Добавить новую запись</h3>
    <p><form action="{{route('bd-insert-book')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Имя</label>
            <input type="text" name="first_name" placeholder="Введите ваше имя" id="first_name" class="form-control">
        </div>

        <div class="form-group">
            <label for="name">Фамилия</label>
            <input type="text" name="last_name" placeholder="Введите вашу фамилию" id="last_name" class="form-control">
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success">Отправить</button>
        </div>
    </form>
@endsection
