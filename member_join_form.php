<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Member Join</title>
    <!-- Latest compiled and minified CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">
    <!-- jQuery library -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
    <!-- Popper JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>
    <!-- Latest compiled JavaScript -->
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>
    <link href="member_join_form.css?after" type="text/css" rel="stylesheet">
</head>

<body>
    <center>
        <div class="container">

            <img src="member_join.png" id="join_img"/>

            <form action="member_join.php" method="post">

                <div class="form-group">
                    <img src="id2.png" id="id_text">
                    <input type="text" class="form-control" id="usr" name="id">
                </div>
                <div class="form-group">
                    <img src="pw2.png" id="pw_text">
                    <input type="password" class="form-control" id="pwd" name="pw">
                </div>
                <div class="form-group" id="form">
                    <img src="name2.png" id="name_text">
                    <input type="text" class="form-control" id="name" name="name">
                </div>
                <button type="submit" class="btn btn-primary" id="submit_btn"><img class="btn-img" id="submit_btn" src="submit_btn.png"></button>
            </form>
        </div>
    </center>

</body>

</html>
