<br>
<!-- Sign In Form -->
<div class="container-fluid d-flex justify-content-center" style="padding: 20px;">
    <div class="form-container" style="width: 70%; max-width: 800px; min-width: 400px; border: 1px solid #ccc; background-color:gray; padding: 20px; border-radius: 8px; text-align: center;">
        <h3 style="margin-top: -30px; display: inline-block; color: black; padding: 0 10px;">
            LOGIN
        </h3>
<br>
<form method="post" action="index.php?action=verifyUser">
  <!-- Email Address -->
  <div class="mb-3">
    <input type="email" class="form-control" placeholder="Email address" id="exampleInputEmail1" name="username" value="">
    <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['email_error'])) { echo $data['email_error']; } ?></p></span>

  </div>
  <!-- Password -->
  <div class="mb-3">
    <input type="password" class="form-control" placeholder="Password" id="exampleInputPassword1" name="password" value="">
    <span><p style="font-weight: bold; display: inline;"><?php if (!empty($data['password_error'])) { echo $data['password_error']; } ?></p></span>

  </div>

  <input type="submit" class="btn btn-success d-block mx-auto" style="background-color: blue; color: white;" name="submit" value="Log In">
</form>

</div>