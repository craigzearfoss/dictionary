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
        <div class="container" style="max-width: 40rem;">

            <table class="admin-table table table-bordered table-hover">
                <thead>
                <th colspan="100%" class="text-end">
                    <a class="btn btn-sm btn-primary" href="{{ route('admin.term.edit', $term->id) }}">Edit</a>
                </th>
                </thead>
                <tbody>
                <tr>
                    <th style="max-width: 10rem;">Term</th>
                    <td colspan="2">{{ $term->term }}</td>
                </tr>
                <tr>
                    <th>Part of Speech</th>
                    <td colspan="2">{ { $term->pos_text } }</td>
                </tr>
                <tr>
                    <th>Category</th>
                    <td colspan="2">{ { $term->category_text } }</td>
                </tr>
                <tr>
                    <th>Definition</th>
                    <td colspan="2">{{ $term->definition }}</td>
                </tr>
                <tr>
                    <th>Sentence</th>
                    <td colspan="2">{{ $term->sentance }}</td>
                </tr>
                <tr>
                    <th>American English</th>
                    <td style="border-right: 0;">{{ $term->en_us }}</td>
                    <td class="text-end" style="width: 12rem; border-left: 0;">{ { $term->pron_en_us } }</td>
                </tr>
                <tr>
                    <th>British English</th>
                    <td style="border-right: 0;">{{ $term->en_uk }}</td>
                    <td class="text-end" style="border-left: 0;">{ { $term->pron_en_uk } }</td>
                </tr>
                <tr>
                    <th>Arabic</th>
                    <td colspan="2">{{ $term->ar }}</td>
                </tr>
                <tr>
                    <th>Brazilian Portuguese</th>
                    <td colspan="2">{{ $term->pt_br }}</td>
                </tr>
                <tr>
                    <th>Chinese</th>
                    <td colspan="2">{{ $term->zh }}</td>
                </tr>
                <tr>
                    <th>Croatian</th>
                    <td colspan="2">{{ $term->hr }}</td>
                </tr>
                <tr>
                    <th>Czech</th>
                    <td colspan="2">{{ $term->cs }}</td>
                </tr>
                <tr>
                    <th>Danish</th>
                    <td colspan="2">{{ $term->da }}</td>
                </tr>
                <tr>
                    <th>Dutch</th>
                    <td colspan="2">{{ $term->nl }}</td>
                </tr>
                <tr>
                    <th>European Spanish</th>
                    <td colspan="2">{{ $term->es_es }}</td>
                </tr>
                <tr>
                    <th>Finnish</th>
                    <td colspan="2">{{ $term->fi }}</td>
                </tr>
                <tr>
                    <th>French</th>
                    <td colspan="2">{{ $term->fr }}</td>
                </tr>
                <tr>
                    <th>German</th>
                    <td colspan="2">{{ $term->de }}</td>
                </tr>
                <tr>
                    <th>Greek</th>
                    <td colspan="2">{{ $term->el }}</td>
                </tr>
                <tr>
                    <th>Italian</th>
                    <td colspan="2">{{ $term->it }}</td>
                </tr>
                <tr>
                    <th>Japanese</th>
                    <td colspan="2">{{ $term->ja }}</td>
                </tr>
                <tr>
                    <th>Korean</th>
                    <td colspan="2">{{ $term->ko }}</td>
                </tr>
                <tr>
                    <th>Norwegian</th>
                    <td colspan="2">{{ $term->no }}</td>
                </tr>
                <tr>
                    <th>Polish</th>
                    <td colspan="2">{{ $term->pl }}</td>
                </tr>
                <tr>
                    <th>European Portuguese</th>
                    <td colspan="2">{{ $term->pt_pt }}</td>
                </tr>
                <tr>
                    <th>Chinese</th>
                    <td colspan="2">{{ $term->zh }}</td>
                </tr>
                <tr>
                    <th>Romanian</th>
                    <td colspan="2">{{ $term->ro }}</td>
                </tr>
                <tr>
                    <th>Russian</th>
                    <td colspan="2">{{ $term->ru }}</td>
                </tr>
                <tr>
                    <th>Latin American Spanish</th>
                    <td colspan="2">{{ $term->es_la }}</td>
                </tr>
                <tr>
                    <th>Swedish</th>
                    <td colspan="2">{{ $term->sv }}</td>
                </tr>
                <tr>
                    <th>Thai</th>
                    <td colspan="2">{{ $term->th }}</td>
                </tr>
                <tr>
                    <th>Turkish</th>
                    <td colspan="2">{{ $term->tr }}</td>
                </tr>
                <tr>
                    <th>Ukrainian</th>
                    <td colspan="2">{{ $term->uk }}</td>
                </tr>
                <tr>
                    <th>Vietnamese</th>
                    <td colspan="2">{{ $term->vi }}</td>
                </tr>
                </tbody>
            </table>

        </div>
    </div>

@endsection
