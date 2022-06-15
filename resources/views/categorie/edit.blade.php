@extends('dashbord.app')
@section('bageName')
edit categorie
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">edite categorie </h3>
                </div>
                <div class="card-body">
                    {!! Form::model($model,[
                        // 'action' => ['GovernorateController@store'],
                        'action'    => ['App\Http\Controllers\CategorieController@update',$model->id],
                        'method'    =>'Put',
                        ]) !!}
                            <div class="form-group">
                                <label for="name">name</label>
                                {!!Form::text('name',null,[
                                    'class'=>'form-control',
                                ]);!!}
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

