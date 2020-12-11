<?use App\Models\Reader;?>
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
        @yield('tablebooks')
    </table>
    <form action=@yield('btnroute')>
        <button class="btn-light">Фильтр</button>
    </form>
    @yield('btnfilter')
    <p><h3>Добавить новую запись</h3>
    <p><form action="{{route('bd-insert-book')}}" method="post">
        @csrf
        <div class="form-group">
            <label for="name">Выберите читателя</label>
            <select name="name" id="name" class="form-control">
                <?php
                $data = Reader::on('mysql2')->get();
                $count = 0;
                foreach ($data as $el){
                    $count+=1;
                    echo "<option value='". $count. "'>". $el->last_name. "</option>";
                }
                $count = 0;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="book">Выберите книгу</label>
            <select type="text" name="book" id="book" class="form-control">
                <?php
                require __DIR__.'/../../../resources/views/bd/bd-connect.php';
                $a = $DBH->query("SELECT name FROM books");
                $count = 0;
                while($res =$a ->fetch()){
                    $count+=1;
                    echo "<option value='". $count. "'>". $res['name'] ."</option>";
                }
                $count = 0;
                ?>
            </select>
        </div>

        <div class="form-group">
            <label for="take">Возращаете или берете книгу?</label>
            <select type="text" name="take" id="take" class="form-control">
                <option value="1">Беру</option>
                <option value="2">Возвращаю</option>
            </select>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success">Отправить</button>
        </div>
    </form>
@endsection
