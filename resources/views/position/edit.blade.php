@extends('layout.app')
@section('title', 'Jabatan')
@section('name_breadcrumb', 'Jabatan')
@section('master_data', 'active')
@section('jabatan', 'active')
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
                <form id="form_validation" action="{{ route('position.update', $data->id) }}" method="POST">
                    {{ csrf_field() }} {{method_field('PUT')}}
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="job_title">Nama Jabatan</label>
                                    <input type="text" class="form-control @error('job_title') is-invalid @enderror" name="job_title"
                                        autocomplete="off" required value="{{ $data->job_title }}">
                                </div>
                                @if($errors->has('job_title'))
                                <span role="alert">
                                    <strong>{{$errors->first('job_title') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="min_salary">Min. Salary</label>
                                    <input type="number" class="form-control @error('min_salary') is-invalid @enderror" name="min_salary"
                                     autocomplete="off" required value="{{ $data->min_salary }}">
                                </div>
                                
                                @if ($errors->has('min_salary'))
                                    <span role="alert">
                                        <strong>{{ $errors->first('min_salary') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                        <div class="col-md-12">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="max_salary">Max. Salary</label>
                                    <input type="number" class="form-control @error('max_salary') is-invalid @enderror" name="max_salary"
                                        autocomplete="off" required value="{{ $data->max_salary }}">
                                </div>
                                
                                @if ($errors->has('max_salary'))
                                    <span role="alert">
                                        <strong>{{ $errors->first('max_salary') }}</strong>
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
