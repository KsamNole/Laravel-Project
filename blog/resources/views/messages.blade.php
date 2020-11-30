@extends('layouts.app')

@section('title-block', 'Home')
@section('content')
    @if (Auth::check() and Auth::user()->isAdmin())
        <h1>Все задачи</h1>
    @else
        <h1>Ваши задачи</h1>
    @endif

    @foreach($data as $el)
        @if($el->name == Auth::user()->name or Auth::user()->isAdmin())
            <div class="alert alert-info">
                @if ($el->status == "processing")
                    <h3>{{ $el->subject }} - В процессе</h3>
                @elseif($el->status == "pending")
                    <h3>{{ $el->subject }} - Ожидается</h3>
                @else
                    <h3>{{ $el->subject }} - Готов</h3>
                @endif
                <p> Назначил задачу - {{ $el->creator }}</p>
                <p> Обратная связь - {{ $el->email }}</p>
                <p><small>{{ $el->created_at }}</small></p>
                <a href="{{ route('contact-data-one', $el->id) }}"><button class="btn btn-warning">Детальнее</button></a>
                <p><form  action="{{ route('contact-update-status', $el->id) }}" method="post">
                    @csrf
                    <select type="text" class="btn btn-light" name="status" id="status">
                        <option value="pending">Ожидается</option>
                        <option value="processing">В процессе</option>
                        <option value="done">Готов</option>
                    </select>
                    <input class="btn btn-success" type=submit value=Сохранить class=noresize submit>
                </form>
            </div>
        @endif
    @endforeach
@endsection
