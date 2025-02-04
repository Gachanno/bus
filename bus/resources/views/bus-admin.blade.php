<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-admin.css">
    <title>Document</title>
</head>
<body>
    <header class="header">
        <a href="/" class="header__logo logo">
            <img src="./icons/logo.svg" alt="Перейти на главный экран">
        </a>
        <nav class="header__nav nav">
            МЕНЮ
            <ul class="nav__list">
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
                <li class="nav__item">
                    <img src="./icons/person.svg" alt="Пользователи">
                    <div class="nav__text">Пользователи</div>
                </li>
            </ul>
        </nav>
    </header>
    <main class="main">
        <div class="main__nav">
            <ul class="main__list">
                <li class="main__item" >
                    <a href="" class="main__nav-wrapper">
                        <img src="./icons/bus-station.svg" alt="Вернуться к расписанию" class="main__bus">
                        <span class="main__bus-text">Расписание</span>
                    </a>
                </li>
                <li class="main__item">
                    <div class="main__nav-wrapper">
                        @if(Auth::check()) 
                            <div class="wrapper-user-login">
                                <div class="user-avatar">
                                    @if(Auth::user()->avatar)
                                        <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Аватар пользователя" class="avatar-img">
                                    @else
                                        <div class="default-avatar"><img src="/icons/user-nonLog.svg" alt=""></div>
                                    @endif
                                </div>
                            </div>
                        @endif
                    </div>
                </li>
            </ul>
        </div>
        <div class="main__tittle-wrapper">
            <h2 class="main__tittle">СПИСОК ПОЛЬЗОВАТЕЛЕЙ</h2>
            <div class="main__way-wrapper">
                <span class="main__way">Admin/</span>
                <span class="main__way">Список Пользователей</span>
            </div>
        </div>
        <section class="main-section">
            <div class="main-section__nav-table">
                <h2 class="main-section__tittle">Пользователи</h2>
                <form action="" class="main-section__search-box">
                    <input type="submit" value="" class="main-section__img">
                    <input type="search" placeholder="Найти пользователя" name="search-table" class="main-section__search">
                </form>
            </div>
            <table class="table">
                <thead class="table__head">
                    <tr>
                        <th>ID</th>
                        <th>Имя пользователя</th>
                        <th>Действия</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($users as $user)
                <tr class="table__row">
                    <td class="table__text">{{ $user->id }}</td>
                    <td class="table__text">{{ $user->login }}</td>
                    <td class="table__actions">
                        <form action="{{ route('admin.users.toggleAdmin', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PATCH')
                            @if($user->is_admin)
                                <button type="submit" class="table__action">
                                    <img src="{{ asset('icons/crown.svg') }}" alt="Убрать админа">
                                    Убрать админа
                                </button>
                            @else
                                <button type="submit" class="table__action">
                                    <img src="{{ asset('icons/crown.svg') }}" alt="Сделать админом">
                                    Сделать админом
                                </button>
                            @endif
                        </form>

                        <form action="{{ route('admin.users.delete', $user->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="table__action" onclick="return confirm('Удалить пользователя?')">
                                <img src="{{ asset('icons/Prohibit.svg') }}" alt="Удалить пользователя">
                                Удалить пользователя
                            </button>
                        </form>
                    </td>
                </tr>
                @endforeach
                </tbody>
            </table>
            <div class="main-section__pages-box">
                <div class="main-section__pages-showbox">
                    <span>Показывать на странице:&nbsp;</span>
                    <span class="main-section__count-pages">10</span>
                </div>
                <div class="main-section__number-box">
                    <span class="main-section__count-page">1-10</span>
                    <span>&nbsp;of&nbsp;</span>
                    <span class="main-section__max-pages">276</span>
                </div>
                <div class="main-section__arrow-box">
                    <div class="arrow arrow--left"></div>
                    <div class="arrow arrow--right"></div>
                </div>
            </div>
        </section>
    </main>
</body>
</html>