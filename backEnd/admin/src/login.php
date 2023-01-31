<!DOCTYPE html>
<html lang="en">

<?php
session_start();
include "../config/db.config.php";


if (isset($_SESSION['login_id'])) {
  header("location: ./index.php?page=home");
}

// if ($_SERVER["REQUEST_METHOD"] == "POST") {
//   if (!empty($_POST['email']) && !empty($_POST['password'])) {
//     $email = $_POST['email'];
//     $password = $_POST['password'];
//     $q = "SELECT * FROM users WHERE email= '$email' AND password= '$password'";
//     $query = mysqli_query($con, $q);
//     $numrows = mysqli_num_rows($query);
//     if ($numrows == 1) {
//       while ($row = mysqli_fetch_assoc($query)) {
//         $fetchedEmail = $row['email'];
//         $fetchedPassword = $row['password'];
//         $fetchedName = $row['full_name'];
//         $fetchedDesignation = $row['designation'];
//       }
//       if ($email == $fetchedEmail && $password == $fetchedPassword) {
//         $_SESSION['email'] = $fetchedEmail;
//         $_SESSION['name'] = $fetchedName;
//         $_SESSION['designation'] = $fetchedDesignation;
//         header("Location: ../");
//       }
//     } else {
//       $error = "Invalid username or password!";
//     }
//   } else {
//     $error = "All fields are required!";
//   }
// }
// 
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

  .form-signin input[type="email"] {
    margin-bottom: -1px;
    border-bottom-right-radius: 0;
    border-bottom-left-radius: 0;
  }

  .form-signin input[type="password"] {
    margin-bottom: 10px;
    border-top-left-radius: 0;
    border-top-right-radius: 0;
  }
</style>

<body class="text-center">

  <main class="form-signin w-100 m-auto">
    <form action="" id="login-form">
      <img class="mb-4" src="./assets/img/login.png" alt="Img" width="150" height="150">
      <h1 class="h3 mb-3 fw-bold ">Login Here</h1>

      <div class="form-floating ">
        <input type="email" id="email" name="email" class="form-control" placeholder="name@example.com" required />
        <label for="email">Email address</label>
      </div>
      <div class="form-floating">
        <input type="password" class="form-control" id="password" name="password" placeholder="Enter Password">
        <label for="password">Password</label>
      </div>
      <button class="w-100 btn btn-lg btn-primary my-4" type="submit">Sign in</button>
      <a href="#" class="text-dark text-decoration-underline">Forget Password?</a>
    </form>
  </main>



</body>
<script>
  $(document).ready(function() {
    $('#login-form').submit(function(e) {
      e.preventDefault();
      if ($(this).find('.alert-danger').length > 0) {
        $(this).find('.alert-danger').remove();
      }
      $.ajax({
        url: './ajax.php?action=login',
        method: 'POST',
        data: $(this).serialize(),
        error: err => {
          console.log(err);
        },
        success: function(resp) {
          if (resp == 1) {
            location.href = './index.php?page=home';
          } else {
            $('#submitBtn').prepend(`
              <div class="alert alert-danger alert-dismissible fade show" role="alert">
              <strong>Username and Password</strong> are incorrect.
              <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
              </div>
              `);
          }
        }
      })
    });
  });
</script>

</html>