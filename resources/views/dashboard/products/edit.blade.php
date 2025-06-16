@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Edit Product</h2>
    <form method="POST" action="{{ route('products.update', $product) }}" enctype="multipart/form-data">
        @csrf @method('PUT')
        @include('dashboard.products.form')
        <button class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
