@extends('layouts.admin')
@section('title')
<h1>Edit Page</h1>
@endsection

@section('content')
<form action="{{ route('categories.update', $category->id) }}" method="POST" class="form">
    @csrf
    @method('put')
    @include('admin.categories._form' , [
    'button' => 'Update'
    ])
    <!-- include form component from admin/categories/_form.blade.php -->
</form>
@endsection

@section('breadcrump')
<ol class="breadcrumb float-sm-right">
    <li class="breadcrumb-item"><a href="#">Home</a></li>
    <li class="breadcrumb-item"><a href="#">Categories</a></li>
    <li class="breadcrumb-item active">Edit</li>
</ol>
@endsection()