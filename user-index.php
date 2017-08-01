
<?php
session_start();
if(empty(isset($_SESSION['username']))){
$_SESSION['msg']="1";
header("location:login.php");
exit();
}
?>

<body>
<?php 
include_once 'header.php';
include_once 'config.php';
?>

<section class="admin-banner">
<h1>Welcome <?php echo $_SESSION['username']; ?></h1>
</section>

<section class="admin-section">
<div class="container-fluid">
<div class="row">
<div class="col-lg-4 col-sm-4 col-md-4 col-xs-12 admin-menu-list">
<ul>
<li><a onclick=load("user-apply.php")>Apply Now</a></li>
<li><a onclick=load("user-view.php">View Posted Jobs</a></li>
<li><a onclick=load"user-employer.php">View Employers</a></li>
<li><a onclick=load"resume.php">Update Resume</a></li>
<li><a onclick=load("upload-job.php">View Messages</a></li>
</ul>
</div>
<div class="col-lg-8 col-md-8 col-sm-8 col-xs-12 dashboard" id="demo">
</div>
</div>
</div>
</section>
<?php
include_once 'footer.php';
?>
<script>
function load(sub) {
	var page=sub;
  var xhttp = new XMLHttpRequest();
  xhttp.open("GET", page, false);
  xhttp.send();
  document.getElementById("demo").innerHTML = xhttp.responseText;
}
</script>

</body>
</html>
