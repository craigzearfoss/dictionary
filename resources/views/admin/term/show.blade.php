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
                    <a class="btn btn-sm btn-tertiary spanishdict-btn" target="_blank" href="https://www.spanishdict.com/translate/{{ $term->term }}">SpanishDict</a>
                    <a class="btn btn-sm btn-tertiary google-btn" target="_blank" href="https://translate.google.com/?sl=en&tl=es&text={{ $term->term }}&op=translate">Google</a>
                    <a class="btn btn-sm btn-tertiary cambridge-btn" target="_blank" href="https://dictionary.cambridge.org/dictionary/english/{{ $term->term }}">Cambridge</a>
                    <a class="btn btn-sm btn-tertiary dictionarydotcom-btn" target="_blank" href="https://www.dictionary.com/browse/{{ $term->term }}">Dictionary.com</a>
                    <a class="btn btn-sm btn-tertiary collins-btn" target="_blank" href="https://www.collinsdictionary.com/dictionary/english/{{ $term->en_uk }}">Collins</a>
                    <a class="btn btn-sm btn-tertiary" href="{{ route('admin.term.edit', $term->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">ID</th>
                    <td colspan="6">{{ $term->id }}</td>
                </tr>
                <tr>
                    <th>Term</th>
                    <td colspan="6">{{ $term->term }}</td>
                </tr>
                <tr>
                    <td colspan="6" class="p-0">

                        <table class="admin-table table table-bordered m-0">
                            <tr>
                                <th>Part of Speech</th>
                                <td colspan="2">{{ $term->pos->name }}</td>
                                <th>Category</th>
                                <td colspan="2">{{ $term->category->name }}</td>
                                <th>Grade</th>
                                <td colspan="2">{{ $term->grade->name }}</td>
                            </tr>
                        </table>

                    </td>
                </tr>
                <tr>
                    <th>Definition</th>
                    <td colspan="6">{{ $term->definition }}</td>
                </tr>
                <tr>
                    <th>Sentence</th>
                    <td colspan="6">{{ $term->sentence }}</td>
                </tr>
                <tr>
                    <td colspan="6">

                        <div class="row">
                            <div class="col">

                                <div class="card mt-2">
                                    <div class="card-body p-2">

                                        <div class="row">
                                            <div class="col-6">

                                                <table class="admin-table table table-bordered table-hover m-0">
                                                    <tr>
                                                        <th>American English</th>
                                                        <td>{{ $term->collins_en_us }}</td>
                                                        <td>{{ $term->pron_en_us }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>British English</th>
                                                        <td>{{ $term->collins_en_uk }}</td>
                                                        <td>{{ $term->pron_en_uk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Arabic</th>
                                                        <td>{{ $term->collins_ar }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brazilian Portuguese</th>
                                                        <td>{{ $term->collins_pt_br }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Chinese</th>
                                                        <td>{{ $term->collins_zh }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Croatian</th>
                                                        <td>{{ $term->collins_hr }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Czech</th>
                                                        <td>{{ $term->collins_cs }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Danish</th>
                                                        <td>{{ $term->collins_da }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dutch</th>
                                                        <td>{{ $term->collins_nl }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>European Spanish</th>
                                                        <td>{{ $term->collins_es_es }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Finnish</th>
                                                        <td>{{ $term->collins_fi }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>French</th>
                                                        <td>{{ $term->collins_fr }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>German</th>
                                                        <td>{{ $term->collins_de }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Greek</th>
                                                        <td>{{ $term->collins_el }}</td>
                                                        <td></td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="col-6">

                                                <table class="admin-table table table-bordered table-hover m-0">
                                                    <tr>
                                                        <th>Italian</th>
                                                        <td>{{ $term->collins_it }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Japanese</th>
                                                        <td>{{ $term->collins_ja }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Korean</th>
                                                        <td>{{ $term->collins_ko }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Norwegian</th>
                                                        <td>{{ $term->collins_no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Polish</th>
                                                        <td>{{ $term->collins_pl }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>European Portuguese</th>
                                                        <td>{{ $term->collins_pt_pt }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Romanian</th>
                                                        <td>{{ $term->collins_ro }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Russian</th>
                                                        <td>{{ $term->collins_ru }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Latin American Spanish</th>
                                                        <td>{{ $term->collins_es_la }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Swedish</th>
                                                        <td>{{ $term->collins_sv }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Thai</th>
                                                        <td>{{ $term->collins_th }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Turkish</th>
                                                        <td>{{ $term->collins_tr }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ukrainian</th>
                                                        <td>{{ $term->collins_uk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vietnamese</th>
                                                        <td>{{ $term->collins_vi }}</td>
                                                    </tr>
                                                </table>

                                            </div>
                                        </div>

                                    </div>
                                </div>

                            </div>
                        </div>

                    </td>
                </tr>
                <tr>
                    <th>Collins Tag</th>
                    <td colspan="2">{{ $term->collins_tag }}</td>
                </tr>
                <tr>
                    <th>Collins Definition</th>
                    <td colspan="2">{{ $term->collins_def }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
