<form action="javascript:void(0)" id="exampleForm" name="exampleForm" method="POST">
    <input type="hidden" name="id" id="id">
    <div class="form-group">
        <label>Nama Siswa</label>
        <input type="text" class="form-control" id="name" name="name" value="{{ $students->name }}" placeholder="Nama Siswa">
    </div>
    <div class="form-group">
        <label>Kelas</label>
        <select class="form-control" id="class" name="class">
            <option value="" selected disabled>Pilih Kelas</option>
            @foreach($kelas as $class)
                <option value="{{ $class }}" {{ $students->class == $class ? 'selected' : '' }}>{{ $class }}</option>
            @endforeach
        </select>
    </div>
    <div class="col-sm-offset-2 col-sm-10"><br/>
        <button type="button" class="btn btn-secondary" data-dismiss="modal" onclick="closeX()">Kembali</button>
        <button class="btn btn-primary" onClick="update({{ $students->id }})">Update</button>
    </div>
</form>