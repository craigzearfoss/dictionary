<!DOCTYPE html>
<html>
<head>
    <title>Thwords Dictionary</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <link href="/css/thwords_admin.css" rel="stylesheet">
</head>

<body>

<main class="container-fluid main">
    @yield('content')
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.0/jquery.validate.min.js"></script>

<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) {
/*
        if (typeof validationRules === "undefined") {
            validationRules = {};
        }

        if (typeof validationMessages === "undefined") {
            validationMessages = {};
        }
*/
        const adminFn = {
            msgContainerId: "#msg-container",
            msgTypes: ["primary", "secondary", "success", "danger", "warning", "info", "light", "dark"],
            generateResponseMessage: (msg, errors) => {
console.log('errors', errors);
                errors = errors || [];
                let errorArray = [];
                if (Array.isArray(errors)) {
                    errorArray = errors;
                } else {
                    let formElement = null;
                    $.each(errors, function(field, msg) {console.log('field='+field, 'msg='+msg);
                        formElement = $("#frmLang").find(`input[name=${field}]`);
                        console.log(formElement);
                        if (formElement.length) {
                            formElement.after(`<label id="short-error" class="error" for="${field}">${msg}</label>`);
                        }
                    });
                }
                return msg
                    + (errors.length
                        ? "<ul><li>" + errorArray.join("</li><li>") + "</li></ul>"
                        : "");
            },
            displayResponseMessage: (type, msg, errors) => {
                adminFn.msgTypes.forEach((val, i) => { $(adminFn.msgContainerId).removeClass(val); });
                $(adminFn.msgContainerId).html(adminFn.generateResponseMessage(msg, errors))
                    .addClass(`alert-${type}`)
                    .removeClass("hidden");
                $([document.documentElement, document.body]).animate({
                    scrollTop: $(adminFn.msgContainerId).offset().top
                }, 100);
            }
        };

        $("#frmLang").validate({
            rules: validationRules,
            messages: validationMessages,
            submitHandler: function(form, event) {

                event.preventDefault();

                let button = $(form).find(".ajax-save-btn");
                let buttonLabel = button.text();

                $("#msg-container").addClass("hidden");
                let msgHtml = "";
                button.text("Saving ...").prop("disabled", true);

                fetch(form.getAttribute("action"), {
                    body: new FormData(form),
                    method: "post"
                })
                    .then(response => response.json())
                    .then(json => {
                        console.log("Save response", json)
                        if (parseInt(json.success) > 0) {
                            adminFn.displayResponseMessage("success", json.message || "Successfully saved.", json.errors);
                        } else {
                            adminFn.displayResponseMessage("danger", json.message || "Error occurred while saving.", json.errors);
                        }
                        button.text(buttonLabel).prop("disabled", false);
                    })
                    .catch((err) => {
                        console.log(err);
                        adminFn.displayResponseMessage("danger", err.message, []);
                        button.text(buttonLabel).prop("disabled", false);
                    });
            }
        });
    });

</script>


</body>
</html>
