<script type="text/javascript">

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
            let languageFound = false;
            let expectedN = -1;
            for (let i=0; i<lines.length; i++) {

                line = lines[i].trim();
                if (line.length > 0) {

                    languageFound = false;
                    for (let abbrev in languages) {
                        if (languages.hasOwnProperty(abbrev)) {

                            if (line.substring(0, languages[abbrev].length + 1) === `${languages[abbrev]}:`) {

                                languageFound = true;
                                line = line.substring(languages[abbrev].length + 2)

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

                    if (!languageFound) {
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
