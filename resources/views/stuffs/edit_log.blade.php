@extends('layouts.app')

@section('title')
    ログ編集画面
@endsection

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-8 offset-2 bg-white">

                <div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 20px">
                    <a href="javascript:history.back()">案件詳細に戻る</a>
                </div>

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">ログ編集画面</div>
                <form method="POST" action="{{ route('stuffs.log-edit', [$log->customer_id, $log->id]) }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    <div class="form-group mt-3">
                        <textarea id="log" class="form-control @error('log') is-invalid @enderror" name="log" value="{{ old('log', $log->log)}}" required autocomplete="log" autofocus rows="10" cols="70" >{{ $log->log }}</textarea>
                        @error('log')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0 mt-3">
                        <button type="submit" class="btn btn-block btn-secondary">
                            記録する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
