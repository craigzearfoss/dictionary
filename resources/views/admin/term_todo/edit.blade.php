@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Term-Todo</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term_todo.index') }}">Back</a>
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
                    <label for="name" class="form-label">Term</label>
                    <input type="text" class="form-control" name="term" id="term" value="{{ $termTodo->term }}" placeholder="">
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="processed" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="processed" id="active" value="1"
                            {{ $method === 'post' || $termTodo->processed ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="active">Processed</label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="skipped" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="skipped" id="active" value="1"
                            {{ $method === 'post' || $termTodo->skipped ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="active">Skipped</label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="verified" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="verified" id="active" value="1"
                            {{ $method === 'post' || $termTodo->verified ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="active">Verified</label>
                    </div>
                </div>

                <div class="row mb-2">
                    <label for="notes" class="col-sm-2 col-form-label">Notes</label>
                    <div class="col-sm-10">
                        <textarea class="form-control" name="collins_def" id="collins_def" rows="2">{{ $termTodo->notes }}</textarea>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.index') }}" style="width: 5rem;">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.index') }}">Back</a>
                        @if ($method == 'put')
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.edit', $termTodo->id) }}">Re-Edit</a>
                        @else
                            <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.edit', '##') }}">Re-Edit</a>
                        @endif
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term_todo.create') }}">Create Another Term-Todo</a>
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
