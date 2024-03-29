@extends('layouts.admin.app')

@section('title', 'Category')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Category</h1>
        </div>

        <!-- Content Row -->
        <form method="POST" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="row">

                <div class="col-md-8">
                    <!-- DataTales Example -->
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="postName">Title: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="text" class="form-control" id="postName" name="title">
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="image">Image: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <input type="file" id="image" class="form-control-file" name="image">
                                        {{-- <input id="image" type="text" onclick="BrowseServer('image')" class="form-control-file" name="image"> --}}
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">
                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="categoryName">Post: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select type="text" class="selectpicker form-control" data-live-search="true" id="categoryName" name="category_id">
                                            @foreach ($categories as $category)
                                                <option value="{{ $category->id }}">{{ $category->categoryName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="tagName">Tag: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select multiple name="tags_id[]" class="selectpicker form-control" id="tagName" data-live-search="true">
                                            @foreach ($tags as $tag)
                                                <option value="{{ $tag->id }}">{{ $tag->tagName }}</option>
                                            @endforeach
                                        </select>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-4">
                                        <label for="categoryName">Publish: </label>
                                    </div>
                                    <div class="col-md-8">
                                        <select type="text" class="form-control" id="categoryName" name="published">
                                            <option value="0">Not Publish</option>
                                            <option value="1">Publish</option>
                                        </select>
                                    </div>
                                </div>
                            </div>
                            <button type="submit" class="btn btn-success">Submit</button> 
                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="shortDescription">Short Description: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea class="form-control" name="shortDescription" id="shortDescription" cols="30" rows="5"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>

                <div class="col-12">
                    <div class="card shadow mb-4">
                        <div class="card-header py-3">
                            <h6 class="m-0 font-weight-bold text-primary">Add Post</h6>
                        </div>
                        <div class="card-body">

                            <div class="form-group">
                                <div class="row">
                                    <div class="col-md-2">
                                        <label for="content">Content: </label>
                                    </div>
                                    <div class="col-md-10">
                                        <textarea name="content" class="form-control" id="contentPost" cols="30" rows="10"></textarea>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
    <!-- /.container-fluid -->
@endsection
