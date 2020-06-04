<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
  <link rel="stylesheet" href="css/login.css" type="text/css"/>
	<title></title>
</head>
<body>
  <form class="form-signin" action="process-login.php" method="POST">
  	<h4>Please sign-in</h4>
    <input type="text" id="username" name="username" class="form-control" placeholder="Username" required autofocus/>
    <input type="password" id="password" name="password" class="form-control" placeholder="Password" required/>
    <?php if(isset $_GET['error']){  ?>
      <div class="alert alert-danger">
        <?php echo $_GET['error'];?>
      </div>
    <?php }?>
    <div class="row">
        <a class="btn btn-lg btn-success col-6" href="register.php">Register</a>
        <button class="btn btn-lg btn-primary col-6" type="submit">Log In</button>
    </div>
  </form>
</body>

<script src="https://code.jquery.com/jquery-3.4.1.slim.min.js" integrity="sha384-J6qa4849blE2+poT4WnyKhv5vZF5SrPo0iEjwBvKU7imGFAV0wwj1yYfoRSJoZ+n" crossorigin="anonymous"></script>
	<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
	<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
</html>
