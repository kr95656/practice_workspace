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
    <p>CSVファイルで商品登録</p>
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
    </form>
    <script>

    </script>
@endsection
