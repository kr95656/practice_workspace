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
                        {{-- ドロップダウンメニュー --}}
                        <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                            <a class="dropdown-item" href="{{ route('stuffs.charge-customer') }}">
                                <i class="far fa-id-card" style="width: 30px"></i>担当顧客
                            </a>

                            <a class="dropdown-item" href="{{ route('sell-item-csv') }}">
                                <i class="far fa-registered" style="width: 30px"></i>商品登録（CSV）
                            </a>

                            <a class="dropdown-item" href="{{ route('sell-item') }}">
                                <i class="far fa-registered" style="width: 30px"></i>商品登録（単品登録）
                            </a>

                            <a class="dropdown-item" href="{{ route('stuffs.registered-items') }}">
                                <i class="fas fa-store-alt text-left" style="width: 30px"></i>登録した商品
                            </a>

                            <a class="dropdown-item" href="{{ route('stuffs.edit-profile') }}">
                                <i class="far fa-address-card text-left" style="width: 30px"></i>プロフィール編集
                            </a>

                            <a class="dropdown-item" href="{{ route('customers.register-customer') }}">
                                <i class="far fa-address-book text-left" style="width: 30px"></i>顧客登録
                            </a>

                            <a class="dropdown-item" href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">
                                <i class="fas fa-sign-out-alt text-left" style="width: 30px"></i>ログアウト
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none">
                                @csrf
                            </form>
                        </div>
                    </li>
                @endguest
            </ul>
        </div>
    </div>
</nav>
