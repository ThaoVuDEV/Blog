@extends('layouts.master')
@section('title')
    create user
@endsection
@section('content')
<div class="container-fluid">

    <!-- Page Heading -->
    <h1 class="h3 mb-2 text-gray-800">Users</h1>
    
    <!-- DataTales Example -->
    <div class="card shadow mb-4">
       
        <div class="card-body">
            <div class="table-responsive">
                <div class="container mt-3">
                    <h1>Thêm mới Người Dùng</h1>
            
                    <div class="row">
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="mb-3 mt-3">
                                <label for="name" class="form-label">Name:</label>
                                <input type="text" class="form-control" id="name" required placeholder="Enter name"
                                    name="name">
                            </div>
                            <div class="mb-3 mt-3">
                                <label for="email" class="form-label">Email:</label>
                                <input type="email" class="form-control" id="email" required placeholder="Enter email"
                                    name="email">
                            </div>
                            <div class="mb-3">
                                <label for="password" class="form-label">Password:</label>
                                <input type="password" class="form-control" id="password" required placeholder="Enter password"
                                    name="password">
                            </div>
                            <div class="mb-3">
                                <label for="avatar" class="form-label">Avatar:</label>
                                <input type="file"  class="form-control" id="avatar" name="avatar">
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