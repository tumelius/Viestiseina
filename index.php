<?php
$page_title = 'Suuri viestiseinä';
$output = '<h2>Lisää viesti</h2>';

$form = '
<form class="" role="form" method="post" id="viestiForm">
	<div class="form-group">
		<label for="nimi">Nimi</label>
		<input type="text" name="nimi" id="nimi" placeholder="Anna nimesi" class="form-control" />
	</div>
	<div class="form-group">
		<label for="viesti">Viesti</label>
		<textarea rows="5" id="viesti" name="viesti" class="form-control" max-length="255" placeholder="Kirjoita viesti tähän"></textarea>
	</div>
	<div class="form-group">
		<button id="btn-send" class="btn btn-primary btn-lg">Lähetä viesti</button>
	</div>
</form>
';

$output .= $form;
?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title><?php echo ( isset($page_title) ) ? $page_title : 'Sivun title' ; ?></title>
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
                    <!--div class="container-fluid"-->
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle collapsed" data-togle="collapse" data-target="#valikko"> 
                                <span class="sr-only">Toggle navigation</span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                                <span class="icon-bar"></span>
                            </button>
                            <a class="navbar-brand" href="#"><img src="img/esedu_png_40y.png" alt="esedulogo" height="35"/></a>
                        </div>

                        <div class="collapse navbar-collapse" id="valikko">
                            <p class="navbar-text">Tervetuloa Esedun viestiseinälle!</p>
                            <ul class="nav navbar-nav">
                                <li><a href="wall.php">Seinä</a></li>
                                <li><a href="admin.php">Ylläpito</a></li>

                            </ul>
                        </div>
                    <!--/div-->
                    
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
$(document).ready(function(){
	
        /* Ajax, joka lähettää viestin */
        $("#btn-send").on('click', function(){
		$.ajax({
			type: "POST",
			url: "addMessage.php",
			data: $('#viestiForm').serialize(),
			statusCode: {
				404: function() {
					alert( "page not found" );
				}
			},
			success: function( data ) { 
				alert (data);
				if ( data !== 'ok' ) alert('Ei onnistunut!');
				else alert('Onnistui');
			}
		
		});
		
	});
        
/* Animaatio-koodi */
var animationDelay = 2500;
 
animateHeadline($('.cd-headline'));
 
function animateHeadline($headlines) {
	$headlines.each(function(){
		var headline = $(this);
		//trigger animation
		setTimeout(function(){ hideWord( headline.find('.is-visible') ) }, animationDelay);
		//other checks here ...
	});
}

function hideWord($word) {
	var nextWord = takeNext($word);
	switchWord($word, nextWord);
	setTimeout(function(){ hideWord(nextWord) }, animationDelay);
}
 
function takeNext($word) {
	return (!$word.is(':last-child')) ? $word.next() : $word.parent().children().eq(0);
}
 
function switchWord($oldWord, $newWord) {
	$oldWord.removeClass('is-visible').addClass('is-hidden');
	$newWord.removeClass('is-hidden').addClass('is-visible');
}

});

</script>	
	
</body>
</html>