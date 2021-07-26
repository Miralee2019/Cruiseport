<!DOCTYPE html>
<html>

    <head>

        <meta charset="UTF-8">  
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Reset Password</title>

        <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <script type="text/javascript" src="<?php echo base_url(); ?>assets/custom.js"></script>

    </head>

    <body>
        <form action="<?php echo base_url(); ?>index.php/welcome/changepassword" method="post">
            <div class="col-md-4 col-md-offset-4" style="margin-top: 5%;">
                
                <?php
                    if ($this->session->flashdata('reset_error')) {
                        echo $this->session->flashdata('reset_error');
                    }
                ?>

                <?php
                    if ($this->session->flashdata('link_error')) {
                        echo $this->session->flashdata('link_error');
                        die;
                    }
                ?>


                <h2>Reset your password</h2>
                <br> 
                            
                <input class="form-control" type="password" placeholder="New Password" name="password" minlength="6" maxlength="12" id="password" required data-errormessage-value-missing="Please enter your password"/></br>

                <input type="hidden" name="email" value="<?php echo $email; ?>">
                
                <input class="form-control" type="password" Placeholder="Confirm New Password" name="confirmpassword" minlength="6" maxlength="12" id="cpassword" required data-errormessage-value-missing="Please confirm your password"/><br><br>
                

                <input type="submit" class="btn btn-primary" value="Change Password" id="submit"/>
                
            </div>
        </form>

    </body>

</html>