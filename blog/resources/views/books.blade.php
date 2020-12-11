@extends('layouts.books')

@section('title-block', 'Книги')

@section('tablebooks')
    <?php
    require __DIR__.'/../../../resources/views/bd/bd-connect.php';
    $b = $DBH->query("SELECT name, id, pub_date FROM books");
    $b->setFetchMode(PDO::FETCH_ASSOC);
    ?>
    <?php
        if (isset($_GET['q'])){
            require __DIR__.'/../../../resources/views/bd/filteredBooks.php';
            ?>
            @section('btnfilter')
                <form>
                    <button name="s" class="btn-light">Фильтр 2</button>
                </form>
            @endsection
            <?php
        }
        else{
            require __DIR__.'/../../../resources/views/bd/books.php';
            ?>
            @section('btnfilter')
            <form>
                <button name="q" class="btn-light">Фильтр 2</button>
            </form>
            @endsection
            <?php
        }
    ?>
@endsection

@section('btnroute')"{{route('filter')}}"@endsection
