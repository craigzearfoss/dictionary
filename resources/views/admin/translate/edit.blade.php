@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Edit {{ $language->name }} Translation</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.translate.index', $language->code) }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            <form id="frmTranslation" class="admin-form" action="{{ $action }}" method="put">
                @csrf
                @method('PUT')

                <div class="row">
                    <div class="col">
                        @include('_partials.message-container')
                    </div>
                </div>

                <div class="row">
                    <div class="container form-container" style="max-width: 40rem;">

                        <div class="row">
                            <label for="word" class="col-sm-2 col-form-label">Word</label>
                            <div class="col-sm-10">
                                <input type="text" class="form-control" name="word" id="word" value="{{ $translation->word }}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col p-2">

                                <table id="translate-table" class="admin-table table table-bordered table-hover mb-2">
                                    <tbody>
                                    <tr>
                                        <th>Term</th>
                                        <td>
                                            <a href="{{ route('admin.term.show', $translation->term->id) }}">
                                                {{ $translation->term->term }}
                                            </a>
                                            <a class="btn-thwords btn btn-sm btn-primary" href="{{ route('admin.term.edit', $translation->term->id) }}" style="float:right;">Edit Term</a>
                                        </td>
                                    </tr>
                                    <tr>
                                        <th>Definition</th>
                                        <td>{{ $translation->term->definition }}</td>
                                    </tr>
                                    <tr>
                                        <th>Pos</th>
                                        <td>{{ $translation->term->pos->name }}</td>
                                    </tr>
                                    </tbody>
                                </table>

                            </div>
                        </div>
                        <div class="row"  {!! !in_array($translation->term->pos->name, ['noun', 'pronoun']) ? 'style="display: none;"' : '' !!}>
                            <label for="gender_id" class="col-sm-2 col-form-label">Gender</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="gender_id" id="gender_id" style="width: 7rem;">
                                    @foreach ($genders as $key => $gender)
                                        <option value="{{ $key }}" {!! $key == $translation->gender->id ? 'selected' : '' !!}>
                                            {{ $gender }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row"  {!! !in_array($translation->term->pos->name, ['noun', 'pronoun']) ? 'style="display: none;"' : '' !!}>
                            <label for="plurality_id" class="col-sm-2 col-form-label">Plurality</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="plurality_id" id="plurality_id" style="width: 7rem;">
                                    @foreach ($pluralities as $key => $plurality)
                                        <option value="{{ $key }}" {{ $key == $translation->plurality->id ? 'selected' : '' }}>
                                            {{ $plurality }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="row" {!! $translation->term->pos->name != 'verb' ? 'style="display: none;"' : '' !!}>
                            <label for="tense_id" class="col-sm-2 col-form-label">Tense</label>
                            <div class="col-sm-10">
                                <select class="form-control" name="tense_id" id="tense_id" style="width: 18rem;">
                                    @foreach ($tenses as $key => $tense)
                                        <option value="{{ $key }}" {{ $key == $translation->tense->id ? 'selected' : '' }}>
                                            {{ $tense }}
                                        </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.translate.index', $language->code) }}">Back</a>
                        <a id="reedit-btn" class="btn btn-sm btn-primary" href="{{ route('admin.translate.edit', [$language->code, $translation->id]) }}">Re-Edit</a>
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
            language_id: {
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
            language_id: {
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
