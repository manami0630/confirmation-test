<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/login.css') }}" />
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
                            <a class="header-nav__link" href="/register">register</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Login</h2>
            </div>
            <form class="form" action="/login" method="post">
            @csrf
                <div class="form__group">
                    <label class="login-form__label" for="email">メールアドレス</label>
                    <input class="login-form__input" type="mail" name="email" id="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                        <div class="form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                </div>
                <div class="form__group">
                    <label class="login-form__label" for="password">パスワード</label>
                    <input class="login-form__input" type="password" name="password" id="password" placeholder="例: coachtech1106">
                        <div class="form__error">
                            @error('password')
                            {{ $message }}
                            @enderror
                        </div>
                </div>
                    <input class="login-form__btn" type="submit" value="ログイン">
            </form>
        </div>
    </main>
</body>
</html>