@extends("layouts.layout")
@section("title","Ubah Presensi | Guru")
@section("konten")
    <h2>Ubah Presensi</h2>
    {{-- {{ dd($presensi); }} --}}

    <form action="{{ url("/guru/presensi/ubah/$presensi->id") }}" method="post">
        @csrf
        @method("put")
        <div class="form-group">
            <label for="title">judul</label>
            <input type="text" name="title" value="{{ $presensi->subject->name }}" class="@error("title")
                is-invalid
            @enderror">

            @error("title")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>


         <div class="form-group">
            <label for="topic">Topic</label>
            <input type="text" value="{{ $presensi->topic }}" name="topic" class="@error("topic")
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
                <option value="{{ $k->id }}" @if ($presensi->classe->id === $k->id)
                    selected
                @endif>{{ $k->name }}</option>
                @endforeach
            </select>
        </div>

          <div class="form-group">
            <label for="date">tanggal</label>
            <input type="date" name="date"  value="{{ $presensi->date }}" class="@error("date")
                is-invalid
            @enderror">

            @error("date")
                <div class="invalid-feedback">{{ $message }}</div>
            @enderror
        </div>

        <button class="btn btn-warning">Ubah</button>
    </form>
@endsection
