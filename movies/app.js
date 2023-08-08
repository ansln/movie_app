const player = new Plyr('#player', {
    storage: {
        enabled: true,
        key: 'currentTime'
    },
    quality: {
        default: 1080,
        options: [1080, 720]
    },
    keyboard: {
        focused: true,
        global: true
    }
});