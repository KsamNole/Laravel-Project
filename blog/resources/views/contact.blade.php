<?use App\Models\User;?>
@extends('layouts.app')

@section('title-block', 'Contact')
@section('content')
    <h1>Создать задачу</h1>

    <form action="{{ route('contact-form') }}" method="post">
        @csrf

        <div class="form-group">
            <label for="creator">Создатель задачи - {{ Auth::user()->name }}(Вы)</label>
        </div>

        <div class="form-group">
            <label for="name">Кому назначена задача</label>
            <p><select type="text" name="name" id="name" class="form-control">
                <?
                $contact = new User;
                $data = $contact->all();
                foreach ($data as $el)
                    if (!($el->isAdmin()))
                        echo "<option>$el->name</option>";
                ?>
            </select></p>
        </div>

        <div class="form-group">
            <label for="email">Ваш Email</label>
            <input type="text" name="email" placeholder="Введите email" id="email" class="form-control">
        </div>

        <div class="form-group">
            <label for="subject">Тема задания</label>
            <input type="text" name="subject" placeholder="Тема сообщения" id="subject" class="form-control">
        </div>

        <div class="form-group">
            <label for="message">Текст задания</label>
            <textarea name="message" id="message" class="form-control" placeholder="Введите сообщение"></textarea>
        </div>

        <div class="form-group">
            <button type="submit" class="btn-success">Отправить</button>
        </div>
    </form>

@endsection
