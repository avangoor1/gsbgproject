<?php
	// Message Vars
	$msg = '';
	$msgClass = '';

	// Check For Submit
	if(filter_has_var(INPUT_POST, 'submit')){
		// Get Form Data
		$name = htmlspecialchars($_POST['name']);
		$email = htmlspecialchars($_POST['email']);
		$message = htmlspecialchars($_POST['message']);

		// Check Required Fields
		if(!empty($email) && !empty($name) && !empty($message)){
			// Passed
			// Check Email
			if(filter_var($email, FILTER_VALIDATE_EMAIL) === false){
				// Failed
				$msg = 'Please use a valid email';
				$msgClass = 'alert-danger';
			} else {
				// Passed
				$toEmail = 'ananya.vangoor@gmail.com';
				$subject = 'H4 Dreamer Story Request From '.$name;
				$body = '<h2>Contact Request</h2>
					<h4>Name</h4><p>'.$name.'</p>
					<h4>Email</h4><p>'.$email.'</p>
					<h4>Message</h4><p>'.$message.'</p>
				';

				// Email Headers
				$headers = "MIME-Version: 1.0" ."\r\n";
				$headers .="Content-Type:text/html;charset=UTF-8" . "\r\n";

				// Additional Headers
				$headers .= "From: " .$name. "<".$email.">". "\r\n";

				if(mail($toEmail, $subject, $body, $headers)){
					// Email Sent
					$msg = 'Your email has been sent';
					$msgClass = 'alert-success';
				} else {
					// Failed
					$msg = 'Your email was not sent';
					$msgClass = 'alert-danger';
				}
			}
		} else {
			// Failed
			$msg = 'Please fill in all fields';
			$msgClass = 'alert-danger';
		}
	}
?>


