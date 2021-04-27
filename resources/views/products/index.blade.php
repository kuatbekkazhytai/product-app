@extends('layouts.app')

@section('content')
    <div class="row mt-16 pt-16">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Products</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('products.create') }}" title="Create a product"> <i class="fas fa-plus-circle"></i>
                </a>
            </div>
        </div>
    </div>

    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{$message}}</p>
        </div>
    @endif


    <table class="table table-bordered table-responsive-lg">
        <tr>
            <th>No</th>
            <th>Name</th>
            <th>Art</th>
            <th>Status</th>
            <th>Data</th>
            <th>Actions</th>

        </tr>
        @foreach ($products as $product)
            <tr>
                <td> {{$loop->iteration}}    </td>
                <td>   {{$product->name}}   </td>
                <td>{{$product->art}}</td>
                <td>{{$product->status}}</td>
                <td>
                    @foreach($product->data as $key=>$val)
                        <li>{{$key}}   {{$val}}</li>
                        @endforeach
                </td>
                <td>
                    <form action="{{route('products.destroy', ['product' => $product->id])}}"  method="POST">

                        <a href="{{route('products.show', ['product' => $product->id])}}" title="show">
                            <i class="fas fa-eye text-success  fa-lg"></i>
                        </a>

                        <a href="{{route('products.edit', ['product' => $product->id])}}" >
                            <i class="fas fa-edit  fa-lg"></i>
                        </a>

                        @csrf
                        @method('DELETE')

                        <button type="submit" title="delete" style="border: none; background-color:transparent;">
                            <i class="fas fa-trash fa-lg text-danger"></i>
                        </button>
                    </form>
                </td>
            </tr>
        @endforeach
    </table>

@endsection
