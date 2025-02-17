<!DOCTYPE HTML>
<html>
<head>
<title>TRAVELLER | Admin Package Creation</title>
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Pooled Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template, Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
<link href="css/bootstrap.min.css" rel='stylesheet' type='text/css' />
<link href="css/style.css" rel='stylesheet' type='text/css' />
<link rel="stylesheet" href="css/morris.css" type="text/css"/>
<link href="css/font-awesome.css" rel="stylesheet"> 
<script src="js/jquery-2.1.4.min.js"></script>
<link href='//fonts.googleapis.com/css?family=Roboto:700,500,300,100italic,100,400' rel='stylesheet' type='text/css'/>
<link href='//fonts.googleapis.com/css?family=Montserrat:400,700' rel='stylesheet' type='text/css'>
<link rel="stylesheet" href="css/icon-font.min.css" type='text/css' />
<style>
.errorWrap {
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #dd3d36;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
.succWrap{
    padding: 10px;
    margin: 0 0 20px 0;
    background: #fff;
    border-left: 4px solid #5cb85c;
    -webkit-box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
    box-shadow: 0 1px 1px 0 rgba(0,0,0,.1);
}
</style>
</head> 
<body>
   <div class="page-container">
       <div class="left-content">
           <div class="mother-grid-inner">
               <!--header start here-->
               <div class="clearfix"> </div>	
           </div>
           <ol class="breadcrumb">
               <li class="breadcrumb-item"><a href="index.html">Home</a><i class="fa fa-angle-right"></i>Update Package Image </li>
           </ol>
           <div class="grid-form">
               <div class="grid-form1">
                   <h3>Update Package Image </h3>
                   <div class="tab-content">
                       <div class="tab-pane active" id="horizontal-form">
                           <form class="form-horizontal" name="package" method="post" enctype="multipart/form-data">
                               <div class="form-group">
                                   <label for="focusedinput" class="col-sm-2 control-label"> Package Image </label>
                                   <div class="col-sm-8">
                                       <img src="pacakgeimages/<?php echo htmlentities($result->PackageImage);?>" width="200">
                                   </div>
                               </div>
                               <div class="form-group">
                                   <label for="focusedinput" class="col-sm-2 control-label">New Image</label>
                                   <div class="col-sm-8">
                                       <input type="file" name="packageimage" id="packageimage" required>
                                   </div>
                               </div>	
                               <div class="row">
                                   <div class="col-sm-8 col-sm-offset-2">
                                       <button type="submit" name="submit" class="btn-primary btn">Update</button>
                                   </div>
                               </div>
                           </form>
                       </div>
                   </div>
               </div>
           </div>
           <div class="inner-block"></div>
       </div>
   </div>
</body>
</html>
