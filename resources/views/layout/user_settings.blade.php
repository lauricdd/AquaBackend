<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <meta name="description" content="AquApp">
    <meta name="author" content="">
    <title> AquApp | Profile </title>

    <link href="/css/materialize.min.css" rel="stylesheet">               					           <!-- Materialize core CSS -->
    <link href="/css/site.css" rel="stylesheet">                         						         <!-- Site core CSS -->
    <link href="http://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet"> <!-- Material Icons -->


    <!--favicon-->
    <link rel="apple-touch-icon" sizes="57x57" href="/favicon/apple-icon-57x57.png">
    <link rel="apple-touch-icon" sizes="60x60" href="/favicon/apple-icon-60x60.png">
    <link rel="apple-touch-icon" sizes="72x72" href="/favicon/apple-icon-72x72.png">
    <link rel="apple-touch-icon" sizes="76x76" href="/favicon/apple-icon-76x76.png">
    <link rel="apple-touch-icon" sizes="114x114" href="/favicon/apple-icon-114x114.png">
    <link rel="apple-touch-icon" sizes="120x120" href="/favicon/apple-icon-120x120.png">
    <link rel="apple-touch-icon" sizes="144x144" href="/favicon/apple-icon-144x144.png">
    <link rel="apple-touch-icon" sizes="152x152" href="/favicon/apple-icon-152x152.png">
    <link rel="apple-touch-icon" sizes="180x180" href="/favicon/apple-icon-180x180.png">
    <link rel="icon" type="image/png" sizes="192x192"  href="/favicon/android-icon-192x192.png">
    <link rel="icon" type="image/png" sizes="32x32" href="/favicon/favicon-32x32.png">
    <link rel="icon" type="image/png" sizes="96x96" href="/favicon/favicon-96x96.png">
    <link rel="icon" type="image/png" sizes="16x16" href="/favicon/favicon-16x16.png">
    <link rel="manifest" href="/favicon/manifest.json">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/favicon/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">

    <style>
        a{
            cursor: pointer;
        }

        .material-icons{
            color: white;
        }
    </style>

</head>
<body>
<!-- === NAVBAR === -->
<header class="primary">
    <div class="navbar-fixed">
        <nav>
            <div class="nav-wrapper">
                <a href="{{ url('/')}}" class="brand hide-on-med-and-down"><img src="/img/brand.png" alt="..."/></a>
                <a href="{{ url('/')}}" data-activates="mobile" class="button-collapse"><i class="mdi-navigation-menu"></i></a>

                <ul class="right hide-on-med-and-down">
                    <li><a href="{{ url('/')}}" class="grow">{{ trans("contribute.back home") }}</a></li>
                </ul>

                <ul class="side-nav center" id="mobile">
                    <section class="menu-header">
                        <img src="/img/brand-no-back.png" alt="...">
                    </section>
                    <li><a href="{{ url('/')}}">{{ trans("general.home") }}</a></li>
                    <li><a href="{{ url('contribute')}}">{{ trans("general.contribute") }}</a></li>
                    <li><a href="{{ url('team')}}">{{ trans("general.team") }}</a></li>
                    <li><a href="#">Wiki</a></li>
                    <li><a href="{{ url('contact')}}">{{ trans("general.contact") }}</a></li>
                    <div class="divider"></div>
                    <li><a href="{{ url('register')}}">{{ trans("general.sign up") }}</a></li>
                    <li><a href="{{ url('login')}}">{{ trans("general.login") }}</a></li>

                </ul>
            </div>
        </nav>
    </div>
</header>
<!-- === NAVBAR === -->

<main>
    <section class="row primary" id="profile">
        <div class="row col s12">
            <!-- Left -->
            <div class="col s12 m4 l4">
                <div class="center white-text">
                    <img id="profile_pic" class="circle" src="/img/face.jpg" alt=""/>
                    <h5>{{$user->name}}</h5>
                    <h6 class="light">{{$user->email}}</h6>
                    <span class="light" style="text-transform: uppercase;"><strong>{{$user->role}}</strong></span>
                    <div class="divider"></div>
                    <h6 class="light"><strong>{{$downloads}}</strong> {{ trans("general.downloads") }}</h6>
                    <div class="divider"></div>

                    <a onclick="showDeleteModal('<?php echo $user -> id ?>');"><i class="material-icons">delete</i></a>

                    {!! Form::open(['method' => 'DELETE', 'route'=>['users.destroy', $user->id], 'id'=>$user->id]) !!}
                    {!! Form::close() !!}
                </div>
            </div>

            <!-- Right -->
            <div class="col s12 m8 l8 white-text" id="right">
                @if (session('error'))
                    <p><i class="material-icons">highlight_off</i>{{session('error')}}</p>
                @endif
                <br><br>

                <!-- Form -->
                {!! Form::model($user,[
                'method' => 'PUT',
                'route'=>['users.update',$user->id]
                ])!!}
                    <div class="input-field col s12">
                        <i class="material-icons prefix">person</i>
                        <input id="name" type="text" class="validate" name="name" value="{{$user->name}}">
                        <label for="name">{{ trans("general.name") }}</label>
                    </div>
                    <br><br>
                    <div class="input-field col s12">
                        <i class="material-icons prefix">verified_user</i>
                        <input id="last-pass" type="password" class="validate" name="last-pass">
                        <label for="last-pass">{{ trans("settings.last password") }}</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">lock</i>
                        <input id="pass" type="password" class="validate" name="pass">
                        <label for="pass">{{ trans("settings.new password") }}</label>
                    </div>

                    <div class="input-field col s12">
                        <i class="material-icons prefix">vpn_key</i>
                        <input id="pass2" type="password" class="validate" name="pass2">
                        <label for="pass2">{{ trans("settings.repeat password") }}</label>
                    </div>


                    <div class="input-field col s12">
                        <button type="submit" class="btn btn-secundary waves-effect waves-light"><strong>{{ trans("settings.save") }}</strong></button>
                        <a class="btn btn-flat waves-effect waves-light" href="{{ URL::previous() }}">{{ trans("settings.cancel") }}</a>
                    </div>
                {!! Form::close() !!}
            </div>
        </div>
    </section>
</main>

<!-- Delete Modal Structure -->
<div id="delete" class="modal">
    <div class="modal-content center">
        <h6 class="light">{{ trans("general.sure to delete this?") }}</h6><br>
        <a href="#" class=" modal-action modal-close btn btn-secundary">No</a>
        <input type="hidden" id="delete_value">
        <a class="btn primary" onclick="eliminar();">{{ trans("general.yes") }}</a>
    </div>
</div>

<script type="text/javascript" src="/js/jq/jquery.min.js"></script>						<!-- Jquery core JS -->
<script src="/js/materialize.min.js" type="text/javascript"></script> 					<!-- Materialize core JS -->
<script src="/js/init.js" type="text/javascript"></script> 					          <!-- Init core JS -->
<script type="text/javascript">
    /**** Eliminar usando modal ****/
    function showDeleteModal(id){
        $('#delete_value').val(id);
        $('#delete').openModal();
    }

    function eliminar(){
        var id = $('#delete input').val();
        //$("#"+id).submit();
        alert(id);
    }
</script>
</body>
</html>
