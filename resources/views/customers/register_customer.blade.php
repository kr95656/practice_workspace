@extends('layouts.app')

@section('title')
    顧客登録
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2">
                @if (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                @endif
            </div>
        </div>

        <div class="row">
            <div class="col-8 offset-2 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">顧客登録画面</div>
                <form method="POST" action="{{ route('customers.register-customer') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- 氏名 --}}
                    <div class="form-group mt-3">
                        <label for="name">顧客名</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- メールアドレス --}}
                    <div class="form-group mt-3">
                        <label for="email">メールアドレス</label>
                        <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- tel --}}
                    <div class="form-group mt-3">
                        <label for="tel">tel</label>
                        <input id="tel" type="text" class="form-control @error('tel') is-invalid @enderror" name="tel" value="{{ old('tel') }}" required autocomplete="tel" autofocus>
                        @error('tel')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 都道府県 --}}
                    <div class="form-group mt-3">
                        <label for="prefecture">都道府県</label>
                        <input id="prefecture" type="text" class="form-control @error('prefecture') is-invalid @enderror" name="prefecture" value="{{ old('prefecture') }}" required autocomplete="prefecture" autofocus>
                        @error('prefecture')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 市町村 --}}
                    <div class="form-group mt-3">
                        <label for="city">市町村</label>
                        <input id="city" type="text" class="form-control @error('city') is-invalid @enderror" name="city" value="{{ old('city') }}" required autocomplete="city" autofocus>
                        @error('city')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 番地 --}}
                    <div class="form-group mt-3">
                        <label for="street">番地</label>
                        <input id="street" type="text" class="form-control @error('street') is-invalid @enderror" name="street" value="{{ old('street') }}" required autocomplete="street" autofocus>
                        @error('street')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 担当従業員 --}}
                    <div class="form-group mt-3">
                        <label for="employee_id">担当従業員</label>
                        <select name="employee_id" class="custom-select form-control @error('employee_id') is-invalid @enderror">
                            @foreach($employees as $employee)
                                <option value="{{$employee->id}}" {{old('employee_id') == $employee->id ? 'selected' : ''}}>
                                    {{$employee->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('employee_id')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0 mt-3">
                        <button type="submit" class="btn btn-block btn-secondary">
                            顧客登録する
                        </button>
                    </div>

                </form>
            </div>
        </div>
    </div>
@endsection

