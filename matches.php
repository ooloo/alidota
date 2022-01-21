<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta charset="utf-8">
<meta http-equiv="X-UA-Compatible" content="IE=edge">
<meta name="viewport" content="width=device-width, initial-scale=1">

<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.6.2/html5shiv.js"></script>
<script src="js/respond.src.js"></script>
<![endif]-->

<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<link rel="stylesheet" href="http://cdn.bootcss.com/twitter-bootstrap/3.0.3/css/bootstrap.min.css">

<script src="https://cdn.staticfile.org/jquery/2.1.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/3.3.7/js/bootstrap.min.js"></script>

<title>DOTA2 职业联赛</title>

<STYLE>

.container { width: auto; }

</STYLE>
<?php include_once("analyticstracking.php") ?>
</head>

<body>
<div class="container">

<div class="navbar navbar-inverse navbar-fixed-top" role="navigation">
<div class="container">
<div class="navbar-header">
<button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
<span class="sr-only">Toggle navigation</span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
<span class="icon-bar"></span>
</button>
<a class="navbar-brand" href="">DOTA2 职业联赛</a>
</div>
<div class="collapse navbar-collapse">
<ul class="nav navbar-nav">
<li><a href="http://alidota.cn/index.php">Home</a></li>
<li class="active"><a href="http://alidota.cn/matches.php">Match</a></li>
<li><a href="http://alidota.cn/player.php">Team</a></li>
<li><a href="http://alidota.cn/about.php">About</a></li>
</ul>
</div><!--/.nav-collapse -->
</div>
</div>

<?php
    echo "<br><BR><BR>";
    
    include "live.php";

    include "his.php";

    // -------------left end--------------

    include "right.php";
?>

<script>
//通过touchstart和touchend
window.onload=function () {  
    document.addEventListener('touchstart',function (event) {  
            if(event.touches.length>1){  
            event.preventDefault();  //阻止元素的默认行为
            }  
            })  
    var lastTouchEnd=0;  
    document.addEventListener('touchend',function (event) {  
            var now=(new Date()).getTime();  
            if(now-lastTouchEnd<=300){  
            event.preventDefault();  
            }  
            lastTouchEnd=now;  //当前为最后一次触摸
            },false)  
}
</script>

</div>
</body>
</html>
