
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <title>MerchBox</title>

  <link href="css/mdb.min.css" rel="stylesheet">
  <link href="css/bootstrap.css" rel="stylesheet">
  <link rel="stylesheet" type="text/css" href="css/style.css">
  <!DOCTYPE html>
</head>
<body>
<style>
@import url('https://fonts.googleapis.com/css?family=Montserrat:400,700');

body {
  background: #292b2c;
  font-family: "Montserrat", sans-serif;
  color: #fff;
  margin: 0;
  display: flex;
  justify-content: center;
  align-items: center;
  min-height: 100vh;
}

.form-container {
  background: #36383a;
  border-radius: 10px;
  padding: 30px;
  box-shadow: 0 0 20px rgba(0, 0, 0, 0.2);
  text-align: center;
  width: 300px;
}

.form-title {
  font-size: 24px;
  margin-bottom: 20px;
}

.form-input {
  font-family: "Montserrat", sans-serif;
  outline: 0;
  background: #444648;
  width: 100%;
  border: 0;
  margin: 0 0 15px;
  padding: 15px;
  box-sizing: border-box;
  font-size: 16px;
  color: #fff;
  border-radius: 5px;
}

.form-button {
  font-family: "Montserrat", sans-serif;
  text-transform: uppercase;
  outline: 0;
  background: #d9534f;
  width: 100%;
  border: 0;
  padding: 15px;
  font-size: 16px;
  transition: background 0.3s ease;
  cursor: pointer;
  border-radius: 5px;
}

.form-button:hover {
  background: #c9302c;
}

.form-message {
  margin-top: 15px;
  color: #ccc;
  font-size: 14px;
}

.form-message a {
  color: #d9534f;
  text-decoration: none;
}

</style>

<div class="form-container">
  <div class="form-title">Welcome Back</div>
  <form class="login-form" action="login_chk.php" method="post">
    <input class="form-input" type="text" placeholder="Username" name="unm" />
    <input class="form-input" type="password" placeholder="Password" name="psw" />
    <button class="form-button" type="submit" name="ad_login">Login</button>
    
  </form>
</div>
</body>
</html>