<!DOCTYPE html>
<html lang="en" class="scrolling-box">
   <head>
     <meta charset="utf-8">
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
	 <meta name="description" content="">  
       
     <link rel="stylesheet" type="text/css" href="vendors/css/normalize.css">
     <link rel="stylesheet" type="text/css" href="index.css">
     <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
     <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css">
     <link rel="stylesheet" type="text/css" href="vendors/css/animate.css">  
     <link rel="stylesheet" type="text/css" href="resources/css/index.css">
     <link rel="stylesheet" type="text/css" href="resources/css/queries.css">
     <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/ionicons/2.0.1/css/ionicons.css">
     <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400&display=swap" rel="stylesheet">   
     <title>Games By Code</title> 
	   
	
   </head>
   <body>
      <header id="begin">
         <nav>
           <div class="row">
              <ul class="main-navi js--main-nav">
              <li><a href="#features">Who We Are</a></li>
              <li><a href="#plans">Games</a></li>
              <li><a href="#cities">Contact Us</a></li>              
              </ul>
			  <a class="mobile-nav-icon js--nav-icon"><i class="ion-navicon-round"></i></a> 
          </div>
		  </nav>
         <div class="hero-text-box">
              <h1>Let the Gaming Begin!<br>Enjoy Coded Games</h1>
              <a class="btn btn-full js--scroll-to-plans" href="http://localhost/gsbgproject/#plans">Let's Play!</a>
              <a class="btn btn-ghost js--scroll-to-start" href="http://localhost/gsbgproject/#plans">Show me more</a>
         </div>
       
      </header>
           
       <section class="section-steps" id="plans"> <!-- I changed a few section names -->
            <div class="row">
                <h2>Games</h2>
					        <ul class="meals-showcase clearfix">
          <li>
           <b><p>PaddleBoard</p></b>
            <figure class="meal-photo">
				<a href="https://cerulean-brick-soda.glitch.me/" target="_blank"><img src="resources/img/PaddleGame.PNG" alt=""></a>
            </figure>
          </li>
          <li>
           <b><p>Touch The Ball</p></b>
            <figure class="meal-photo">
              <a href="https://oasis-traveling-scarf.glitch.me/" target="_blank"><img src="resources/img/TouchBallGame.PNG" alt=""></a>
            </figure>
          </li>
            <li>
            <b><p>Flip The Switch</p></b>
            <figure class="meal-photo">
				<a href="https://outrageous-alpine-astronomy.glitch.me/" target="_blank"><img src="resources/img/FlipTheSwitchCopy.png" alt=""></a>
            </figure>
          </li>
            <li>
            <b><p>Collect</p></b>
            <figure class="meal-photo">
              <a href="https://foam-juvenile-pyjama.glitch.me/" target="_blank"><img src="resources/img/CollectGame.PNG" alt=""></a>
            </figure>
          </li>
       </ul>
		   </div>
       </section>
       
       <section class="section-form" id="cities">
        <a href="embed.php"></a>
		<div class="row">
            <h2>Share Your Ideas</h2>
            <p class="long-copy-2">Email us your games to have them published on our website. Feel free to just write to us as well! </p>
		</div>
	<div class="row">	
    	<?php if($msg != ''): ?>
    		<div class="alert <?php echo $msgClass; ?>"><?php echo $msg; ?></div>
    	<?php endif; ?>
      <form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>" class="contact-form">
	      <div class="row">
            <div class="col span-1-of-3">
		      <label>Name</label>
            </div>
            <div class="col span-2-of-3">
		      <input type="text" name="name" id="name" placeholder="Your Name" required value="<?php echo isset($_POST['name']) ? $name : ''; ?>">
            </div>      
	      </div>
	      <div class="row">
            <div class="special-row">
             <div class="col span-1-of-3">
                <label for="email">Email</label>
             </div>    
	      	 <div class="col span-2-of-3">
	      	<input type="text" name="email" id="email" placeholder="Your Email" required value="<?php echo isset($_POST['email']) ? $email : ''; ?>">
	      </div>
              </div>
          </div>
           <div class="row">
                       <div class="special-row">        
                        <div class="col span-1-of-3">
                            <label for="find-us">How did you find us?</label>
                        </div>
                        <div class="col span-2-of-3">
                            <select name="find-us" id="find-us">
                                <option value="friends" selected></option>
                                <option value="search">Search engine</option>
                                <option value="ad">Advertisement</option>
                                <option value="other">Other</option>
                            </select>
                        </div>
                      </div>       
                    </div>
                        <div class="row">
                        <div class="special-row">    
                        <div class="col span-1-of-3">
                            <label>Newsletter</label>
                        </div>
                        <div class="col span-2-of-3">
                            <input type="checkbox" name="news" id="news" checked> Yes, please
                        </div>
                        </div>
                    </div>
	      <div class="row">
            <div class="special-row">
             <div class="col span-1-of-3">  
	      	<label>Drop us a line or &nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Attach your story</label>
                </div>
                <div class="col span-2-of-3">
	      	<textarea name="message" placeholder="Your message"><?php echo isset($_POST['message']) ? $message : ''; ?></textarea>
                </div>
              </div>
              </div>
          <div class="row">
              <div class="col span-1-of-3">
                <label>&nbsp;</label>
              </div>
              <div class="col span-2-of-3">
	      <button type="submit" name="submit" class="btn btn-full">Send it!</button>
              </div>      
           </div>   
      </form>
    </div>
       
       
       </section>
       
       <footer>
           <div class="row">
                <div class="col span-1-of-2">
                    <ul class="footer-nav">
                        <li><a href="#">About us</a></li>
                        <li><a href="#">Blog</a></li>
                        <li><a href="#">Press</a></li>
                    </ul>
                </div>
                <div class="col span-1-of-2">
                    <ul class="social-links">
                        <li><a href="#"><i class="ion-social-facebook"></i></a></li>
                        <li><a href="#"><i class="ion-social-twitter"></i></a></li>
                        <li><a href="#"><i class="ion-social-googleplus"></i></a></li>
                        <li><a href="#"><i class="ion-social-instagram"></i></a></li>
					</ul>
                </div>
           </div>
           <div class="row">
                <p>
                    
                </p>
           </div>        
       
       
       </footer>
       
  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>    
  <script src="//cdn.jsdelivr.net/respond/1.4.2/respond.min.js"></script>    
  <script src="//cdn.jsdelivr.net/html5shiv/3.7.2/html5shiv.min.js"></script>
  <script src="//cdn.jsdelivr.net/selectivizr/1.0.3b/selectivizr.min.js"></script>
  <script src="vendors/js/jquery.waypoints.min.js"></script>	   
  <script src="resources/js/script.js"></script>
  
       
  </body>
  

</html>
