<?php 

//lisätään tietokanta yhteys
include("../mvrclabs/uploads/8/0/4/6/8046813/tietokanta.php");


//https://marcosraudkett.com/
//hakee kuvan joka on valittu,
//$_GET["kuva_id"] = kuvan id.

//Aluksi haetaan kuvan id ja sillä haetaan tietokannasta tarvittavat tiedot.

$selected_pic = $_GET["kuva_id"];

//tarkistaa jos $_GET on lähetetty
if ($selected_pic == '') {
    //tässä voidaan vaikka palauttaa käyttäjä jonnekki muualle. esim '404.php, index.php'
    //koodilla ->    header("Location: 404.php");    jos halutaan.
} else {
    //Hakee valitun kuvan tiedot tietokannasta ($selected_pic) 
    $select_pic = mysql_query("SELECT * FROM kuvat WHERE kuva_id = '$selected_pic' LIMIT 0, 1");
        //tarkistetaan onko kuva olemassa
            if ($select_pic == '') { 
                //tähän voitais myös ilmoittaa että kuvaa ei löytynyt yms tai lähettää jonnekki muualle..
                header("Location: kuvat");
            } else {
                //jos kuva on olemassa niin haetaan kuvan tiedot tietokannasta.
            while ($row_pic = mysql_fetch_array($select_pic)) {
                    //tässä kirjataan kuvan tiedot muistiin.
                    $selected_pic_link = $row_pic["kuvan_linkki"]; //kuvanlinkki
                    $selected_pic_text = $row_pic["kuvan_teksti"]; //kuvateksti
                    $selected_pic_added = $row_pic["kuvan_lisannyt_id"]; //käyttäjä id
                    $selected_pic_lisaysaika = $row_pic["selected_pic_lisaysaika"]; //lisäysaika

                }
        }

    //Hakee kyseisen kuvan kommentit ja $select_comment_count = laskee kommentien määrät ja limitoidan se että vain 10 uusinta kommenttia näkyy jotta
    //sivusta ei tulisi liian pitkä. (tämänki vois toteutta AJAX scriptin kautta esim kun scrollaa alaspäin niin se hakee lisää kommentteja..)
    $select_comment = mysql_query("SELECT * FROM kommentit WHERE kommentti_kuvan_id = '$selected_pic_added' ORDER BY kommentti_lisaysaika DESC LIMIT 0, 7");
    $select_comment_count = mysql_query("SELECT (*) as total FROM kommentit WHERE kommentti_kuvan_id = '$selected_pic_added'");
        //tarkistetaan onko kommentteja olemassa
            if ($select_comment == '') { 
                //tähän voitais myös ilmoittaa että kuvaa ei löytynyt yms tai lähettää jonnekki muualle..
            } else {
                //jos käyttäjä on olemassa niin haetaan kuvan tiedot tietokannasta.
            while ($row_comment = mysql_fetch_array($select_comment)) {
                    //tässä kirjataan käyttäjän tiedot muistiin.
                    $selected_comment_id = $row_comment["kommenti_id"]; //käyttäjän id
                    $selected_comment_sisalto = $row_comment["kommentin_sisalto"]; //käyttäjänimi
                    $selected_comment_lisannyt = $row_comment["kommentin_lisannyt"]; //sähköposti
                    $selected_comment_kuva = $row_comment["kommentin_sisalto"]; //sähköposti
            }
    }

    //Hakee kuvan lisäjän tiedot joka on kirjattu muistiin "kuvat" tietokannasta. ($selected_pic_added)
    $select_user = mysql_query("SELECT * FROM users WHERE id = '$selected_pic_added' LIMIT 0, 1");
        //tarkistetaan onko kuva olemassa
            if ($select_user == '') { 
                //tähän voitais myös ilmoittaa että kuvaa ei löytynyt yms tai lähettää jonnekki muualle..
            } else {
                //jos käyttäjä on olemassa niin haetaan kuvan tiedot tietokannasta.
            while ($row_user = mysql_fetch_array($select_user)) {
                    //tässä kirjataan käyttäjän tiedot muistiin.
                    $selected_user_id = $row_user["id"]; //käyttäjän id
                    $selected_user_username = $row_user["username"]; //käyttäjänimi
                    $selected_user_email = $row_user["email"]; //sähköposti
            }
    }

    //Haetaan sisäänkirjautunut käyttäjä cookiella myös
    //tämä kannattaisi siirtää addcomment.php scriptiin estääkseen SQL Injunction:ia
    $username = $_COOKIE[ID_my_site];
    $select_username = mysql_query("SELECT * FROM users WHERE username = '$username' LIMIT 0, 1");

            while ($row_loguserbef = mysql_fetch_array($select_username)) {
                        //tässä kirjataan kuvan tiedot muistiin.
                        $selected_user_id_before = $row_loguserbef["id"]; //käyttäjän ID
            }
        $select_user_logged = mysql_query("SELECT * FROM users WHERE id = '$selected_user_id_before' LIMIT 0, 1");
            //tarkistetaan onko kuva olemassa
                if ($select_user_logged == '') { 
                    //tähän voitais myös ilmoittaa että kuvaa ei löytynyt yms tai lähettää jonnekki muualle..
                } else {
                    //jos kuva on olemassa niin haetaan kuvan tiedot tietokannasta.
                while ($row_loguser = mysql_fetch_array($select_user_logged)) {
                        //tässä kirjataan kuvan tiedot muistiin.
                        $selected_user_id_after = $row_loguser["id"]; //käyttäjän ID
                        $selected_user_username_after = $row_loguser["username"]; //käyttäjän username
                        $selected_user_email_after = $row_loguser["email"]; //käyttäjän sähköposti

                    }
            }
}

