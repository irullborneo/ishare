<?php
  include "config/koneksi.php";
  include "config/tgl.php";
  include "config/fungsi.php";
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link rel="stylesheet" type="text/css" href="asset/bootflat-admin/css/site.min.css">
<title>I-Share</title>
<script type="text/javascript" src="asset/jquery/jquery-2.0.2.js"></script>
<script type="text/javascript" src="asset/bootflat-admin/js/site.min.js"></script>
<script type="text/javascript" src="asset/wallform/jquery.form.js"></script>
<script type="text/javascript" src="asset/morris/raphael-min.js"></script>
<script type="text/javascript" src="asset/morris/morris.js"></script>
<script type="text/javascript">
  $(document).ready(function(e){
    $("#capacity-info").load("capacity.php");
  })
</script>
</head>
<body>
<?php
  if(empty($_GET['download'])){
?>
	<nav role="navigation" class="navbar navbar-custom">
        <div class="container-fluid">
          <!-- Brand and toggle get grouped for better mobile display -->
          <div class="navbar-header">
            <button data-target="#bs-content-row-navbar-collapse-5" data-toggle="collapse" class="navbar-toggle" type="button">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a href="#" class="navbar-brand" style="width: 200px;">I-SHARE</a>
          </div>

          <!-- Collect the nav links, forms, and other content for toggling -->
          <div id="bs-content-row-navbar-collapse-5" class="collapse navbar-collapse">
            <ul class="nav navbar-nav navbar-right">
              <li class="dropdown">
                <a data-toggle="dropdown" class="dropdown-toggle" href="#"><span class="fa fa-user"></span> <?php echo getUsers($_SESSION['id_user'],"name")?>  <b class="caret"></b></a>
                <ul role="menu" class="dropdown-menu">
                  <!--<li><a href="./?p=account">My Account</a></li>
                  <li class="divider"></li>-->
                  <li ><a href="logout.php">Signout</a></li>
                </ul>
              </li>
            </ul>

          </div><!-- /.navbar-collapse -->
        </div><!-- /.container-fluid -->
    </nav>

    <div class="container-fluid">
    	<div class="row row-offcanvas row-offcanvas-left">
    		<div class="col-xs-6 col-sm-3 sidebar-offcanvas" role="navigation">
    			<ul class="list-group panel">
    				<li class="list-group-item"><i class="glyphicon glyphicon-align-justify"></i> <b>SIDE PANEL</b></li>
    				<li class="list-group-item"><a href="./?p=folder"><i class="fa fa-folder-open"></i>Folder </a></li>
            <li class="list-group-item">
              <div style="margin-top: 60px" id="capacity-info">

              </div>
            </li>
    			</ul>
    		</div>

    		<div class="col-xs-12 col-sm-9 content">
    				<?php include "content.php" ?>
    		</div>

    	</div>
    </div>
    <?php
      }
      else{
        include "module/download/download.php";
      }
    ?>
</body>
</html>