@extends('layouts.app')

@section('title-block', 'Читатели')

@section('content')
    <h1>Таблица читателей</h1>
    <table>
        <tr>
            <th>Номер</th>
            <th>Фамилия</th>
            <th>Имя</th>
        </tr>
    <?php
    require 'D:\Fast access\Desktop\Games and programms\OpenServer\domains\home\blog\resources\views\bd\bd-connect.php';
    try {
        $DBH = new PDO("mysql:host=$host;dbname=$dbname", $user, $pass);
    }
    catch(PDOException $e) {
        echo $e->getMessage();
    }
    $STH = $DBH->query("SELECT * FROM readers");
    $STH->setFetchMode(PDO::FETCH_ASSOC);
    while($row = $STH->fetch()){
        echo "<tr>
                <td>".$row['id']."</td>
                <td>".$row['last_name']."</td>
                <td>".$row['first_name']."</td>
              </tr>";
    }
    ?>
    </table>
    <p><h3>Добавить нового читателя</h3>
    <p><form action="{{route('bd-insert-reader')}}" method="post">
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
