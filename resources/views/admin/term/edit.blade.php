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
            }
        };

        const partsOfSpeech = @json($partsOfSpeech, JSON_PRETTY_PRINT);

        const collinsTags = [];

        const languages = @json($languageOptions, JSON_PRETTY_PRINT);

        const googleCodes = @json($googleCodes, JSON_PRETTY_PRINT);

        const bablaLanguages = @json($bablaLanguages, JSON_PRETTY_PRINT);

        const cambridgeLanguages = @json($cambridgeLanguages, JSON_PRETTY_PRINT);

        const initialTranslations = @json($initialTranslations, JSON_PRETTY_PRINT);

        function removeTranslation(id) {
            $(`#${id}-input-container`).css("display", "none");
            $(`#frmTerm #${id}_word`).val("");
        }

        function getTranslationInputDiv(languageCode, id, translation, includeRemoveBtn, isItANewInput) {

            let dataNewAttr = "";
            let idInputDiv = "";
            if (isItANewInput) {
                dataNewAttr = 'data-new="1"';
            } else {
                idInputDiv = `<input
                                  type="input"
                                  class="form-control language-translation"
                                  name="${languageCode}[${id}][id]"
                                  value="${id}"
                              >`
            }

            const fillBtn = languageCode != "en"
                ? `<button
                       type="button"
                       class="btn-micro btn-fill-translation"
                       onclick="fillTranslation('${languageCode}_${id}_word');"
                       title="Fill / validate translation"
                   >F</button>`
                : "";

            const removeBtn = includeRemoveBtn
                ? `<button
                       type="button"
                       class="btn-micro btn-delete-translation"
                       onclick="removeTranslation('${languageCode}-${id}');"
                       title="Remove translation"
                   >x</button>`
                : "";

            const googleTranslateBtn = googleCodes.includes(languageCode) && (languageCode != "en")
                ? `<button
                       type="button"
                       class="btn-micro btn-google"
                       onclick="adminFn.openGoogleTranslateWindow('${languageCode}', 'en', $('#frmTerm input#${languageCode}_${id}_word').val(), '#frmTerm input#${languageCode}_${id}_word')"
                       style="width: 1rem;"
                       title="Open English translation in Google translate"
                   >G</button>`
                : "";

            const bablaBtn = Object.keys(bablaLanguages).includes(languageCode) &&  (languageCode != "en")
                ? `<button
                       type="button"
                       class="btn-micro btn-babla"
                       onclick="adminFn.openBabLaWindow('${bablaLanguages[languageCode].toLowerCase()}', 'english', $('#frmTerm input#${languageCode}_${id}_word').val(), '#frmTerm input#${languageCode}_${id}_word')"
                       style="width: 1rem;"
                       title="Open English translation in bab.la"
                   >b</button>`
                : "";

            const cambridgeBtn = Object.keys(cambridgeLanguages).includes(languageCode) &&  (languageCode != "en")
                ? `<button
                       type="button"
                       class="btn-micro btn-cambridge"
                       onclick="adminFn.openCambridgeWindow('${cambridgeLanguages[languageCode].toLowerCase()}', 'english', $('#frmTerm input#${languageCode}_${id}_word').val(), '#frmTerm input#${languageCode}_${id}_word')"
                       style="width: 1rem;"
                       title="Open English translation in Cambridge dictionary"
                   >C</button>`
                : "";


            return `
<div class="row" id="${languageCode}-${id}-input-container" ${dataNewAttr}>
    <div class="col" style="padding-right: 0!important;">
        <div style="width: 14em; display: inline-block;">
            ${idInputDiv}
            <input
                type="text"
                class="form-control language-translation"
                style="width: 100%;
                name="${languageCode}[${id}][word]"
                id="${languageCode}_${id}_word"
                data-language-code="${languageCode}"
                value="${translation}"
            >
        </div>
        <div style="width: 7em; display: inline-block;">
            ${fillBtn}
            ${googleTranslateBtn}
            ${bablaBtn}
            ${cambridgeBtn}
            ${removeBtn}
        </div>
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
        onclick="$('input#${inputId}').val('${newTranslation}'); $('input#${inputId}').removeClass('conflicting-translation'); document.getElementById('${inputId}-overlay').remove();"
>Replace</button>
    </div>
    `;
                            $(input).closest("div").append(overlayHtml);
                        } else {
                            $(input).addClass("matching-translation");
                        }

                    }
                );
            }
        }

        document.addEventListener("DOMContentLoaded", function(event) {

            $(".add-translation").click((event) => {

                const button = event.currentTarget;
                const languageCode = $(button).attr("data-language-code");
                const index = $(`#${languageCode}-container .translation-inputs input`).length;

                $(`#${languageCode}-container .translation-inputs`).append(
                    getTranslationInputDiv(languageCode, index, "", true, true)
                );
            });

            $(".fill-translations").click((event) => {

                // fill the all translation inputs with the language-specific translations
                // only update the first translation for each language
                if (!$("input#term[type=text]").val().trim().length) {
                    alert("Term is empty.");
                    $("input#term[type=text]").focus();
                    return false;
                }

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
                                    (cnt > 1),
                                    false
                                )
                            );
                        }
                    } else {
                        $(`#${languageCode}-translation-inputs`).html(
                            getTranslationInputDiv(languageCode, 0, "", false, false)
                        );
                    }
                }
            });

        });

    </script>

@endsection
