<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link href="https://fonts.googleapis.com/css?family=Ubuntu" rel="stylesheet">
<?php if (!defined("IN_WALLET")) { die("Auth Error"); } ?>
                <div class='container'>
                    <div class='col-md-12'>
                        <h1 style='font-size: 25px;text-align: center;'><?php echo $lang['PAGE_HEADER']; ?></h1>
                    </div>
                </div>
                <?php
                if (!empty($error))
                {
                    echo "<div class='container'><p style='font-weight: bold;font-size:15px; color: red;text-align:center'>" . $error['message']; "</p></div>";
                }
                ?>
                
                    <div class='container' style="text-align: center;">
                        <p><?php echo $lang['FORM_LOGIN']; ?>:</p>
                    </div>
<center>
                <form action="index.php" method="POST" class="form-inline">
                    <input type="hidden" name="action" value="login" />
                    <!--USERNAME FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon"><i class="fa fa-user-circle"></i></div>
                        <input type="text" class="form-control" name="username" id="inlineFormInput" placeholder="<?php echo $lang['FORM_USER']; ?>">
                    </div>
                    <!--PASS FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        <input type="password" class="form-control" name="password" id="inlineFormInputGroup" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                    </div>
                    <!--2FA FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon"><i class="fa fa-unlock"></i></div>
                        <input type "text" class="form-control" name="auth" placeholder="<?php echo $lang['FORM_2FA']; ?>">
                    </div>
                    <!--Button Login -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3" style="text-align: center;"> 
                        <br><button type="submit" class="btn btn-info"><?php echo $lang['FORM_LOGIN']; ?></button>
                    </div>
                </form>
</center>
                <br />
                 <div class='container' style="text-align: center;">
                <p><?php echo $lang['FORM_CREATE']; ?></p>
                </div>
<center>
                <form action="index.php" method="POST" class="form-inline">
                    <input type="hidden" name="action" value="register" />
                    <!--USERNAME REGISTER FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon">@</div>
                        <input type="text" class="form-control" name="username" placeholder="<?php echo $lang['FORM_USER']; ?>">
                    </div>
                    <!--PASS FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        <input type="password" class="form-control" name="password" placeholder="<?php echo $lang['FORM_PASS']; ?>">
                    </div>
                    <!--RE-PASS FORM -->
                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3">
                        <div class="input-group-addon"><i class="fa fa-key"></i></div>
                        <input type="password" class="form-control" name="confirmPassword" placeholder="<?php echo $lang['FORM_PASSCONF']; ?>">
                    </div>

                    <div class="input-group mb-2 mr-sm-2 mb-sm-0 col-md-3" style="text-align: center;"> 
                        <br><button type="submit" class="btn btn-info"><?php echo $lang['FORM_SIGNUP']; ?></button>
                    </div>
                </form>
</center>
