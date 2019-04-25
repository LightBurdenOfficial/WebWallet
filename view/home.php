<?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>

<div class='container'>
    <div class='col-md-12' style="padding-top: 25px;">
        <p class="h2 blockquote text-center"><? echo $lang['PAGE_HEADER']; ?></p>
    </div>
    <div class='col-md-12'>
        <img class="rounded mx-auto d-block" src="https://sperocoin.org/webwallet/view/wallet.png" width="450px">
    </div>
</div>

<?
if (!empty($error)){
    echo "<div class='container'><p style='font-weight: bold;font-size:15px; color: red;text-align:center'>" . $error['message']; "</p></div>";
}
?>
<div class="row">
    <div class="col-md-12 text-center">
        <p class="h3 blockquote text-center"><?php echo $lang['FORM_LOGIN']; ?>:</p>
    </div>

<div class="col-md-12 text-center">
    <form action="index.php" method="POST" autocomplete="off" class="form-inline justify-content-center">
    <input type="hidden" name="action" value="login" />

      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input type="text" class="form-control" name="username" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_USER']; ?>">
      </div>

      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
        <input type="password" class="form-control" name="password" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_PASS']; ?>">
      </div>

      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-shield-alt"></i></div>
        </div>
        <input type="text" class="form-control" name="auth" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_2FA']; ?>">
      </div>

        <button type="submit" class="btn btn-primary mb-2"><?php echo $lang['FORM_LOGIN']; ?></button>
        <div class="g-recaptcha" data-sitekey=<?=$public?>></div>
</form>
</div>
</div>

<div class="row" style="padding-top: 2%">
    <div class="col-md-12 text-center">
        <p class="h3 blockquote text-center"><?php echo $lang['FORM_CREATE']; ?></p>
    </div>

<div class="col-md-12 text-center">
    <form action="index.php" method="POST" autocomplete="off" class="form-inline justify-content-center">
    <input type="hidden" name="action" value="register" />

      <label class="sr-only" for="inlineFormInputGroupUsername2">Username</label>
      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-user"></i></div>
        </div>
        <input type="text" class="form-control" name="username" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_USER']; ?>">
      </div>

      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
        <input type="password" class="form-control" name="password" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_PASS']; ?>">
      </div>

      <div class="input-group mb-2 mr-sm-2">
        <div class="input-group-prepend">
          <div class="input-group-text"><i class="fas fa-key"></i></div>
        </div>
        <input type="password" class="form-control" name="confirmPassword" id="inlineFormInputGroupUsername2" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
      </div>

        <button type="submit" class="btn btn-primary mb-2"><?php echo $lang['FORM_SIGNUP']; ?></button>
        <div class="g-recaptcha" data-sitekey=<?=$public?>></div>
</form>
</div>
</div>
