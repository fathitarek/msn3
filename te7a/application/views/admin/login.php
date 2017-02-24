<!DOCTYPE html>

    <head>
        <meta charset="utf-8">
        <!--[if IE]><meta http-equiv='X-UA-Compatible' content='IE=edge,chrome=1'><![endif]-->
        <title>.:: Mohammed Fathy's Website ::.</title>
        <meta name="description" content="">
        <meta name="viewport" content="width=device-width">

        <link rel="stylesheet" href="<?php echo base_url(); ?>admin_temple/css/styles.css">

    </head>
    <body>
        

        <div class="container-fluid">

            <form class="form-signin" method="post" action="<?php echo base_url()?>admin/login">
                <h2 class="form-signin-heading"><strong>Eng </strong>MOHAMED FATHY</h2>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-user"></i></span>
                    <input type="text" placeholder="Username" name="username">
                </div>
                <div class="input-prepend">
                    <span class="add-on"><i class="icon-lock"></i></span>
                    <input type="password" placeholder="Password" name="password">

                </div>


                <div class="signInRow">
                    <div><h1>Sign in</h1></div>
                    <div><input type="submit" name="submit" value="Enter Admin Panel >>" class="btn"/></div>
                </div>
            </form>
        </div>    


    </body>
</html>
