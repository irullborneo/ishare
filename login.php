<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>I-Share</title>
<link rel="stylesheet" type="text/css" href="asset/bootstrap/css/bootstrap.css" />
<link rel="stylesheet" type="text/css" href="asset/font-awesome/css/font-awesome.css" />
<link rel="stylesheet" type="text/css" href="asset/creative/css/creative.css" />
<link href="asset/magnific-popup/magnific-popup.css" rel="stylesheet">

<script type="text/javascript" src="asset/jquery/jquery.js"></script>
<script type="text/javascript" src="asset/bootstrap/js/bootstrap.js"></script>
<script type="text/javascript" src="asset/creative/js/creative.js"></script>
<script type="text/javascript" src="asset/scrollreveal/scrollreveal.js"></script>
<script type="text/javascript">
    $(document).ready(function(e) {
        aturTengah();
    });
    $(window).resize(function(e) {
        aturTengah();
    });
    function aturTengah(){
        var halaman = $(window).height();
        var konten = $(".form-login").height();
        konten = (halaman/2) - (konten/2);
        $(".form-login").css("margin-top", konten-100 + "px");
    }
    function hilang(){
        setTimeout(function(){
            $("#notice").hide("bounce","",1000);
        },5000);
    }
    function ceklogin(form){
      $("#btn-login").addClass("m-progress");
      var username = form.username.value;
      var password = form.password.value;
      if(username=="" && password==""){
        $("#login-notice").html("<b class='text-waring'>ERROR</b> : Username OR Password is empty");
        $('#modal-login').modal('show');
        $("#btn-login").removeClass("m-progress");
      }
      else{
        $.ajax({
          type:"POST",
          data:"username="+username+"&password="+password,
          url:"module/kirim/kirim.php?kirim=ceklogin",
          timeout:10000,
          error: function(jqXHR, textStatus){
            $("#login-notice").html("<b class='text-waring'>ERROR "+jqXHR.status+"</b> : "+ getStatus(jqXHR.status));
            $('#modal-login').modal('show');
            $("#btn-login").removeClass("m-progress");
          },
          success: function(response){
            if(response==""){
              window.location="./";
            }
            else{
              $("#login-notice").html("<b class='text-waring'>ERROR</b> : "+response);
              $('#modal-login').modal('show');
              $("#btn-login").removeClass("m-progress");
              form.password.value="";
              form.username.value="";
              form.username.focus();
            }
          }
        });
      }
      function getStatus(s){
        switch(s){
          case 0 :
            return "Network Problem";
            break;
          case 404 :
            return "Requested page not found.";
            break;
          case 500 :
            return "Internal Server Error ";
            break;
        }
      }
      return false;
    }
</script>
</head>
<style type="text/css">
.form-signin {
  max-width: 330px;
  padding: 15px;
  margin: 0 auto;
}
.form-signin .form-signin-heading,
.form-signin .checkbox {
  margin-bottom: 10px;
}
.form-signin .checkbox {
  font-weight: normal;
}
.form-signin .form-control {
  position: relative;
  height: auto;
  -webkit-box-sizing: border-box;
     -moz-box-sizing: border-box;
          box-sizing: border-box;
  padding: 10px;
  font-size: 16px;
}
.form-signin .form-control:focus {
  z-index: 2;
}
.form-signin input[type="email"] {
  margin-bottom: -1px;
  border-bottom-right-radius: 0;
  border-bottom-left-radius: 0;
}
.form-signin input[type="password"] {
  margin-bottom: 10px;
  border-top-left-radius: 0;
  border-top-right-radius: 0;
}
@-webkit-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-moz-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@-o-keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}
@keyframes ld {
  0%   { transform: rotate(0deg) scale(1); }
  50%  { transform: rotate(180deg) scale(1.1); }
  100% { transform: rotate(360deg) scale(1); }
}

.m-progress {
    position: relative;
    opacity: .8;
    color: transparent !important;
    text-shadow: none !important;
}

