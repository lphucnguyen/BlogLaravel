@extends('layouts.admin.app')

@section('title', 'Tag')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tag</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Add Tag</h6>
                    </div>
                    <div class="card-body">
                        <form method="POST" action="{{ route('tag.store') }}">
                            @csrf

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="tagName">Tag Name: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="tagName" name="tagName">
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button>                        
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
