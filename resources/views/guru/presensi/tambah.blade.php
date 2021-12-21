@extends("layouts.layout")
@section("title","Tambah Presensi | Guru")
@section("konten")
    <h2>Tambah Presensi</h2>

    <form action="{{ url("/guru/presensi/tambah") }}" method="post">
        @csrf
        <div class="form-group">
            <label for="title">judul</label>
            <input type="text" name="title" class="@error("title")
                is-invalid
            @enderror">

            @error("title")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


         <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" name="topic" class="@error("topic")
                is-invalid
            @enderror">

            @error("topic")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


         <div class="form-group">
            <label for="kelas">Kelas</label>
            <select name="kelas" id="kelas">
                @foreach ($kelas as $k)
                <option value="{{ $k->id }}">{{ $k->name }}</option>
                @endforeach
            </select>
        </div>

          <div class="form-group">
            <label for="date">tanggal</label>
            <input type="date" name="date" class="@error("date")
                is-invalid
            @enderror">

            @error("date")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-primary">Tambah</button>
    </form>
@endsection
