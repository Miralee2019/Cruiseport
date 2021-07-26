<html>
<head>
<meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
<style>
html,body{
overflow-x:hidden;
}
#image-backgorund
{
background:url("http://cashrub.in/cashrub/admin/assets/images/login_cover.jpg");
background-size:100% 100%;
}
.text-display{
    background: #fff;
    font-size: 24px;
    text-align: center;
    padding: 10px;

}
.center-div{
position: relative;
  top: 50%;
  -webkit-transform: translateY(-50%);
  -ms-transform: translateY(-50%);
  transform: translateY(-50%);
}
</style>
</head>
<body id="image-backgorund">
<div class="row center-div">
<div class="col-md-8 col-md-offset-2 text-display"><?php if(!empty($to_display)){echo $to_display; }else{echo "Invalid Link"; } ?></div>
</div>
</body>
</html>