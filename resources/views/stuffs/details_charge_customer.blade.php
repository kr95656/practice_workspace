@extends('layouts.app')

@section('title')
    {{$customer->name}} 様| 顧客詳細
@endsection

@section('content')
<div class="container">
    <div class="row">
        <div class="col-8 offset-2 bg-white">
            <div class="row mt-3">
                <div class="col-8 offset-2">
                    @if (session('message'))
                    <div class="alert alert-{{ session('type', 'success') }}" role="alert">
                        {{ session('message') }}
                    </div>
                    @elseif (session('status'))
                    <div class="alert alert-success" role="alert">
                        {{ session('status') }}
                    </div>
                    @endif
                </div>
            </div>
            <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">{{$customer->name}}様</div>
            <div class="row">
                <div class="col-8 offset-2">
                    <ul>
                        <li>登録した商品を購入した履歴を表示→テーブル作成する
                            →orderテーブルを使用
                            →
                        </li>
                    </ul>
                </div>
            </div>

            <p><a href="{{ route('stuffs.log', [$customer->id]) }}">メモ新規追加</a></p>
            <p><a href="{{ route('stuffs.charge-customer') }}">顧客一覧に戻る</a></p>
            <table border="1">
                <tr>
                    <th>メモ履歴</th>
                    <th>日時</th>
                    <th>編集</th>
                    <th>削除</th>
                    <th>担当者</th>
                </tr>
                @foreach($customer->employeesLog()->orderBy('updated_at', 'DESC')->get() as $log)
                <tr>
                    <td>{{ $log->log }}</td>
                    <td>{{ $log->updated_at }}</td>
                    <td><a href="{{ route('stuffs.log-edit', [$customer->id, $log->id])}}">編集</a></td>
                    <td><a href="{{ route('stuffs.log-delete', [$customer->id, $log->id])}}">削除</a></td>
                    <th>{{ $log->employee->name}}</th>
                </tr>
                @endforeach
            </table>
        </div>
    </div>
</div>
@endsection
