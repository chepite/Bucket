<main>
  <form name="login" method="post" action="index.php?page=login">
<input type="hidden" name="action" value="login" />
        <div class="formLine">
        <label for="username">Username</label>
        <span class="error"><?php if(!empty($errors['noUser'])){echo $errors['noUser'];}; ?></span>
         <input type="text" required name="username" value="<?php
          if (!empty($_POST['username'])) echo $_POST['username'];
          ?>"><br>
          </div>
          <div class="formLine">
          <label for="password">Password</label>
          <span class="error"><?php if(!empty($errors['incorrectPassword'])){echo $errors['incorrectPassword'];}; ?></span>

        <input type="password" required name="password" value="<?php
          if (!empty($_POST['password'])) echo $_POST['password'];
          ?>"><br>
           </div>
          <div class="formLine">
        <input type="submit" value="Login">
        </div>
         </form>
         <div class="signup">
            <p class="signup__text">Don't have an account yet? <a href="index.php?page=signup"><u>Sign Up</u><a></p>
         </div>
         <span class="error"><?php if (!empty($errors['text'])) echo $errors['text']; ?></span>


</main>

         <script src="js/validate.js"></script>


