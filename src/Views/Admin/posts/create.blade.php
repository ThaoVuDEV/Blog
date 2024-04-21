@extends('layouts.master')
@section('title')
    create post
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Post</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div class="container mt-3">
                        <h1>Thêm mới Người Dùng</h1>

                        <div class="row">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="category_id" class="form-label">Select Category:</label>
                                <select class="form-select form-select-lg" name="category_id" id="category _id">
                                    @foreach ($categories as $cate)
                                        <option value="{{ $cate['id'] }}">{{ $cate['name'] }}</option>
                                    @endforeach
                                </select>

                                <div class="mb-3 mt-3">
                                    <label for="name" class="form-label">title :</label>
                                    <input type="text" class="form-control" id="title" required
                                        placeholder="Enter title" name="title">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="excerpt" class="form-label">excerpt:</label>
                                    <input type="text" class="form-control" id="excerpt" required
                                        placeholder="Enter excerpt" name="excerpt">
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">content:</label>
                                    <input type="text" class="form-control" id="content" required
                                        placeholder="Enter content" name="content">
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
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
