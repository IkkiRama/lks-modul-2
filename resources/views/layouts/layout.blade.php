<!DOCTYPE html>
<html lang="en">

<head>
    @include("layouts.meta")
    <title>@yield("title")</title>
    @include("layouts.links")
    @yield("link")
</head>

<body>

    @include("layouts.header")

    @include("layouts.aside")

    <main>
        @yield("konten")
    </main>

    @yield("modal")

    @include("layouts.script")
    @yield("script")
</body>

</html>
