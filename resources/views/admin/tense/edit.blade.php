@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} Tense</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.tense.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 35rem;">

            <form id="frmTense" class="admin-form" action="{{ $action }}" method="{{ $method }}">
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
                    <input type="text" class="form-control" name="name" id="name" value="{{ $tense->name }}" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="abbrev" class="form-label">Abbrev</label>
                    <input type="text" class="form-control" name="abbrev" id="abbrev" value="{{ $tense->abbrev }}" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="structure" class="form-label">Structure</label>
                    <input type="text" class="form-control" name="structure" id="structure" value="{{ $tense->structure }}" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="example1" class="form-label">Example 1</label>
                    <input type="text" class="form-control" name="example1" id="example1" value="{{ $tense->example1 }}" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="example2" class="form-label">Example 2</label>
                    <input type="text" class="form-control" name="example2" id="example2" value="{{ $tense->example2 }}" placeholder="">
                </div>

                <div class="mb-3">
                    <label for="tense" class="form-label">Tense</label>
                    <select class="form-select" name="tense" id="tense">
                        @foreach ($tenseOptions as $key=>$name)
                            <option value="{{ $key }}" {{ $key === $tense->tense ? 'selected="selected"' : '' }}>{{ $name }}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="continuous" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="continuous" id="continuous" value="1"
                            {{ $method === 'post' || $tense->continuous ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="continuous">Continuous</label>
                    </div>
                </div>

                <div class="mb-3">
                    <div class="form-check form-switch">
                        <input type="hidden" role="switch" name="perfect" value="0">
                        <input class="form-check-input" type="checkbox" role="switch" name="perfect" id="perfect" value="1"
                            {{ $method === 'post' || $tense->perfect ? 'checked' : '' }}
                        >
                        <label class="form-check-label form-label" for="perfect">Perfect</label>
                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.index') }}" style="width: 5rem;">Cancel</a>
                        <button type="type" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.index') }}">Back</a>
                @if ($method == 'put')
                    <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.tense.edit', $tense->id) }}">Re-Edit</a>
                @else
                    <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.tense.edit', '##') }}">Re-Edit</a>
                @endif
                <a class="btn btn-sm btn-primary" href="{{ route('admin.tense.create') }}">Create Another Tense</a>
            </div>
        </div>

    </form>


    <script type="text/javascript">

        const validationRules = {
            name: {
                required: true,
                maxlength: 250
            },
            abbrev: {
                required: true,
                maxlength: 10
            },
            structure: {
                maxlength: 100
            },
            example1: {
                maxlength: 100
            },
            example2: {
                maxlength: 100
            },
        };

        const validationMessages = {
            name: {
                required: "Please enter the Tense name.",
                maxlength: "Tense name can be no longer than 250 characters.",
            },
            abbrev: {
                required: "Please enter the Tense abbreviation.",
                maxlength: "Tense name can be no longer than 10 characters.",
            },
            structure: {
                maxlength: "Structure can be no longer than 100 characters.",
            },
            example1: {
                maxlength: "Example 1 can be no longer than 100 characters.",
            },
            example2: {
                maxlength: "Example 2 can be no longer than 100 characters.",
            },
        };

    </script>

@endsection
