<?php
// index.php
$page_title = 'Suuri viestiseinä';
$output = '<h2>Uusimmat viestit</h2>';

$output .= '
<div id="message-area">

</div><!-- #message-area -->
';



?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ( isset($page_title) ) ? $page_title : 'Sivun title' ; ?></title>
<link href='http://fonts.googleapis.com/css?family=PT+Sans' rel='stylesheet' type='text/css'>
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<link rel="stylesheet" type="text/css" href="css/custom-style.css" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<meta rel="viewport" content="width=device-width, initial-scale=1" />

</head>
<body>
	<div class="container-fluid">
            <div class="row header">
                <nav class="navbar navbar-default navbar-fixed-top">
                    <div class="container-fluid">
                        <div class="navbar-header">
                            <a class="navbar-brand" href="#"><img src="img/esedu_png_40y.png" alt="esedulogo" height="35"/></a>
                            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#valikko">
                            <!--button type="button" class="navbar-toggle collapsed" data-togle="collapse" data-target="#valikko" aria-expanded="false" aria-controls="valikko"--> 
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <p class="navbar-text hidden-xs">Tervetuloa Esedun viestiseinälle!</p>
                        </div>

                        <div class="collapse navbar-collapse" id="valikko">
                        <!--div id="valikko" class="navbar-collapse collapse"-->
                            <ul class="nav navbar-nav">
                                <li><a href="index.php">Uusi viesti</a></li>
                                <li><a href="wall.php">Seinä</a></li>
                                <li><a href="admin.php">Ylläpito</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- <h1><php echo ( isset($page_title) ) ? $page_title : 'Sivun title' ; ?></h1>-->
                    
                </nav>
            </div>
            <div class="row container-fluid">
                <div class="col-md-6 col-md-offset-3">
                    <?php echo $output; ?>
                </div>
            </div>
	</div>

<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.min.js"></script>
<script>

function showMessages(){
    $.post( "getMessages2.php", function( data ) {
        $( "#message-area" ).html( data );
    });
}


$( document ).ready(function() {
	
	showMessages();
	
	setInterval( function(){
		showMessages();
		//alert('hep');
	}, 1000 );

});

</script>
	
</body>
</html>