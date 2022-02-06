@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Edit a Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="thword-btn btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <form id="frmTerm" class="admin-form" action="{{ route('api.v1.term.update', $term->id) }}" method="put">
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
                    <label for="term" class="col-sm-2 col-form-label">Term</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="term" id="term" value="{{ $term->term }}">
                    </div>
                </div>
                <div class="row">
                    <label for="definition" class="col-sm-2 col-form-label">Definition</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="definition" id="definition" value="{{ $term->definition }}">
                    </div>
                </div>
                <div class="row mb-2">
                    <label for="sentence" class="col-sm-2 col-form-label">Sentence</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control" name="sentence" id="sentence" value="{{ $term->sentence }}">
                    </div>
                </div>
                <div class="row double-col-form">
                    <div class="col-6">
                        <div class="row">
                            <label for="en_uk" class="col-sm-3 col-form-label" title="British English">English-UK</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en_us" id="en_uk" value="{{ $term->en_uk }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="en_us" class="col-sm-3 col-form-label" title="American English">English-US</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="en_us" id="en_us" value="{{ $term->en_us }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ar" class="col-sm-3 col-form-label" title="Arabic">Arabic</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ar" id="ar" value="{{ $term->ar }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pt_br" class="col-sm-3 col-form-label" title="Brazilian Portuguese">Port-BR</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pt_br" id="pt_br" value="{{ $term->pt_br }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="zh" class="col-sm-3 col-form-label" title="Chinese">Chinese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="zh" id="zh" value="{{ $term->zh }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="hr" class="col-sm-3 col-form-label" title="Croatian">Croatian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="hr" id="hr" value="{{ $term->hr }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="cs" class="col-sm-3 col-form-label" title="Czech">Czech</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cs" id="cs" value="{{ $term->cs }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="da" class="col-sm-3 col-form-label" title="Danish">Danish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="da" id="da" value="{{ $term->da }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="nl" class="col-sm-3 col-form-label" title="Dutch">Dutch</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="nl" id="nl" value="{{ $term->nl }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="es_es" class="col-sm-3 col-form-label" title="European Spanish">Span-ES</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="es_es" id="es_es" value="{{ $term->es_es }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="fi" class="col-sm-3 col-form-label" title="Finnish">Finnish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fi" id="fi" value="{{ $term->fi }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="fr" class="col-sm-3 col-form-label" title="French">French</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="fr" id="fr" value="{{ $term->fr }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="de" class="col-sm-3 col-form-label" title="German">German</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="de" id="de" value="{{ $term->de }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="el" class="col-sm-3 col-form-label" title="Greek">Greek</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="el" id="el" value="{{ $term->el }}">
                            </div>
                        </div>

                    </div>
                    <div class="col-6">

                        <div class="row">
                            <label for="it" class="col-sm-3 col-form-label" title="Italian">Italian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="it" id="it" value="{{ $term->it }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ja" class="col-sm-3 col-form-label" title="Japanese">Japanese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ja" id="ja" value="{{ $term->ja }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ko" class="col-sm-3 col-form-label" title="Korean">Korean</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ko" id="ko" value="{{ $term->ko }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="no" class="col-sm-3 col-form-label" title="Norwegian">Norwegian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="no" id="no" value="{{ $term->no }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pl" class="col-sm-3 col-form-label" title="Polish">Polish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pl" id="pl" value="{{ $term->pl }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="pt_pt" class="col-sm-3 col-form-label" title="European Portuguese">Port-PT</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="pt_pt" id="pt_pt" value="{{ $term->pt_pt }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ro" class="col-sm-3 col-form-label" title="Romanian">Romanian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ro" id="ro" value="{{ $term->ro }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="ru" class="col-sm-3 col-form-label" title="Russian">Russian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="ru" id="ru" value="{{ $term->ru }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="es_la" class="col-sm-3 col-form-label" title="Latin American Spanish">Span-ES</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="es_la" id="es_la" value="{{ $term->es_la }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="sv" class="col-sm-3 col-form-label" title="Swedish">Swedish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="sv" id="sv" value="{{ $term->sv }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="th" class="col-sm-3 col-form-label" title="Thai">Thai</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="th" id="th" value="{{ $term->th }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="tr" class="col-sm-3 col-form-label" title="Turkish">Turkish</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="tr" id="tr" value="{{ $term->tr }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="uk" class="col-sm-3 col-form-label" title="Ukrainian">Ukrainian</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="uk" id="uk" value="{{ $term->uk }}">
                            </div>
                        </div>
                        <div class="row">
                            <label for="vi" class="col-sm-3 col-form-label" title="Vietnamese">Vietnamese</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="vi" id="vi" value="{{ $term->vi }}">
                            </div>
                        </div>

                        <div class="mb-3">
                            <div class="form-check form-switch">
                                <input type="hidden" role="switch" name="enabled" value="0">
                                <input class="form-check-input" type="checkbox" role="switch" name="enabled" id="enabled" value="1"
                                    {{ $method === 'post' || $term->enabled ? 'checked' : '' }}
                                >
                                <label class="form-check-label form-label" for="enabled">Enabled</label>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row mt-3">
                    <div class="col-12 text-end">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Cancel</a>
                        <button type="submit" class="btn btn-sm btn-primary ajax-save-btn">Save</button>
                    </div>
                </div>

            </div>
        </div>

        <div class="row">
            <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
            </div>
        </div>

    </form>


    <script type="text/javascript"

        const validationRules = {
            term: {
                required: false,
                maxlength: 255
            },
            definition: {
                required: false,
                maxlength: 255
            },
            sentence: {
                required: false,
                maxlength: 255
            },
            en_us: {
                required: false,
                maxlength: 255
            },
            en_uk: {
                required: false,
                maxlength: 255
            },
            ar: {
                required: false,
                maxlength: 255
            },
            cs: {
                required: false,
                maxlength: 255
            },
            da: {
                required: false,
                maxlength: 255
            },
            de: {
                required: false,
                maxlength: 255
            },
            el: {
                required: false,
                maxlength: 255
            },
            es_es: {
                required: false,
                maxlength: 255
            },
            es_la: {
                required: false,
                maxlength: 255
            },
            fi: {
                required: false,
                maxlength: 255
            },
            fr: {
                required: false,
                maxlength: 255
            },
            hr: {
                required: false,
                maxlength: 255
            },
            ja: {
                required: false,
                maxlength: 255
            },
            ko: {
                required: false,
                maxlength: 255
            },
            nl: {
                required: false,
                maxlength: 255
            },
            no: {
                required: false,
                maxlength: 255
            },
            pl: {
                required: false,
                maxlength: 255
            },
            pt_br: {
                required: false,
                maxlength: 255
            },
            pt_pt: {
                required: false,
                maxlength: 255
            },
            ro: {
                required: false,
                maxlength: 255
            },
            ru: {
                required: false,
                maxlength: 255
            },
            sv: {
                required: false,
                maxlength: 255
            },
            th: {
                required: false,
                maxlength: 255
            },
            tr: {
                required: false,
                maxlength: 255
            },
            uk: {
                required: false,
                maxlength: 255
            },
            vi: {
                required: false,
                maxlength: 255
            },
            zh: {
                required: false,
                maxlength: 255
            }
        };

        const validationMessages = {
            term: {
                required: "Please enter the term,",
                maxlength: "Term can be no longer than 255 characters."
            },
            definition: {
                maxlength: "Definition can be no longer than 255 characters."
            },
            sentence: {
                maxlength: "Sentence can be no longer than 255 characters."
            },
            en_us: {
                maxlength: "Can be no longer than 255 characters."
            },
            en_uk: {
                maxlength: "Can be no longer than 255 characters."
            },
            ar: {
                maxlength: "Can be no longer than 255 characters."
            },
            cs: {
                maxlength: "Can be no longer than 255 characters."
            },
            da: {
                maxlength: "Can be no longer than 255 characters."
            },
            de: {
                maxlength: "Can be no longer than 255 characters."
            },
            el: {
                maxlength: "Can be no longer than 255 characters."
            },
            es_es: {
                maxlength: "Can be no longer than 255 characters."
            },
            es_la: {
                maxlength: "Can be no longer than 255 characters."
            },
            fi: {
                maxlength: "Can be no longer than 255 characters."
            },
            fr: {
                maxlength: "Can be no longer than 255 characters."
            },
            hr: {
                maxlength: "Can be no longer than 255 characters."
            },
            it: {
                maxlength: "Can be no longer than 255 characters."
            },
            ja: {
                maxlength: "Can be no longer than 255 characters."
            },
            ko: {
                maxlength: "Can be no longer than 255 characters."
            },
            nl: {
                maxlength: "Can be no longer than 255 characters."
            },
            no: {
                maxlength: "Can be no longer than 255 characters."
            },
            pl: {
                maxlength: "Can be no longer than 255 characters."
            },
            pt_br: {
                maxlength: "Can be no longer than 255 characters."
            },
            pt_pt: {
                maxlength: "Can be no longer than 255 characters."
            },
            ro: {
                maxlength: "Can be no longer than 255 characters."
            },
            ru: {
                maxlength: "Can be no longer than 255 characters."
            },
            sv: {
                maxlength: "Can be no longer than 255 characters."
            },
            th: {
                maxlength: "Can be no longer than 255 characters."
            },
            tr: {
                maxlength: "Can be no longer than 255 characters."
            },
            uk: {
                maxlength: "Can be no longer than 255 characters."
            },
            vi: {
                maxlength: "Can be no longer than 255 characters."
            },
            zh: {
                maxlength: "Can be no longer than 255 characters."
            }
        };

    </script>

@endsection
