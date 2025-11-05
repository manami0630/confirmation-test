<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/index.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
</head>
<body>
    <header>
        <div class="header__inner">
            <h1 class="header__logo">
                Fashionably Late
            </h1>
        </div>
    </header>
    <main>
        <div class="contact-form__content">
            <div class="contact-form__heading">
                <h2>Contact</h2>
            </div>
        </div>
        <form class="form" action="/confirm" method="post" novalidate>
        @csrf
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お名前</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="text" id="name" name="first_name" placeholder="例: 山田" value="{{ old('first_name') }}"/>
                        <span class="separator"></span>
                        <input type="text" id="name" name="last_name" placeholder="例: 太郎" value="{{ old('last_name') }}"/>
                    </div>
                    <div class="form__error">
                        @if ($errors->has('first_name'))
                        <p class="contact-form__error-message-first-name">{{$errors->first('first_name')}}</p>
                        @endif
                        @if ($errors->has('last_name'))
                        <p class="contact-form__error-message-last-name">{{$errors->first('last_name')}}</p>
                        @endif
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">性別</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-radio">
                    <div class="form__input--radio">
                        <div class="input__radio">
                            <label>
                                <input type="radio" id="male" name="gender" value="1" {{ old('gender')==1 || old('gender')==null ?'checked' : '' }}>
                                <span class="contact-form__gender-text">男性</span>
                            </label>
                        </div>
                        <div class="form__input--radio">
                            <label>
                                <input type="radio" id="female" name="gender" value="2" {{ old('gender')==2 ? 'checked' : '' }}>
                                <span class="contact-form__gender-text">女性</span>
                            </label>
                        </div>
                        <div class="form__input--radio">
                            <label>
                                <input type="radio" id="other" name="gender" value="3" {{ old('gender')==3 ? 'checked' : '' }}>
                                <span class="contact-form__gender-text">その他</span>
                            </label>
                        </div>
                    </div>
                    <div class="form__error">
                        @error('gender')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">メールアドレス</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="email" name="email" placeholder="test@example.com" value="{{ old('email') }}"/>
                    </div>
                    <div class="form__error">
                        @error('email')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">電話番号</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="tel_1" id="tel"  placeholder="080" value="{{ old('tel_1') }}"/>
                        <span class="separator">-</span>
                        <input type="tel" name="tel_2" placeholder="1234" value="{{ old('tel_2') }}"/>
                        <span class="separator">-</span>
                        <input type="tel" name="tel_3" placeholder="5678" value="{{ old('tel_3') }}"/>
                    </div>
                    <div class="form__error">
                        @if ($errors->has('tel_1'))
                        {{$errors->first('tel_1')}}
                        @elseif ($errors->has('tel_2'))
                        {{$errors->first('tel_2')}}
                        @else
                        {{$errors->first('tel_3')}}
                        @endif
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">住所</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="address" placeholder="例: 東京都渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}"/>
                    </div>
                    <div class="form__error">
                        @error('address')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">建物</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <input type="tel" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('address') }}"/>
                    </div>
                    <div class="form__error">
                        <!---->
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせの種類</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--text">
                        <select name="category_id" id="">
                            <option value="">選択してください</option>
                            @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id')==$category->id ? 'selected' : '' }}>{{ $category->content }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form__error">
                        @error('category_id')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__group">
                <div class="form__group-title">
                    <span class="form__label--item">お問い合わせ内容</span>
                    <span class="form__label--required">※</span>
                </div>
                <div class="form__group-content">
                    <div class="form__input--textarea">
                        <textarea name="detail" id="" cols="30" rows="10" placeholder="お問い合わせ内容をご記入ください">{{ old('detail') }}</textarea>
                    </div>
                    <div class="form__error">
                        @error('detail')
                        {{ $message }}
                        @enderror
                    </div>
                </div>
            </div>
            <div class="form__button">
                <button class="form__button-submit" type="submit">確認画面</button>
            </div>
        </form>
    </main>
</body>
</html>