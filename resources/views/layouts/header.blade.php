<header>
    @php
        $img = auth()->user()->foto
    @endphp
    <img src="{{ asset("fotoUser/$img") }}" alt="img user">

    <div class="menu">
        <span></span>
        <span></span>
        <span></span>
    </div>
</header>
