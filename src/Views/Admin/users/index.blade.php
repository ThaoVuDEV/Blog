@extends('layouts.master')
@section('title')
    User Management
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
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tfoot>
                            <tr>
                                <th>ID</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Password</th>
                                <th>Avatar</th>
                                <th>Action</th>
                            </tr>
                        </tfoot>
                        <tbody>
                            @foreach ($users as $user)
                            <tr>
                                <td> {{ $user['id'] }} </td>
                                <td> {{ $user['name'] }} </td>
                                <td> {{ $user['email'] }} </td>
                                <td> {{ $user['password'] }} </td>
                                <td> <img src="{{ $user['avatar'] }}" alt="" width="300px" ></td>
                                <td>
                                    <a href="/admin/users/{{ $user['id'] }}/delete" class="btn btn-danger" onclick="return confirm('Có chắc không nào?')">XÓA</a>
                                    <a href="/admin/users/{{ $user['id'] }}/update" class="btn btn-warning">SỬA</a>
                                    <a href="/admin/users/{{ $user['id'] }}/show"   class="btn btn-info">SHOW</a>
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
