
<div class="table-responsive">
    <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
        <thead>
            <tr>
                <th>No</th>
                <th>Kode</th>
                <th>Nama Signa</th>
                {{-- <th>Aksi</th> --}}
            </tr>
        </thead>
        <tbody>
            <?php $no=1; ?>
            @foreach ($obat as $data)                       
            <tr>
                <td>{{ $no++ }}</td>
                <td>{{ $data->signa_kode }}</td>
                <td>{{ $data->signa_nama }}</td>
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