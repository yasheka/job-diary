<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Job Dairy</title>
<link rel="stylesheet" href="bootstrap.min.css" />
<link rel="shortcut icon" href="images/favicon.ico" type="image/x-icon">
<link rel="icon" href="images/favicon.ico" type="image/x-icon">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<link rel="stylesheet" href="style.css" />
<link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<!--header starts here-->
<?php
include_once 'config.php';
include_once 'header.php';
?>

<!--header ends here-->

<!--slider section starts here-->
<section>
  <div class="container-fluid">
    <div class="row">
      <div id="myCarousel" class="carousel slide" data-ride="carousel" >
        <!---carousel content--->
        <div class="carousel-content">
          <h1>Your Future Begins Here</h1>
          <p> More than 1000+ Jobs Available </p>
          <div class="col-lg-10 col-lg-push-1">
            <form action="search.php" method="post">
              <div class="form-group">
                <div class="col-lg-8">
                  <div class="row">
                    <input type="text" class="form-control" name="search" placeholder="Looking for a Job" style="border:none; border-radius: 10px 0px 0px 10px;"/>
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-4">
                  <div class="row">
                    <select name="location" class="form-control" style="border:none; border-radius: 0px 10px 10px 0px;">
                      <option>All Locations</option>
                    </select>
                    <br />
                  </div>
                </div>
              </div>
              <div class="form-group">
                <div class="col-lg-4 col-lg-push-5">
                  <div class="row">
                    <input type="submit" class="slider-btn" value="Search" />
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
        <!-- Wrapper for slides -->
        <div class="carousel-inner">
          <div class="item active" > <img src="images/header_background.jpg" > </div>
          <div class="item" > <img src="images/205e0b7.jpg"> </div>
          <div class="item" > <img src="images/our-services.jpg"> </div>
          <div class="item"> <img src="images/header-background_2.jpg"> </div>
          <!-- Left and right controls -->
          <a class="left carousel-control" href="#myCarousel" data-slide="prev"> <span class="glyphicon glyphicon-chevron-left"></span> <span class="sr-only">Previous</span> </a> <a class="right carousel-control" href="#myCarousel" data-slide="next"> <span class="glyphicon glyphicon-chevron-right"></span> <span class="sr-only">Next</span> </a> </div>
      </div>
    </div>
  </div>
</section>
<!--slider section ends here-->

<!--find job by category section starts here-->
<section class="category">
<div class="container">
<div class="row">
<h1>Find jobs by category</h1>
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-briefcase"></span><br />
<a href="search.php?field=software">Software</a>
<p>Or kind rest bred with am shed then.</p>
</div>
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-wrench"></span><br />
<a href="search.php?field=mechanical">Mechanical</a>
<p>In raptures building an bringing be.</p>
</div>
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-heart"></span><br />
<a href="search.php?field=customer-service">Customer Service</a>
<p>Or kind rest bred with am shed then.</p>
</div>
</div>
<div class="row">
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-credit-card"></span><br />
<a href="search.php?field=accounting">Accounting</a>
<p>Or kind rest bred with am shed then.</p>
</div>
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-education"></span><br />
<a href="search.php?field=education">Education</a>
<p>Or kind rest bred with am shed then.</p>
</div>
<div class="col-lg-4 category-content">
<span class="glyphicon glyphicon-usd"></span><br />
<a href="search.php?field=marketing">Marketing</a>
<p>Or kind rest bred with am shed then.</p>
</div>
</div>
<div class="row">
<div class="col-lg-4 col-lg-push-5">
<a href="search.php" class="thm-btn">Browse all category</a>
</div>
</div>
</div>
</div>
</section>
<!--find job by category section ends here-->

<!--recent jobs starts here-->
<section class="recent">
<div class="container">
<h1>Recently Posted</h1>
<?php
$curr_date=date("d-m-Y");
$date= $curr_date-4;
$year=date('Y');
$month=date('m');
$str=$year.'-'.$month.'-'.$date.'%';
$date=$date+1;
$str1=$year.'-'.$month.'-'.$date.'%';
$date=$date+1;
$str2=$year.'-'.$month.'-'.$date.'%';
$date=$date+1;
$str3=$year.'-'.$month.'-'.$date.'%';
$date=$date+1;
$str4=$year.'-'.$month.'-'.$date.'%';
$sql="select * from jobs where posted like '$str' or posted like '$str1' or posted like '$str2' or posted like '$str3' or posted like '$str4' order by posted DESC";
$result=$con->query($sql);
while($record=$result->fetch_assoc())
{
?>
<div class="row recent-jobs" >
<div class="col-lg-4 rj-title">
<h4><?php echo $record['job_title']; ?></h4>
</div>
<div class="col-lg-2 rj-location">
<span class="glyphicon glyphicon-map-marker"> <h4>location</h4></span>
</div>
<div class="col-lg-2 rj-posted">
<span class="glyphicon glyphicon-time"> <h4><?php $posted=date_create($record['posted']); echo date_format($posted,"F d"); ?></h4></span>
</div>
<div class="col-lg-4">
<a href="" class="thm-btn">view details</a>
</div>
</div>
<?php } ?>
</div>
</div>
</div>
</section>
<!--recent jobs ends here-->

<!--Top employers starts here-->
<section class="top-emp">
<div class="container">
<div class="row top-employers">
<h1>Our Top Employers </h1>
<h4 align="center">coming soon</h4>
</div>
</div>
</section>
<!--Top employers ends here-->

<!--footer section starts here-->
<?php
include_once 'footer.php';
?>
<!--footer section ends here-->

</body>
</html>
