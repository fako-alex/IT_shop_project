<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <title>{{ !empty($meta_title) ? $meta_title : ''}} </title>

    @if(!empty($meta_description))
        <meta name="description" content="{{ $meta_description }}">
    @endif

    @if(!empty($meta_keywords))
        <meta name="keywords" content="{{ $meta_keywords }}">
    @endif

    <meta name="csrf-token" content="{{ csrf_token() }}"> <!-- Protection CSRF -->
    
    <link rel="shortcut icon" href="{{ url('assets/images/icons/favicon.ico')}}">
    <link rel="stylesheet" href="{{ url('assets/css/bootstrap.min.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/owl-carousel/owl.carousel.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/plugins/magnific-popup/magnific-popup.css')}}">
    <link rel="stylesheet" href="{{ url('assets/css/style.css')}}">
    @yield('style')
</head>

<body>
    <div class="page-wrapper">
        @include('layouts._header')

        @yield('content')

        @include('layouts._footer')
    </div>
    <button id="scroll-top" title="Back to Top"><i class="icon-arrow-up"></i></button>

    <!-- Mobile Menu -->
    <div class="mobile-menu-overlay"></div>

    @include('layouts._mobile_menu')

    <div class="modal fade" id="signin-modal" tabindex="-1" role="dialog" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true"><i class="icon-close"></i></span>
                    </button>

                    <div class="form-box">
                        <div class="form-tab">
                            <ul class="nav nav-pills nav-fill" role="tablist">
                                <li class="nav-item">
                                    <a class="nav-link active" id="signin-tab" data-toggle="tab" href="#signin" role="tab" aria-controls="signin" aria-selected="true">Se connecter</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" id="register-tab" data-toggle="tab" href="#register" role="tab" aria-controls="register" aria-selected="false">S'inscrire</a>
                                </li>
                            </ul>

                            {{-- Connexion utilisateur --}}
                            <div class="tab-content" id="tab-content-5">
                                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                                    <form action="#">
                                        <div class="form-group">
                                            <label for="singin-email">Nom d'utilisateur ou adresse e-mail *</label>
                                            <input type="text" class="form-control" id="singin-email" name="email" required>
                                        </div>

                                        <div class="form-group">
                                            <label for="singin-password">Mot de passe *</label>
                                            <input type="password" class="form-control" id="singin-password" name="password" required>
                                        </div>

                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>SE CONNECTER</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>

                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="signin-remember">
                                                <label class="custom-control-label" for="signin-remember">Se souvenir de moi</label>
                                            </div>
                                            <a href="#" class="forgot-link">Mot de passe oublié?</a>
                                        </div>
                                    </form>
                                </div>

                                {{-- Créer un compte utilisateur --}}
                                <div class="tab-pane fade" id="register" role="tabpanel" aria-labelledby="register-tab">
                                    <form action="" id="SubmitFormRegister" method="post">
                                        {{ csrf_field() }}
                                        <div class="form-group">
                                            <label for="register-name">Votre Nom :<span style="color: red">*</span></label>
                                            <input type="text" class="form-control" id="register-name" name="name" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-email">Votre adresse e-mail<span style="color: red">*</span></label>
                                            <input type="email" class="form-control" id="register-email" name="email" required>
                                        </div>
                                        <div class="form-group">
                                            <label for="register-password">Mot de passe<span style="color: red">*</span></label>
                                            <input type="password" class="form-control" id="register-password" name="password" required>
                                        </div>
                                        <div class="form-footer">
                                            <button type="submit" class="btn btn-outline-primary-2">
                                                <span>S'INSCRIRE</span>
                                                <i class="icon-long-arrow-right"></i>
                                            </button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="{{ url('assets/js/jquery.min.js')}}"></script>
    <script src="{{ url('assets/js/bootstrap.bundle.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.hoverIntent.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.waypoints.min.js')}}"></script>
    <script src="{{ url('assets/js/superfish.min.js')}}"></script>
    <script src="{{ url('assets/js/owl.carousel.min.js')}}"></script>
    <script src="{{ url('assets/js/jquery.magnific-popup.min.js')}}"></script>

    <script type="text/javascript">
        $(document).ready(function() {
            $('body').on('submit', '#SubmitFormRegister', function(e) {
                e.preventDefault(); 
                $.ajax({
                    type: "POST",
                    url: "{{ url('auth_register') }}",  
                    data: $(this).serialize(),  
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')  // Ajoute le token CSRF
                    },
                    dataType: "json",
                    success: function(data) {
                        alert(data.message);
                        // Vérifiez si la réponse indique le succès
                        if (data.message === 'Utilisateur créé avec succès!') {
                            location.reload(); // Recharger la page si l'utilisateur est créé avec succès
                        }
                    },
                    error: function(response) {
                        // Afficher le message d'erreur retourné par le serveur
                        if (response.status === 400) {
                            // Afficher l'erreur spécifique lorsque l'email existe déjà
                            alert(response.responseJSON.message);
                        } else {
                            // Gérer d'autres types d'erreurs si nécessaire
                            alert('Erreur lors de l\'inscription. Veuillez réessayer.');
                        }
                    }
                });
            });
        });
    </script>
    
    
    

    @yield('script')
    <script src="{{ url('assets/js/main.js')}}"></script>
</body>

</html>
