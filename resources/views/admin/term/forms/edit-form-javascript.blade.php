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

    const langs = @json($langOptions, JSON_PRETTY_PRINT);

    const initialTranslations = {
        ar: "{{ $term->ar }}",
        cs: "{{ $term->cs }}",
        da: "{{ $term->da }}",
        de: "{{ $term->de }}",
        el: "{{ $term->el }}",
        en_uk: "{{ $term->en_uk }}",
        en_us: "{{ $term->en_us }}",
        es_la: "{{ $term->es_la }}",
        es_es: "{{ $term->es_es }}",
        fi: "{{ $term->fi }}",
        fr: "{{ $term->fr }}",
        hr: "{{ $term->hr }}",
        it: "{{ $term->it }}",
        ja: "{{ $term->ja }}",
        ko: "{{ $term->ko }}",
        nl: "{{ $term->nl }}",
        no: "{{ $term->no }}",
        pl: "{{ $term->pl }}",
        pt_br: "{{ $term->pt_br }}",
        pt_pt: "{{ $term->pt_pt }}",
        ro: "{{ $term->ro }}",
        ru: "{{ $term->ru }}",
        sv: "{{ $term->sv }}",
        th: "{{ $term->th }}",
        tr: "{{ $term->tr }}",
        uk: "{{ $term->uk }}",
        vi: "{{ $term->vi }}",
        zh: "{{ $term->zh }}"
    };

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
            let collinsTag = "";
            let ctr = 1;
            let langFound = false;
            let expectedN = -1;
            for (let i=0; i<lines.length; i++) {

                line = lines[i].trim();
                if (line.length > 0) {

                    langFound = false;
                    for (let abbrev in langs) {
                        if (langs.hasOwnProperty(abbrev)) {

                            if (line.substring(0, langs[abbrev].length + 1) === `${langs[abbrev]}:`) {

                                langFound = true;
                                line = line.substring(langs[abbrev].length + 2)

                                if (abbrev === "en-us") {
                                    let enUsParts = line.split("/");
                                    line = enUsParts[0].trim();
                                    $("#frmTerm input[name=term]").val(line);
                                    if (enUsParts[1]) {
                                        $("#frmTerm input[name=pron_en_us]").val("/" + enUsParts[1] + "/");
                                    }

                                } else if (abbrev === "en-uk") {
                                    let enUkParts = line.split("/");console.log(enUkParts);
                                    line = enUkParts[0].trim();
                                    for (const key in partsOfSpeech){
                                        // sometimes the part of speech comes before the pronunciation
                                        if(partsOfSpeech.hasOwnProperty(key)){
                                            if (partsOfSpeech[key] == line.substring(line.length - partsOfSpeech[key].length)) {
                                                $("#frmTerm select[name=pos_id]").val(key);
                                            }
                                        }
                                    }
                                    if (enUkParts[1]) {
                                        $("#frmTerm input[name=pron_en_uk]").val("/" + enUkParts[1].trim() + "/");
                                    }
                                    if (enUkParts[2]) {
                                        enUkParts[2] = enUkParts[2].trim();
                                        if (enUkParts[2].length > 0) {
                                            $("#frmTerm input[name=pos_text]").val(enUkParts[2]);
                                            for (const key in partsOfSpeech){
                                                if(partsOfSpeech.hasOwnProperty(key)){
                                                    if (enUkParts[2] == partsOfSpeech[key]) {
                                                        $("#frmTerm select[name=pos_id]").val(key);
                                                    }
                                                }
                                            }
                                        }

                                        $("#frmTerm input[name=pos_text]").val(enUkParts[2].trim());
                                    }
                                }

                                $("#frmTerm input[name=collins_" + abbrev.replace('-', '_') + "]").val(line);
                            }
                        }
                    }

                    if (!langFound) {
                        if (ctr === 1) {
                            let pos = 0;
                            for (let i = 0; i < collinsTags.length; i++) {
                                pos = line.indexOf(`${collinsTags[i]} `);
                                if (pos === 0) {
                                    collinsTag = line.substring(0, collinsTags[i].length + 1);
                                    console.log("collinsTag ==>" + collinsTag + "<==")
                                    $("#frmTerm input[name=collins_tag]").val(collinsTag);
                                    line = line.substring(collinsTags[i].length + 1)
                                    console.log("line ==>" + line + "<==")
                                    break;
                                }
                            }
                            $("#frmTerm textarea[name=definition]").val(line);
                            $("#frmTerm textarea[name=collins_def]").val(line);
                        } else if (ctr === 2) {
                            $("#frmTerm textarea[name=sentence]").val(line);
                        } else {
                            console.log(`Unrecognized line ==>${line}<==`);
                        }
                        ctr++;
                    }
                }
            }

            // set additional fields
            $("#frmTerm select[name=category_id]").val(1);
            $("#frmTerm select[name=grade_id]").val(1);

            // show field input tab
            $('.nav-tabs a[href="#field-input-form"]').tab('show')
        });

        $(".reset-form").click((event) => {

            for (const field in validationRules){
                $(`#frmTerm input[name=${field}]`).val("");
                $(`#frmTerm input[name=collins_${field}]`).val("");
                $(`#frmTerm textarea[name=${field}]`).val("");
            }
            $("#frmCutAndPaste textarea[name=content]").val("");

            $(".form-container").removeClass("hidden");
            $('.nav-tabs a[href="#cut-and-paste-form"]').tab('show')
            $(".success-container").addClass("hidden");
        });

    });

</script>
