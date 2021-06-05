<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="{{ route('top') }}">
            TOP
            {{-- <img src="" style="height: 39px;" alt=""> --}}
        </a>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav ml-auto">
                {{-- 管理者権限をもっいるユーザーを追加する --}}
                {{-- @guest
                    <li class="nav-item">
                        <a class="btn btn-secondary ml-3" href="{{ route('register') }}" role="button">従業員登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info ml-2" href="{{ route('login') }}" role="button">ログイン</a>
                    </li>
                @endguest --}}
                @guest
                    {{-- 非ログイン --}}
                    <li class="nav-item">
                        <a class="btn btn-secondary ml-3" href="{{ route('register') }}" role="button">会員登録</a>
                    </li>
                    <li class="nav-item">
                        <a class="btn btn-outline-info ml-2" href="{{ route('login') }}" role="button">ログイン</a>
                    </li>
                @else
                    {{-- ログイン済み --}}
                    <li class="nav-item dropdown ml-2">
                        {{-- ログイン情報 --}}
                        <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                            @if (!empty($employee->avatar_file_name))
                                <img src="/storage/avatars/{{$employee->avatar_file_name}}" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;" alt="プロフィール画像">
                            @else
                                <img src="/images/avatar-default.svg" class="rounded-circle" style="object-fit: cover; width: 35px; height: 35px;" alt="デフォルトの画像">
                            @endif
                            {{ $employee->name }} <span class="caret"></span>
                        </a>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
