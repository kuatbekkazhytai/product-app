@extends('layouts.app')

@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit product</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('products.index') }}" title="Go back"> <i class="fas fa-backward "></i> </a>
            </div>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Error!</strong>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form action="{{ route('products.update', ['product' => $product->id]) }}" method="POST" >
        @csrf
        @method('PATCH')

        <div class="form-group">
            <label for="name">Name</label>
            <input type="text"  name="name" value="{{$product->name}}" class="form-control" id="name" placeholder="name" required>
        </div>
        <div class="form-group">
            <label for="art">Art</label>
            <input type="text"  name="art" value="{{$product->art}}" class="form-control" id="art" placeholder="art" required>
        </div>
        <div class="row">
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="status">Status</label>
                    <select  name="status" class="form-control" id="status">
                        <option value="available">available</option>
                        <option value="unavailable">unavailable</option>
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="color">Color</label>
                    <select  name="data[color]" class="form-control" id="color">
                        @forelse($colors as $color)
                            <option value="{{$color}}">{{$color}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
            <div class="col-sm-4">
                <div class="form-group">
                    <label for="city">City</label>
                    <select  name="data[city]" class="form-control" id="city">
                        @forelse($cities as $city)
                            <option value="{{$city}}">{{$city}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
            <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </form>
@endsection
