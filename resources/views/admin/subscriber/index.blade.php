@extends('layouts.admin.app')

@section('title', 'Subscriber')

@section('content')
    <!-- Begin Page Content -->
    <div class="container-fluid">

        <!-- Page Heading -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Subscriber</h1>
        </div>

        <!-- Content Row -->
        <div class="row">
            <div class="col-12">
                <!-- DataTales Example -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Subscriber List</h6>
                    </div>
                    <div class="card-body">
                        <div class="table-responsive">
                            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Subscribe Time</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($subscribers as $key => $subscriber)
                                        <tr>
                                            <td>{{ $subscriber->email }}</td>
                                            <td>{{ $subscriber->created_at }}</td>
                                            <td>
                                                @if($subscriber->follow)
                                                    <a class="btn btn-success" href="#">Follow</a>
                                                @else
                                                    <a class="btn btn-danger" href="#">Unfollow</a>
                                                @endif
                                            </td>
                                            <td>
                                                <form method="POST" class="d-inline-block" action="{{ route('subscriber.destroy', $subscriber->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button type="submit"
                                                        class="btn btn-danger btn-circle btn-sm">
                                                        <i class="fas fa-trash"></i>
                                                    </button>                                                
                                                </form>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-2">
                                <ul class="pagination">
                                    <li class="paginate_button page-item previous">
                                        <a class="page-link" href="{{ $firstPageUrl }}">First</a>
                                    </li>
                                    @php
                                    $lastPage = min($currentPage + 5, $lastPage)
                                    @endphp
                                    @for($i = $currentPage; $i <= $lastPage; $i++)
                                        @if($i == $currentPage)
                                            <li class="paginate_button page-item active">
                                                <a class="page-link" href="#">{{ $i }}</a>
                                            </li>
                                        @else
                                            <li class="paginate_button page-item">
                                                <a class="page-link" href="{{ $path . '?page=' . $i }}">{{ $i }}</a>
                                            </li>
                                        @endif
                                    @endfor
                                    <li class="paginate_button page-item next">
                                        <a class="page-link" href="{{ $lastPageUrl }}">Last</a>
                                    </li>
                                </ul>                                    
                            </div>
                        </div>

                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- /.container-fluid -->
@endsection
