<?php 
//haetaan kuvien id:t

//Lisätään sivulle tietokanta
include("db.php");

//haetaan kuvat ja sortataan se kuvan lisäysajan perusteella
$receive_pic = mysql_query("SELECT * FROM kuvat LEFT JOIN users ON kuvat.kuvan_lisannyt_id = users.id ORDER BY kuvan_lisaysaika DESC");
    //tarkistetaan että onko kuvia olemassa
    if ($receive_pic == '') {
        //kuvia ei löydetty
    } else {
        //Hakee kuvien tiedot tietokannasta ($receive_pic) 
        while($row_receive_pic = mysql_fetch_array($receive_pic)) {
            //kirjataan muistiin kuvien tiedot
            $receive_pic_id = $row_receive_pic["kuva_id"]; //kuvan id
            $receive_pic_desc = $row_receive_pic["kuvan_teksti"]; //kuvan teksti
            $receive_pic_added = $row_receive_pic["kuvan_lisannyt_id"]; //lisääjän id (käyttäjä)
            $receive_pic_link = $row_receive_pic["kuvan_linkki"]; //kuvan linkki
            $receive_pic_addtime = $row_receive_pic["kuvan_lisaysaika"]; //kuvan lisäysaika
        }
    }


?>

<?php

//haetaan käyttäjätiedot
$username = $_COOKIE['ID_my_site'];  
$userdata = mysql_query("SELECT * FROM users WHERE username = '$username'");
$_SESSION = mysql_fetch_assoc($userdata);
?>


<!--DOCTYPE html -->
<html><head>
    <meta charset="utf-8">
    <title></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link href="bootstrap/css/bootstrap.css" rel="stylesheet">

    <link href="css/flat-ui.css" rel="stylesheet">
    
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-contact.css" rel="stylesheet">
    <link href="css/style-content.css" rel="stylesheet">
    <link href="css/style-footers.css" rel="stylesheet">
    <link href="css/style-headers.css" rel="stylesheet">
    <link href="css/style-portfolios.css" rel="stylesheet">
    <link href="css/style-pricing.css" rel="stylesheet">
    <link href="css/style-team.css" rel="stylesheet">
    <link href="css/style-dividers.css" rel="stylesheet">
    
    <!-- Font Awesome -->
    <link href="css/font-awesome.css" rel="stylesheet">


</head>
<body>
    
    <div id="page" class="page">
        
    <header class="item header margin-top-0 padding-bottom-0">
    
    		<div class="wrapper">   	
    			<div class="container">   		
    				<nav role="navigation" class="navbar navbar-inverse navbar-embossed navbar-lg navbar-fixed-top">
    					<div class="container">
    				
    						<div class="navbar-header">
    							<button data-target="#navbar-collapse-02" data-toggle="collapse" class="navbar-toggle" type="button">
    								<span class="sr-only">Toggle navigation</span>
    							</button>
    							<a href="#" class="navbar-brand brand" data-selector="nav a, a.edit" style="outline: none; cursor: default;"> KUVATON</a>
   							</div>
    								
    						<div id="navbar-collapse-02" class="collapse navbar-collapse">
    							<ul class="nav navbar-nav">			      
    								<li class="propClone"><a href="etusivu" data-selector="nav a, a.edit" src="images/uploads/sharing.economy image.jpg" style="outline: none; color: rgb(253, 253, 253); font-weight: bold; text-transform: none;">ETUSIVU</a></li>
    								<li class="active propClone"><a href="#" data-selector="nav a, a.edit" style="outline: none;">KUVIA</a></li>
    								<li class="propClone"><a href="tietoa" data-selector="nav a, a.edit" src="images/image1.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;">YHTEYSTIEDOT</a></li>
    								<br>
    							</ul> 		      
    							<ul class="nav navbar-nav navbar-right">
    								<?php 
                                    if ($_COOKIE[ID_my_site] == '') {
                                        //jos käyttäjä ei ole kirjautunut sisään!
                                        ?> 
                                            <li class="propClone">
                                            <a href="auth" data-selector="nav a, a.edit" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat-one-color/72/profle-icon.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;">KIRJAUDU SISÄÄN&nbsp;<span class="fa fa-lock" data-selector="span.fa" style="outline: none;"></span></a>
                                            </li>
                                        <?php
                                    } else {
                                    ?>
                                    <li class="propClone">
                                        <a href="auth" data-selector="nav a, a.edit" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat-one-color/72/profle-icon.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;"><?php echo $_SESSION["email"]; ?>&nbsp;</a>
                                    </li>
                                    <?php 
                                    }
                                    ?>
    							</ul>
    						</div>    					
    					</div>    					
    				</nav>
    			
    				<div class="row banner">
    					<div class="col-md-12">    				    						
    						<div class="text-center">
    							
    						</div>    				
    					</div>    			
    				</div>    		
    			</div>    	
    		</div>
    	
    	</header>

    <div class="item portfolio">
    		
    		<div class="container">
    		
    			<div class="row margin-bottom-40">
    			
    				<div class="col-md-12">
    				<br><br>
    					<p class="lead text-center" data-selector="p" style="outline: none;">
    						KUVIA</p>
    				
    				</div>    			
    			</div>
    		    		
    			<div class="row margin-bottom-20">
    			
    				<div class="col-md-16 text-center">
    				   <br>

<?php


                    //haetaan kuvat ja sortataan se kuvan lisäysajan perusteella
                    $receive_pic = mysql_query("SELECT * FROM kuvat");
                        //tarkistetaan että onko kuvia olemassa
                        if ($receive_pic == '') {
                            //kuvia ei löydetty
                        } else {
                            //Hakee kuvat tietokannasta ($receive_pic) 
                            while($row_pic = mysql_fetch_array($receive_pic)) {
                               echo '<a style="padding:10px;" href="kuva.php?kuva_id='.$row_pic["kuva_id"].'"><img style="border: 1px solid black;" width="148" height="128" alt="'.$row_pic["kuvan_teksti"].'" src="'.$row_pic["kuvan_linkki"].'"></img></a>';
                            }
                        }


?>

    						    					    				
    				</div><!-- /.col-md-3 col -->
    			
    			</div><!-- /.row -->
    		
    		</div><!-- /.container -->
    	
    	</div><!-- /.item --><div class="footerWrapper">
    
    </div><!-- /#page -->


    <!-- Load JS here for greater good =============================-->
    <script src="js/jquery-1.8.3.min.js"></script>
    <script src="js/jquery-ui-1.10.3.custom.min.js"></script>
    <script src="js/jquery.ui.touch-punch.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <script src="js/bootstrap-select.js"></script>
    <script src="js/bootstrap-switch.js"></script>
    <script src="js/flatui-checkbox.js"></script>
    <script src="js/flatui-radio.js"></script>
    <script src="js/jquery.tagsinput.js"></script>
    <script src="js/jquery.placeholder.js"></script>
    <script src="js/application.js"></script>
    <!-- lightbox lisäosa (jotta voisi avata kuvia isompana) -->
    <script src="lightbox/dist/js/lightbox-plus-jquery.min.js"></script>

</body></html>
