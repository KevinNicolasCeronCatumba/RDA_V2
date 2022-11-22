<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-gH2yIJqKdNHPEq0n4Mqa/HGKIhSkIHeL5AyhkYV8i59U5AR6csBvApHHNl/vI1Bx" crossorigin="anonymous">
  <title>Login</title>
</head>
<body>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-A3rJD856KowSb7dwlZdYEkO39Gagi7vIsF0jrRAoQmDKKtQBHUuLZ9AsSv4jD4Xa" crossorigin="anonymous"></script>
  <section class="vh-100" style="background-color: #97c752;">
    <div class="container py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col col-xl-10">
          <div class="card" style="border-radius: 1rem;">
            <div class="row g-0">
              <div class="col-md-6 col-lg-5 d-none d-md-block">
                <img src="https://i.pinimg.com/originals/6d/42/77/6d4277093720c5df9c1c04e5450e8bc1.jpg"
                  alt="login form" class="img-fluid" style="border-radius: 1rem 0 0 1rem;" />
              </div>
              <div class="col-md-6 col-lg-7 d-flex align-items-center">
                <div class="card-body p-4 p-lg-5 text-black">
  
                  <form method="POST" action="{{ action('WelcomeController@consultar') }}">
                    <center>
                    <div class="d-flex align-items-center mb-3 pb-1">
                      <i class="fas fa-cubes fa-2x me-3" style="color: #ff6219;"></i>
                      <img src="../../static/IMG/logo-RDA.png" height="160px">
                    </div>
                  
                    <br><br>
                    
                    <h5 class="h1 fw-bold mb-0" style="letter-spacing: 1px;">Iniciar Sesións</h5>
                  </center>
                  <br><br>
                    <div class="form-outline mb-4">
                      
                      <label class="form-label" for="form2Example17">Email address</label>
                      <input type="email" name="email" id="form2Example17" class="form-control form-control-lg" />
                    </div>
  
                    <div class="pt-1 mb-4">
                      <button  style="height: 55px;" class="btn btn-success form-control form-control-lg" type="submit">Recuperar</button>
                    </div>

                  </form>
  
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
</body>
</html>
