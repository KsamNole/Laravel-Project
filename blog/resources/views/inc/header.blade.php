<div class="d-flex flex-column flex-md-row align-items-center p-3 px-md-4 mb-3 bg-white border-bottom shadow-sm">
    <h5 class="my-0 mr-md-auto font-weight-normal">Tsvetkov Corporation - {{ Auth::check() ? Auth::user()->name : "???"}}</h5>
    <nav class="my-2 my-md-0 mr-md-3">
        <a class="p-2 text-dark" href="{{route('readers')}}">Читатели</a>
        <a class="p-2 text-dark" href="{{route('books')}}">Книги</a>
        <a class="p-2 text-dark" href="{{route('home')}}">Главная</a>
        <a class="p-2 text-dark" href="{{route('about')}}">О проекте</a>
        @if (Auth::check() and Auth::user()->isAdmin())
            <a class="p-2 text-dark" href="{{route('contact')}}">Создать задачу</a>
        @endif
        <a class="p-2 text-dark" href="{{route('contact-data')}}">Задачи</a>
    </nav>
    @if(Auth::check())
        <a class="btn btn-outline-primary" href="{{route('logout')}}">Выйти</a>
    @else
        <a class="btn btn-outline-primary" href="{{route('login')}}">Войти</a>
        <a class="btn btn-outline-primary" href="{{route('register')}}">Зарегистрироваться</a>
    @endif
</div>
