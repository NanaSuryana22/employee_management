@extends('layout.app')
@section('title', 'Employee')
@section('name_breadcrumb', 'Employee')
@section('master_data', 'active')
@section('employee', 'active')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Data Employee</h3>
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
                    <td data-title="Aksi">
                        <div class="btn-group">
                            <button type="button" class="btn bg-cyan dropdown-toggle" data-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false">
                                Aksi <span class="caret"></span>
                            </button>
                            <ul class="dropdown-menu">
                                <form action="{{ route('employee.destroy', $data->id) }}" method="post">
                                    <li class="ul-style"><a href="{{ route('employee.show',$data->id) }}"
                                            class="btn-action">Lihat Detail</li>
                                    <li role="separator" class="divider"></li>
                                    <li class="ul-style"><a href="{{ route('employee.edit',$data->id) }}"
                                            class="btn-action">Edit</a></li>
                                    <li>
                                    <li role="separator" class="divider"></li>
                                    {{ csrf_field() }}
                                    {{ method_field('DELETE') }}
                                    <li class="ul-style">
                                        <button class="btn-action" type="submit"
                                            onclick="return confirm('Yakin ingin menghapus Employee Ini ?')">Hapus</button>
                                    </li>
                                </form>
                            </ul>
                        </div>
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
