@extends('dashbord.app')

@section('bageName')
    Create user
@endsection
@section('content')

    <!-- Main content -->
    <section class="content">
        <!-- Default box -->
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">create user </h3>
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
                    'action' => 'App\Http\Controllers\RoleController@store',
                    ]) !!}
                <div class="form-group">
                    <label for="name">name</label>
                    {!!Form::text('name',null,[
                        'class'=>'form-control',
                    ]);!!}
                </div>
                <div class="row">
                    @foreach($permissions as $permission)
                        <div class="col-sm-3">
                            <div class="form-group">
                                {!!Form::checkbox('permissions[]',$permission->id);!!}
                                <label for="name">{{$permission->name}}</label>
                            </div>
                        </div>
                    @endforeach
                </div>
                <div class="form-group">
                    <button class="btn btn-success" type="submit" style="margin: 20px 0">submit</button>
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

