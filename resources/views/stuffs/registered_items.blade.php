@extends('layouts.app')

@section('title')
    登録した商品一覧
@endsection

@section('content')
    <div class="container">

        <div class="row">
            <div class="col-10 offset-1 bg-white">

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">{{$employee->name}}さんが登録した商品</div>

                @foreach ($items as $item)
                    <div class="d-flex mt-3 border position-relative">
                        {{--  <div>
                            <img src="/storage/item-images/{{$item->image_file_name}}" class="img-fluid" style="height: 140px;">
                        </div>  --}}
                        <div class="flex-fill p-3">
                            <div>
                                @if ($item->isStateSelling)
                                    <span class="badge badge-success px-2 py-2">在庫あり</span>
                                @else
                                    <span class="badge badge-dark px-2 py-2">在庫なし</span>
                                @endif
                                <span>在庫数：{{$item->stock_quantity}}</span>
                            </div>
                            <ul>
                                <li>商品名 : <span class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->name}}</span></li>

                                <li>畜種 : <span class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->secondaryCategory->primaryCategory->name}}</span></li>

                                <li>部位名 : <span class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->secondaryCategory->name}}</span></li>

                                <li>品種 : <span class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->secondaryKind->name}}</span></li>

                                <li>原産地 : <span class="card-title mt-2 font-weight-bold" style="font-size: 20px">{{$item->placeOfOrigin->name}}</span></li>

                                <li>単価 : <i class="fas fa-yen-sign"></i><span class="ml-1">{{number_format($item->price)}}</span></li>

                                <li>登録日 :<i class="far fa-clock ml-3"></i><span>{{$item->created_at->format('Y年n月j日 H:i')}}</span></li>
                            </ul>
                        </div>
                        <a href="{{ route('item', [$item->id]) }}" class="stretched-link"></a>
                    </div>
                @endforeach
            </div>
        </div>
    </div>
@endsection
