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
        require __DIR__.'/../../../resources/views/bd/bd-connect.php';
        require __DIR__.'/../../../resources/views/bd/readers.php';
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
