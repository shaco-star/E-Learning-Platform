<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Instructors</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <div class="container my-5">
        <h1>Instructor</h1>
        <form method="POST" action="handlers/handleLogin.php">
            <div class="mb-3">
                <label class="form-label">Instructor Name</label>
                <input type="text" class="form-control" name="instructor-name">
            </div>
            <div class="mb-3">
                <label class="form-label">Email address</label>
                <input type="email" class="form-control" name="email">
            </div>
            <div class="mb-3">
                <label class="form-label">Bio</label>
                <input type="text" class="form-control" name="bio">
            </div>
            <div class="mb-3">
                <label class="form-label">Name of course</label>
                <input type="text" class="form-control" name="name-course">
            </div>
            <div class="mb-3">
                <label class="form-label">Profit</label>
                <input type="number" class="form-control" name="profit-course">
            </div>
            <div class="mb-3">
                <button class="btn btn-info" type="submit">Add</button>
            </div>
        </form>
    </div>
</body>

</html>