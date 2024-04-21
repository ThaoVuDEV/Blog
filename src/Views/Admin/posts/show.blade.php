@extends('layouts.master')
@section('title')
    show post
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
        <div class="card-header py-3">
            <a href="/admin/users/create" class="btn btn-info">Thêm mới</a>
        </div>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                    <thead>
                        <tr>
                            <th>Tên Trường</th>
                            <th>Giá trị</th>
                        </tr>
                    </thead>
                    <tfoot>
                        <tr>
                            <th>Tên Trường</th>
                            <th>Giá trị</th>
                        </tr>
                    </tfoot>
                    <tbody>
                        <tr>
                            <td>ID</td>
                            <td> {{ $post['p_id'] }}</td>
                        </tr>
                        <tr>
                            <td>Category Name</td>
                            <td> {{ $post['c_name'] }}</td>
                        </tr>
                        <tr>
                            <td>Title</td>
                            <td> {{ $post['p_title'] }}</td>
                        </tr>
                        <tr>
                            <td>Excerpt</td>
                            <td> {{ $post['p_excerpt'] }}</td>
                        </tr>
                        <tr>
                            <td>Content</td>
                            <td> {{ $post['p_content'] }}</td>
                        </tr>
                        <tr>
                            <td>Image</td>
                            <td><img src="{{ $post['p_image'] }} " width="100px" alt=""></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection