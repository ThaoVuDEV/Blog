@extends('layouts.master')
@section('title')
    Post Management
@endsection
@section('content')
    <div class="container-fluid">

        <!-- Page Heading -->
        <h1 class="h3 mb-2 text-gray-800">Post</h1>
        
        <!-- DataTales Example -->
        <div class="card shadow mb-4">
            <div class="card-header py-3">
                <a href="/admin/posts/create" class="btn btn-info">Thêm mới</a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>category_id</th>
                                <th>title</th>
                                <th>excerpt</th>
                                <th>image</th>
                                <th>Chức và Năng</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>category_id</th>
                                <th>title</th>
                                <th>excerpt</th>
                                <th>image</th>
                                <th>Chức và Năng</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($posts as $post)
                            <tr>
                                <td> {{ $post['p_id'] }} </td>
                                <td> {{ $post['c_name'] }} </td>
                                <td> {{ $post['p_title'] }} </td>
                                <td> {{ $post['p_excerpt'] }} </td>
                                <td><img src="{{ $post['p_image'] }}" alt=""width="100px" height="100"></td>
                                <td>
                                    <a href="/admin/posts/{{ $post['p_id'] }}/show" class="btn btn-info">show</a>
                                    <a href="/admin/posts/{{ $post['p_id'] }}/update" class="btn btn-warning">Sửa</a>
                                    <a href="/admin/posts/{{ $post['p_id'] }}/delete" class="btn btn-danger"
                                        onclick="return confirm('Có chắc không nào?')">Xóa</a>
                                </td>
                            </tr>
                        @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </div>
@endsection
    