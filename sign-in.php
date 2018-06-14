<?php require_once('header.php'); ?>

<div class="container main-content">
  <div class="row">

      <div class="six columns">
        <h5>User Login</h5>
        <br/><br/>
        <form action="login.php" method="post" autocomplete="false">

          <!-- Remove Chrome Autofill with dummy input-->

          <input style="display:none;" type="text" name="somefakename" />

          <p>Username -> admin</p>
          <input type="text" name="username" placeholder="Username" value="admin"><br/><br/>
          <p>Password -> password</p>
          <input type="password" name="password" placeholder="Password" autocomplete="new-password" value="password"><br/><br/>
          <input class="button" type="submit" value="Login">
        </form>

      </div>

      <div class="six columns">
        <h5>Admin Login</h5>
        <br/><br/>
        <form action="admin-login.php" method="post" autocomplete="false">

          <!-- Remove Chrome Autofill with dummy inputs-->

          <input style="display:none;" type="text" name="somefakename" />

          <p>Username -> serenityadmin</p>
          <input type="text" name="username" placeholder="Username" value="serenityadmin"><br/><br/>
          <p>Password -> password</p>
          <input type="password" name="password" placeholder="Password" autocomplete="new-password" value="password"><br/><br/>
          <input class="button" type="submit" value="Login">
        </form>


      </div>

    </div>

      <hr/>

      <h5>Sign up for a new account</h5>

      <p>Sign up to explore what Serenity has to offer and what we can do for you.</p><br/>

      <button id="register-button" class="button">Sign Up</button><br/><br/><br/><br/>

      <div class="row register-panel">
        <div class="twelve columns">
        <h5>Register your Account</h5>
        <br/><br/>
        <form action="add-user.php" method="post" autocomplete="false">

          <!-- Remove Chrome Autofill with dummy inputs-->

          <input style="display:none;" type="text" name="somefakename" />

          <input type="text" name="firstname" placeholder="First Name"><br/><br/>
          <input type="text" name="lastname" placeholder="Last Name"><br/><br/>
          <textarea type="text" name="address" placeholder="Address"></textarea><br/><br/>
          <input type="text" name="email" placeholder="Email Address"><br/><br/>
          <input type="text" name="username" placeholder="Username"><br/><br/>
          <input type="password" name="password" placeholder="Password" autocomplete="new-password"><br/><br/>
          <input class="button" type="submit" name="register" value="Register">
        </form>

      </div>

    </div>
  </div>
</div>

<?php require_once('footer.php'); ?>
