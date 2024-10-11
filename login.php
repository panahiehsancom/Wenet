<!DOCTYPE html>
<html lang="en">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0"/>
  <title>ورد به پنل مدیریت</title>

  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <link href="css/materialize.css" type="text/css" rel="stylesheet" media="screen,projection"/>
  <link href="css/style.css" type="text/css" rel="stylesheet" media="screen,projection"/>
</head>
<body>
  <nav class="blue-grey darken-4 lighten-1" role="navigation">
    <div class="nav-wrapper container"><a id="logo-container" href="#" class="brand-logo">Logo</a>
      <ul class="right hide-on-med-and-down">
        <li><a href="#">Navbar Link</a></li>
      </ul>

      <ul id="nav-mobile" class="sidenav">
        <li><a href="#">Navbar Link</a></li>
      </ul>
      <a href="#" data-target="nav-mobile" class="sidenav-trigger"><i class="material-icons">menu</i></a>
    </div>
  </nav>
  <div class="section no-pad-bot" id="index-banner">
<script src="./axios.min.js"></script>
<script>
		async function check_user()
		{
			try
			{  
				username = document.getElementById("username").value;
				password = document.getElementById("password").value;
				const auth_data = {
					uname:username,
					pass:password,
				};
				const formData = new FormData();
				formData.append("auth_data", JSON.stringify(auth_data));
				const response = await axios.post("authenticate.php?action=auth", formData); 
				const valid_auth =  response.data;
				console.log(valid_auth);
				if(valid_auth.response.valid) { 
						window.location.href = "index.php";
        } else {
          const error = document.createElement("p");
          error.textContent = "Username and password is wrong!";
          error.classList.add("redColor");
          loginErrors.appendChild(error);
          setTimeout(() => {
              loginErrors.removeChild(error);
          }, 5000);
          return;
        }
				
			}
			catch(error)
			{
				//closeLoading();
				//throwError('Error from server!');
				console.log(error);
			}
		}			
</script>


    <div class="container">
        <div class="row">
            <div class="col s12 m7 pull-m3">
                <h1 class="header center small">ورود به پنل کاربری</h1>
                <img  class="logo center" src="img/wenet-logo.webp">
                
                <div class="card  col s12">
                    
                        <div class="input-field col s12 ">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="username" type="text" class="validate">
                        <label for="username">نام کاربری یا ایمیل </label>
                        </div>
                        <div class="input-field col s12 ">
                        <i class="material-icons prefix">account_circle</i>
                        <input id="password" type="password" class="validate">
                        <label for="password">کلمه عبور</label>
                        </div>
                        <div class="col s12">
                            <p>
                                <label class="left">
                                    <input type="checkbox" />
                                    <span>مرا بخاطر بسپار</span>
                                </label>
                                
                                <a class="right strong" href="">حساب کاربری ندارید؟</a>
                            </p>
                            
                        </div>
                        
                        <div class="col s12">
                            <button class="btn waves-effect waves-light deep-purple darken-3 set-margin full-width" type="submit" onclick="check_user()" name="action">ورود
                                <i class="material-icons right">send</i>
                            </button>
                        </div> 
 			          <div class="flex column formErrors" id="loginErrors"></div>

                </div>
            </div>
        </div>
    </div>
    

  
  
  
  
    </div>

  <footer class="page-footer blue-grey darken-4">
    <div class="container">
      <div class="row">
        <div class="col l6 s12">
          <h5 class="white-text">Company Bio</h5>
          <p class="grey-text text-lighten-4">We are a team of college students working on this project like it's our full time job. Any amount would help support and continue development on this project and is greatly appreciated.</p>


        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Settings</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
        <div class="col l3 s12">
          <h5 class="white-text">Connect</h5>
          <ul>
            <li><a class="white-text" href="#!">Link 1</a></li>
            <li><a class="white-text" href="#!">Link 2</a></li>
            <li><a class="white-text" href="#!">Link 3</a></li>
            <li><a class="white-text" href="#!">Link 4</a></li>
          </ul>
        </div>
      </div>
    </div>
    <div class="footer-copyright">
      <div class="container">
      Made by <a class="orange-text text-lighten-3" href="https://wenet.website">Wenet Digital Agency</a>
      </div>
    </div>
  </footer>


  <!--  Scripts-->
  <script src="https://code.jquery.com/jquery-2.1.1.min.js"></script>
  <script src="js/materialize.js"></script>
  <script src="js/init.js"></script>

  </body>
</html>
