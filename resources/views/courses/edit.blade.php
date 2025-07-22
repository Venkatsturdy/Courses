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
                        <h1 class="flex-sm-fill h3 my-2">Course</h1>
                        <nav class="flex-sm-00-auto ml-sm-3" aria-label="breadcrumb">
                            <ol class="breadcrumb breadcrumb-alt">
                                <li class="breadcrumb-item"><a href="{{ route('courses.index') }}">Course</a></li>
                                <li class="breadcrumb-item" aria-current="page">Edit</li>
                            </ol>
                        </nav>
                    </div>
                </div>
            </div>
            <!-- Page Content -->

            <div class="content">
                <div class="block block-rounded">
                    <div class="block-header">
                        <h3 class="block-title">Edit</h3>
                    </div>
                    <div class="block-content block-content-full">
                        <form action="{{ route('courses.update', $course->id) }}" method="POST"
                            enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
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



                            <button type="submit" class="btn btn-primary">Update course</button>
                        </form>
                    </div>
                </div>
            </div>
            <!--End Page Content -->

        </main>
    </div>

    {{-- Font Awesome (add this in your layout once if not already included) --}}
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">

    {{-- Image Removal Script --}}
    <script>
        document.addEventListener('DOMContentLoaded', function() {
            document.querySelectorAll('.remove-image-btn').forEach(button => {
                button.addEventListener('click', function() {
                    const container = this.closest('.image-container');
                    const removedImage = container.querySelector('input[name="existing_images[]"]')
                        .value;

                    const input = document.createElement('input');
                    input.type = 'hidden';
                    input.name = 'remove_images[]';
                    input.value = removedImage;

                    document.querySelector('form').appendChild(input);
                    container.remove();
                });
            });
        });
    </script>
@endsection
