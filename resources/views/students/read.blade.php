
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Siswa</th>
                <th>Kelas</th>
                <th>Status (Aktif/Non Aktif)</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($students as $data)                       
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->name }}</td>
                <td>{{ $data->class }}</td>
                <td>
                    <input type="checkbox" class="status-toggle" data-id="{{ $data->id }}" {{ $data->status == '1' ? 'checked' : '' }}>
                </td>
                <td>
                    <button class="btn btn-warning" onclick="showEdit({{ $data->id }})">Edit</button>
                    <button class="btn btn-danger" onclick="deleteData({{ $data->id }})">Hapus</button>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

<script type="text/javascript">
$('.status-toggle').change(function() {
    var id = $(this).data('id');
    var status = this.checked ? 'active' : 'inactive';
    $.ajax({
        type: "GET",
        url: "{{ url('toggleStatus') }}",
        data: { id: id, status: status },
        success: function(response) {
            // Handle success, if needed
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Status berhasil di update!',
                timer: 1500
            });
        },
        error: function(xhr, status, error) {
            console.error(error);
        }
    });
});
</script>

<script src="{{asset('template/vendor/datatables/jquery.dataTables.min.js')}}"></script>
<script src="{{asset('template/vendor/datatables/dataTables.bootstrap4.min.js')}}"></script>
<script src="{{asset('template/js/demo/datatables-demo.js')}}"></script>