@extends('dashbord.app')
{{-- @inject('client', 'App\Models\Client') --}}
@section('bageName')
Roles
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Roles</h3>
                </div>
                <div class="card-body">
                    <a href="{{url(route('roles.create'))}}" class="btn btn-primary" style="margin: 10px"><i class="fas fa-plus"></i>Create new role</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($records as $record)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
{{--                                @can('edit_roles')--}}
                                    <td><a href="{{url(route('roles.edit',$record->id))}}" class="btn btn-primary">edit</a></td>
{{--                                @endcan--}}
                                    <td>
                                    {!! Form::open([
                                        'action'    => ['App\Http\Controllers\RoleController@destroy',$record->id],
                                        'method'    =>'delete',
                                        ]) !!}
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        {!! Form::close() !!}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
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

