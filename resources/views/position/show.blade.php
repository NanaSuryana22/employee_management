@extends('layout.app')
@section('title', 'Jabatan')
@section('name_breadcrumb', 'Jabatan')
@section('master_data', 'active')
@section('jabatan', 'active')
@section('content')
@include('layout.notice')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">Jabatan</h3>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">

        <strong><i class="far fa-file-alt mr-1"></i> Nama Jabatan</strong>

        <p class="text-muted">{{ $data->job_title }}</p>

        <hr />

        <strong><i class="far fa-file-alt mr-1"></i> Min. Salary</strong>
        <p class="text-muted">{{ $data->min_salary }}</p>

        <hr />
        <strong><i class="far fa-file-alt mr-1"></i> Max. Salary</strong>

        <p class="text-muted">{{ $data->max_salary }}</p>
        <hr />

        <a class="btn btn-info btn-sm" href="{{ route('position.edit', $data->id) }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
        <form action="{{ route('position.destroy', $data->id) }}" method="post" style="display: inline;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus Jabatan Ini ?')"  title="Hapus Data" ><i class="fas fa-trash"></i>Delete</button>
        </form>
        <a class="btn btn-primary btn-sm" href="{{ route('position.index') }}">
            <i class="fas fa-backward">
            </i>
            Back
        </a>
    </div>
    <!-- /.card-body -->
</div>
@endsection
