@extends('layout.app')
@section('title', 'Department')
@section('name_breadcrumb', 'Department')
@section('master_data', 'active')
@section('department', 'active')
@section('content')
<section class="content">
    <div class="container-fluid">
        <!-- SELECT2 EXAMPLE -->
        <div class="card card-default">
            <div class="card-header">
                <h3 class="card-title">Mohon isi data dengan benar</h3>

                <div class="card-tools">
                    <button type="button" class="btn btn-tool" data-card-widget="collapse">
                        <i class="fas fa-minus"></i>
                    </button>
                    <button type="button" class="btn btn-tool" data-card-widget="remove">
                        <i class="fas fa-times"></i>
                    </button>
                </div>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
                <form id="form_validation" action="{{ route('department.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="name">Nama Department</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        autocomplete="off" required value="{{ old('name') }}">
                                </div>
                                
                                @if ($errors->has('name'))
                                    <span role="alert">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
                    <button class="btn btn-primary waves-effect" type="submit">Simpan</button>
                    <button class="btn btn-warning waves-effect" type="reset">Reset</button>
                    <a class="btn btn-info waves-effect pull-right" href="{{ url()->previous() }}">Kembali</a>
                </form>

            </div>
            <!-- /.card-body -->
            <div class="card-footer">
            </div>
        </div>
        <!-- /.card -->
    </div>
    <!-- /.container-fluid -->
</section>
@endsection
