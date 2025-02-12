@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} Collins Tag</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.collins_tag.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 30rem;">

            <form id="frmCollinsTag" class="admin-form" action="{{ $action }}" method="{{ $method }}">
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $collinsTag->name }}" placeholder="">
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="active" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="active" id="active" value="1"
                            {{ $method === 'post' || $collinsTag->active ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="active"></label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.index') }}" style="width: 5rem;">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.index') }}">Back</a>
                @if ($method == 'put')
                    <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.edit', $collinsTag->id) }}">Re-Edit</a>
                @else
                    <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.edit', '##') }}">Re-Edit</a>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('admin.collins_tag.create') }}">Create Another Collins Tag</a>
            </div>
        </div>

    </form>


    <script type="text/javascript">

        const validationRules = {
            name: {
                required: true,
                maxlength: 80
            }
        };

        const validationMessages = {
            name: {
                required: "Please enter the Collins tag name.",
                maxlength: "Collins tag name can be no longer than 50 characters.",
            }
        };

    </script>

@endsection
