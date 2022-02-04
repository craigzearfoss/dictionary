@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Edit a Category</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
        </div>
    </div>

    <form id="frmCategory" class="admin-form" action="{{ route('api.v1.category.update', $category->id) }}" method="put">
        @csrf
        @method('PUT')

        <div class="row">
            <div id="msg-container" class="container message-container alert alert-danger p-2 mb-2 hidden" style="max-width: 40rem; ">
                <strong>Whoops!</strong> There were some problems with your input.
                <ul class="mb-0">
                    <li>This is test message 1.</li>
                    <li>This is test message 2.</li>
                </ul>
            </div>
        </div>

        <div class="row">
            <div class="container form-container" style="max-width: 40rem;">

                <div class="mb-3">
                    <label for="name" class="form-label">Name</label>
                    <input type="text" class="form-control" name="name" id="name" value="{{ $category->Name }}" placeholder="">
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn">Save</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.category.index') }}">Back</a>
            </div>
        </div>

    </form>


    <script type="text/javascript">

        const validationRules = {
            name: {
                required: true,
                maxlength: 50
            }
        };

        const validationMessages = {
            abbrev: {
                required: "Please enter the category name.",
                maxlength: "Category name can be no longer than 50 characters.",
            }
        };

    </script>

@endsection
