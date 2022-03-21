@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="col">
            @include('_partials.message-container')
        </div>
    </div>

    <div class="row">
        <div class="container" style="max-width: 50rem;">

            <table id="term-table" class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="hdr-secondary text-end">
                    <a class="btn btn-sm btn-primary btn-spanishdict" target="_blank" href="https://www.spanishdict.com/translate/{{ $term->term }}">SpanishDict</a>
                    <a class="btn btn-sm btn-primary btn-google" target="_blank" href="https://translate.google.com/?sl=en&tl=es&text={{ $term->term }}&op=translate">Google</a>
                    <a class="btn btn-sm btn-primary btn-cambridge" target="_blank" href="https://dictionary.cambridge.org/dictionary/english/{{ $term->term }}">Cambridge</a>
                    <a class="btn btn-sm btn-primary btn-dictionarydotcom" target="_blank" href="https://www.dictionary.com/browse/{{ $term->term }}">Dictionary.com</a>
                    <a class="btn btn-sm btn-primary btn-collins" target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $term->en_uk }}">Collins</a>
                    <a class="btn btn-sm btn-primaryss" href="{{ route('admin.term.edit', $term->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td>{{ $term->id }}</td>
                </tr>
                <tr>
                    <th>Term</th>
                    <td>{{ $term->term }}</td>
                </tr>
                <tr>
                    <td class="p-0" colspan="2">

                        <table id="term-detail-table" class="admin-table table table-bordered m-0">
                            <tbody>
                            <tr>
                                <th style="width: 7rem;">Part of Speech</th>
                                <td style="width: 8rem;">{{ $term->pos->name }}</td>
                                <th style="width: 5rem;">Category</th>
                                <td style="width: 8rem;">{{ $term->category->name }}</td>
                                <th style="width: 4rem;">Grade</th>
                                <td style="width: 8rem;">{{ $term->grade->name }}</td>
                                <td></td>
                            </tr>
                            </tbody>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Definition</th>
                    <td>{{ $term->definition }}</td>
                </tr>
                <tr>
                    <th>Sentence</th>
                    <td>{{ $term->sentence }}</td>
                </tr>
                <tr>
                    <td colspan="2">

                        @php
                            $half = ceil(count($languageOptions) / 2);
                            $languageCodeParts = [
                                0 => array_slice(array_keys($languageOptions), 0, $half),
                                1 => array_slice(array_keys($languageOptions), $half)
                            ];

                            $half = ceil($collinsLanguages->count() / 2);
                            $collinsLanguageParts = $collinsLanguages->chunk($half);
                        @endphp

                        <div class="row">
                            <div class="col">

                                <div class="row mt-2">
                                    <div class="container form-container">

                                        <div class="tab-content">

                                            <ul class="nav nav-tabs" id="myTab">
                                                <li class="nav-item">
                                                    <a id="field-input-form-link" href="#translations-container" class="nav-link active" data-bs-toggle="tab">Translations</a>
                                                </li>
                                                <li class="nav-item">
                                                    <a id="cut-and-paste-form-link" href="#collins-translations-container" class="nav-link" data-bs-toggle="tab">Collins Translations</a>
                                                </li>
                                            </ul>

                                            <div id="translations-container" class="tab-pane fade show active">

                                                <div class="row">

                                                    @foreach ($languageCodeParts as $languageCodePart)

                                                        <div class="col-6">

                                                            <table class="translations-table admin-table table table-bordered table-hover">
                                                                @foreach ($languageCodePart as $languageCode)
                                                                    <tr>
                                                                        <th>{{ $languageOptions[$languageCode] }}</th>
                                                                        <td>
                                                                            <ul>
                                                                                @foreach ($term->translations($languageCode) as $translation)
                                                                                    <li>
                                                                                        {{ $translation->word }}
                                                                                        <a class="btn-thword btn btn btn-micro btn-primary ml-0 mr-1" target="_blank"
                                                                                           href="{{ route('admin.translate.edit', [$languageCode, $translation->id]) }}"
                                                                                           style="float: right;"
                                                                                           title="Edit translation"
                                                                                        >Edit</a>
                                                                                    </li>
                                                                                @endforeach
                                                                            </ul>
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>

                                                        </div>

                                                    @endforeach

                                                </div>

                                            </div>
                                            <div id="collins-translations-container" class="tab-pane fade">

                                                <div class="row">

                                                    @foreach($collinsLanguageParts as $collinsLanguagePart)

                                                        <div class="col-6">

                                                            <table class="translations-table admin-table table table-bordered table-hover">
                                                                @foreach ($collinsLanguagePart as $language)
                                                                    <tr>
                                                                        <th>{{ $language['short'] }}</th>
                                                                        <td>
                                                                            @php
                                                                                $collinsLang = str_replace('-', '_', "collins_{$language['collins']}");
                                                                            @endphp
                                                                            {{ $term->{$collinsLang} }}
                                                                        </td>
                                                                    </tr>
                                                                @endforeach
                                                            </table>

                                                        </div>

                                                    @endforeach
                                                </div>

                                                <div class="row">
                                                    <div class="col">

                                                        <table id="term-collins-detail-table" class="admin-table table table-bordered m-0">
                                                            <tbody>
                                                            <tr>
                                                            <tr>
                                                                <th>Collins Tag</th>
                                                                <td>{{ $term->collins_tag }}</td>
                                                            </tr>
                                                            <tr>
                                                                <th>Collins Definition</th>
                                                                <td>{{ $term->collins_def }}</td>
                                                            </tr>
                                                            </tr>
                                                            </tbody>
                                                        </table>

                                                    </div>
                                                </div>

                                            </div>

                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </td>

                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
