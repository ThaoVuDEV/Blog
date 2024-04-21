@extends('layouts.master')
@section('title')
    show user
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
                            <td> {{ $user['id'] }}</td>
                        </tr>
                        <tr>
                            <td>Category Name</td>
                            <td> {{ $user['name'] }}</td>
                        </tr>
                        <tr>
                            <td>Email</td>
                            <td> {{ $user['email'] }}</td>
                        </tr>
                        <tr>
                            <td>Password</td>
                            <td> {{ $user['password'] }}</td>
                        </tr>
                        <tr>
                            <td>Avatar</td>
                            <td> <img src="{{ $user['avatar'] }}" alt="" width="100px"></td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </div>

</div>
@endsection