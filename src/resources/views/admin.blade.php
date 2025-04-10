<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Contact Form</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/common.css') }}" />
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">
    <script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>
    <link rel="stylesheet" href="{{ asset('css/contacts.css') }}" />
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
                            <a class="header-nav__link" href="/login">logout</a>
                        </li>
                    </ul>
                </nav>
            </div>
        </div>
    </header>
    <main>
        <div class="contact-form__conte">
            <div class="contact-form__heading">
                <h2>Admin</h2>
            </div>
            <div class="search">
                <form method="GET" action="{{ route('contacts.admin') }}">
                    <div class="form__search">
                        <div class="form__input--text">
                            <input type="text" name="search" placeholder="名前やメールアドレスを入力してください" value="{{ request('search') }}"/>
                        </div>
                        <div class="form__input--gender">
                            <select name="select__gender">
                                <option value="">性別</option>
                                <option value="all" {{ request('gender') == 'all' ? 'selected' : '' }}>全て</option>
                                <option value="male" {{ request('gender') == 'male' ? 'selected' : '' }}>男性</option>
                                <option value="female" {{ request('gender') == 'female' ? 'selected' : '' }}>女性</option>
                                <option value="others" {{ request('gender') == 'others' ? 'selected' : '' }}>その他</option>
                            </select>
                        </div>
                        <div class="from__input--content">
                            <select name="select__content">
                                <option value="" disabled selected>お問い合わせの種類</option>
                                <option value="商品のお届けについて">商品のお届けについて</option>
                                <option value="商品の交換について">商品の交換について</option>
                                <option value="商品トラブル">商品トラブル</option>
                                <option value="ショップへのお問い合わせ">ショップへのお問い合わせ</option>
                                <option value="その他">その他</option>
                            </select>
                        </div>
                        <div class="form__input--day">
                            <input type="text" id="datePicker" placeholder="年/月/日" value="{{ request('date') }}"/>
                            <script>
                                document.addEventListener('DOMContentLoaded', function() {
                                    flatpickr("#datePicker", {
                                        dateFormat: "Y/m/d",
                                        defaultDate: "new Datetime()",
                                    });
                                });
                            </script>
                        </div>
                            <button class="button__search" type="submit">検索</button>
                    </div>
                </form>
                <form class="form__button" href="javascript:history.back();">
                    <div class="form__button--reset">
                            <button class="button__reset" type="submit">リセット</button>
                    </div>
                </form>
            </div>
            <div class="text">
                <button class="export" type="submit">
                    エクスポート
                </button>
                <div class="pagination__item">
                    {{ $contacts->links('vendor.pagination.bootstrap-4') }}
                </div>
            </div>
            <form class="form__content">
                <div class="admin-table">
                    <table class="admin-table__inner">
                        <tr class="admin-table__row">
                            <th class="admin-table__header">お名前</th>
                            <th class="admin-table__header">性別</th>
                            <th class="admin-table__header">メールアドレス</th>
                            <th class="admin-table__header">お問い合わせの種類</th>
                            <th class="admin-table__header"></th>
                        </tr>
                        @foreach ($contacts as $contact)
                        <tr class="admin-table__content">
                            <td class="admin-table__text">{{ $contact->last_name }}
                                <span class="space"></span>
                                {{ $contact->first_name }}
                            </td>
                            <td class="admin-table__text">{{ $contact->gender }}</td>
                            <td class="admin-table__text">{{ $contact->email }}</td>
                            <td class="admin-table__text">{{ $contact->category_id }}</td>
                            <td class="admin-table__text">
                                <input type="checkbox" id="modal-{{ $contact->id }}" class="modal-toggle">
                                <label for="modal-{{ $contact->id }}" class="openModal">詳細</label>
                                <div class="modal">
                                    <div class="modal-content">
                                        <label class="close" for="modal-{{ $contact->id }}">&times;</label>
                                        <table>
                                            <tr class="text_table">
                                                <th class="text-header">お名前</th>
                                                <td class="text-content">{{ $contact->last_name }}<span class="space"></span>{{ $contact->first_name }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">性別</th>
                                                <td class="text-content">{{ $contact->gender }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">メール</th>
                                                <td class="text-content">{{ $contact->email }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">電話番号</th>
                                                <td class="text-content">{{ $contact->tel }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">住所</th>
                                                <td class="text-content">{{ $contact->address }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">建物名</th>
                                                <td class="text-content">{{ $contact->building }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">お問い合わせの種類</th>
                                                <td class="text-content">{{ $contact->category_id }}</td>
                                            </tr>
                                            <tr class="text_table">
                                                <th class="text-header">お問い合わせ内容</th>
                                                <td class="text-content">{{ $contact->detail }}</td>
                                            </tr>
                                        </table>
                                        <form class="delete-button" action="{{ route('contacts.destroy', $contact->id) }}" method="POST" style="display: inline;">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit">削除</button>
                                        </form>
                                    </div>
                                </div>
                            </td>
                        </tr>
                    @endforeach
                </div>
            </form>
        </div>
    </main>
</body>
</html>