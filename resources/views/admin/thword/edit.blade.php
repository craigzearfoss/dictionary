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

            <form id="frmThword" class="admin-form" action="{{ $action }}" method="{{ $method }}">
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
                                @if ($method == 'put')
                                    <textarea class="form-control" name="synonyms" id="synonyms" rows="10">{{ implode("\n", $thword->getSynonyms()) }}</textarea>
                                @else
                                    <textarea class="form-control" name="synonyms" id="synonyms" rows="10"></textarea>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-1">
                            <label for="antonyms" class="col-sm-2 col-form-label">Antonyms</label>
                            <div class="col-sm-10">
                                @if ($method == 'put')
                                    <textarea class="form-control" name="antonyms" id="antonyms" rows="8">{{ implode("\n", $thword->getAntonyms()) }}</textarea>
                                @else
                                    <textarea class="form-control" name="antonyms" id="antonyms" rows="8"></textarea>
                                @endif
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-12 text-end">
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.index') }}" style="width: 5rem;">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary ajax-save-btn" style="width: 5rem;">Save</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.index') }}">Back</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.edit', $thword->id) }}">Re-Edit</a>
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.thword.create') }}">Create Another Thword</a>
                    </div>
                </div>

            </form>

        </div>
    </div>

    <script type="text/javascript">

        const validationRules = {
            subject: {
                required: true,
                maxlength: 50
            },
            title: {
                required: false,
                maxlength: 255
            },
            description: {
                required: false,
                maxlength: 255
            },
            lang_id: {
            },
            category_id: {
            },
            grade_id: {
                required: true
            },
            synonyms: {
                required: true
            },
            antonyms: {
            },
            terms: {
            },
            active: {
            }
        };

        const validationMessages = {
            term: {
                required: "Please enter the subject.",
                maxlength: "Subject can be no longer than 50 characters."
            },
            title: {
                maxlength: "Title can be no longer than 255 characters."
            },
            description: {
                maxlength: "Description can be no longer than 255 characters."
            },
            lang_id: {
            },
            category_id: {
            },
            grade_id: {
            },
            synonyms: {
                required: "Please enter the synonyms.",
            },
            antonyms: {
            },
            terms: {
            },
            active: {
            }
        };

        /*
        document.addEventListener("DOMContentLoaded", function(event) {

        });
        */

    </script>

@endsection
