@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">Import a Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            <div class="tab-content">

                <ul class="nav nav-tabs" id="myTab">
                    <li class="nav-item">
                        <a id="field-input-form-link" href="#field-input-form" class="nav-link" data-bs-toggle="tab">Field Input Form</a>
                    </li>
                    <li class="nav-item">
                        <a id="cut-and-paste-form-link" href="#cut-and-paste-form" class="nav-link active" data-bs-toggle="tab">Cut-and-Paste Form</a>
                    </li>
                </ul>

                <div id="field-input-form" class="tab-pane fade">

                    @include('admin.term.forms.frmImport-term')

                </div>

                <div id="cut-and-paste-form" class="tab-pane fade show active">

                    @include('admin.term.forms.frmImport-cutAndPaste')

                </div>

            </div>

        </div>
    </div>

    <script type="text/javascript">

        const validationRules = {
            term: {
                required: true,
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
                required: "Please enter the term.",
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

        const partsOfSpeech = @json($partsOfSpeech, JSON_PRETTY_PRINT);

        const collinsTags = [];

        const languages = @json($languageOptions, JSON_PRETTY_PRINT);

        const initialTranslations = @json($initialTranslations, JSON_PRETTY_PRINT);

    </script>

    @include('admin.term.forms.edit-form-javascript')

@endsection
