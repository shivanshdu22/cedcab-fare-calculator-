<!DOCTYPE html>
<html lang="zxx">
	<head>
        <title>OSLO Template</title>
        <meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
		<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">		
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">		
		<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
		<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
		<link rel="stylesheet" href="style.css">
		<script>
		function cab(){	
			var carname = document.getElementById("car").value;
			var drop = document.getElementById("drop").value;
			var carname = document.getElementById("car").value;
			var luggage = document.getElementById("luggage").value;
			
			if(carname=="CedMicro"){
				document.getElementById("luggage").placeholder = "";
				document.getElementById("luggage").value = "";
				document.getElementById("luggage").readOnly = true;
				document.getElementById("luggage").placeholder = "Luggage facility unavailable for CEDMICRO";
			}
			else{
				document.getElementById("luggage").readOnly = false;
				document.getElementById("luggage").placeholder = "Luggage(In Kg)";
			}
			
			$("#farecal").submit(function(e) {
    			e.preventDefault();
			});
        $(document).ready(function(){
            $("#cal").click(function(){		
				var pick = document.getElementById("pick").value;
				var drop = document.getElementById("drop").value;
				var carname = document.getElementById("car").value;
				var luggage = document.getElementById("luggage").value;
				if(pick==drop){
					$("#fare").html("<strong>Drop location and Pick-up location are same<strong>");
				}
				else if(luggage>100){
					$("#fare").html("<strong>Sorry, We don't carry that much(1-100kg)</strong>");
				}
                else{
				    $.ajax({
                        url:'farecal.php',
                        type:'POST',
                        data:{pick:pick , drop:drop , car:carname, luggage:luggage },
                        success: function(result){
                            $("#fare").html(result);
                        },
                        error:function(){
                            alert ('error');
                        }
                    });
				 }	
                });
        	}); 
		}	
		</script>
    </head>
    <body>
        <nav class="navbar navbar-expand-lg darken-3">
			<a class="navbar-brand" href="#"><img src="logo2.png" style="width:150px;" alt="Logo" ></a>
			<button class="navbar-toggler navbar-light" type="button" data-toggle="collapse" data-target="#menu" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
			  <span class="navbar-toggler-icon "></span>
			</button>
			<div class="collapse navbar-collapse" id="menu">
			  <ul class="nav navbar-nav ml-auto">
				<li class="nav-item active">
				  <a class="nav-link cyan-text" href="#"><strong>Home<span class="sr-only">(current)</span></strong></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link cyan-text" href="#"><strong>Fare Calculator</strong></a>
				</li>
				<li class="nav-item">
				  <a class="nav-link cyan-text" href="#"><sign-up>SIGN UP</sign-up></a>
				</li>
			  </ul>
			</div>
		</nav>
		<!-- Fare Calculator-->
		<div class="jumbotron">
		  	<div class="row justify-content-center" id="sign-up">
				<div class="col justify-content-center" id="signup-text">
					<h1 class="text-center white-text m-0"> Book a <span > <img  src="logo2.png" style="width:150px;" alt="Logo" > </span> to Your Destination In Town</h1><br>
				 	<p class="text-center white-text strong nopadding"> AC cabs for point to point travel </p><hr>
				</div>
			</div>
			<div class="row justify-content-center" id ="signupbanner">		  	
					<div class=" col-md-auto col-lg-4 col-md-8 col-12 text-center col-sm-12 justify-content-center mt-4 pt-4 pb-4" id="signform">
								<img class="mb-2" src="logo2.png" style="width:150px;" alt="Logo" ><hr>
								<h4 class=" m-0">Your everyday travel partner</h4>
								<p class=" m-0">Choose from the range of categories and prices </p>
								<form id ="farecal" class=" justify-content-center pt-4">
									<select id="pick"  name="picklist"  required>
										<option class="place" value="" disabled selected>PICK-UP</option>
										<option value="charbagh">CHARBAGH</option>
										<option value="indiranagar">INDIRA NAGAR</option>
										<option value="BBD">BBD</option>
										<option value="barabanki">BARABANKI</option>
										<option value="faizabad">FAIZABAD</option>
										<option value="basti">BASTI</option>
										<option value="gorakhpur">GORAKHPUR</option>
									</select>
									<select id="drop"  name="droplist" required>
										<option class="place" value="" disabled selected>DESTINATION</option>
										<option value="charbagh">CHARBAGH</option>
										<option value="indiranagar">INDIRA NAGAR</option>
										<option value="BBD">BBD</option>
										<option value="barabanki">BARABANKI</option>
										<option value="faizabad">FAIZABAD</option>
										<option value="basti">BASTI</option>
										<option value="gorakhpur">GORAKHPUR</option>
									</select>
									<select id="car"  name="carlist" onchange="cab()"  required>
										<option class="place" value="" disabled selected>CAB-TYPE</option>
										<option value="CedMicro">CedMicro</option>
										<option value="CedMini">CedMini</option>
										<option value="CedSUV">CedSUV</option>
										<option value="CedRoyal">CedRoyal</option>
									</select>
									<input type="number" id="luggage" placeholder="LUGGAGE(In Kg)" name="luggage" ><br>
									<button id="cal" class="mt-4">Calculate Fare</button>
								</form>	
								<div id="fare" class="pt-3 cyan-text"></div>					 
					</div>
					<div class="col-md-auto col-12 col-lg-8 col-sm-12 justify-content-center " >	
					</div>			
			</div>    			
		</div>
				
		<!-- Footer -->
		<footer class="page-footer font-small cyan darken-3">

			
			<div class="container">

			
			<div class="row">

				
				<div class="col-md-12 py-4">
				<div class="mb-5 flex-center">
					<a class="fb-ic">
					<i class="fab fa-facebook-f fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Twitter -->
					<a class="tw-ic">
					<i class="fab fa-twitter fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!-- Google +-->
					<a class="gplus-ic">
					<i class="fab fa-google-plus-g fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Linkedin -->
					<a class="li-ic">
					<i class="fab fa-linkedin-in fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Instagram-->
					<a class="ins-ic">
					<i class="fab fa-instagram fa-lg white-text mr-md-5 mr-3 fa-2x"> </i>
					</a>
					<!--Pinterest-->
					<a class="pin-ic">
					<i class="fab fa-pinterest fa-lg white-text fa-2x"> </i>
					</a>
				</div>
				</div>
				<!-- Grid column -->

			</div>
			<!-- Grid row-->

			</div>
			<!-- Footer Elements -->

			<!-- Copyright -->
			<div class="footer-copyright text-center ">© 2020 Copyright:
			<a href="#"> CEDCAB PVT.LTD.</a>
			</div>
			<!-- Copyright -->

		</footer>
	</body>
	</html>
