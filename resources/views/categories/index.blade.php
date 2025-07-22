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
                        <h1 class="flex-sm-fill h3 my-2">categories</h1>
                    </div>
                </div>
            </div>
            <!-- Page Content -->

            <div class="content" style="width:98%">
                <div class="block block-rounded">


                    <div class="block-content tab-content">
                        {{-- TABLE TAB --}}
                        <div class="tab-pane fade show active" id="table" role="tabpanel" aria-labelledby="table-tab">
                            @if (session('success'))
                                <div class="alert alert-success">{{ session('success') }}</div>
                            @endif
                            <div class="block-header d-flex justify-content-between align-items-center">
                                <h3 class="block-title"></h3>
                                <a class="btn btn-success" href="{{ route('categories.create') }}">Add categories</a>
                            </div>

                            <table class="table table-bordered table-striped table-vcenter js-dataTable-full-pagination">
                                <thead>
                                    <tr>
                                        <th class="text-center">No</th>
                                        <th>name</th>

                                        <th>Status</th>
                                        <th class="text-center" style="width: 15%;">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @forelse($categories as $category)
                                        <tr>
                                            <td class="text-center">{{ $loop->iteration }}</td>
                                            <td>{{ $category->name }}</td>

                                            <td class="text-center">
                                                @if ($category->status == 1)
                                                    <a href="{{ route('categories.status', $category->id) }}"
                                                        class="btn btn-sm btn-outline-success">Active</a>
                                                @else
                                                    <a href="{{ route('categories.status', $category->id) }}"
                                                        class="btn btn-sm btn-outline-danger">Inactive</a>
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <div class="btn-group">
                                                    <a href="{{ route('categories.show', $category->id) }}"
                                                        class="btn-sm ml-1" data-toggle="tooltip" title="View">
                                                        <span class="fa fa-eye"></span>
                                                    </a>
                                                    <a href="{{ route('categories.edit', $category->id) }}"
                                                        class="btn-sm ml-1" data-toggle="tooltip" title="Edit">
                                                        <span class="fa fa-edit"></span>
                                                    </a>
                                                    <a href="javascript:void(0);"
                                                        data-remote="{{ route('categories.destroy', $category->id) }}"
                                                        class="btn-sm ml-1 delete-confirm" data-toggle="tooltip"
                                                        title="Delete">
                                                        <span class="fa fa-trash"></span>
                                                    </a>
                                                </div>
                                            </td>
                                        </tr>
                                    @empty
                                        <tr>
                                            <td colspan="6" class="text-center">No category found.</td>
                                        </tr>
                                    @endforelse
                                </tbody>
                            </table>

                            <div class="mt-3">
                                {{ $categories->links() }}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- End Page Content -->

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
                        let form = $('<form>', {
                            'method': 'POST',
                            'action': url
                        });
                        let token = '{{ csrf_token() }}';
                        let hiddenInput = $('<input>', {
                            'type': 'hidden',
                            'name': '_token',
                            'value': token
                        });
                        let method = $('<input>', {
                            'type': 'hidden',
                            'name': '_method',
                            'value': 'DELETE'
                        });
                        form.append(hiddenInput, method);
                        $('body').append(form);
                        form.submit();
                    }
                });
            });
        });
    </script>
@endsection
