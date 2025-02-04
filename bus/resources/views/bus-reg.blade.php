<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/css/style-reg.css">
    <title>Войти</title>
</head>
<body>
    <main>
        <div class="authorization__box">
            <div class="authorization__choice-flex">
                <div class="authorization__choice-text authorization__choice-text--selected">вход</div>
                <div class="authorization__choice-text">регистрация</div>
            </div>



            <!-- вход -->
            <form method="POST" action="{{ route('login') }}" class="authorization__form authorization__form--active" novalidate data-js-form>
                @csrf
                <label class="authorization__input-box">
                    <span>Электронная почта</span>
                    <input type="email" name="email" required class="authorization__input" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="имя_вашей_почты@домен.имя">
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <label class="authorization__input-box authorization__input-box--botton-marg">
                    <span>Пароль</span>
                    <div class="authorization__input">
                        <input name="password" type="password" data-js-password required minlength="6" maxlength="16"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}" title="Пароль должен быть длиной от 8 до 16 символов, включать как минимум одну цифру, одну букву в нижнем и одну букву в верхнем регистре">
                        <div class="eye slash">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <input type="submit" value="Войти" class="authorization__input-submit">
                <a href="" class="authorization__link-password">Напомнить Пароль</a>
            </form>





            <!-- регистрация -->
            <form method="POST" action="/bus-reg/register" enctype="multipart/form-data" class="authorization__form" novalidate data-js-form>
                @csrf
                <label class="authorization__input-box">
                    <span>Логин</span>
                    <input type="text" name="login" required class="authorization__input">
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <label class="authorization__input-box">
                    <span>Пароль</span>
                    <div class="authorization__input">
                        <input type="password" name="password" data-js-password required minlength="6" maxlength="16"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}" title="Пароль должен быть длиной от 8 до 16 символов, включать как минимум одну цифру, одну букву в нижнем и одну букву в верхнем регистре">
                        <div class="eye slash">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <label class="authorization__input-box">
                    <span>Повторите Пароль</span>
                    <div class="authorization__input">
                        <input type="password" name="password_confirmation" data-js-password required minlength="6" maxlength="16"  pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{6,16}" title="Пароль должен быть длиной от 8 до 16 символов, включать как минимум одну цифру, одну букву в нижнем и одну букву в верхнем регистре">
                        <div class="eye slash">
                            <div></div>
                            <div></div>
                        </div>
                    </div>
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <label class="authorization__input-box">
                    <span>Электронная почта</span>
                    <input type="email" name="email" required class="authorization__input" pattern="[^@\s]+@[^@\s]+\.[^@\s]+" title="имя_вашей_почты@домен.имя">
                    <div class="field__errors" data-js-field-errors></div>
                </label>
                <div class="authorization__checkbox-box">
                    <input type="checkbox" id="geolocation" value="True" class="authorization__checkbox">
                    <label for="geolocation" class="authorization__checkbox-custom"></label>
                    Разрешить сайту использовать мою геопозицию
                </div>
                <div class="authorization__img-flex">
                    <input type="file" name="avatar" accept="image/jpg, image/png" id="img-input" class="authorization__form-file" oninput="checkFileSize(this)" onchange="previewFile()">
                    <label for="img-input" class="authorization__custom-file">Добавить аватар</label>
                    <div class="authorization__error-img">
                        Размер превышает 1мб
                    </div>
                </div>
                <div class="authorization__img-box">
                    <img alt="Выбранное изображение" class="authorization__img">
                    <img src="./icons/delete-img.svg" alt="Удалить изображение" class="authorization__img-delete">
                </div>
                <input type="submit" value="Зарегистрироваться" class="authorization__input-submit">
            </form>
        </div>
    </main>
    <script src="/js/main.js" type="module"></script>
</body>
</html>