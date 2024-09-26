




<!DOCTYPE html>
<html>
<head>
	<title>Animated Login Form</title>
	<link rel="stylesheet" type="text/css" href="css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Poppins:600&display=swap" rel="stylesheet">
	<script src="https://kit.fontawesome.com/a81368914c.js"></script>
	<meta name="viewport" content="width=device-width, initial-scale=1">
</head>
<body>
	<style>
		*{
	padding: 0;
	margin: 0;
	box-sizing: border-box;
}

body{
    font-family: 'Poppins', sans-serif;
    overflow: hidden;
}

.wave{
	position: fixed;
	bottom: 0;
	left: 0;
	height: 100%;
	z-index: -1;
}

.container{
    width: 100vw;
    height: 100vh;
    display: grid;
    grid-template-columns: repeat(2, 1fr);
    grid-gap :7rem;
    padding: 0 2rem;
}

.img{
	display: flex;
	justify-content: flex-end;
	align-items: center;
}

.login-content{
	display: flex;
	justify-content: flex-start;
	align-items: center;
	text-align: center;
}

.img img{
	width: 500px;
}

form{
	width: 360px;
}

.login-content img{
    height: 100px;
}

.login-content h2{
	margin: 15px 0;
	color: #333;
	text-transform: uppercase;
	font-size: 2.9rem;
}

.login-content .input-div{
	position: relative;
    display: grid;
    grid-template-columns: 7% 93%;
    margin: 25px 0;
    padding: 5px 0;
    border-bottom: 2px solid #d9d9d9;
}

.login-content .input-div.one{
	margin-top: 0;
}

.i{
	color: #d9d9d9;
	display: flex;
	justify-content: center;
	align-items: center;
}

.i i{
	transition: .3s;
}

.input-div > div{
    position: relative;
	height: 45px;
}

.input-div > div > h5{
	position: absolute;
	left: 10px;
	top: 50%;
	transform: translateY(-50%);
	color: #999;
	font-size: 18px;
	transition: .3s;
}

.input-div:before, .input-div:after{
	content: '';
	position: absolute;
	bottom: -2px;
	width: 0%;
	height: 2px;
	background-color: #38d39f;
	transition: .4s;
}

.input-div:before{
	right: 50%;
}

.input-div:after{
	left: 50%;
}

.input-div.focus:before, .input-div.focus:after{
	width: 50%;
}

.input-div.focus > div > h5{
	top: -5px;
	font-size: 15px;
}

.input-div.focus > .i > i{
	color: #38d39f;
}

.input-div > div > input{
	position: absolute;
	left: 0;
	top: 0;
	width: 100%;
	height: 100%;
	border: none;
	outline: none;
	background: none;
	padding: 0.5rem 0.7rem;
	font-size: 1.2rem;
	color: #555;
	font-family: 'poppins', sans-serif;
}

.input-div.pass{
	margin-bottom: 4px;
}

a{
	display: block;
	text-align: right;
	text-decoration: none;
	color: #999;
	font-size: 0.9rem;
	transition: .3s;
}

a:hover{
	color: #38d39f;
}

