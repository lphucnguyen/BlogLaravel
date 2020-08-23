@extends('layouts.admin.app')

@section('title', 'Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Contact</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Contact Info</h6>
                    </div>
                    <div class="card-body">
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="menuTitle">Name: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control">{{ $contact->name }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="link">Email: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control">{{ $contact->email }}</p>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="row">
                                <div class="col-md-2">
                                    <label for="link">Message: </label>
                                </div>
                                <div class="col-md-10">
                                    <p class="form-control">{{ $contact->message }}</p>
                                </div>
                            </div>
                        </div>
                        <a class="btn btn-danger" href="{{ route('contact.index') }}">Back</a>                        
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
