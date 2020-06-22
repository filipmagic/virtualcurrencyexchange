<?php
 include 'includes/dbconn.php';
 include 'lista_valuta.php';
 include 'includes/navigacija.php';
session_start();


?>
<!DOCTYPE html>
<html>
 <head>
  <title>Početna</title>
  <link rel="stylesheet" href="css/style.css" style="type/css" />
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <meta charset="UTF-8" />
 </head>
 <body>
   <header>
   	 <nav>
   	 	<ul>
   	 	    <?php NavigacijaTop(); ?>
   	 	</ul>
   	 </nav>
   </header>
   <?php Navigacija(); ?>

   <section class="container">
   	  <?php
   	   ListaValuta();
   	  ?>
   </section>
   <div class="overlayBack"></div>
   <div class="overlay">


   </div>
 

   <script type="text/javascript">
    $(document).ready(function(){
        $('.valuta').click(function(){
        	$('.overlay').css('display', 'block');
        	$('.overlayBack').css('display', 'block');
        	var valutaid = $(this).attr('id');
            $.ajax({
                type: 'POST',
                url: 'valuta.php',
                data: {
                	"tekst": 1,
                	"valutaid": valutaid,
                },
                success: function(response) {
                    $('.overlay').html(response);
                    

                }
            });
   });
 });
      
$(document).on('click','.closeBtn span',function(){
    $('.overlay').css('display', 'none');
    $('.overlayBack').css('display', 'none');
});

$(document).on('click','.overlayBack',function(){
    $('.overlay').css('display', 'none');
    $('.overlayBack').css('display', 'none');
});


</script>
 </body>
</html>
