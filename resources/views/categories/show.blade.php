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
                            category
                        </h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('categories.index') }}">category</a></li>
                                <li class="breadcrumb-item" aria-current="page">
                                    <a class="link-fx" href="javascript:void(0)">Show</a>
                                </li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>

            <!-- Page Content -->
            <div class="content" style="overflow: scroll;display: table;">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">View category</h3>
                    </div>
                    <div class="block-content block-content-full">

                        <div class="col-lg-8">
                            <div class="form-group">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control"
                                    value="{{ old('name', $category->name) }}" placeholder="Enter name" readonly>
                                @error('name')
                                    <div class="alert alert-danger">{{ $message }}</div>
                                @enderror
                            </div>
                            <div class="form-group">
                                <a href="{{ route('categories.index') }}">
                                    <button type="button" class="btn btn-secondary">Back</button>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- END Page Content -->
        </main>
    </div>
@endsection
