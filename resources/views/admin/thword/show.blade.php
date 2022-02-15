@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Show Language</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
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
                                                        <td>{{ $term->en_us }}</td>
                                                        <td>{{ $term->pron_en_us }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>British English</th>
                                                        <td>{{ $term->en_uk }}</td>
                                                        <td>{{ $term->pron_en_uk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Arabic</th>
                                                        <td>{{ $term->ar }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Brazilian Portuguese</th>
                                                        <td>{{ $term->pt_br }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Chinese</th>
                                                        <td>{{ $term->zh }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Croatian</th>
                                                        <td>{{ $term->hr }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Czech</th>
                                                        <td>{{ $term->cs }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Danish</th>
                                                        <td>{{ $term->da }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Dutch</th>
                                                        <td>{{ $term->nl }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>European Spanish</th>
                                                        <td>{{ $term->es_es }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Finnish</th>
                                                        <td>{{ $term->fi }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>French</th>
                                                        <td>{{ $term->fr }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>German</th>
                                                        <td>{{ $term->de }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Greek</th>
                                                        <td>{{ $term->el }}</td>
                                                        <td></td>
                                                    </tr>
                                                </table>

                                            </div>
                                            <div class="col-6">

                                                <table class="admin-table table table-bordered table-hover m-0">
                                                    <tr>
                                                        <th>Italian</th>
                                                        <td>{{ $term->it }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Japanese</th>
                                                        <td>{{ $term->ja }}</td>
                                                        <td></td>
                                                    </tr>
                                                    <tr>
                                                        <th>Korean</th>
                                                        <td>{{ $term->ko }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Norwegian</th>
                                                        <td>{{ $term->no }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Polish</th>
                                                        <td>{{ $term->pl }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>European Portuguese</th>
                                                        <td>{{ $term->pt_pt }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Romanian</th>
                                                        <td>{{ $term->ro }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Russian</th>
                                                        <td>{{ $term->ru }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Latin American Spanish</th>
                                                        <td>{{ $term->es_la }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Swedish</th>
                                                        <td>{{ $term->sv }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Thai</th>
                                                        <td>{{ $term->th }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Turkish</th>
                                                        <td>{{ $term->tr }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Ukrainian</th>
                                                        <td>{{ $term->uk }}</td>
                                                    </tr>
                                                    <tr>
                                                        <th>Vietnamese</th>
                                                        <td>{{ $term->vi }}</td>
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
