$(function () {
    $(".indicator-label").show();
    $(".indicator-progress").hide();

    $("#btn_submit").click(function (event) {
        event.preventDefault();
        resetError();
        const token = $("input[name=_token]").val();
        const url = $("#email-form").attr("action");
        const email = $("#email").val();
        const subject = $("#subject").val();
        const content = $("#content").val();

        const check = validation(email, subject, content);

        if(!check){
            return;
        }
        toggleBtn();
        $(this).prop("disabled", true);

        $.ajax({
            url: url,
            type: "POST",
            data: {
                _token: token,
                email: email,
                subject: subject,
                content: text2Html(content),
            },
            dataType: "json",
            success: function (response) {
                console.log("sucess");
                $("#notify").append(alertSuccess(email))
                toggleBtn();
                $("#btn_submit").prop("disabled", false);
            },
            error: function (response) {
                console.log(response);
                toggleBtn();
                $("#btn_submit").prop("disabled", false);
                $("#notify").append(alertEror())

            }
        });
    });
});

function toggleBtn() {
    $(".indicator-label").toggle();
    $(".indicator-progress").toggle();
}

function validation (email, subject, content) {
    if (email === "" ) {
        $("#email-error").text("Email is required")
        return false;
    }

    const emailRegex = /^[\w-\.]+@([\w-]+\.)+[\w-]{2,4}$/g;
    if (!emailRegex.test(email)) {
        $("#email-error").text("Email is valid")
        return false;
    }

    if (subject === "") {
        $("#subject-error").text("Subject is required")

        return false;
    }

    if (content === "") {
        $("#content-error").text("Content is required")

        return false;
    }


    return true;
}

function resetError () {
    $("#email-error").text("")
    $("#subject-error").text("")
    $("#content-error").text("")
}

function text2Html(text){
    return "<p>" +text.replace(/\n/g, "</p><p>")+"</p>";
}

function alertSuccess(email){
    return  `<div class="alert alert-success alert-dismissible fade show" role="alert">
    <strong>Success!</strong> Email sent to ${email}.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
}
function alertEror(){
    return  `<div class="alert alert-danger alert-dismissible fade show" role="alert">
    <strong>Error!</strong> Serve error.
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                  </div>`
}

