@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Category</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 30rem;">

            <form id="frmCategory" class="admin-form" action="{{ $action }}" method="{{ $method }}">
                @csrf
                @if ($method == 'put')
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col">
                        @include('_partials.message-container')
                    </div>
                </div>

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->name }}" placeholder="">
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="enabled" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="enabled" id="enabled" value="1"
                            {{ $method === 'post' || $category->enabled ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="enabled">Enabled</label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn">Save</button>
                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
                        @if ($method == 'post')
                            <a class="btn btn-sm btn-primary" href="{{ route('admin.category.create') }}">Create Another Category</a>
                        @endif
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script type="text/javascript">

        const validationRules = {
            name: {
                required: true,
                maxlength: 50
            }
        };

        const validationMessages = {
            name: {
                required: "Please enter the category name.",
                maxlength: "Category name can be no longer than 50 characters.",
            }
        };

    </script>

@endsection