.m-progress:hover,
.m-progress:active,
.m-progress:focus {
    cursor: default;
    color: transparent;
    outline: none !important;
    box-shadow: none;
}

.m-progress:before {
    content: '';
    
    display: inline-block;
    
    position: absolute;
    background: transparent;
    border: 1px solid #fff;
    border-top-color: transparent;
    border-bottom-color: transparent;
    border-radius: 50%;
    
    box-sizing: border-box;
    
    top: 50%;
    left: 50%;
    margin-top: -12px;
    margin-left: -12px;
    
    width: 24px;
    height: 24px;
    
    -webkit-animation: ld 1s ease-in-out infinite;
    -moz-animation:    ld 1s ease-in-out infinite;
    -o-animation:      ld 1s ease-in-out infinite;
    animation:         ld 1s ease-in-out infinite;
}

.btn-default.m-progress:before {
    border-left-color: #333333;
    border-right-color: #333333;
}

.btn-lg.m-progress:before {
    margin-top: -16px;
    margin-left: -16px;
    
    width: 32px;
    height: 32px;
}

.btn-sm.m-progress:before {
    margin-top: -9px;
    margin-left: -9px;
    
    width: 18px;
    height: 18px;
}

.btn-xs.m-progress:before {
    margin-top: -7px;
    margin-left: -7px;
    
    width: 14px;
    height: 14px;
}
</style>
<body style="background-color: #CCC">
<nav id="mainNav" class="navbar navbar-default navbar-fixed-top" role="navigation">
        <div class="container-fluid">
            <!-- Brand and toggle get grouped for better mobile display -->
            <div class="navbar-header">
                <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1">
                    <span class="sr-only">Toggle navigation</span> Menu <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand page-scroll" href="#">I-Share Versi 1.1</a>
            </div>

            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
                <ul class="nav navbar-nav navbar-right">
                    <li>
                        <a class="page-scroll" id="info-btn" href="#" data-toggle="modal" data-target="#modal-versi"><span class="fa fa-info-circle"></span></a>
                    </li>
                </ul>
            </div>
            <!-- /.navbar-collapse -->
        </div>
        <!-- /.container-fluid -->
    </nav>

    <div class="form-login">
        <form class="form-signin" method="post" onsubmit="return ceklogin(this)" role="form">
            <img src="asset/img/bg.png" style="width: 300px; text-align: center;" >
            <h4 class="form-signin-heading" style="text-align: center;">Masuk Ke I-Share</h2>
            <label for="username" class="sr-only">Email</label>
            <input type="email" name="username" id="username" class="form-control" placeholder="Email" autofocus />
            <label for="password" class="sr-only">Password</label>
            <input type="password" name="password" id="password" class="form-control" placeholder="Password" />
            <button type="submit" class="btn btn-lg btn-primary btn-block" id="btn-login" >Log In</button>
    </form>
    </div>

  <div class="modal fade" id="modal-login" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-warning"><span class="glyphicon glyphicon-alert"></span> NOTICE</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid" id="login-notice">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " data-dismiss="modal"><span class=" glyphicon glyphicon-ok"></span> OK</button>
            </div>
        </div>
    </div>
  </div>

<div class="modal fade" id="modal-versi" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title text-warning"><span class="fa fa-info"></span> INFORMATION</h4>
            </div>
            <div class="modal-body">
                <div class="container-fluid">
                  <b>Versi 1.1</b>  <small>December 29th 2016</small>
                  <ul>
                    <li>fix download url</li>
                    <li>upload max 15 megabyte</li>
                    <li>fix file or folder hide</li>
                    <li>login fill with email required</li>
                  </ul>
                  <br /><b>Versi 1.0 BETA</b> <small>January 5th 2016</small>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary " data-dismiss="modal"><span class=" glyphicon glyphicon-ok"></span> OK</button>
            </div>
        </div>
    </div>
  </div>
</body>
</html>