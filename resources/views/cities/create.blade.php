@extends('dashbord.app')
@inject('modelGovernorate', 'App\Models\Governorate')
@inject('model', 'App\Models\City')
@section('bageName')
Create Governorate
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">create governorate </h3>

                {{-- <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div> --}}
                </div>
                <div class="card-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    {!! Form::model($model,[
                        // 'action' => ['GovernorateController@store'],
                        'action' => 'App\Http\Controllers\CiteController@store',
                        ]) !!}
                            <div class="form-group">
                                <label for="name">name</label>
                                {!!Form::text('name',null,[
                                    'class'=>'form-control',
                                ]);!!}
                                {{-- @foreach( $modelGovernorate->all() as $governorate)
                                    {!! Form::select('governorate',
                                    [$governorate->id => $governorate->name
                                    ]) !!}
                                @endforeach --}}
                                <select name="governorate_id" class="form-control">
                                    <option value="governorate"> governorate</option>
                                    @foreach ($modelGovernorate->all() as $governorate)
                                        <option value="{{ $governorate->id }}"  >{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" style="margin: 20px 0">submit</button>
                                </div>
                            </div>
                    {!! Form::close() !!}
                </div>
                <!-- /.card-body -->
                <div class="card-footer">
                Footer
                </div>
                <!-- /.card-footer-->
            </div>
            <!-- /.card -->

        </section>
        <!-- /.content -->
@endsection

