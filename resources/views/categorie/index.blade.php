@extends('dashbord.app')
{{-- @inject('client', 'App\Models\Client') --}}
@section('bageName')
Categorie
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Categorie</h3>
                </div>
                <div class="card-body">
                    <a href="{{url(route('categorie.create'))}}" class="btn btn-primary" style="margin: 10px"><i class="fas fa-plus"></i>Create new categorie</a>
                    <table class="table table-bordered">
                        <thead>
                            <tr>
                                <th scope="col">#</th>
                                <th scope="col">name</th>
                                <th scope="col">edit</th>
                                <th scope="col">delete</th>
                                <th scope="col">show</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($recordS as $record)
                            <tr>
                                <th scope="row">{{$loop->iteration}}</th>
                                <td>{{$record->name}}</td>
                                <td><a href="{{url(route('categorie.edit',$record->id))}}" class="btn btn-primary">edit</a></td>
                                <td>
                                    {!! Form::open([
                                        'action'    => ['App\Http\Controllers\CategorieController@destroy',$record->id],
                                        'method'    =>'delete',
                                        ]) !!}
                                        <button type="submit" class="btn btn-danger">delete</button>
                                        {!! Form::close() !!}
                                    {{-- <a href="{{url(route('governorate.destroy',$record->id))}}" class="btn btn-danger">delete</a> --}}
                                </td>
                                <td><a href="{{url(route('categorie.show',$record->id))}}" class="btn btn-primary">show posts {{$record->name}}</a></td>
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

