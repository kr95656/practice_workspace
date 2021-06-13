@extends('layouts.app')

@section('title')
    単品：商品出品登録フォーム
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

                <div class="font-weight-bold text-center border-bottom pb-3 pt-3" style="font-size: 24px">商品を出品する</div>
                <form method="POST" action="{{ route('sell-item') }}" class="p-5" enctype="multipart/form-data">
                    @csrf

                    {{-- 商品画像 --}}
                    {{-- <div>商品画像</div>
                    <span class="item-image-form image-picker">
                        <input type="file" name="item-image" class="d-none" accept="image/png,image/jpeg,image/gif" id="item-image" />
                        <label for="item-image" class="d-inline-block" role="button">
                            <img src="/images/item-image-default.png" style="object-fit: cover; width: 300px; height: 300px;">
                        </label>
                    </span>
                    @error('item-image')
                        <div style="color: #E4342E;" role="alert">
                            <strong>{{ $message }}</strong>
                        </div>
                    @enderror --}}

                    {{-- 商品名 --}}
                    <div class="form-group mt-3">
                        <label for="name">商品名</label>
                        <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 商品の説明 --}}
                    <div class="form-group mt-3">
                        <label for="description">商品の説明</label>
                        <textarea id="description" class="form-control @error('description') is-invalid @enderror" name="description" required autocomplete="description" autofocus>{{ old('description') }}</textarea>
                        @error('description')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- カテゴリ --}}
                    <div class="form-group mt-3">
                        <label for="category">カテゴリ</label>
                        <select name="category" class="custom-select form-control @error('category') is-invalid @enderror">
                            @foreach ($categories as $category)
                                <optgroup label="{{$category->name}}">
                                    @foreach($category->secondaryCategories as $secondary)
                                        <option value="{{$secondary->id}}" {{old('category') == $secondary->id ? 'selected' : ''}}>
                                            {{$secondary->name}}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('category')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 品種 --}}
                    <div class="form-group mt-3">
                        <label for="kind">品種</label>
                        <select name="kind" class="custom-select form-control @error('kind') is-invalid @enderror">
                            @foreach ($kinds as $kind)
                                <optgroup label="{{$kind->name}}">
                                    @foreach($kind->secondaryKinds as $secondary_kind)
                                        <option value="{{$secondary_kind->id}}" {{old('kind') == $secondary_kind->id ? 'selected' : ''}}>
                                            {{$secondary_kind->name}}
                                        </option>
                                    @endforeach
                                </optgroup>
                            @endforeach
                        </select>
                        @error('kind')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 商品の等級 --}}
                    <div class="form-group mt-3">
                        <label for="condition">商品の等級</label>
                        <select name="condition" class="custom-select form-control @error('condition') is-invalid @enderror">
                            @foreach ($conditions as $condition)
                                <option value="{{$condition->id}}" {{old('condition') == $condition->id ? 'selected' : ''}}>
                                    {{$condition->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('condition')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 商品の原産地 --}}
                    <div class="form-group mt-3">
                        <label for="place_of_origin">商品の原産地</label>
                        <select name="place_of_origin" class="custom-select form-control @error('place_of_origin') is-invalid @enderror">
                            @foreach ($place_of_origins as $place_of_origin)
                                <option value="{{$place_of_origin->id}}" {{old('place_of_origin') == $place_of_origin->id ? 'selected' : ''}}>
                                    {{$place_of_origin->name}}
                                </option>
                            @endforeach
                        </select>
                        @error('condition')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{--  消費期限  --}}
                    <div class="form-group mt-3">
                        <label for="expiration_date-field">消費期限</label>
                        <div class="input-group date datetimepicker" id="expiration_date" data-target-input="nearest">
                            <input type="text" name="expiration_date"  id="expiration_date-field" class="form-control datetimepicker-input @error('expiration_date') is-invalid @enderror" data-target="#expiration_date" />
                            <div class="input-group-append" data-target="#expiration_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                            @error('expiration_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{--  加工日  --}}
                    <div class="form-group mt-3">
                        <label for="processing_date-field">加工日</label>
                        <div class="input-group date datetimepicker" id="processing_date" data-target-input="nearest">
                            <input type="text" name="processing_date"  id="processing_date-field" class="form-control datetimepicker-input @error('processing_date') is-invalid @enderror" data-target="#processing_date" />
                            <div class="input-group-append" data-target="#processing_date" data-toggle="datetimepicker">
                                <div class="input-group-text"><i class="far fa-calendar"></i></div>
                            </div>
                            @error('processing_date')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror
                        </div>
                    </div>

                    {{-- 販売価格 --}}
                    <div class="form-group mt-3">
                        <label for="price">販売価格</label>
                        <input id="price" type="number" class="form-control @error('price') is-invalid @enderror" name="price" value="{{ old('price') }}" required autocomplete="price" autofocus>
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    {{-- 在庫数 --}}
                    <div class="form-group mt-3">
                        <label for="stock_quantity">在庫数</label>
                        <input id="stock_quantity" type="number" class="form-control @error('stock_quantity') is-invalid @enderror" name="stock_quantity" value="{{ old('stock_quantity') }}" required autocomplete="stock_quantity" autofocus>
                        @error('stock_quantity')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="form-group mb-0 mt-3">
                        <button type="submit" class="btn btn-block btn-secondary">
                            出品する
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
