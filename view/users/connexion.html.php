<!-- <link href="./Style/style.css" rel="stylesheet"> -->
<html>
<head>
    <title>Login V2</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="images/icons/favicon.ico" />
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="fonts/iconic/css/material-design-iconic-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="src/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="style/util.css">
    <link rel="stylesheet" type="text/css" href="style/main.css">
    <!--===============================================================================================-->
</head>
  <body>
    <!-- <main class="main_form">

      <section>
        <div class="container py-5 h-100 ">
          <div class="row d-flex justify-content-center align-items-center h-100">
            <div class="col col-xl-10">
              <div class="card" style="border-radius: 1rem;">
                <div class="row g-0">
                  <div class="col-md-6 col-lg-3 d-none d-md-block">
                  </div>

                  <div class="col-md-6 col-lg-7 d-flex align-items-center">
                    <div class="card-body p-4 p-lg-5 text-black">

                      <form action="connexion" method="POST">

                        <div class="d-flex align-items-center mb-3 pb-1">
                          <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                          <span class="h1 fw-bold mb-0">Connexion</span>
                        </div>

                        <h5 class="fw-normal mb-3 pb-3" style="letter-spacing: 1px;">Connectez vous à votre compte.</h5>
                        <div class="error"><?php if(isset($error)) { echo $error ;} ?></div>


                        <div><?php if(isset($_GET['val'])) { echo "Veuillez vous connecter pour valider votre panier et passer à la livraison.";}?></div>
                        
                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example17">Email</label>
                          <input type="email" id="form2Example17"  name="email" class="form-control form-control-lg" />
                        </div>

                        <div class="form-outline mb-4">
                          <label class="form-label" for="form2Example27">Mot de passe</label>
                          <input type="password" id="form2Example27" name="password" class="form-control form-control-lg" />
                        </div>

                        <div class="pt-1 mb-4">
                          <button class="btn btn-dark btn-lg btn-block"  name="submit" type="submit">Connexion</button>
                        </div>

                        <p  style="color: #393f81;">Pas encore de compte ? <a href="inscription.php" style="color: #393f81;">Inscrivez-vous ici.</a></p>
                      </form>

                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
    </main> -->


    <div class="limiter">
        <div class="container-login100">
            <div class="wrap-login100">
                <form class="login100-form validate-form" action="connexion" method="POST">
                    <span class="login100-form-title p-b-26">
                      Welcome
                    </span>
                    <span class="login100-form-title p-b-48">
                      <i class="zmdi zmdi-font"></i>
                    </span>

                    <div class="wrap-input100 validate-input" data-validate="Valid email is: a@b.c">
                        <input class="input100" type="text" name="email">
                        <span class="focus-input100" data-placeholder="Email"></span>
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Enter password">
                        <span class="btn-show-pass">
                          <i class="zmdi zmdi-eye"></i>
                        </span>
                        <input class="input100" type="password" name="password">
                        <span class="focus-input100" data-placeholder="Password"></span>
                    </div>

                    <div class="container-login100-form-btn">
                        <div class="wrap-login100-form-btn">
                            <div class="login100-form-bgbtn"></div>
                            <button class="login100-form-btn" name="submit">
                              Login
                            </button>
                        </div>
                    </div>

                    <div class="text-center p-t-115">
                        <span class="txt1">
                          Don’t have an account?
                        </span>

                        <a class="txt2" href="inscription">
                          Sign Up
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <div id="dropDownSelect1"></div>

    <!--===============================================================================================-->
    <script src="src/jquery/jquery-3.2.1.min.js"></script>
    <!--===============================================================================================-->
    <script src="src/animsition/js/animsition.min.js"></script>
    <!--===============================================================================================-->
    <script src="src/bootstrap/js/popper.js"></script>
    <script src="src/bootstrap/js/bootstrap.min.js"></script>
    <!--===============================================================================================-->
    <script src="src/select2/select2.min.js"></script>
    <!--===============================================================================================-->
    <script src="src/daterangepicker/moment.min.js"></script>
    <script src="src/daterangepicker/daterangepicker.js"></script>
    <!--===============================================================================================-->
    <script src="src/countdowntime/countdowntime.js"></script>
    <!--===============================================================================================-->
    <script src="js/main.js"></script>

  </body>
</html>