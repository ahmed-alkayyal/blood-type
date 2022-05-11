@extends('dashbord.app')
@inject('client', 'App\Models\Client')
@section('bageName')
Blood Bank bag1
@endsection
@section('content')

        <!-- Main content -->
        <section class="content">
            <div class="row">
                <div class="col-md-3 col-sm-6 col-12">
                    <div class="info-box">
                        <span class="info-box-icon bg-info"><i class="far fa-user"></i></span>
                        <div class="info-box-content">
                            <span class="info-box-text">Client</span>
                            <span class="info-box-number">{{$client->count()}}</span>
                        </div>
                    </div>
                </div>
            </div>
            <!-- Default box -->
            <div class="card">
                <div class="card-header">
                <h3 class="card-title">Title</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse" title="Collapse">
                    <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove" title="Remove">
                    <i class="fas fa-times"></i>
                    </button>
                </div>
                </div>
                <div class="card-body">
                Start creating your amazing application!
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

