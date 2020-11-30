@extends('layouts.app')

@section('title-block'){{$data->subject}}@endsection
@section('content')
    <h1>{{$data->subject}}</h1>
            <div class="alert alert-info">
                <p> Назначил задачу - {{ $data->creator }}</p>
                <p> Обратная связь - {{ $data->email }}</p>
                <p> Полное содержание:</p>
                <p> {{ $data->message }}</p>
                <p><small>{{ $data->created_at }}</small></p>
                @if(Auth::user()->isAdmin())
                    <a href="{{ route('contact-update', $data->id) }}"><button class="btn btn-primary">Редактировать</button></a>
                    <a href="{{ route('contact-delete', $data->id) }}"><button class="btn btn-danger">Удалить</button></a>
                @endif
            </div>
@endsection
