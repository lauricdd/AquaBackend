@extends('layout.admin')

@section('title')
    <a href="#" class="mobile-tittle">{{ trans("general.sensors") }}</a>
@stop


@section('content')
    <div class="desktop row" id="sensors">
        <!-- Tittle -->
        <div class="linker"><p class="light">{{ trans("general.dashboard") }} > {{ trans("general.sensors") }}</p></div>
        <h4 class="light">{{ trans("general.sensors") }}</h4>
        <div class="divider"></div>

        <!-- Table -->
        <div class="col s12">
            <table class="striped">
                <thead>
                <tr>
                    <th data-field="type">{{ trans("sensors.type") }}</th>
                    <th data-field="type">{{ trans("sensors.unit") }}</th>
                    @if(Auth::check() and Auth::user()->role == 'superadmin')
                        <th data-field="actions">{{ trans("general.actions") }}</th>
                    @endif
                </tr>
                </thead>

                <tbody>
                    @if($sensors)
                        @foreach ($sensors as $sensor)
                            <tr>
                                <td>{{ $sensor->type }}</td>
                                <td>{{ $sensor->unit }}</td>
                                <td>
                                    @if(Auth::check() and Auth::user()->role == 'superadmin')
                                        <!--<a href="{{url('sensors',$sensor->id)}}"><i class="material-icons">visibility</i></a>-->
                                        <a href="{{route('sensors.edit', $sensor->id)}}"><i class="material-icons">edit</i></a>

                                        <a onclick="showDeleteModal('<?php echo $sensor -> id ?>');"><i class="material-icons">delete</i></a>

                                        {!! Form::open(['method' => 'DELETE', 'route'=>['sensors.destroy', $sensor->id], 'id'=>$sensor->id]) !!}
                                        {!! Form::close() !!}
                                    @endif
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>

    <!-- Delete Modal Structure -->
    <div id="delete" class="modal">
        <div class="modal-content center">
            <h6 class="light">{{ trans("general.sure to delete this?") }}</h6><br>
            <a href="#" class=" modal-action modal-close btn-flat">No</a>
            <input type="hidden" id="delete_value">
            <a class="btn primary" onclick="eliminar();">{{ trans("general.yes") }}</a>
        </div>
    </div>

    <!-- FLOATING BUTTON -->
    <div class="fixed-action-btn" id="add">
        <a href="{{url('/sensors/create')}}" class="btn-floating btn-large waves-effect waves-circle waves-light red">
            <i class="large material-icons">add</i>
        </a>
    </div>
    <!-- FLOATING BUTTON -->
@endsection

@section('javascript')
    <script type="text/javascript">
        /**** Eliminar usando modal ****/
        function showDeleteModal(id){
            $('#delete_value').val(id);
            $('#delete').openModal();
        }

        function eliminar(){
            var id = $('#delete input').val();
            $("#"+id).submit();
        }
    </script>
@endsection