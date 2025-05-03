<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera PWA</title>
    <link rel="manifest" href="{{ asset('manifest.json') }}">
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="camera-layer">
        <video id="video" autoplay playsinline></video>
    </div>

    <div class="frost-layer">
        <div class="frost-left"></div>
        <div class="center-window"></div>
        <div class="frost-right"></div>
    </div>

    <script src="{{ asset('js/app.js') }}"></script>
    <script>
        if ('serviceWorker' in navigator) {
            navigator.serviceWorker.register("{{ asset('sw.js') }}")
                .then(reg => console.log('Service Worker registered:', reg));
        }
        
    </script>
</body>
</html>