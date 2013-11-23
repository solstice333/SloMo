<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Vendors</title>
</head>

<body>
    <div class="navbar navbar-default navbar-fixed-top">
          <div class="container">
            <div class="navbar-header">
                <a class="navbar-brand" href="index.html">SLO Farmers Market</a>
            </div>
            <div class="navbar-collapse collapse">
                <ul class="nav navbar-nav">
                    
                    
                    <li class="dropdown">
                      <a href="#" class="dropdown-toggle" data-toggle="dropdown">Vendors<b class="caret"></b></a>
                      <ul class="dropdown-menu">
                        <li class="dropdown-header">Produce</li>
                        <li><a href="#">Vegetables</a></li>
                        <li><a href="#">Fruit</a></li>
                        <li class="divider"></li>
                        <li class="dropdown-header">Cooked</li>
                        <li><a href="#">Vegetarian</a></li>
                        <li><a href="#">Carnivores</a></li>
                        <li class="divider"></li>
                        <li><a href="#">Other</a></li>
                      </ul>
                    </li>
                    <li><a href="review.html">Write a Review</a></li>
                    <li><a href="map.html">Map</a></li>
                    <li><a href="contact.html">Contact</a></li>
                    
                </ul>
            </div><!---end navbar-collapse--->
             
          </div><!---end of container--->
    </div>
    

    <section id="vendors-list">
        <div class="container">
            <h2>Vendors</h2>
                <div class="list-group">
                  <a href="#" class="list-group-item active">Produce</a>
                  <a href="#johnsmith" class="list-group-item">John Smith
                    <table class="table">
                        <tr> 
                            <td>Type of Food</td>
                            <td>Location of Farm</td>
                            <td>Bio</td>
                        </tr>
                    </table>
                  </a>  
                  <a href="#" class="list-group-item">Produce Farmer 2</a>
                  <a href="#" class="list-group-item">Produce Farmer 3</a>
                  <a href="#" class="list-group-item">Produce Farmer 4</a>  
                </div>     
            

                <div class="list-group">
                  <a href="#" class="list-group-item active">Cooked</a>
                  <a href="#" class="list-group-item">BBQ</a>
                  <a href="#" class="list-group-item">Sushi</a>
                  <a href="#" class="list-group-item">Corn</a>
                  <a href="#" class="list-group-item">Kettle Corn</a>  
                </div>  
                
                <div class="list-group">
                  <a href="#" class="list-group-item active">Other</a>
                  <a href="#" class="list-group-item">Clothing</a>
                  <a href="#" class="list-group-item">Clothing 2</a>
                  <a href="#" class="list-group-item">Gifts</a>
                  <a href="#" class="list-group-item">Gifts 2</a>  
                </div> 
                
                
    </section>  
    <!---
    <section id="reviews">
        <div class="container">
            <h2>Reviews</h2>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h3 class="panel-title" section id="johnsmith">Panel title</h3>
                  </div>
                  <div class="panel-body">
                    Panel content
                  </div>
                </div>
        </div>
    </section>
    -->

<?php
getIntoDB("SLO BBQ");
getIntoDB("ABC Foods");
function getIntoDB($name)
{

// include db connect class
require_once __DIR__ . '/db_connect.php';

// connecting to db
$db = new DB_CONNECT();

// get all products from products table
//$result = mysql_query("SELECT * FROM reviewers ORDER BY businessName") or die(mysql_error());


// IF YOU ONLY WANT TO SHOW REVIEWS OF A PARTICULAR TYPE 
// UNCOMMENT LINE BELOW

$result = mysql_query("SELECT * FROM reviewers WHERE businessName='$name'") or die(mysql_error());


$numberOfRows = mysql_num_rows($result);
if ($numberOfRows == 0) {
 ?>
<p>Sorry, there are no reviews yet for this farm </p>
<?php }
else 
{
?>
<section id="reviews">
<div class="container">
    <h2>Reviews</h2>
       <?php while($row = mysql_fetch_array($result)) : ?>
        <div class="panel panel-default">
            <div class="panel-heading">
                <h4 class="panel-title" section id="johnsmith">
                <b> <?php echo $row['firstname'] . '&nbsp;';echo $row['lastname']; ?></b> 
                <br>
                <?php echo $row['businessName']; ?>
                </h4>
            </div>
        <div class="panel-body">
            <?php echo $row['comment']; ?> 
        </div>
</div>

<?php 
endwhile; 
} $db.close()
?>
</section>

<?php } ?>


<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
<script src="js/farmer.js"></script>
    
</body>
</html>
