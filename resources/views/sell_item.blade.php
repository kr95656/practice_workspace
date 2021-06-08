@extends('layouts.app')

@section('title')
    商品出品登録フォーム
@endsection

@section('content')
    {{-- <form method="POST" action="{{ route('sell-item') }}" enctype="multipart/form-data" id="csvUpload">
        @csrf
        <input type="file" value="ファイルを選択" name="csv_file">
        <button type="submit">インポート</button>
    </form> --}}


    {{-- <p>CSVファイルで商品登録</p>
    <form method="POST" action="{{ route('sell-item') }}" id="csvUpload" enctype="multipart/form-data">
        <div class="row">
            <label class="col-1 text-right" for="form-file-1">File:</label>
            <div class="col-11">
                <div class="custom-file">
                    <input type="file" name="csv_file" class="custom-file-input" id="customFile">
                    <label class="custom-file-label" for="customFile" data-browse="参照">ファイル選択...</label>
                </div>
            </div>
        </div>
        <button type="submit" class="btn btn-success btn-block">送信</button>
    </form> --}}
    @if(Session::has('message'))
        メッセージ：{{ session('message') }}
    @endif

    @if (is_array($errors))
        <div class="flushComment">
            ・CSVインポートエラーが発生しました。以下の内容を確認してください。<br>
            @if (count($errors['registration_errors']) > 0)
                [対象のデータ：新規登録]
                <ul>
                @foreach ($errors['registration_errors'] as $line => $columns)
                    @foreach ($columns as $error)
                    <li>{{ $line }}行目：{{ $error }}</li>
                    @endforeach
                @endforeach
                </ul>
            @endif
            @if (count($errors['update_errors']) > 0)
                [対象のデータ：編集登録]<br>
                <ul>
                @foreach ($errors['update_errors'] as $line => $columns)
                    @foreach ($columns as $error)
                    <li>{{ $line }}行目：{{ $error }}</li>
                    @endforeach
                @endforeach
                </ul>
            @endif
        </div>
    @endif

    <form method="POST" action="{{ route('sell-item') }}" id="csvUpload" enctype="multipart/form-data">
        @csrf

        <input type="file" value="ファイルを選択" name="csv_file">
        <button type="submit">インポート</button>
    </form>
@endsection
