@extends('layouts.app')


@section('content')

    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward"></i> </a>
            </div>
        </div>
    </div>

    <div class="mt-8">
        <div class="card text-center">
            <div class="card-header">
                <h3><b>{{$product->name}}</h3></b>
                status: {{$product->status}}
            </div>
            <div class="card-body">
                <div>
                    <h4 class="card-title">Art: {{$product->art}}</h4>
                </div>

                @foreach($product->data as $key => $val )
                    <p class="card-text">{{$key}} : {{$val}}</p>
                @endforeach
            </div>
            <div class="card-footer text-muted">
                {{$product->created_at}}
            </div>
        </div>
    </div>

@endsection
