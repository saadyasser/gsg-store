@extends('layouts.admin')
@section('title')
<!-- add title section that will be added in the admin layout -->
<h1>Creat Page</h1>
@endsection

@section('content')
<!-- add content section that will be added in the admin layout -->
<form action="{{ route('categories.store') }}" method="POST" class="form">
    @csrf
    @include('admin.categories._form', [
    'button' => 'Add'
    ])
</form>
@endsection

@section('breadcrump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active">Create</li>
</ol>
@endsection()