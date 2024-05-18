<form action="javascript:void(0)" id="exampleForm" name="exampleForm" method="POST">
    <input type="hidden" name="id" id="id">
    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" class="form-control" id="name" name="name" placeholder="Nama Siswa">
    </div>
    <div class="form-group">
        <label>Kelas</label>
        <select class="form-control" id="class" name="class">
            <option value="" selected disabled>Pilih Kelas</option>
            @foreach($kelas as $class)
                <option value="{{ $class }}">{{ $class }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-offset-2 col-sm-10"><br/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeX()">Kembali</button>
        <button type="submit" class="btn btn-primary" id="btn-save">Simpan</button>
    </div>
</form>

<script type="text/javascript">
$('#exampleForm').submit(function(e) {
    e.preventDefault();
    var formData = new FormData(this);
    $.ajax({
        type: 'POST',
        url: "{{url('store')}}",
        data: formData,
        cache: false,
        contentType: false,
        processData: false,
        success: (data) => {
            $('#exampleModal').modal('hide');
            read();
            Swal.fire({
                icon: 'success',
                title: 'Success',
                text: 'Data berhasil disimpan',
                timer: 1500
            });
        },
        error: function(data) {
            console.log(data);
        }
    });
});
</script>