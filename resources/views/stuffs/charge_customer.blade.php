@extends('layouts.app')

@section('title')
    担当の顧客一覧
@endsection

@section('content')
    <div class="container">
        <div class="font-weight-bold text-center pb-3 pt-3" style="font-size: 24px">担当の顧客一覧</div>
        @if ($is_employee_customers)
            <div class="row">
                @foreach ($employee_customers as $employee_customer)
                    <div class="col-3 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <small class="text-muted">{{$employee_customer->name}}様</small>
                                {{--  <h5 class="card-title">{{$employee_customer->name}}</h5>  --}}
                            </div>
                            <a href="{{ route('stuffs.details-charge-customer', [$employee_customer->id]) }}" class="stretched-link"></a>
                        </div>
                    </div>
                @endforeach
            </div>
            <div class="d-flex justify-content-center">
                {{$employee_customers->links()}}
            </div>
        @else
            <h5 class="text-center">{{$is_not_customers}}</h5>
        @endif

    </div>


    {{--  <a href="{{route('sell')}}"
    class="bg-secondary text-white d-inline-block d-flex justify-content-center align-items-center flex-column"
    role="button"
    style="position: fixed; bottom: 30px; right: 30px; width: 150px; height: 150px; border-radius: 75px;"
    >
        <div style="font-size: 24px;">出品</div>
        <div>
            <i class="fas fa-camera" style="font-size: 30px;"></i>
        </div>
    </a>  --}}

@endsection
