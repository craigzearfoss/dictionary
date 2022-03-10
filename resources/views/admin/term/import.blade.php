@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Import a Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            {{-- Creating a new Term. --}}
            <div class="tab-content">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a id="field-input-form-link" href="#field-input-form" class="nav-link" data-bs-toggle="tab">Field Input Form</a>
                    </li>
                    <li class="nav-item">
                        <a id="cut-and-paste-form-link" href="#cut-and-paste-form" class="nav-link active" data-bs-toggle="tab">Cut-and-Paste Form</a>
                    </li>
                </ul>

                <div id="field-input-form" class="tab-pane fade">

                    @include('admin.term.forms.frmTerm')

                </div>

                <div id="cut-and-paste-form" class="tab-pane fade show active">

                    @include('admin.term.forms.frmCutAndPaste')

                </div>

            </div>

        </div>
    </div>

    @include('admin.term.forms.edit-form-javascript')

@endsection
