@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">New Node</a>
    <a href="{{ url('nodes')}}" class="mobile-right"><i class="material-icons">close</i></a>
@stop

@section('content')
    <div class="desktop row" id="nodes">
        <!-- Tittle -->
        <div class="linker"><p class="light">Dashboard > Nodes > Create </p></div>
        <h4 class="light">Create Node</h4>
        <div class="divider"></div><br>

        @if (session('error'))
            <div class="warning-box">
                <p><i class="material-icons">highlight_off</i><span class="ups">Wops!</span>{{session('error')}}</p>
            </div>
        @endif

        <!-- Form -->
        {!! Form::open(['url' => 'nodes']) !!}
        <div class="row">
            @if (session('name'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">play_for_work</i>
                    <input type="text" name="name" id="name" value="{{session('name')}}" required>
                    <label for="name">Name</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">play_for_work</i>
                    <input type="text" name="name" id="name" required>
                    <label for="name">Name</label>
                </div>
            @endif
            @if (session('longitude'))
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">swap_vert</i>
                    <input type="text" name="longitude" id="longitude" pattern="\d+(\.\d*)?" value="{{session('longitude')}}" required>
                    <label for="longitude">Longitude</label>
                </div>
            @else
                <div class="input-field col s12" style="margin-bottom: 10px;">
                    <i class="material-icons prefix">swap_vert</i>
                    <input type="text" name="longitude" id="longitude" pattern="\d+(\.\d*)?" required>
                    <label for="longitude">Longitude</label>
                </div>
            @endif
            @if (session('latitude'))
                <div class="input-field col s12">
                    <i class="material-icons prefix">swap_horiz</i>
                    <input type="text"  name="latitude" id="latitude" pattern="\d+(\.\d*)?" value="{{session('latitude')}}" required>
                    <label for="latitude">Latitude</label>
                </div>
            @else
                <div class="input-field col s12">
                    <i class="material-icons prefix">swap_horiz</i>
                    <input type="text"  name="latitude" id="latitude" pattern="\d+(\.\d*)?" required>
                    <label for="latitude">Latitude</label>
                </div>
            @endif
        </div>

        <h4 class="light">Choose sensors</h4>
        <div class="divider"></div><br>

        <div class="col s12">
            <div class="col s4">
                <h5 class="light left">Types</h5>
                <a href="/sensors/create"><i class="material-icons right">add</i>Add new type</a><br><br>

                <dl name="sensors[]">
                    @foreach($sensors_types as $sensors_type)
                        <dt>{{$sensors_type}}</dt>
                        @foreach($sensors_types_by_unit[$sensors_type] as $sensor_type_by_unit[$sensors_type] )
                            <dd><input type="text" id="{{$sensor_type_by_unit[$sensors_type]}}" name="sensors_units[]" value="{{$sensor_type_by_unit[$sensors_type]}}" readonly></dd>
                            <dd><input type="number" class="validate" id="{{$sensor_type_by_unit[$sensors_type]}}" name="sensors_number[]" value="0" min="0"></dd>
                        @endforeach
                        <br><br>
                    @endforeach
                </dl>
            </div>
        </div>

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="add">
            <button type="submit" class="btn-floating btn-large waves-effect waves-circle waves-light" id="create"> <!-- Green -->
                <i class="large material-icons">navigate_next</i>
            </button>
        </div>
        <!-- FLOATING BUTTONS -->
        {!! Form::close() !!}

        <!-- FLOATING BUTTONS -->
        <div class="fixed-action-btn" id="cancel">
            <a href="{{ url('mynodes')}}" class="btn-floating btn-large waves-effect waves-circle waves-light">
                <i class="large material-icons">close</i>
            </a>
        </div>
        <!-- FLOATING BUTTONS -->
    </div>
@stop

