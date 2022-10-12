<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Send Email Simple</title>
    {{-- Boootstrap CSS --}}
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">

    {{-- Booostrap JS --}}
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
    {{-- JQuery --}}
    <script src="https://code.jquery.com/jquery-3.6.1.min.js"
        integrity="sha256-o88AwQnZB+VDvE9tvIXrMQaPlFFSUTR+nldQm1LuPXQ=" crossorigin="anonymous"></script>
</head>
<style>
    .h100 {
        height: 100vh;
    }
</style>

<body>
    <div class=" d-flex align-items-center justify-content-center h100">
        <div class="w-50">
            <div class="text-center p-5">
                <h3>Send Mail Simple</h3>
            </div>
            <!-- Register Form -->
            <div class="register-form my-5">
                <div id="notify"></div>

                    <form method="POST" action="/send" id="email-form">
                    @csrf
                    <div class="mb-3">
                        <label for="email" class="form-label">Email:</label>
                        <input type="email" class="form-control" id="email"placeholder="example@gmail.com" >
                        <small class="text-danger" id="email-error"></small>
                    </div>

                    <div class="mb-3">
                        <label for="subject" class="form-label">Subject:</label>
                        <input type="email" class="form-control" id="subject" placeholder="subject" >
                        <small class="text-danger" id="subject-error"></small>
                    </div>
                    <div class="mb-3">
                        <label for="content" class="form-label">Content Email:</label>
                        <textarea class="form-control" id="content" rows="3"></textarea>
                        <small class="text-danger" id="content-error"></small>
                    </div>

                    <button type="submit" id="btn_submit" class="btn btn-primary w-100">
                        <span class="indicator-label">Send</span>
                        <span class="indicator-progress">Loading...
                            <span class="spinner-border spinner-border-sm align-middle ms-2"></span></span>
                    </button>
                </form>
            </div>
        </div>
    </div>

</body>
<script src="js/form.js"></script>

</html>
