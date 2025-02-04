<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Расписание автобусов</title>
    <link rel="stylesheet" href="/css/normalize.css">
    <link rel="stylesheet" href="/css/reset.css">
    <link rel="stylesheet" href="/css/style.css">
    <script defer src="/js/search.js"></script>
</head>
<body>
    <div class="container">
        <!-- навигация -->
        <nav class="nav-section">
            <div class="nav-section__logo">
                <img src="/icons/лого 1.svg" alt="лого">
            </div>
            <div class="nav-section__right-wrapper">
                <div class="nav-section__first-wrapper">
                    <img src="/icons/tickets.svg" alt="цены">
                    <p class="hover-text nav-text"><a href="">Цены</a></p>
                </div>
                @if(Auth::check() && Auth::user()->is_admin) 
                <p class="hover-text nav-text"><a href="/admin">Админ</a></p>
                @endif
                <div class="nav-section__second-wrapper">
                    @if(Auth::check()) 
                        <div class="wrapper-user-login">
                            <div class="user-avatar">
                                @if(Auth::user()->avatar)
                                    <img src="{{ asset('storage/' . Auth::user()->avatar) }}" alt="Аватар пользователя" class="avatar-img">
                                @else
                                    <div class="default-avatar"><img src="/icons/user-nonLog.svg" alt=""></div>
                                @endif
                            </div>
                            <form method="POST" action="{{ route('logout') }}">
                                @csrf
                                <button type="submit" class="btn logout-button">Выйти</button>
                            </form>
                        </div>
                    @else
                        <a href="/bus-reg"><button class="btn nav-button">Войти</button></a>
                    @endif
                    </div>
                </div>
        </nav>
        <div class="transition-line"></div>
        <!-- первая секция -->
        <section class="first-section">
            <div class="first-section__wrappers">
                <div class="first-section__left-wrapper">
                    <div class="quick-search">
                        <img class="arrow-search" src="/icons/arrow.svg" alt="">
                        <p class="hover-text search-pointer">Быстрый поиск</p>
                    </div>
                </div>
                <form class="first-section__right-wrapper">
                    <div class="input-group">
                        <input type="text" placeholder="Откуда">
                        <input type="text" placeholder="Куда">
                        <input type="date" value="когда">
                    </div>
                    <button class="btn search-button">Найти</button>
                </form>
            </div>
            <!-- быстрый поиск active -->
            <div class="all-searches">
                <div class="full-block quick-searcher">
                    <div class="search-overlay quick">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="right">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                    </div>
                    <div class="search-overlay quick">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="right">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                    </div>
                    <div class="search-overlay quick">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="right">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                    </div>
                    <div class="search-overlay quick">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="right">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                    </div>
                </div>
                <!-- обычный поиск active -->
                <div class="full-block search-default">
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="./icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                    <div class="search-overlay default">
                        <div class="left">
                            <div class="route-info info1">
                                <img src="/icons/bus.svg" class="bus-icon">
                                <span class="bus-number">46</span>
                            </div>
                            <div class="route-info info2">
                                <p>Скобяное Шоссе</p>
                                <img src="/icons/Arrow-quick.svg" alt="">
                                <span>Скоропусковский</span>
                            </div>
                        </div>
                        <div class="left2">
                            <div class="route-info info2">
                                <span>2ч. 15мин.</span>
                            </div>
                        </div>
                        <div class="right right2">
                            <span class="time">15:33</span>
                            <img src="/icons/map 1.svg" class="map-marker">
                        </div>
                        <div class="right3">
                            <span class="time">33 руб.</span>
                        </div>
                    </div>
                </div>
            </div>
            <div class="big-line"></div>
        </section>
        <div class="footer-section-bgimg">
            <!-- 2 секция -->
            <section class="container second-section">
                <h1 class="title">расписание автобусов сергиев посада</h1>
                <p class="paragraph">Добро пожаловать на страницу расписания автобусов Сергиева Посада! Здесь вы найдёте актуальную
                    информацию о маршрутах городского и междугороднего транспорта, чтобы быстро и удобно планировать
                    свои поездки.</p>
                <span class="line-decor"></span>
                <div class="list-container">
                    <p class="title-list first">Что мы предлагаем:</p>
                    <ul class="list list-one">
                        <li>Актуальное расписание: все данные обновляются в режиме реального времени, чтобы вы всегда знали точное время отправления и прибытия.</li>
                        <li>Маршруты и остановки: подробная информация о каждом маршруте, включая ключевые остановки и конечные пункты.</li>
                        <li>Удобный поиск: просто выберите нужный маршрут или укажите пункт назначения, и система подберет оптимальные варианты.</li>
                        <li>Новости и изменения: важные объявления о временных изменениях в расписании, сезонных корректировках и новых маршрутах.</li>
                    </ul>
                    <p class="title-list second">Популярные маршруты:</p>
                    <ul class="list list-two">
                        <li>Городские маршруты — быстрый и удобный транспорт по ключевым точкам Сергиева Посада.</li>
                        <li>Междугородние рейсы — расписание автобусов до Москвы, Дмитрова, Переславля и других городов.</li>
                    </ul>
                </div>
                <span class="line-decor"></span>
            </section>
            <!-- слайдер -->
            <section class="container second-section">
                <h2 class="title">Поюбуйтесь на наши автобусы!</h2>
                <div class="slider">
                    <div class="slide" onclick="slider(0)">
                        <img src="/img/bus1.jpg" alt="автобусик">
                    </div>
                    <div class="slide" onclick="slider(1)">
                        <img src="/img/bus2.jpg" alt="автобусик 2">
                    </div>
                    <div class="slide" onclick="slider(2)">
                        <img src="/img/bus3.jpg" alt="автобусик 3">
                    </div>
                </div>
                <h2 class="title-list last">Планируйте поездки с комфортом и уверенностью!</h2>
            </section>
            <!-- футер -->
            <footer class="container footer">
                <div class="transition-line"></div>
                <div class="footer-container">
                    <div class="footer-column column1">
                        <h3>Контакты</h3>
                        <p>Телефон: +7 (123) 456-78-90</p>
                        <p>Электронная почта: support@bus-sp.ru</p>
                        <p>Адрес: г. Сергиев Посад, ул. Центральная, д. 10</p>
                    </div>
                    <div class="footer-column column2">
                        <h3>Информация</h3>
                        <p><a href="#">Городские маршруты</a></p>
                        <p><a href="#">Междугородние маршруты</a></p>
                        <p><a href="#">Тарифы и билеты</a></p>
                        <p><a href="#">Новости</a></p>
                    </div>
                    <div class="footer-column column3">
                        <h3>Социальные сети</h3>
                        <div class="social-icons">
                            <a href="#"><img src="/icons/facebook-svgrepo-com.svg" alt="Facebook"></a>
                            <a href="#"><img src="/icons/vk.svg" alt="VK"></a>
                        </div>
                    </div>
                    <div class="footer-column copyright">
                        © 2024 Все права защищены
                    </div>
                </div>
            </footer>
        </div>
    </div>
</body>
</html>