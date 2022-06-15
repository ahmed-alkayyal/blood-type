@extends('dashbord.app')
@inject('model', 'App\Models\Category')
@section('bageName')
Create category
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">create category </h3>
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
                        'action' => 'App\Http\Controllers\CategorieController@store',
                        ]) !!}
                            <div class="form-group">
                                <label for="name">name</label>
                                {!!Form::text('name',null,[
                                    'class'=>'form-control',
                                ]);!!}
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