.btn{
	display: block;
	width: 100%;
	height: 50px;
	border-radius: 25px;
	outline: none;
	border: none;
	background-image: linear-gradient(to right, #e0e7ff, #777b89);
	background-size: 200%;
	font-size: 1.2rem;
	color: #fff;
	font-family: 'Poppins', sans-serif;
	text-transform: uppercase;
	margin: 1rem 0;
	cursor: pointer;
	transition: .5s;
}
.btn:hover{
    background-color: #c9d6ff; /* Optional: Change color on hover */
}


@media screen and (max-width: 1050px){
	.container{
		grid-gap: 5rem;
	}
}

@media screen and (max-width: 1000px){
	form{
		width: 290px;
	}

	.login-content h2{
        font-size: 2.4rem;
        margin: 8px 0;
	}

	.img img{
		width: 400px;
	}
}

@media screen and (max-width: 900px){
	.container{
		grid-template-columns: 1fr;
	}

	.img{
		display: none;
	}

	.wave{
		display: none;
	}

	.login-content{
		justify-content: center;
	}
	/* Additional styling for Reset Password form */
a.back-to-login {
	text-align: center;
	color: #38d39f;
	font-size: 1rem;
	margin-top: 1rem;
	display: inline-block;
}

.back-to-login:hover {
	color: #4CAF50;
}

	
}
		</style>
	 <img class="wave" src="{{ asset('images/Login&signup/wave.png') }}">
    <div class="container">
        <div class="img">
            <img src="{{ asset('images/Login&signup/building.png') }}">
        </div>
		<div class="login-content">
			
			<!-- Login Form for Email (default view) -->
			<form method="POST" action="{{ route('login') }}">
			@csrf
			<img src="{{ asset('images/Login&signup/avatar.svg') }}">
				<h2 class="title">Welcome</h2>

				<div id="emailInput" class="input-div one">
                    <div class="i">
                        <!-- <i class="fas fa-user"></i> -->
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input id="emailField" type="email" class="input @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                        @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>
				
				<!-- Mobile Input (hidden initially) -->
				<div id="mobileInput" class="input-div one" style="display:none;">
					<div class="i">
						<!-- <i class="fas fa-mobile-alt"></i> -->
					</div>
					<div class="div">
						<h5></h5>
						<input type="text" class="input" id="mobileField" placeholder="+91">
					</div>
				</div>

				<div id="passwordInput" class="input-div pass">
                    <div class="i"> 
                        <!-- <i class="fas fa-lock"></i> -->
                    </div>
                    <div class="div">
                        <h5>Password</h5>
                        <input id="password" type="password" class="input @error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                        @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>


				

				<!-- Forgot Password Link (visible for email login only) -->
				<a href="#" id="forgotPasswordLink">Forgot Password?</a>

				<!-- Terms and Conditions Checkbox -->
				<div class="checkbox-div">
					<input type="checkbox" id="terms" name="terms" required>
					<label for="terms">I have reviewed and agree to the <a href="#">Terms & Conditions</a></label>
				</div>

				<!-- Submit Button -->
				<input type="submit" class="btn" value="Login">

				<!-- Toggle Between Email and Mobile -->
				<div class="toggle-login">
					<a href="#" id="loginToggle">Login using Mobile No.</a>
				</div>
			</form>

			<!-- Reset Password Form (hidden initially) -->
			<form id="resetPasswordForm" style="display: none;">
                <img src="{{ asset('images/Login&signup/avatar.svg') }}">
                <h2 class="title">Reset Password</h2>

                <div class="input-div one">
                    <div class="i">
                        <i class="fas fa-envelope"></i>
                    </div>
                    <div class="div">
                        <h5>Email</h5>
                        <input type="email" class="input" required>
                    </div>
                </div>

                <!-- Reset Password Button -->
                <input type="submit" class="btn" value="Get Temporary Password">

                <!-- Back to Login Link -->
                <a href="#" id="backToLogin">Back to Login</a>
            </form>
			
		</div>
	</div>

	<script>
		// Toggle between Reset Password and Login Form
		document.getElementById("forgotPasswordLink").addEventListener("click", function(e) {
			e.preventDefault();
			document.getElementById("loginForm").style.display = "none";
			document.getElementById("resetPasswordForm").style.display = "block";
		});

		document.getElementById("backToLogin").addEventListener("click", function(e) {
			e.preventDefault();
			document.getElementById("resetPasswordForm").style.display = "none";
			document.getElementById("loginForm").style.display = "block";
		});

		// Toggle between Email and Mobile Login Form
		document.getElementById("loginToggle").addEventListener("click", function(e) {
			e.preventDefault();

			// Get the current state of the login form (Email or Mobile)
			let emailInput = document.getElementById("emailInput");
			let mobileInput = document.getElementById("mobileInput");
			let passwordInput = document.getElementById("passwordInput");
			let forgotPasswordLink = document.getElementById("forgotPasswordLink");
			let toggleText = document.getElementById("loginToggle");

			// If email input is visible, switch to mobile input
			if (emailInput.style.display === "none") {
				emailInput.style.display = "block";
				passwordInput.style.display = "block";
				forgotPasswordLink.style.display = "block";
				mobileInput.style.display = "none";
				toggleText.textContent = "Login using Mobile No.";
			} else {
				// If mobile input is visible, hide password and forgot password fields
				emailInput.style.display = "none";
				passwordInput.style.display = "none";
				forgotPasswordLink.style.display = "none";
				mobileInput.style.display = "block";
				toggleText.textContent = "Login using Email ID";
			}
		});
	</script>
	<script>
		const inputs = document.querySelectorAll(".input");


function addcl(){
	let parent = this.parentNode.parentNode;
	parent.classList.add("focus");
}

function remcl(){
	let parent = this.parentNode.parentNode;
	if(this.value == ""){
		parent.classList.remove("focus");
	}
}


inputs.forEach(input => {
	input.addEventListener("focus", addcl);
	input.addEventListener("blur", remcl);
});

	</script>
	<script type="text/javascript" src="{{ asset('js/login.js') }}"></script>
</body>
</html>
