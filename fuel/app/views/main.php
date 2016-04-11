<!DOCTYPE html>
<html>
<head>
     <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <?php echo Asset::js('ckeditor/ckeditor.js');?>
    <?php echo Asset::css('bootstrap.min.css');?>
    <?php echo Asset::js('jquery.min.js');?>
    <?php echo Asset::js('bootstrap.min.js');?>      

    <?php echo Asset::css('simple-sidebar.css');?>
    <?php echo Asset::js('my.js');?>
    <?php echo Asset::css('font-awesome.min.css');?>
<style type="text/css">
    body {
        padding-top: 35px;
        padding-bottom: 40px;
    }
        .sidebar-nav {
        padding: 9px 0;
    }

    @media (max-width: 980px) {
        /* Enable use of floated navbar text */
        .navbar-text.pull-right {
            float: none;
            padding-left: 5px;
            padding-right: 5px;
        }
    }
</style>
</head>
<body>
    <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <button type="button" class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <a class="brand" href="/blogworld/public/main">Blog World</a>
          <div class="nav-collapse collapse">
            <p class="navbar-text pull-right">
              <a href="/blogworld/public/menu/list"><i class="icon-cog"></i>Setting</a>
            </p>
            <ul class="nav">
              <li class="active">&nbsp;</li>
              <li><a href="#about">&nbsp;</a></li>
              <li><a href="#contact">&nbsp;</a></li>
            </ul>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
    <div id="container-fluid">
        <div class="row-fluid">
            <div class="span3">
                    <div class="wrapper"><?php echo $menu;?></div>
            </div>
            <div class="span9">
                    <?php echo $content;?>
            </div>
        </div>
    </div>
        <!-- Menu Toggle Script 
        <script>
        $("#menu-toggle").click(function(e) {
            e.preventDefault();
            $("#wrapper").toggleClass("toggled");
       });
        </script>
    -->
</body>
</html>