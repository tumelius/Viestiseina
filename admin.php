<?php
// index.php

session_start();
include 'autentikoi.php';

if ( autentikoiBasic() === false ) {
	header("refresh:2;url=tietovisa.php");
	die("<h1 style=\"color: red;\">Pääsy evätty! Mene pois!</h1>");
}


$page_title = 'Viestiseinän moderointi';
$output = '<h2>Tervetuloa ylläpitoon</h2>';


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
<link rel="stylesheet" type="text/css" href="css/bootstrap.min.css" />
<meta rel="viewport" content="width=device-width, initial-scale=1" />
<link rel="shortcut icon" href="img/favicon.ico" type="image/x-icon">
<link rel="icon" href="img/favicon.ico" type="image/x-icon">
<script src="js/jquery-1.11.1.js"></script>
<script src="js/bootstrap.js"></script>
</head>
<body>
	<div class="container">
		<div class="page-header">
			<h1><?php echo ( isset($page_title) ) ? $page_title : 'Sivun title' ; ?></h1>
		</div>
		<div id="content" class="row container">
                    <div class="alert alert-info alert-dismissible" role="alert">
                        <button type="button" class="close" data-dismiss="alert" aria-label="Close"><span aria-hidden="true">&times;</span></button>    
                        Info
                    </div>
		<?php echo $output; ?>
		</div>
	</div>
	
	<script>

function showAdminMessages(){
	$.post( "getAdminMessages.php", function( data ) {
		$( "#message-area" ).html( data );
                //alert('Tsekattiin viestit!');
	});
}

$( document ).ready( function(){
	
        $(".alert").hide();
        
	// Käydään hakemassa viestit kannasta
	 showAdminMessages();
	
	// Asetetaan sivu hakemaan viestit n sekunnin välein
        
        setInterval( function(){
		showAdminMessages();
		//alert('hep');
	}, 5000 );    
        
	//setInterval( showAdminMessages(), 1000 );

	$("#content").on("click", "a.poista", function() {
            var id = $(this).data('viesti-id');
            $.ajax({
                    type: "POST",
                    url: 'delMessage.php',
                    data: { id : $(this).data('viesti-id')},
                    success: function( data ){
                       
                        if ( data !== 'ok' ) alert( data );
			else { 
                            $(".alert").html('Viesti ' + id + ' poistettiin onnistuneesti!').show().fadeOut(5000);
                            showAdminMessages();
                        }
                    }, 
                    statusCode: {
                        404: function() {
                                alert( "page not found" );
                        }
                    },
                    dataType: 'html'
              
            });
	}).on("click", "a.julkaise", function(){
            var id = $(this).data('viesti-id');
            $.ajax({
                type: "GET",
                url: "publishMessage.php",
                data: { id : id },
                dataType: "html",
                success: function( data ) {
                    showAdminMessages();
                    $(".alert").html('Viesti ' + id + ' julkaistiin onnistuneesti!').show().fadeOut(5000);
                },
                statusCode: {
                        404: function() {
                                alert( "page not found" );
                        }
                    }
            });
        }).on("click", "a.piilota", function(){
            var id = $(this).data('viesti-id');
            $.ajax({
                type: "GET",
                url: "unpublishMessage.php",
                data: { id : id },
                dataType: "html",
                success: function( data ) {
                    showAdminMessages();
                    $(".alert").html('Viesti ' + id + ' piilotettiin onnistuneesti!').show().fadeOut(5000);
                },
                statusCode: {
                        404: function() {
                                alert( "page not found" );
                        }
                    }
            });
        });

	
	
});

</script>
	
</body>
</html>