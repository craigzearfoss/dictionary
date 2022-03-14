@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            @include('admin.term.forms.frmTerm-import')

        </div>
    </div>

    @include('admin.term.forms.edit-form-javascript')

@endsection
