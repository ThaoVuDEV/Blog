@extends('layouts.master')
@section('title')
    update category
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Category</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div class="container mt-3">
                        <h1>Sửa Thông Tin Danh Mục</h1>
                        <div class="row">
                            <form action="/admin/categories/{{ $category['id'] }}/update" method="POST" enctype="multipart/form-data">
                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">Name:</label>
                                    <input type="text" class="form-control" id="name" value="{{ $category['name'] }}" required
                                        name="name">
                                </div>
                                <button type="submit" class="btn btn-primary">Submit</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
@endsection
