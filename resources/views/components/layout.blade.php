<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $title ?? "Music Ranking Platform" }}</title>
</head>
<body>
    <x-navbar />
    <main class="container">
        {{ $slot }}
    </main>
</body>
</html>