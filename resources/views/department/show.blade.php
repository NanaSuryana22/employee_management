@extends('layout.app')
@section('title', 'Department')
@section('name_breadcrumb', 'Department')
@section('master_data', 'active')
@section('department', 'active')
@section('content')
@include('layout.notice')
<div class="card card-primary">
    <div class="card-header">
        <h3 class="card-title">About Department</h3>
    </div>
    
    <!-- /.card-header -->
    <div class="card-body">

        <strong><i class="far fa-file-alt mr-1"></i> Name</strong>

        <p class="text-muted">{{ $department->name }}</p>

        
        <a class="btn btn-info btn-sm" href="{{ route('department.edit', $department->id) }}">
            <i class="fas fa-pencil-alt">
            </i>
            Edit
        </a>
        <form action="{{ route('department.destroy', $department->id) }}" method="post" style="display: inline;">
            {{ csrf_field() }}
            {{ method_field('DELETE') }}
            <button class="btn btn-danger btn-sm" type="submit" onclick="return confirm('Yakin ingin menghapus Department Ini ?')"  title="Hapus Data" ><i class="fas fa-trash"></i>Delete</button>
        </form>
        <a class="btn btn-primary btn-sm" href="{{ route('department.index') }}">
            <i class="fas fa-backward">
            </i>
            Back
        </a>
    </div>
    <!-- /.card-body -->
</div>
@endsection
