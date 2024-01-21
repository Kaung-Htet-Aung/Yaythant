<?php 
   session_start();
   if(!isset($_SESSION['user'])){
         
   }
  
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>
   <meta name='viewport' content='width=device-width, initial-scale=1'>
<script src='https://kit.fontawesome.com/a076d05399.js' crossorigin='anonymous'></script>
   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../css/style.css">
</head>
<body>
   


<?php include 'header.php'; ?>

     <div>
        <img src="../images/min.jpg" alt="" width="100%" height="520">
    </div>
<div>
    
<section class="products">
<div style="display:flex;justify-content:space-evenly;margin-top:40px">
            <div> 
            <img src="../images/photo1.jpg" alt=""width="540" height="350">
                 
            </div>
            <div style="margin-top:50px;margin-left: 50px; font-size:15px ;
            color: #330000;font-weight: 100;margin-right: 40px;">

               <div class="about">
                   <h2>Who We Are</h2> <br>
                   <h3>Established in 2010 in Yangon, Sampar Oo is one of Myanmarâ€™s leading beverage brand owner, producing high quality pure water, mineral water, energy drink, fruit flavor drink and electrolyte drink.</h3> <br>
                  
                </div>
            </div>    
      </div>  
   </section>   
</div>

 <div style="background-color:pink">
     <div class="container">
        <h2 style="padding:10px">Contact with us</h2>
     </div>
 </div>


 <div style="display:flex;justify-content:space-evenly;margin-top:40px">
           
            <div style="margin-top:50px; margin-left: 50px;">
                   <h2>No. 113, Kanaung Minthar Gyi Street, zone(4) Shwe Pyi Thar Industrial Zone, Shwe Pyi Thar Township, Yangon, Myanmar. </h2> <br>

                   <h2 style="color:#336699">
                   <i class='fas fa-map-marker-alt'></i>
                   <a href="https://goo.gl/maps/5uDf6vurgnLGHz3FA">VIEW MAP</a></h2><br>

                   <h2>Tel: (+95 1) 618 302, (+95 1) 618 307, (+95 9) 550 4808, (+95 9) 508 0512</h2> <br>

                   <h2>Email: admin@samparoo.com, info@samparoo.com</h2> <br>

            </div>
            <div style="margin-right:30px ;"> 
              <img src="../images/photo2.jpg" alt=""width="540" height="350">
                 
            </div>
      </div>


 
<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>