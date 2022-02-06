<script type="text/javascript">

    document.addEventListener("DOMContentLoaded", function(event) {

        $(".ajax-save-btn").click((event) => {
            event.preventDefault();

            let button = $(event.currentTarget);
            let buttonLabel = button.text();
            let form = button.closest(form);
alert('wtf');
            button.text("Saving").prop("disabled", true);
            fetch(form.getAttribute("action"), {
                body: new FormData(form),
                method: "post"
            })
                .then(response => response.json())
                .then(json => {
                    console.log("Save response", json)
                    if (json.success) {
                        alert("Success");
                    } else {
                        alert("Fail");
                    }
                    button.text(buttonLabel).prop("disabled", false);
                })
                .catch((err) => {
                    console.log(err);
                    alert(err.message);
                    button.text(buttonLabel).prop("disabled", false);
                });
        });
    });

</script>
