document.addEventListener("DOMContentLoaded", () => {
    const video = document.getElementById('video');

    if (!video) {
        console.error("Video element not found in the DOM.");
        return;
    }

    if (navigator.mediaDevices && navigator.mediaDevices.getUserMedia) {
        navigator.mediaDevices.getUserMedia({ video: true })
            .then((stream) => {
                video.srcObject = stream;
                video.play();
            })
            .catch((err) => {
                console.error("Error accessing camera:", err);
                alert("Unable to access the camera. Please check permissions and try again.");
            });
    } else {
        console.error("navigator.mediaDevices.getUserMedia is not supported in this browser or context.");
        alert("Your browser does not support camera access or you're not using HTTPS.");
    }
});
