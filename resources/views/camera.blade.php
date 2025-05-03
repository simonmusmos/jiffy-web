<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Camera</title>
    <link rel="manifest" href="/manifest.json">
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        body, html {
            margin: 0;
            padding: 0;
            height: 100%;
            background: black;
            overflow: hidden;
        }
        .camera-layer video {
            object-fit: cover;
            width: 100%;
            height: 100%;
            transform: scaleX(-1);
        }
    </style>
</head>
<body class="relative">
    <div class="camera-layer absolute inset-0 z-0">
        <video id="video" autoplay playsinline></video>
    </div>

    <!-- Frosted Sides -->
    <div class="absolute inset-0 flex z-10 pointer-events-none">
        <div class="flex-1 backdrop-blur-md bg-black/30"></div>
        <div class="w-[375px]"></div>
        <div class="flex-1 backdrop-blur-md bg-black/30"></div>
    </div>

    <!-- Controls -->
    <div class="absolute bottom-8 w-full z-20 flex justify-center gap-20 items-center">
        <button id="switchCamera" class="bg-white/20 backdrop-blur p-4 rounded-full text-white">
            🔄
        </button>
        <button id="capture" class="w-16 h-16 border-4 border-white rounded-full bg-white"></button>
    </div>

    <canvas id="canvas" class="hidden"></canvas>

    <script src="{{ asset('js/app.js') }}"></script>
</body>
</html>
