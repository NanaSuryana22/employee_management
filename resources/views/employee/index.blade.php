@extends('layout.app')
@section('title', 'Employee')
@section('name_breadcrumb', 'Employee')
@section('master_data', 'active')
@section('employee', 'active')
@section('content')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
            <h3 class="card-title">Data Employee</h3>
            @include('layout.notice')
            <a href="{{ route('employee.create') }}" style="margin-left: auto;" class="btn btn-sm btn-info">Tambah Data Employee</a>
        </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Hire Date</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $no => $data)
                <tr>
                    <td>{{ $data->user->name }}</td>
                    <td>{{ $data->user->email }}</td>
                    <td>{{ $data->hire_date }}</td>
                    <td>{{ $data->phone_number }}</td>
                    <td>
                    <a href="{{ route('employee.show', $data->id) }}" title="Lihat Detail" class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                    <a href="{{ route('employee.edit', $data->id) }}" title="Edit Data" class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                    <form action="{{ route('employee.destroy', $data->id) }}" method="post" style="display: inline;">
                        {{ csrf_field() }}
                        {{ method_field('DELETE') }}
                        <button class="btn btn-sm btn-danger" type="submit" onclick="return confirm('Yakin ingin menghapus Employee Ini ?')"  title="Hapus Data" ><i class="far fa-trash-alt"></i></button>
                    </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Hire Date</th>
                    <th>Phone Number</th>
                    <th>Action</th>
                </tr>
            </tfoot>
        </table>
    </div>
    <!-- /.card-body -->
</div>
@push('scripts')
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": false,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>
@endpush
@endsection
