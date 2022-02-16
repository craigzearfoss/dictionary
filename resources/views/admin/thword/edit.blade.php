@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Thword</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.thword.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            <form id="frmTerm" class="admin-form" action="{{ $action }}" method="{{ $method }}">
                @csrf
                @if ($method == 'put')
                    @method('PUT')
                @endif

                <div class="row">
                    <div class="col">
                        @include('_partials.message-container')
                    </div>
                </div>

                <div class="row">
                    <div class="container form-container" style="max-width: 40rem;">

                        <div class="row">
                            <label for="subject" class="col-sm-2 col-form-label">Subject</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="subject" id="subject" value="{{ $thword->subject }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="subject" class="col-sm-2 col-form-label">Title</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="title" id="title" value="{{ $thword->title }}">
                            </div>
                        </div>
                        <div class="row mb-1">
                            <label for="description" class="col-sm-2 col-form-label">Description</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="description" id="description" rows="2">{{ $thword->description }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label for="lang_id" class="col-sm-2 col-form-label">Language</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="lang_id" id="lang_id" style="width: 12rem;">
                                    @foreach ($langs as $key => $lang)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thword->lang->id) ? 'selected' : '' }}>
                                            {{ $lang }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="category_id" class="col-sm-2 col-form-label">Category</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="category_id" id="category_id" style="width: 12rem;">
                                    @foreach ($categories as $key => $category)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thword->category->id) ? 'selected' : '' }}>
                                            {{ $category }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="grade_id" class="col-sm-2 col-form-label">Grade</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="grade_id" id="grade_id" style="width: 12rem;">
                                    @foreach ($grades as $key => $grade)
                                        <option value="{{ $key }}" {{ ( $method == 'put' && $key == $thword->grade->id) ? 'selected' : '' }}>
                                            {{ $grade }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row">
                            <label for="synonyms" class="col-sm-2 col-form-label">Synonyms</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="synonyms" id="synonyms" rows="12">{{ $thword->synonyms }}</textarea>
                            </div>
                        </div>
                        <div class="row">
                            <label for="antonyms" class="col-sm-2 col-form-label">Antonyms</label>
                            <div class="col-sm-10">
                                <textarea class="form-control" name="antonyms" id="antonyms" rows="12">{{ $thword->antonyms }}</textarea>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.index') }}">Back</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.create') }}">Create Another Thword</a>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script type="text/javascript">


    </script>

@endsection