//nyt voidaan käyttää joka puolella sivulla $selected_pic_VALINTA tai $selected_user_VALINTA

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
    								<li class="propClone">
    									<a href="auth" data-selector="nav a, a.edit" src="http://icons.iconarchive.com/icons/elegantthemes/beautiful-flat-one-color/72/profle-icon.png" style="outline: none; color: rgb(255, 255, 255); font-weight: bold; text-transform: none;">KIRJAUDU SISÄÄN&nbsp;<span class="fa fa-lock" data-selector="span.fa" style="outline: none;"></span></a>
    								</li>
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
    						KUVA</p>
    				
                    <center>

                        <div class="dropbox">
                            <?php
                            //tässä voidaan hakea se kuva ja kaikki sen tiedot jotka haettiin scriptin alussa.
                                
                                //tarkistaa löydettiinkö kuva
                                if ($selected_pic_link == '') {
                                    //ilmoittaa että kuvaa ei löydetty
                                    echo 'Kyseistä kuvaa ei löydetty!';
                                } else {
                                    //tulostaa kuvan
                                    echo '<img style="max-height:460px;max-width:500px;border:1;" src="'.$selected_pic_link.'"></img>';
                                    echo '<div class="description">'.$selected_pic_text.'</div>';
                                }

                                //tarkistaa löydettiinkö käyttäjä 
                                if ($selected_user_username == '') {
                                        //tähän voidaan vaikka ilmoittaa jos kuvaa ei löydetty
                                    } else {
                                        //tulostaa kuvan lisääjän tiedot
                                        echo '<p><b>Lisännyt: </b>' . $selected_user_username. '</p>';

                                        //aluksi tehdään päivämäärästä luonnollinen muoto
                                        date_default_timezone_set('Finland/Helsinki');
                                        $time = ucwords(strftime("%d %b",  strtotime($selected_pic_lisaysaika)));  date_default_timezone_set('Europe/Helsinki');
                                        //tulostaa kuvan lisäämisajan
                                        echo '<p>Lisätty: ' . $time . '</p>';
                                }


                                echo '<div class="fb-send" data-href="'.$selected_pic_link.'"></div>';

                            ?>
                            </div>


                            <div class="comments">
                            <h4><?php echo $select_comment_count; ?> Kommentit</h4>
                                <?php
                                    //tarkistaa onko kommentteja olemassa
                                    if ($select_comment_count < 0) {
                                        //kommentteja ei löytynyt
                                        echo '<p>0 Kommenttia</p>';
                                    } else {

                                    $select_comment_print = mysql_query("SELECT * FROM kommentit WHERE kommentti_kuvan_id = '$selected_pic_added' ORDER BY kommentti_lisaysaika DESC");
                                        while ($row_comment_print = mysql_fetch_array($select_comment_print)) {
                                            echo '<br><br><div style="border-style: solid; border-width: 1px;width:250px;" class="comment">';
                                                //tulostetaan kommentti
                                                //tarkistaa onko kommentilla lisääjää
                                                if ($row_comment_print["kommentin_lisannyt"] == '') {
                                                    echo '<p>'.$row_comment_print["kommentin_sisalto"].'</p>';
                                                    echo '<h4 style="text-align:right;font-size:14px;margin-right:5px;margin-top:-5px;margin-bottom:5px;">Tuntematon</h4>';
                                                } else {
                                                    echo '<p>'.$row_comment_print["kommentin_sisalto"].'</p>';
                                                    echo '<h4 style="text-align:right;font-size:14px;margin-right:5px;margin-top:-5px;margin-bottom:5px;">Lisännyt: '.$row_comment_print["kommentin_lisannyt"].'</h4>';
                                                }
                                            echo '</div><br>';
                                        }
                                    }
                                
                            //kommentin lisäykseen oltais voitu myös käyttää AJAXia jotta lisäys toimisi reaaliaikaisesti?
                            //addcomment.php ja name="->comment<-" voitais myös vaihtaa .htaccess tiedostosta joksikin tai vaikka piiloittaa hashatulla tokenillä.
                            ?>
                            <div class="form-style-1">
                                <form id="contact_form" name="comment" method="post" action="addcomment.php" enctype="multipart/form-data">
                                        <div class="row">
                                            <br><label style="margin-left:30px;float:left;" for="comment">Teksti*:</label><br><br>
                                            <input style="visibility:hidden;" name="u_id" value="<?php echo $selected_user_username_after; ?>"></input>
                                            <input style="visibility:hidden;" name="kuvaid" value="<?php echo $selected_pic; ?>"></input>
                                            <textarea id="comment" class="input" name="comment" rows="5" cols="32" placeholder="Lisää kommentti tähän..."></textarea><br />
                                        </div><br>
                                    <input id="submit_button" type="submit" value="Kommentoi" />
                                </form>     
                            </div>
                        </div>


                    </center>
    				</div>    			
    			</div>
    		    		
    			<div class="row margin-bottom-20">
    			
    				<div class="col-md-3">
    				   <br>
    <?php
        //tulostetaan kuvat uploads/ kansiosta ja ilmoitetaan sen tiedot tietokannasta
        echo '<a href="kuva.php?kuva_id='.$receive_pic_id.'"><img style="border: 1px solid black;" width="148" height="128" alt="'.$receive_pic_desc.'" src="'.$receive_pic_link.'"></img></a>';

    ?>
    						    					    				
    				</div>
    			</div>
    		</div>
    	</div><div class="footerWrapper">
    </div>

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