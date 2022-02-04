@extends('admin.partials.layout')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Create a New Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div id="msg-container" class="container message-container alert alert-danger p-2 mb-2 hidden" style="max-width: 40rem;">
            <strong>Whoops!</strong> There were some problems with your input.
            <ul class="mb-0">
                <li>This is test message 1.</li>
                <li>This is test message 2.</li>
            </ul>
        </div>
    </div>

    <ul class="nav nav-tabs" id="myTab">
        <li class="nav-item">
            <a id="field-input-form-link" href="#field-input-form" class="nav-link" data-bs-toggle="tab">Field Input Form</a>
        </li>
        <li class="nav-item">
            <a id="cut-and-paste-form-link" href="#cut-and-paste-form" class="nav-link active" data-bs-toggle="tab">Cut-and-Paste Form</a>
        </li>
    </ul>

    <div class="tab-content">

        <div id="field-input-form" class="tab-pane fade">

            <form id="frmTerm" class="admin-form" action="{{ route('api.v1.term.store') }}" method="post">
                @csrf

                <div class="row">

                    <div class="container form-container" style="max-width: 40rem;">
                        <div class="col">

                            <div class="form-group row">
                                <label for="term" class="col-sm-2 col-form-label text-nowrap">Term</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="term" id="term">
                                </div>
                            </div>

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="pos_text" class="col-sm-4 col-form-label" title="American English">Part of Speech</label>
                                        <div class="col-sm-8">
                                            <input type="text" class="form-control" name="pos_text" id="pos_text">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="category_text" class="col-sm-3 col-form-label" title="category_text">Category</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="category_text" id="category_text">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="form-group row">
                                <label for="definition" class="col-sm-2 col-form-label">Definition</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control mb-1" name="definition" id="definition" rows="2"></textarea>
                                </div>
                            </div>

                            <div class="form-group row">
                                <label for="sentence" class="col-sm-2 col-form-label">Sentence</label>
                                <div class="col-sm-10">
                                    <textarea class="form-control mb-1" name="sentence" id="sentence" rows="2"></textarea>
                                </div>
                            </div>

                            <hr class="mt-2">

                            <div class="row">

                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="en_uk" class="col-sm-3 col-form-label" title="British English">English-UK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="en_uk" id="en_uk">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="pron_en_uk" class="col-sm-3 col-form-label" title="British English pronunciation">pron.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pron_en_uk" id="pron_en_uk">
                                        </div>
                                    </div>
                                </div>

                            </div>

                            <div class="row mb-2">

                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="en_us" class="col-sm-3 col-form-label" title="American English">English-US</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="en_us" id="en_us">
                                        </div>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group row">
                                        <label for="pron_en_us" class="col-sm-3 col-form-label" title="American English pronunciation">pron.</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control" name="pron_en_us" id="pron_en_us">
                                        </div>
                                    </div>
                                </div>

                            </div>

                        </div>

                        <hr class="mt-2">

                        <div class="row double-col-form">

                            <div class="col-6">

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
                                <div class="row">
                                    <label for="it" class="col-sm-3 col-form-label" title="Italian">Italian</label>
                                    <div class="col-sm-9">
                                        <input type="text" class="form-control" name="it" id="it">
                                    </div>
                                </div>

                            </div>
                            <div class="col-6">

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
                                <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Cancel</a>
                                <button type="submit" class="btn btn-sm btn-primary ajax-save-btn">Save</button>
                            </div>
                        </div>

                    </div>
                </div>

                <div class="row">
                    <div class="container success-container text-center mt-4 hidden" style="max-width: 40rem;">
                        <a class="btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
                        <button type="button" class="btn reset-form btn-sm btn-primary">Create Another Term</button>
                    </div>
                </div>

            </form>

        </div>

        <div id="cut-and-paste-form" class="tab-pane fade show active">

            <form id="frmCutAndPaste" class="admin-form" action="{{ route('api.v1.term.store') }}" method="post">

                <div class="row">
                    <div class="col-8">
                        <div class="card m-4">
                            <div class="card-header pl-3 pt-1 pb-1">Source</div>
                            <div class="card-body p-2 pb-0">
                                <div class="form-check">
                                    <input type="radio" class="form-check-input" id="source1" name="source" value="collins" checked>Collins
                                    <label class="form-check-label" for="radio1"></label>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-4 text-end">
                        <button type="button" class="btn btn-sm btn-primary" name="process-cut-and-paste-btn" id="process-cut-and-paste-btn">
                            Process
                        </button>
                    </div>
                </div>

                <div class="row">
                    <div class="col">

                        <div class="container form-container" style="max-width: 60rem;">
                            <div class="form-group">
                                <label for="content">Cut and paste the text into the box below.</label>
                                <textarea class="form-control" name="content" id="content" rows="25" cols="80">
                                </textarea>
                            </div>
                        </div>

                    </div>
                </div>

            </form>

        </div>

    </div>


    <script type="text/javascript">

        const validationRules = {
            term: {
                required: false,
                maxlength: 100
            },
            pos_text: {
                required: false,
                maxlength: 50
            },
            pos_category: {
                required: false,
                maxlength: 50
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
                maxlength: 100
            },
            pron_en_us: {
                required: false,
                maxlength: 100
            },
            en_uk: {
                required: false,
                maxlength: 100
            },
            pron_en_uk: {
                required: false,
                maxlength: 100
            },
            ar: {
                required: false,
                maxlength: 100
            },
            cs: {
                required: false,
                maxlength: 100
            },
            da: {
                required: false,
                maxlength: 100
            },
            de: {
                required: false,
                maxlength: 100
            },
            el: {
                required: false,
                maxlength: 100
            },
            es_es: {
                required: false,
                maxlength: 100
            },
            es_la: {
                required: false,
                maxlength: 100
            },
            fi: {
                required: false,
                maxlength: 100
            },
            fr: {
                required: false,
                maxlength: 100
            },
            hr: {
                required: false,
                maxlength: 100
            },
            ja: {
                required: false,
                maxlength: 100
            },
            ko: {
                required: false,
                maxlength: 100
            },
            nl: {
                required: false,
                maxlength: 100
            },
            no: {
                required: false,
                maxlength: 100
            },
            pl: {
                required: false,
                maxlength: 100
            },
            pt_br: {
                required: false,
                maxlength: 100
            },
            pt_pt: {
                required: false,
                maxlength: 100
            },
            ro: {
                required: false,
                maxlength: 100
            },
            ru: {
                required: false,
                maxlength: 100
            },
            sv: {
                required: false,
                maxlength: 100
            },
            th: {
                required: false,
                maxlength: 100
            },
            tr: {
                required: false,
                maxlength: 100
            },
            uk: {
                required: false,
                maxlength: 100
            },
            vi: {
                required: false,
                maxlength: 100
            },
            zh: {
                required: false,
                maxlength: 100
            }
        };

        const validationMessages = {
            term: {
                required: "Please enter the term.",
                maxlength: "Term can be no longer than 100 characters."
            },
            pos_text: {
                maxlength: "Part of Speech can be no longer than 50 characters."
            },
            category_text: {
                maxlength: "Category can be no longer than 50 characters."
            },
            definition: {
                maxlength: "Definition can be no longer than 100 characters."
            },
            sentence: {
                maxlength: "Sentence can be no longer than 100 characters."
            },
            en_us: {
                maxlength: "Can be no longer than 100 characters."
            },
            pr_en_us: {
                maxlength: "Can be no longer than 100 characters."
            },
            en_uk: {
                maxlength: "Can be no longer than 100 characters."
            },
            pron_en_uk: {
                maxlength: "Can be no longer than 100 characters."
            },
            ar: {
                maxlength: "Can be no longer than 100 characters."
            },
            cs: {
                maxlength: "Can be no longer than 100 characters."
            },
            da: {
                maxlength: "Can be no longer than 100 characters."
            },
            de: {
                maxlength: "Can be no longer than 100 characters."
            },
            el: {
                maxlength: "Can be no longer than 100 characters."
            },
            es_es: {
                maxlength: "Can be no longer than 100 characters."
            },
            es_la: {
                maxlength: "Can be no longer than 100 characters."
            },
            fi: {
                maxlength: "Can be no longer than 100 characters."
            },
            fr: {
                maxlength: "Can be no longer than 100 characters."
            },
            hr: {
                maxlength: "Can be no longer than 100 characters."
            },
            it: {
                maxlength: "Can be no longer than 100 characters."
            },
            ja: {
                maxlength: "Can be no longer than 100 characters."
            },
            ko: {
                maxlength: "Can be no longer than 100 characters."
            },
            nl: {
                maxlength: "Can be no longer than 100 characters."
            },
            no: {
                maxlength: "Can be no longer than 100 characters."
            },
            pl: {
                maxlength: "Can be no longer than 100 characters."
            },
            pt_br: {
                maxlength: "Can be no longer than 100 characters."
            },
            pt_pt: {
                maxlength: "Can be no longer than 100 characters."
            },
            ro: {
                maxlength: "Can be no longer than 100 characters."
            },
            ru: {
                maxlength: "Can be no longer than 100 characters."
            },
            sv: {
                maxlength: "Can be no longer than 100 characters."
            },
            th: {
                maxlength: "Can be no longer than 100 characters."
            },
            tr: {
                maxlength: "Can be no longer than 100 characters."
            },
            uk: {
                maxlength: "Can be no longer than 100 characters."
            },
            vi: {
                maxlength: "Can be no longer than 100 characters."
            },
            zh: {
                maxlength: "Can be no longer than 100 characters."
            }
        };

        const categories = [
            "in colour",
            "metal",
            "place"
        ];

        const langs = {
            en_us: "American English",
            en_uk: "British English",
            ar: "Arabic",
            cs: "Czech",
            da: "Danish",
            de: "German",
            el: "Greek",
            es_es: "European Spanish",
            es_la: "Latin American Spanish",
            fi: "Finnish",
            fr: "French",
            hr: "Croatian",
            it: "Italian",
            ja: "Japanese",
            ko: "Korean",
            nl: "Dutch",
            no: "Norwegian",
            pl: "Polish",
            pt_br: "Brazilian Portuguese",
            pt_pt: "European Portuguese",
            ro: "Romanian",
            ru: "Russian",
            sv: "Swedish",
            th: "Thai",
            tr: "Turkish",
            uk: "Ukrainian",
            vi: "Vietnamese",
            zh: "Chinese",
        }

        document.addEventListener("DOMContentLoaded", function(event) {

            $("#process-cut-and-paste-btn").click((event) => {
                let content = $("#frmCutAndPaste textarea[name=content]").val().trim();
                if (content.length === 0) {
                    alert("Please paste text into the box.");
                    return;
                }

                // add values to field input form
                let lines = content.split(/\r?\n/);
                let line = "";
                let category = "";
                let ctr = 1;
                let langFound = false;
                for (let i=0; i<lines.length; i++) {

                    line = lines[i].trim();
                    if (line.length > 0) {

                        langFound = false;
                        for (var abbrev in langs) {
                            if (langs.hasOwnProperty(abbrev)) {
                                if (line.substring(0, langs[abbrev].length + 1) === `${langs[abbrev]}:`) {
                                    langFound = true;
                                    line = line.substring(langs[abbrev].length + 2)
                                    if (abbrev === "en_us") {
                                        let enUsParts = line.split("/");
                                        line = enUsParts[0].trim();
                                        $("#frmTerm input[name=term]").val(line);
                                        if (enUsParts[1]) {
                                            $("#frmTerm input[name=pron_en_us]").val(enUsParts[1].trim());
                                        }
                                    } else if (abbrev === "en_uk") {
                                        let enUkParts = line.split("/");
                                        line = enUkParts[0].trim();
                                        if (enUkParts[1]) {
                                            $("#frmTerm input[name=pron_en_uk]").val(enUkParts[1].trim());
                                        }
                                        if (enUkParts[2]) {
                                            $("#frmTerm input[name=pos_text]").val(enUkParts[2].trim());
                                        }
                                    }
                                    $(`#frmTerm input[name=${abbrev}]`).val(line);
                                }
                            }
                        }

                        if (!langFound) {
                            if (ctr === 1) {
                                let pos = 0;
                                for (let i = 0; i < categories.length; i++) {
                                    pos = line.indexOf(`${categories[i]} `);
                                    if (pos === 0) {
                                        category = line.substring(0, categories[i].length + 1);
                                        console.log("category ==>" + category + "<==")
                                        $("#frmTerm input[name=category_text]").val(category);
                                        line = line.substring(categories[i].length + 1)
                                        console.log("line ==>" + line + "<==")
                                        break;
                                    }
                                }
                                $("#frmTerm textarea[name=definition]").val(line);
                            } else if (ctr === 2) {
                                $("#frmTerm textarea[name=sentence]").val(line);
                            } else {
                                $("#frmTerm input[name=sentence]").val(line);
                            }
                            ctr++;
                        }
                    }
                }

                // show field input tab
                $('.nav-tabs a[href="#field-input-form"]').tab('show')
            });

            $(".reset-form").click((event) => {

                for (const field in validationRules){
                    $(`#frmTerm input[name=${field}]`).val("");
                    $(`#frmTerm textarea[name=${field}]`).val("");
                }
                $("#frmCutAndPaste textarea[name=content]").val("");

                $(".form-container").removeClass("hidden");
                $('.nav-tabs a[href="#cut-and-paste-form"]').tab('show')
                $(".success-container").addClass("hidden");
            });
        });

    </script>

@endsection
