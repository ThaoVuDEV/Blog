@extends('layouts.master')
@section('title')
    update post
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Posts</h1>

        <!-- DataTales Example -->
        <div class="card shadow mb-4">

            <div class="card-body">
                <div class="table-responsive">
                    <div class="container mt-3">
                        <h1>Sửa Thông Tin Bai VIet</h1>
                        <div class="row">
                            <form action="" method="POST" enctype="multipart/form-data">
                                <label for="category_id" class="form-label">Select Category:</label>

                                <select class="form-select form-select-lg" name="category_id" id="category _id" required>
                                    <option value="" selected>--------Chọn--------</option>
                                    @foreach ($categories as $category)
                                        <option value="{{ $category['id'] }}"
                                            @if ($category['id'] == $post['p_category_id']) selected @endif>
                                            {{ $category['name'] }}
                                        </option>
                                    @endforeach
                                </select>
                                <div class="mb-3 mt-3">
                                    <label for="title" class="form-label">title :</label>
                                    <input type="text" class="form-control" id="title" value="{{ $post['p_title'] }}"
                                        required placeholder="Enter title" name="title">
                                </div>
                                <div class="mb-3 mt-3">
                                    <label for="excerpt" class="form-label">excerpt:</label>
                                    <input type="text" class="form-control" id="excerpt"
                                        value="{{ $post['p_excerpt'] }}" required placeholder="Enter excerpt"
                                        name="excerpt">
                                </div>
                                <div class="mb-3">
                                    <label for="content" class="form-label">content:</label>
                                    <textarea class="form-control" id="content" name="content" rows="6" required>{{ $post['p_content'] }}</textarea>
                                </div>
                                <div class="mb-3">
                                    <label for="image" class="form-label">Image:</label>
                                    <input type="file" class="form-control" id="image" name="image">
                                    <img src="{{ $post['p_image'] }}" alt="" width="300px">
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
