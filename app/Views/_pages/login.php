<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">

    <title>Admin Panel | PT Sembilan Tiga Perdana</title>
</head>
<body>

<main class="min-vh-100 w-100 d-flex justify-content-center align-items-center bg-light">
    <form action="<?= route_to("auth.do_auth") ?>" method="post">
        <div class="form-group mb-3">
            <label for="password" class="d-none">Password</label>
            <input type="password" name="password" id="password" class="form-control" style="min-width: 400px;"
                   placeholder="Admin Password">
        </div>
        <div class="text-center">
            <button type="submit" class="btn btn-primary">
                Login
            </button>
        </div>
    </form>
</main>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz"
        crossorigin="anonymous"></script>

</body>
</html>