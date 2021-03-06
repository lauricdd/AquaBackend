@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.users") }}</a>
    <a href="{{ url('users')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="users">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.users") }} > {{ trans("general.create") }} </p></div>
        <h4 class="light">{{ trans("users.create user") }}</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <div class="warning-box">
                <h6><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</h6>
            </div>
        @endif

        <!-- Form -->
        {!! Form::open(array('url' => 'users', 'files'=> true)) !!}

            @if (session('name'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input class="validate"  name="name" type="text" id="name" value="{{session('name')}}" required>
                    <label for="name">{{ trans("general.name") }}</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">person</i>
                    <input class="validate"  name="name" type="text" id="name" required>
                    <label for="name">{{ trans("general.name") }}</label>
                </div>
            @endif
            @if (session('email'))
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">email</i>
                    <input class="validate"  name="email" type="email" id="email" value="{{session('email')}}" required>
                    <label for="email">{{ trans("users.email") }}</label>
                </div>
            @else
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">email</i>
                    <input class="validate"  name="email" type="email" id="email" required>
                    <label for="email">{{ trans("users.email") }}</label>
                </div>
            @endif

            <div class="col s12">
                <p><i class="material-icons left">info_outline</i><span>Todos los usuarios creados tienen 123456 como contraseña por defecto</span></p>
            </div>

            <div class="col s12">
                <br>
                <label>{{ trans("users.select timezone") }}</label>
                <div class="input-field col s12">
                    <select name="timezone" class="browser-default">
                        <option value="America/Bogota">UTC/GMT -05:00 America/Bogota</option>
                        @foreach($zones_array as $t)
                            <option value="{{$t['zone']}}">{{$t['diff_from_GMT'] . ' - ' . $t['zone']}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="col s12">
                <br>
                <label>{{ trans("users.select user type") }}</label>
                <div id="radiobuttons">
                    <p>
                        <i class="material-icons prefix">person_pin</i>
                        <input name="role" type="radio" id="user" value="user" checked>
                        <label for="user">{{ trans("users.user") }}</label>
                    </p>
                    <p>
                        <i class="material-icons prefix">assistant</i>
                        <input name="role" type="radio" id="provider" value="provider">
                        <label for="provider">{{ trans("users.provider") }}</label>
                    </p>
                    @if(Auth::check() and Auth::user()->role == 'superadmin')
                        <p>
                            <i class="material-icons prefix">live_help</i>
                            <input type="radio" name="role" id="superadmin" value="superadmin">
                            <label for="superadmin">{{ trans("users.super admin") }}</label>
                        </p>
                    @endif
                </div>
            </div>


            <!-- FLOATING BUTTONS -->
            <div class="fixed-action-btn" id="add">
                <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light"> <!-- Green -->
                    <i class="large material-icons">check</i>
                </button>
            </div>
            <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('users')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->
    </div>

@stop

