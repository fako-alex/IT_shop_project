<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Admin DG_SHOPS 241</title>

  <!-- Google Font: Source Sans Pro -->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/fontawesome-free/css/all.min.css')}}">
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ url('public/assets/plugins/icheck-bootstrap/icheck-bootstrap.min.css')}}">
  <!-- Theme style -->
  <link rel="stylesheet" href="{{ url('public/assets/dist/css/adminlte.min.css')}}  ">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <a href="#">E-commerce</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <!-- <p class="login-box-msg">Connectez-vous pour démarrer votre session</p> -->

      @include('admin.layouts._message')
      <form action="" method="post">

        {{ csrf_field() }}

        <div class="input-group mb-3">
          <input type="email" class="form-control" name="email" required placeholder="Votre adresse Email">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
        </div>
        <div class="input-group mb-3">
          <input type="password" class="form-control" name="password" required placeholder="Votre mot de passe">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-8">
            <div class="icheck-primary">
              <input type="checkbox" name="remember" id="remember">
              <label for="remember">
              Se souvenir de moi
              </label>
            </div>
          </div>
          <!-- /.col -->
          <div class="col-4">
            <button type="submit" class="btn btn-primary btn-block">Connexion</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <div class="social-auth-links text-center mb-3">
        <p>- OU-</p>
        <!-- <a href="#" class="btn btn-block btn-primary">
          <i class="fab fa-facebook mr-2"></i> Sign in using Facebook
        </a> -->
        <a href="#" class="btn btn-block btn-danger">
          <i class="fab fa-google-plus mr-2"></i> Se connecter avec Google
        </a>
      </div>
      <!-- /.social-auth-links -->

      <p class="mb-1">
        <a href="forgot-password.html">J’ai oublié mon mot de passe</a>
      </p>
      <!-- <p class="mb-0">
        <a href="register.html" class="text-center">Register a new membership</a>
      </p> -->
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->

<!-- jQuery -->
<script src="{{ url('public/assets/plugins/jquery/jquery.min.js')}} "></script>
<!-- Bootstrap 4 -->
<script src="{{ url('public/assets/plugins/bootstrap/js/bootstrap.bundle.min.js')}} "></script>
<!-- AdminLTE App -->
<script src="{{ url('public/assets/dist/js/adminlte.min.js')}} "></script>
</body>
</html>
