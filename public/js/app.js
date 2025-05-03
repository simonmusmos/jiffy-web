let currentStream = null;
let usingFrontCamera = true;

async function startCamera() {
    const constraints = {
        video: {
            facingMode: usingFrontCamera ? "user" : "environment"
        }
    };

    try {
        if (currentStream) {
            currentStream.getTracks().forEach(track => track.stop());
        }

        const stream = await navigator.mediaDevices.getUserMedia(constraints);
        const video = document.getElementById("video");
        video.srcObject = stream;
        currentStream = stream;
    } catch (err) {
        console.error("Error accessing camera:", err);
        alert("Camera access denied or unavailable.");
    }
}

document.addEventListener("DOMContentLoaded", () => {
    startCamera();

    document.getElementById("switchCamera").addEventListener("click", () => {
        usingFrontCamera = !usingFrontCamera;
        startCamera();
    });

    document.getElementById("capture").addEventListener("click", () => {
        const video = document.getElementById("video");
        const canvas = document.getElementById("canvas");
        canvas.width = video.videoWidth;
        canvas.height = video.videoHeight;
        const ctx = canvas.getContext("2d");

        // Mirror fix for front camera
        if (usingFrontCamera) {
            ctx.translate(canvas.width, 0);
            ctx.scale(-1, 1);
        }

        ctx.drawImage(video, 0, 0, canvas.width, canvas.height);

        const link = document.createElement("a");
        link.href = canvas.toDataURL("image/png");
        link.download = "photo.png";
        link.click();
    });
});
