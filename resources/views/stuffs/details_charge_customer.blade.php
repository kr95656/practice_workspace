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
                    @endif
                </div>
            </div>
            {{$customer->name}}様
            <div class="row">
                <div class="col-8 offset-2">
                    <ul>
                        <li>メモ機能→テーブル作成して、リレーション組む</li>
                        <li>登録した商品を購入した履歴を表示→テーブル作成する
                            →orderテーブルを使用
                            →
                        </li>
                    </ul>
                </div>
            </div>
            <ul>
                {{--  @foreach($employee_customers->customerLogs as $log)  --}}
                @foreach($employee_customers->employeesLog as $log)
                    <li>
                        {{ $log->log }}<br/>
                        記入時刻：{{ $log->created_at }} 記入者：{{ $log->employee->name }}<br/>
                        <br/>
                    </li>
                @endforeach
            </ul>
            {{--  <div class="my-3">{!! nl2br(e($customer->name)) !!}</div>  --}}
        </div>
    </div>
</div>
@endsection
