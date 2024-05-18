@extends('layout.app')
@section('title', 'Siswa')
@section('content')
<!-- DataTales Example -->
<h2>DAFTAR SISWA</h2>

<div class="card shadow mb-4">
    <div class="card-header py-3">
        <a class="btn btn-primary" onClick="add()" href="javascript:void(0)">Tambah</a>
    </div>
    <div class="card-body">
        <div id="read"></div>
    </div>
</div>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel"></h5>
        <button type="button" class="close" onclick="closeX()" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div id="formBody"></div>
      </div>
      <div class="modal-footer">
        <!-- <button type="button" class="btn btn-secondary" data-dismiss="modal">Kembali</button>
        <button type="submit" class="btn btn-primary">Simpan</button> -->
      </div>
    </div>
  </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $.ajaxSetup({
            headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
        read()
    });
    function closeX() {
        $("#exampleModal").modal('hide');
    }
    function read() {
        $.get("{{ url('read') }}", {}, function(data) {
            $("#read").html(data);
        });
    }
    // function add() {
    //     $('#exampleModal').modal('show');
    //     $('#exampleForm').trigger('reset');
    // }
    function add() {
        $.get("{{ url('showCreate') }}", {}, function(data) {
            $("#exampleModalLabel").html('Tambah');
            $("#formBody").html(data);
            $("#exampleModal").modal('show');
        });
    }
    function showEdit(id) {
        $.get("{{ url('showEdit') }}/" + id, {}, function(data) {
            $("#exampleModalLabel").html('Edit');
            $('#formBody').html(data);
            $('#exampleModal').modal('show');
        })
    }
    function update(id) {
        var name = $("#name").val(); // Get the value of the input field with ID "name"
        var kelas = $("#class").val(); 
        $.ajax({
            type: "get",
            url: "{{ url('update') }}/" + id,
            data: { name: name, class: kelas },
            success: function(data) {
                $('#exampleModal').modal('hide');
                read();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil diubah',
                    timer: 1500
                });
            }
        });
    }
    function deleteData(id) {
        $.ajax({
            type: "get",
            url: "{{ url('deleteData') }}/" + id,
            data: { id: id},
            success: function(data) {
                $(".close").click();
                read();
                Swal.fire({
                    icon: 'success',
                    title: 'Success',
                    text: 'Data berhasil dihapus',
                    timer: 1500
                });
            }
        });
    }    
</script>
@endsection