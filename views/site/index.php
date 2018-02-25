<?php

/* @var $this yii\web\View */

$this->title = 'My Yii Application';
?>
<div class="site-index">

    <div class="jumbotron">
        <h1>Congratulations!  

        <?php
          echo $_SERVER["REMOTE_ADDR"];
        ?>
        
         </h1>

        <p class="lead">You have successfully created your Yii-powered application.</p>

        <p><a class="btn btn-lg btn-success" href="http://www.yiiframework.com">Get started with Yii</a></p>
    </div>

    <div class="body-content">

        <div class="row">
            <div class="col-lg-4">
                <h2>Heading</h2>

<<<<<<< HEAD
                <?php
                
                    if (isset($_SERVER["HTTP_CLIENT_IP"]))
                    {
                        echo $_SERVER["HTTP_CLIENT_IP"];
                    }
                    elseif (isset($_SERVER["HTTP_X_FORWARDED_FOR"]))
                    {
                        echo $_SERVER["HTTP_X_FORWARDED_FOR"];
                    }
                    elseif (isset($_SERVER["HTTP_X_FORWARDED"]))
                    {
                        echo $_SERVER["HTTP_X_FORWARDED"];
                    }
                    elseif (isset($_SERVER["HTTP_FORWARDED_FOR"]))
                    {
                        echo $_SERVER["HTTP_FORWARDED_FOR"];
                    }
                    elseif (isset($_SERVER["HTTP_FORWARDED"]))
                    {
                        echo $_SERVER["HTTP_FORWARDED"];
                    }
                    else
                    {
                        echo $_SERVER["REMOTE_ADDR"];
                    }
                
                
                
                    
                ?>
=======



>>>>>>> e00c3fb9cae755e18d7fb125cc7baa3d8e2041c9

                <p><a class="btn btn-default" href="http://www.yiiframework.com/doc/">Yii Documentation &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <div id="map"></div>

                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/forum/">Yii Forum &raquo;</a></p>
            </div>
            <div class="col-lg-4">
                <h2>Heading</h2>

                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et
                    dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip
                    ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu
                    fugiat nulla pariatur.</p>

                <p><a class="btn btn-default" href="http://www.yiiframework.com/extensions/">Yii Extensions &raquo;</a></p>
            </div>
        </div>

    </div>
</div>
