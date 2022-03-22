@extends('admin._layouts.main')

@section('content')

    <div class="row mt-2">
        <div class="col-8">
            <h1 class="page-title">{{ $method === 'post' ? 'Create' : 'Edit' }} a Term</h1>
        </div>
        <div class="title-buttons col-4 text-end">
            <a class="btn-thword btn btn-sm btn-primary" href="{{ route('admin.term.index') }}">Back</a>
        </div>
    </div>

    <div class="row">
        <div class="container form-container" style="max-width: 40rem;">

            @include('admin.term.forms.frmTerm')

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

        function getTranslationInputDiv(languageCode, index, translation, includeRemoveBtn, isItANewInput) {

            const dataNewAttr = isItANewInput
                ? 'data-new="1"'
                : "";
            const removeBtn = includeRemoveBtn
                ? `<button
                       type="button"
                       class="btn-micro btn-micro btn-delete-translation"
                       onclick="$('#${languageCode}-${index}-input-container').remove();"
                       title="Remove translation"
                   >x</button>`
                : ""

            return `
<div class="row" id="${languageCode}-${index}-input-container" ${dataNewAttr}>
    <div class="col">
        <input
            type="text"
            class="form-control language-translation"
            name="${languageCode}[]"
            id="${languageCode}_${index}"
            data-language-code="${languageCode}"
            value="${translation}"
        >
        <button
            type="button"
            class="btn-micro btn-fill-translation"
            onclick="fillTranslation('${languageCode}_${index}');"
            title="Fill / validate translation"
        >F</button>
        ${removeBtn}
    </div>
</div>
`;
        }

        function fillTranslation(inputId) {
            let input = $(`#${inputId}`);
            const languageCode = $(input).attr("data-language-code");
            const currentTranslation = $(input).val().trim();

            if (!$("input#term[type=text]").val().trim().length) {
                alert("Term is empty.");
                $("input#term[type=text]").focus();
                return false;
            }

            if (languageCode == "en") {

                $(input).val($("input#term[type=text]").val());

            } else {

                adminFn.getGoogleTranslation(
                    $("input#term[type=text]").val(),
                    languageCode,
                    (newTranslation) => {
                        console.log("2) languageCode: '" + languageCode + "', currentTranslation: '" + currentTranslation + "', newTranslation: '" + newTranslation + "'");

                        if (!newTranslation) {
                            $(input).addClass("missing-translation");
                        } else if (!currentTranslation.length) {
                            $(input).val(newTranslation).addClass("new-translation");
                        } else if (currentTranslation != newTranslation) {
                            $(input).addClass("conflicting-translation");
                            let overlayHtml = `
    <div id="${inputId}-overlay" class="translation-conflict-panel mb-2 text-end">
    <input type="text" class="form-control" value="${newTranslation}">
    <button type="button" class="btn btn-micro btn-primary" onclick="document.getElementById('${inputId}-overlay').remove();">Cancel</button>
    <button
        type="button"
        class="btn btn-micro btn-primary"
        onclick="$('#frmTerm #${inputId}').val('${newTranslation}'); $('#frmTerm ${inputId}]').removeClass('conflicting-translation'); document.getElementById('${inputId}-overlay').remove();"
    >Replace</button>
    </div>
    `;
                            $(input).after(overlayHtml);
                        } else {
                            $(input).addClass("matching-translation");
                        }

                    }
                );
            }
        }

        document.addEventListener("DOMContentLoaded", function(event) {

            $(".add-translation").click((event) => {
                //event.preventDefault();
                const button = event.currentTarget;
                const languageCode = $(button).attr("data-language-code");
                const index = $(`#${languageCode}-container .translation-inputs input`).length;

                $(`#${languageCode}-container .translation-inputs`).append(
                    getTranslationInputDiv(languageCode, index, "", true, true)
                );
            });

            $(".fill-translations").click((event) => {

                if (!$("input#term[type=text]").val().trim().length) {
                    alert("Term is empty.");
                    $("input#term[type=text]").focus();
                    return false;
                }

                // fill the all translation inputs with the language-specific translations
                // only update the first translation for each language
                let currentLanguageCode = "";
                $("#frmTerm input[type=text].language-translation").each(function(index) {
                    const languageCode = $(this).attr("data-language-code");
                    if (languageCode != currentLanguageCode) {
                        fillTranslation($(this).attr("id"))
                    }
                    currentLanguageCode = languageCode;
                });
            });

            $(".reset-translations").click((event) => {

                // reset all translations to the initial values
                for (const languageCode in initialTranslations) {
                    console.log("AAAA");
                    console.log("languageCode: " + languageCode + " / " + initialTranslations[languageCode].length);
                    if (initialTranslations[languageCode].length) {
                        $(`#${languageCode}-translation-inputs`).html("");
                        let cnt = 0;
                        for (const key in initialTranslations[languageCode]) {
                            cnt++;
                            $(`#${languageCode}-translation-inputs`).append(
                                getTranslationInputDiv(
                                    languageCode,
                                    initialTranslations[languageCode][key]["id"],
                                    initialTranslations[languageCode][key]["word"],
                                    cnt > 1,
                                    false
                                )
                            );
                        }
                    } else {
                        $(`#${languageCode}-translation-inputs`).html(
                            getTranslationInputDiv(languageCode, 0, "", false, false)
                        );
                    }
                    //$(`#${languageCode}-translation-inputs`).html("");
                }
            });

        });

    </script>

    @include('admin.term.forms.edit-form-javascript')

@endsection
