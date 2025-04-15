<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/register.css') }}" />
</head>
<body>
    <header>
        <div class="header__inner">
            <div class="header-utilities">
                <h1 class="header__logo">
                    Fashionably Late
                </h1>
                <nav>
                    <ul class="header-nav">
                        <li class="header-nav__item">
                            <a class="header-nav__link" href="/login">login</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Register</h2>
            </div>
            <form class="form" action="/register" method="post">
            @csrf
                <div class="form__group">
                    <label class="register-form__label" for="name">お名前</label>
                    <input class="register-form__input" type="text" name="name" id="name" placeholder="例：山田 太郎" value="{{ old('name') }}">
                    <div class="form__error">
                        @error('name')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <label class="register-form__label" for="email">メールアドレス</label>
                    <input class="register-form__input" type="email" name="email" id="email" placeholder="例：test@example.com" value="{{ old('email') }}">
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                <div class="form__group">
                    <label class="register-form__label" for="password">パスワード</label>
                    <input class="register-form__input" type="password" name="password" id="password" placeholder="例：coachtech1106">
                    <div class="form__error">
                        @error('password')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
                    <input class="register-form__btn" type="submit" value="登録">
            </form>
        </div>
    </main>
</body>
</html>