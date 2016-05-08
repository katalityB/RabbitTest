<!DOCTYPE html>
<html lang="<?php echo LANGUAGE_CODE; ?>" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=no" />
    <title><?php echo $title.' - '.SITETITLE;?></title>
    <?php
    echo $meta;
    Assets::css([
        Url::templatePath().'css/bootstrap.min.css',
        Url::templatePath().'css/style.css',
    ]);
    Assets::js([
        Url::templatePath().'js/jquery.min.js',
        Url::templatePath().'js/bootstrap.min.js',
        Url::templatePath().'js/tweets-on-map.js',
    ]);
    echo $css;
    echo $js;
    ?>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyDzkIOfXsgkZKDaLvXptLwdhHvwxB7jdXM"></script>
    <script type="text/javascript">
        $( document ).ready(function() {
            initialize();
        });
    </script>
</head>
<body>
    <nav>
        <div class="container">
            <nav class="navbar navbar-fixed-top navbar-default" role="navigation">
                <div class="container-fluid">
                    <!-- Brand and toggle get grouped for better mobile display -->
                    <div class="navbar-header">
                        <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                            <span class="sr-only">Toggle navigation</span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                            <span class="icon-bar"></span>
                        </button>
                        <a class="navbar-brand" href="#">Rabbit test issue</a>
                    </div>
                    <!-- Collect the nav links, forms, and other content for toggling -->
                    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                        <div class="navbar-form navbar-left" role="search">
                            <div class="form-group">
                                <input type="text" class="form-control" id="search-input" placeholder="Search">
                            </div>
                            <button type="submit" class="btn btn-default" onclick="search($('#search-input').val())">Submit</button>
                        </div>
                    </div><!-- /.navbar-collapse -->
                </div><!-- /.container-fluid -->
            </nav>
        </div>
    </nav>
    <div class="navbar-offset"></div>
