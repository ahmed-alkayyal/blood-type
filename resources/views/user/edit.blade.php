@extends('dashbord.app')
@section('bageName')
edit user
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">edit user </h3>
                </div>
                <div class="card-body">
                    {!! Form::model($model,[
                        'action'    => ['App\Http\Controllers\userController@update',$model->id],
                        'method'    =>'Put',
                        ]) !!}
                                <div class="form-group">
                                    <label for="name">name</label>
                                    {!!Form::text('name',null,[
                                        'class'=>'form-control',
                                    ]);!!}
                                </div>
                                <div class="form-group">
                                    <label for="email">email</label>
                                    {!!Form::email('email',null,[
                                        'class'=>'form-control',
                                    ]);!!}
                                </div>
                                <div class="form-group">
                                    <label for="password">password</label>
                                    {!!Form::password('password',null,[
                                        'class'=>'form-control',
                                    ]);!!}
                                </div>
                                <div class="form-group">
                                    <button class="btn btn-success" type="submit" style="margin: 20px 0">edit</button>
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

