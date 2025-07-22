@extends('layouts.app')

@section('content')
    <div id="page-container"
        class="sidebar-o sidebar-dark enable-page-overlay side-scroll page-header-fixed main-content-narrow">
        @include('layouts.topnavbar')
        @include('layouts.sidebar')

        <main id="main-container">
            <div class="bg-body-light">
                <div class="content content-full">
                    <div class="d-flex flex-column flex-sm-row justify-content-sm-between align-items-sm-center">
                        <h1 class="flex-sm-fill h3 my-2">Admins</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('admins.index') }}">Admin Users</a></li>
                                <li class="breadcrumb-item" aria-current="page">List</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="content" style="width:98%">
                <div class="block block-rounded">
                    <div class="block-header d-flex justify-content-between align-items-center">
                        <h3 class="block-title">Admins List</h3>
                        <a class="btn btn-success" href="{{ route('admins.create') }}">ADD</a>
                    </div>

                    <div class="block-content block-content-full">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center" style="width: 80px;">ID</th>
                                    <th class="text-center">Name</th>
                                    <th class="d-none d-sm-table-cell text-center" style="width: 30%;">Email</th>
                                    <th class="d-none d-sm-table-cell text-center" style="width: 15%;">Status</th>
                                    <th class="text-center" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $admin)
                                    <tr>
                                        <td class="text-center font-size-sm">{{ $loop->iteration }}</td>
                                        <td class="font-w600 font-size-sm">{{ $admin->name }}</td>
                                        <td class="d-none d-sm-table-cell font-size-sm">{{ $admin->email }}</td>

                                        <td class="d-none d-sm-table-cell text-center">
                                            @if ($admin->is_super_admin)
                                                <span class="badge badge-success">Super Admin</span>
                                            @else
                                                @if ($admin->status == 1)
                                                    <a href="{{ route('admin.status', [$admin->id]) }}"
                                                        class="btn btn-sm btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('admin.status', [$admin->id]) }}"
                                                        class="btn btn-sm btn-outline-danger">Inactive</a>
                                                @endif
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ Route('admins.show', [$admin->id]) }}"
                                                    class="btn-sm ml-1 btn-view" data-toggle="tooltip" title="View">
                                                    <span class="fa fa-eye"></span>
                                                </a>
                                                <a href="{{ route('admins.edit', [$admin->id]) }}" class="btn-sm ml-1"
                                                    data-toggle="tooltip" title="Edit">
                                                    <span class="fa fa-edit"></span>
                                                </a>
                                                @if (!$admin->is_super_admin)
                                                    <a href="#"
                                                        data-remote="{{ Route('admin.delete', [$admin->id]) }}"
                                                        class="btn-sm ml-1 delete-confirm" data-toggle="tooltip"
                                                        title="Delete">
                                                        <span class="fa fa-trash"></span>
                                                    </a>
                                                @endif
                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
    </div>
@endsection

@section('script')
    <script>
        $(function() {
            var table = $('.table');
            table.on('click', '.delete-confirm[data-remote]', function(event) {
                event.preventDefault();
                let url = $(this).data('remote');
                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    imageUrl: '{{ asset('assets/icon/confirm.gif') }}',
                    imageHeight: 300,
                    imageWeight: 250,
                    showCancelButton: true,
                    confirmButtonColor: '#2cabf5',
                    cancelButtonColor: '#f58787',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        window.location.href = url;
                    }
                })
            });
        });
    </script>
@endsection
