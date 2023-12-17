@extends('layout.app')
@section('title', 'Jabatan')
@section('name_breadcrumb', 'Jabatan')
@section('master_data', 'active')
@section('jabatan', 'active')
@section('content')
@include('layout.notice')
<div class="card">
    <div class="card-header" style="display: flex; justify-content: space-between; align-items: center;">
        <h3 class="card-title">Data Jabatan</h3>
        <a href="{{ route('position.create') }}" style="margin-left: auto;" class="btn btn-sm btn-info">Tambah Data
        Jabatan</a>
    </div>
    <!-- /.card-header -->
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Min. Salary</th>
                    <th>Max. Salary</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach($datas as $no => $data)
                <tr>
                    <td>{{ $data->job_title }}</td>
                    <td>{{ $data->min_salary }}</td>
                    <td>{{ $data->max_salary }}</td>
                    <td>
                        <a href="{{ route('position.show', $data->id) }}" title="Lihat Detail"
                            class="btn btn-sm btn-info"><i class="far fa-eye"></i></a>
                        <a href="{{ route('position.edit', $data->id) }}" title="Edit Data"
                            class="btn btn-sm btn-warning"><i class="far fa-edit"></i></a>

                        <form action="{{ route('position.destroy', $data->id) }}" method="post"
                            style="display: inline;">
                            {{ csrf_field() }}
                            {{ method_field('DELETE') }}
                            <button class="btn btn-sm btn-danger" type="submit"
                                onclick="return confirm('Yakin ingin menghapus Employee Ini ?')" title="Hapus Data"><i
                                    class="far fa-trash-alt"></i></button>
                        </form>
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th>Nama Jabatan</th>
                    <th>Min. Salary</th>
                    <th>Max. Salary</th>
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
