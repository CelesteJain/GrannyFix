<?php 
  session_start(); 

  if (!isset($_SESSION['username'])) {
  	$_SESSION['msg'] = "You must log in first";
  	header('location: login.php');
  }
  if (isset($_GET['logout'])) {
  	session_destroy();
  	unset($_SESSION['username']);
  	header("location: login.php");
  }
?>

<!DOCTYPE html >
<html lang="en">
<head>
  <title>Index</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
   
    
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
    
<!DOCTYPE html>
<html lang="en">
<head>
    
    <link href="https://fonts.googleapis.com/css?family=Aclonica|Modern+Antiqua" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Cormorant" rel="stylesheet">
    <link href="https://fonts.googleapis.com/css?family=Bubblegum+Sans" rel="stylesheet">
    
    <link type="text/css" rel="stylesheet" href="index1.css">
</head>
<body>


  

<div class="page-header" id="div1">
    <div class="row">
    
    <div class="col-md-4">
    <img src="logosmall.jpg" width=210px class="img-thumbnail" alt="logo">
    </div>
    
    <div class="col-md-4"><br> <br> 
    <h1 class="text-center" >Granny's Fix</h1>
        <h4><center> What can be better than "Naani ke Nuske?"</center></h4>
    </div>
    
    <div class="col-md-4">
        <br><br>
    <ul class="list-inline text-right" >
    <li>
    	<!-- notification message -->
  	     <?php if (isset($_SESSION['success'])) : ?>
            <div class="error success" >
      	     <h3>
                 <?php 
                 echo $_SESSION['success']; 
          	     unset($_SESSION['success']);
                 ?>
      	     </h3>
            </div>
  	     <?php endif ?>

        <!-- logged in user information -->
            <p class="text-right" id="badge"> <strong>
             <?php  if (isset($_SESSION['username'])) : ?>
             <?php echo $_SESSION['username']; ?></strong>
            </p>
            <p class="text-right">
                <span class="label " > <a href="index.php?logout='1'" style="color: red;">logout</a>
                </span>
            </p>
    
        <?php endif ?>
      </li>
    </ul>
    </div> 
    </div>
</div>
    
  <div class="container" >  
<nav class="navbar navbar-inverse">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand " href="#">Home</a>
    </div>
    <ul class="nav navbar-nav">
      <li><a href="#form-main">FeedBack</a></li>
        <li><a href=""></a></li>
      </ul>
      <ul class="nav navbar-nav navbar-right">
          <li></li>
    </ul>
  </div>
</nav>  
<div class="container">
  <div style=" background-color: burlywood  ;">  
<br><br><br>
 <h1 class="text-center">Home Remedies </h1>  
    <div class="container text-center" >Home remedies will help you live a healthier life<br> without taking the risks of experiencing the side effects<br>of so many mainstream medicines.</div>
    
    <br><br><br>
<div class="row">
    <div class="col-sm-4">
        <a href="health.php">
            <button type="button"><center>
                <img src="health4.jpg" HEIGHT=300 WIDTH=500 class="img-thumbnail"></center>
            </button>
        </a>
    </div>
    <div class="col-sm-8">
    
        <h1><a href="health.php">  Health Ailments</a></h1>
        <p>People have managed to achieve good health throughout history without any fancy contraptions or expensive supplements (though arguably, they also faced less stress, pollution, and processed food than we do today).<br>

            In fact, if we just turn back to some of the basics that our grandparents instinctively knew, finding balance in health and wellness might not be as complicated as it seems..</p>
        
    </div>
 </div>
    <HR COLOR= white SIZE=20></HR>
 <div class="row">
    <div class="col-sm-8">
    
        <h1><a href="fitness.php">  Fitness and Body Care</a></h1>
        <p style="text-align: right">
            There are some diseases that become more common as we age. However, getting older does not automatically mean poor health or that you will be confined to a walker or wheelchair. Plenty of older adults enjoy vigorous health, often better than many younger people. Preventive measures like healthy eating, exercising, and managing stress can help reduce the risk of chronic disease or injuries later in life.
            These tips can help you maintain your physical and emotional health and live life to the fullest, whatever your age<br><br><br>
        </p>
        

    </div>
    <div class="col-sm-4"><br><br>
        <a href="fitness.php">
            <button type="button">
                <img src="yoga1.png" HEIGHT=600 WIDTH=500 class="img-thumbnail">
            </button>
        </a>
    </div>
</div>
    <HR COLOR= white SIZE=20></HR>

</div>
</div> 
      
      <div id="form-main">
  <div id="form-div">
    <form class="form" id="form1" method="post" >
      
      <p class="name">
        <input name="name" type="text" class="validate[required,custom[onlyLetter],length[0,100]] feedback-input" placeholder="Name" id="name" />
      </p>
      
      <p class="email">
        <input name="email" type="text" class="validate[required,custom[email]] feedback-input" id="email" placeholder="Email" />
      </p>
      
      <p class="text">
        <textarea name="text" class="validate[required,length[6,300]] feedback-input" id="comment" placeholder="Comment"></textarea>
      </p>
      
      
      <div class="submit">
        <input type="submit" value="SEND" id="button-blue"/>
        <div class="ease"></div>
      </div>
    </form>
  </div>
      </div>
<?php

    $result = false;

    $dbhost = 'localhost';
    $username = 'root';
    $password = '';
    $db = 'registration';

    if( $_SERVER['REQUEST_METHOD']=='POST' ){

        $conn = new mysqli ( $dbhost,$username, $password, $db );
        if( $conn ){

            $sql='insert into `feedback` ( `name`,`email`,`comment` ) values (?,?,?);';
            $stmt=$conn->prepare( $sql );
            $stmt->bind_param('sss', $_POST['name'], $_POST['email'], $_POST['text'] );
            $result = $stmt->execute();

        }
        $conn->close();
    }

?>
      
    </div>
</body>    
</html>
</body>
</html>