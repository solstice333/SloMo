<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
    <link rel="stylesheet" href="css/bootstrap.css">
    <link rel="stylesheet" href="css/style.css">
    
    <title>Farmers</title>
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
    
    <div class="container">
        <div class="review-title">
            <h2>Contact</h2>
        </div>
    </div>
    <div class="container">
      For additional information regarding SLO Farmer's Market, contact the SLO County Farmers' Market Association
      <address>
      <strong>Telephone</strong><br>
      805-544-9570<br>
      SLO FMA<br>
      P.O. Box 16058<br>
      San Luis Obispo, CA 93401<br>
      </p>

      <form action="contact.php" method="post">
         Search Companies: <input type="text" name="vendor" /><br><br>
      <input type="submit" />
      </form>

      <?php
         $searchthing = $_POST["vendor"];
      ?>
      
      <table width="100%">
         <col width="15">
         <col width="15">
         <col width="30">
         <col width="100">
      <?php
         require_once 'db_connect.php';

         $db = new DB_CONNECT();

         $result = mysql_query("SELECT * FROM reviewers ORDER BY businessName") or die(mysql_error());
      ?>

      <tr>
      <td> Reviews </td>
      </tr>

      <tr> 
         <th> FirstName    </th>
         <th> Lastname     </th> 
         <th> Business     </th>
         <th> Comment      </th>
      </tr>

      <?php
         while($row = mysql_fetch_array($result)) :
      ?>

      <tr>
      <td>
         <font face="Arial, Helvetica, sans-serif">
         <?php
            if($row['businessName'] == $searchthing) 
               echo $row['firstname'] . '&nbsp;';
         ?>
         </font>
      </td>

      <td>
         <font face="Arial, Helvetica, sans-serif">
         <?php
           if($row['businessName'] == $searchthing) 
              echo $row['lastname'] . '&nbsp;';
         ?>
         </font>
      </td>

      <td>
         <font face="Arial, Helvetica, sans-serif">
         <?php
           if($row['businessName'] == $searchthing) 
              echo $row['businessName'] . '&nbsp;';
         ?>
         </font>
      </td>

      <td>
         <font face="Arial, Helvetica, sans-serif">
         <?php
           if($row['businessName'] == $searchthing) 
              echo $row['comment'] . '&nbsp;';
         ?>
         </font>
      </td>
      </tr>

      <?php 
         endwhile; 
         $db.close()
      ?>

      </table>

   </div>
</body>
