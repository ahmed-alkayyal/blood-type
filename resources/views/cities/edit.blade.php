@extends('dashbord.app')
@inject('modelGovernorate', 'App\Models\Governorate')
@section('bageName')
edit city
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">edite city </h3>
                </div>
                <div class="card-body">
                    {!! Form::model($model,[
                        // 'action' => ['GovernorateController@store'],
                        'action'    => ['App\Http\Controllers\CiteController@update',$model->id],
                        'method'    =>'Put',
                        ]) !!}
                            <div class="form-group">
                                <label for="name">name</label>
                                {!!Form::text('name',null,[
                                    'class'=>'form-control',
                                ]);!!}
                                <select name="governorate_id" class="form-control">
                                    <option value="governorate"> governorate</option>
                                    @foreach ($modelGovernorate->all() as $governorate)
                                        <option value="{{ $governorate->id }}"  >{{$governorate->name}}</option>
                                    @endforeach
                                </select>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" style="margin: 20px 0">edit</button>
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

