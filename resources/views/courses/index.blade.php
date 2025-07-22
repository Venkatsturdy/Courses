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
                        <h1 class="flex-sm-fill h3 my-2">
                            course
                        </h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">course</a></li>
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
                        <h3 class="block-title">course List</h3>
                        <a class="btn btn-success" href="{{ route('courses.create') }}">Add course</a>
                    </div>

                    <div class="block-content block-content-full" style="overflow-x: auto; width: 100%;">
                        <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                            <thead>
                                <tr>
                                    <th class="text-center">No</th>

                                    <th>Title</th>
                                    <th>Description</th>
                                    <th>Duration</th>
                                    <th>Status</th>
                                    <th class="text-center" style="width: 15%;">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($courses as $course)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>

                                        <td>{{ $course->title }}</td>
                                        <td>{{ $course->description }}</td>
                                        <td>{{ $course->duration }}</td>
                                        <td class="text-center">
                                            @if ($course->status == 1)
                                                <a href="{{ route('courses.status', $course->id) }}"
                                                    class="btn btn-sm btn-outline-success">Active</a>
                                            @else
                                                <a href="{{ route('courses.status', $course->id) }}"
                                                    class="btn btn-sm btn-outline-danger">Inactive</a>
                                            @endif
                                        </td>

                                        <td class="text-center">
                                            <div class="btn-group">
                                                <a href="{{ route('courses.show', $course->id) }}"
                                                    class="btn-sm ml-1 btn-view" data-toggle="tooltip" title="View">
                                                    <span class="fa fa-eye"></span>
                                                </a>

                                                <a href="{{ route('courses.edit', $course->id) }}" class="btn-sm ml-1"
                                                    data-toggle="tooltip" title="Edit">
                                                    <span class="fa fa-edit"></span>
                                                </a>

                                                <a href="javascript:void(0);"
                                                    data-remote="{{ route('courses.destroy', $course->id) }}"
                                                    class="btn-sm ml-1 delete-confirm" data-toggle="tooltip" title="Delete">
                                                    <span class="fa fa-trash"></span>
                                                </a>

                                                <!-- Hidden form -->
                                                <form id="delete-form" method="POST" style="display: none;">
                                                    @csrf
                                                    @method('DELETE')
                                                </form>


                                            </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>

                        {{-- Pagination --}}
                        <div class="mt-3">
                            {{ $courses->links() }}
                        </div>

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
            $('.delete-confirm').on('click', function(event) {
                event.preventDefault();
                let url = $(this).data('remote');

                Swal.fire({
                    title: 'Are you sure?',
                    text: "You won't be able to revert this!",
                    imageUrl: '{{ asset('assets/icon/confirm.gif') }}',
                    imageHeight: 300,
                    imageWidth: 250,
                    showCancelButton: true,
                    confirmButtonColor: '#2cabf5',
                    cancelButtonColor: '#f58787',
                    confirmButtonText: 'Yes, delete it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        let form = $('#delete-form');
                        form.attr('action', url);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
