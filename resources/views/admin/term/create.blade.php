@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Create a New Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.lang.index') }}">Back</a>
        </div>
    </div>

    @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Whoops!</strong> There were some problems with your input.<br><br>
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form id="frmTerm" action="{{ route('admin.lang.store') }}" method="POST">
        @csrf

        <div class="row">
            <div class="container admin-form" style="max-width: 40rem;">

                <div class="row">
                    <label for="term" class="col-sm-2 col-form-label">Term</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="term" id="term">
                    </div>
                </div>
                <div class="row">
                    <label for="definition" class="col-sm-2 col-form-label">Definition</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="definition" id="definition">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="sentence" class="col-sm-2 col-form-label">Sentence</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sentence" id="sentence">
                    </div>
                </div>
                <div class="row double-col-form">
                    <div class="col-6">
                        <div class="row">
                            <label for="en_uk" class="col-sm-3 col-form-label" title="British English">English-UK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en_us" id="en_uk">
                            </div>
                        </div>
                        <div class="row">
                            <label for="en_us" class="col-sm-3 col-form-label" title="American English">English-US</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en_us" id="en_us">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ar" class="col-sm-3 col-form-label" title="Arabic">Arabic</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ar" id="ar">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pt_br" class="col-sm-3 col-form-label" title="Brazilian Portuguese">Port-BR</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pt_br" id="pt_br">
                            </div>
                        </div>
                        <div class="row">
                            <label for="zh" class="col-sm-3 col-form-label" title="Chinese">Chinese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="zh" id="zh">
                            </div>
                        </div>
                        <div class="row">
                            <label for="hr" class="col-sm-3 col-form-label" title="Croatian">Croatian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="hr" id="hr">
                            </div>
                        </div>
                        <div class="row">
                            <label for="cs" class="col-sm-3 col-form-label" title="Czech">Czech</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cs" id="cs">
                            </div>
                        </div>
                        <div class="row">
                            <label for="da" class="col-sm-3 col-form-label" title="Danish">Danish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="da" id="da">
                            </div>
                        </div>
                        <div class="row">
                            <label for="nl" class="col-sm-3 col-form-label" title="Dutch">Dutch</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nl" id="nl">
                            </div>
                        </div>
                        <div class="row">
                            <label for="es_es" class="col-sm-3 col-form-label" title="European Spanish">Span-ES</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="es_es" id="es_es">
                            </div>
                        </div>
                        <div class="row">
                            <label for="fi" class="col-sm-3 col-form-label" title="Finnish">Finnish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fi" id="fi">
                            </div>
                        </div>
                        <div class="row">
                            <label for="fr" class="col-sm-3 col-form-label" title="French">French</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fr" id="fr">
                            </div>
                        </div>
                        <div class="row">
                            <label for="de" class="col-sm-3 col-form-label" title="German">German</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="de" id="de">
                            </div>
                        </div>
                        <div class="row">
                            <label for="el" class="col-sm-3 col-form-label" title="Greek">Greek</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="el" id="el">
                            </div>
                        </div>

                    </div>
                    <div class="col-6">

                        <div class="row">
                            <label for="it" class="col-sm-3 col-form-label" title="Italian">Italian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="it" id="it">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ja" class="col-sm-3 col-form-label" title="Japanese">Japanese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ja" id="ja">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ko" class="col-sm-3 col-form-label" title="Korean">Korean</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ko" id="ko">
                            </div>
                        </div>
                        <div class="row">
                            <label for="no" class="col-sm-3 col-form-label" title="Norwegian">Norwegian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no" id="no">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pl" class="col-sm-3 col-form-label" title="Polish">Polish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pl" id="pl">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pt_pt" class="col-sm-3 col-form-label" title="European Portuguese">Port-PT</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pt_pt" id="pt_pt">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ro" class="col-sm-3 col-form-label" title="Romanian">Romanian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ro" id="ro">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ru" class="col-sm-3 col-form-label" title="Russian">Russian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ru" id="ru">
                            </div>
                        </div>
                        <div class="row">
                            <label for="es_la" class="col-sm-3 col-form-label" title="Latin American Spanish">Span-ES</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="es_la" id="es_la">
                            </div>
                        </div>
                        <div class="row">
                            <label for="sv" class="col-sm-3 col-form-label" title="Swedish">Swedish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sv" id="sv">
                            </div>
                        </div>
                        <div class="row">
                            <label for="th" class="col-sm-3 col-form-label" title="Thai">Thai</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th" id="th">
                            </div>
                        </div>
                        <div class="row">
                            <label for="tr" class="col-sm-3 col-form-label" title="Turkish">Turkish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tr" id="tr">
                            </div>
                        </div>
                        <div class="row">
                            <label for="uk" class="col-sm-3 col-form-label" title="Ukrainian">Ukrainian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="uk" id="uk">
                            </div>
                        </div>
                        <div class="row">
                            <label for="vi" class="col-sm-3 col-form-label" title="Vietnamese">Vietnamese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="vi" id="vi">
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <button type="button" class="btn btn-sm btn-primary ajax-save-btn">Submit</button>
                    </div>
                </div>

            </div>
        </div>

    </form>

@endsection
