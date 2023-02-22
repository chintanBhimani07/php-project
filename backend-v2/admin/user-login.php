<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "./config/db.config.php";

if (isset($_SESSION['login_user_id'])) {
    header("location: ./index.php?page=home");
}
?>

<?php include './head.components.php' ?>

<style>
    html,
    body {
        height: 100%;
    }

    body {
        display: flex;
        align-items: center;
        padding-bottom: 10rem;
        background-color: #f5f5f5;
    }

    .form-signin {
        max-width: 25vw;
    }

    .form-signin .form-floating:focus-within {
        z-index: 2;
    }
</style>

<body class="text-center">
    <main class="form-signin w-100 m-auto">
        <img class="mb-4" src="./assets/img/login.png" alt="Img" width="150" height="150">
        <h1 class="h3 mb-3 fw-bold ">Login Here</h1>
        <form id="user_login" class="my-5">
            <div class="form-group">
                <input type="email" class="form-control mb-3" id="user_email" name="user_email"
                    placeholder="name@example.com" autocomplete="off" autofocus required>
            </div>
            <div class="form-group ">
                <input type="password" class="form-control mb-5" id="user_password" name="user_password"
                    placeholder="Enter Password" autocomplete="off" required>
            </div>
            <div class="form-group ">
                <button class="btn btn-primary btn-user btn-block" type="submit">Log In</button>
            </div>
        </form>
    </main>

    <?php include './bottom.components.php' ?>

</body>
<script>
    $(document).ready(function () {
        $('#user_login').submit(function (e) {
            e.preventDefault();
            $.ajax({
                url: './php/actions.php?action=login_application_user',
                data: new FormData($(this)[0]),
                cache: false,
                contentType: false,
                processData: false,
                method: 'POST',
                type: 'POST',
                success: function (resp) {
                    if (resp == 1) {
                        console.log(resp);
                        window.location = './index.php';
                    } else {
                        console.log(resp);
                        $('#user_login').prepend(`
              <div class="alert alert-danger fade show" role="alert">
              <strong>Username and Password</strong> are incorrect.
              </div>
              `);
                    }
                }
            })
        });
    });
</script>

</html>