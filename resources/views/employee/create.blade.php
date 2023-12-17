@extends('layout.app')
@section('title', 'Employee')
@section('name_breadcrumb', 'Tambah Employee')
@section('master_data', 'active')
@section('employee', 'active')
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
                <form id="form_validation" action="{{ route('employee.store') }}" method="POST" enctype="multipart/form-data">
                    {{ csrf_field() }}
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="name">Nama Lengkap</label>
                                    <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"
                                        autocomplete="off" required value="{{ old('name') }}">
                                </div>
                                @if($errors->has('name'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('name') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="email">Email</label>
                                    <input type="email" class="form-control @error('email') is-invalid @enderror" name="email"
                                        autocomplete="off" required value="{{ old('email') }}">
                                </div>
                                @if($errors->has('email'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('email') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="gender">Jenis Kelamin</label>
                                    <select class="form-control select2 @error('gender') is-invalid @enderror" style="width: 100%;" autocomplete="off" required name="gender">
                                        <option value="" selected>--Silahkan Pilih Jenis Kelamin--</option>
                                        <option value="Pria" @if(old('gender') == 'Pria') selected @endif>Pria</option>
                                        <option value="Wanita" @if(old('gender') == 'Wanita') selected @endif>Wanita</option>
                                    </select>
                                </div>
                                @if($errors->has('gender'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('gender') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="image">Upload Foto</label>
                                    <input type="file" class="form-control @error('image') is-invalid @enderror" name="image"
                                        autocomplete="off" required value="{{ old('image') }}">
                                </div>
                                @if($errors->has('image'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('image') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="password">Password</label>
                                    <input type="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                        autocomplete="off" required value="{{ old('password') }}">
                                </div>
                                @if($errors->has('password'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('password') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                        </div>
                        <!-- /.col -->
                        <div class="col-md-6">
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="phone_number">No. Handphone</label>
                                    <input type="text" class="form-control @error('phone_number') is-invalid @enderror" name="phone_number"
                                        autocomplete="off" required value="{{ old('phone_number') }}">
                                </div>
                                @if($errors->has('phone_number'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('phone_number') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="hire_date">Hire Date</label>
                                    <input type="date" class="form-control @error('hire_date') is-invalid @enderror" name="hire_date"
                                        autocomplete="off" required value="{{ old('hire_date') }}">
                                </div>
                                @if($errors->has('hire_date'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('hire_date') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="position_id">Position</label>
                                    <input type="text" class="form-control @error('position_id') is-invalid @enderror" name="position_id"
                                        autocomplete="off" required value="{{ old('position_id') }}">
                                </div>
                                @if($errors->has('position_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('position_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="department_id">Department</label>
                                    <input type="text" class="form-control @error('department_id') is-invalid @enderror" name="department_id"
                                        autocomplete="off" required value="{{ old('department_id') }}">
                                </div>
                                @if($errors->has('department_id'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('department_id') }}</strong>
                                </span>
                                @endif
                            </div>
                            <!-- /.form-group -->
                            <div class="form-group">
                                <div class="form-line">
                                    <label class="form-label" for="password_confirmation">Konfirmasi Password</label>
                                    <input type="password_confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" name="password_confirmation"
                                        autocomplete="off" required value="{{ old('password_confirmation') }}">
                                </div>
                                @if($errors->has('password_confirmation'))
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{$errors->first('password_confirmation') }}</strong>
                                </span>
                                @endif
                            </div>
                        </div>
                        <!-- /.col -->
                    </div>
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
