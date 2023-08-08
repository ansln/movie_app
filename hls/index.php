<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HLS Video</title>
    <script src="https://cdn.jsdelivr.net/npm/hls.js@1"></script>
</head>
<body>
    <video id="video" controls></video>
    <script>
    var video = document.getElementById('video');
    var videoSrc = 'test/index.m3u8';
    if (Hls.isSupported()) {
        var hls = new Hls();
        hls.loadSource(videoSrc);
        hls.attachMedia(video);
    }
    </script>
</body>
</html>

<!-- this is ffmpeg format for convert mp4 to m3u8 -->
<!-- ffmpeg -i video.mp4 -profile:v baseline -level 3.0 -start_number 0 -hls_time 20 -hls_list_size 5 -f hls index.m3u8 -->