@extends('layouts.app')

@section('content')
<div class="container">
    <h2>Add New Product</h2>
    <form method="POST" action="{{ route('products.store') }}" enctype="multipart/form-data">
        @csrf
        @include('dashboard.products.form')
        <button class="btn btn-success">Save</button>
    </form>
</div>
@endsection
