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
                            Course
                        </h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
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
                        <h3 class="block-title">View course</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <div class="form-group">
                            <label for="category">Category</label>
                            <select name="category_id" id="category" class="form-control">
                                <option value="">Select Category</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}"
                                        {{ old('category_id', $course->category_id ?? '') == $category->id ? 'selected' : '' }}>
                                        {{ $category->name }}
                                    </option>
                                @endforeach
                            </select>

                            @error('category_id')
                                <div class="alert alert-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label>Title</label>
                            <input type="text" name="title" class="form-control"
                                value="{{ old('title', $course->title) }}" placeholder="Enter name">
                            @error('title')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                        <div class="form-group">
                            <label>Description</label>
                            <textarea name="description" rows="4" class="form-control" placeholder="Enter description">{{ old('description', $course->description) }}</textarea>
                            @error('description')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>

                        <div class="form-group">
                            <label for="duration">Duration (in days):</label>
                            <input type="number" name="duration" id="duration" class="form-control"
                                value="{{ old('duration', $course->duration) }}">
                            @error('duration')
                                <div class="text-danger">{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- END Page Content -->
    </main>
    </div>
@endsection
