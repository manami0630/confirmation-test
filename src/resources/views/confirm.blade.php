<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/confirm.css') }}" />
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
        <div class="confirm__content">
            <div class="confirm__heading">
                <h2>Confirm</h2>
            </div>
            <form class="form" action="/thanks" method="post">
            @csrf
                <div class="confirm-table">
                    <table class="confirm-table__inner">
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お名前</th>
                            <td class="confirm-table__text">{{ $contacts['first_name'] }}&nbsp;{{ $contacts['last_name'] }}</td>
                                <input type="hidden" name="first_name" value="{{ $contacts['first_name'] }}">
                                <input type="hidden" name="last_name" value="{{ $contacts['last_name'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">性別</th>
                            <td class="confirm-table__text">
                                @if($contacts['gender'] == 1)
                                男性
                                @elseif($contacts['gender'] == 2)
                                女性
                                @else
                                その他
                                @endif
                            </td>
                            <input type="hidden" name="gender" value="{{ $contacts['gender'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">メールアドレス</th>
                            <td class="confirm-table__text">
                                {{ $contacts['email'] }}
                            </td>
                                <input type="hidden" name="email" value="{{ $contacts['email'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">電話番号</th>
                            <td class="confirm-table__text">{{ $contacts['tel_1'] }}{{ $contacts['tel_2'] }}{{ $contacts['tel_3'] }}</td>
                                <input type="hidden" name="tel_1" value="{{ $contacts['tel_1'] }}">
                                <input type="hidden" name="tel_2" value="{{ $contacts['tel_2'] }}">
                                <input type="hidden" name="tel_3" value="{{ $contacts['tel_3'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">住所</th>
                            <td class="confirm-table__text">{{ $contacts['address'] }}</td>
                                <input type="hidden" name="address" value="{{ $contacts['address'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">建物</th>
                            <td class="confirm-table__text">{{ $contacts['building'] }}</td>
                                <input type="hidden" name="building" value="{{ $contacts['building'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせの種類</th>
                            <td class="confirm-table__text">{{ $category->content }}</td>
                                <input type="hidden" name="category_id" value="{{ $contacts['category_id'] }}">
                        </tr>
                        <tr class="confirm-table__row">
                            <th class="confirm-table__header">お問い合わせ内容</th>
                            <td class="confirm-table__text">{{ $contacts['detail'] }}</td>
                                <input type="hidden" name="detail" value="{{ $contacts['detail'] }}">
                        </tr>
                    </table>
                </div>
                <div class="form__button">
                    <input class="confirm-form__send-btn" type="submit" value="送信" name="send">
                    <input class="confirm-form__back-btn" type="submit" value="修正" name="back">
                </div>
            </form>
        </div>
    </main>
</body>
</html>

