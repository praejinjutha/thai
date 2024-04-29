let isPaused = false;
let startTime;
let elapsedTime = 0;
let timerInterval;

async function main() {
    try {
        const buttonStart = document.querySelector('#buttonStart');
        const buttonStop = document.querySelector('#buttonStop');
        const buttonPause = document.querySelector('#buttonPause');
        const audio = document.querySelector('#audio');
        const timerElement = document.getElementById('timer');

        const stream = await navigator.mediaDevices.getUserMedia({
            video: false,
            audio: true,
        });

        const [track] = stream.getAudioTracks();
        const settings = track.getSettings();

        const audioContext = new AudioContext();
        await audioContext.audioWorklet.addModule('../assets/js/audio-recorder.js');

        const mediaStreamSource = audioContext.createMediaStreamSource(stream);
        const audioRecorder = new AudioWorkletNode(audioContext, 'audio-recorder');
        const buffers = [];

        audioRecorder.port.addEventListener('message', event => {
            buffers.push(event.data.buffer);
        });
        audioRecorder.port.start();

        mediaStreamSource.connect(audioRecorder);
        audioRecorder.connect(audioContext.destination);

        buttonStart.addEventListener('click', event => {
            buttonStart.setAttribute('disabled', 'disabled');
            buttonStop.removeAttribute('disabled');
            buttonPause.removeAttribute('disabled');

            const parameter = audioRecorder.parameters.get('isRecording');
            parameter.setValueAtTime(1, audioContext.currentTime);

            buffers.splice(0, buffers.length);

            startTime = new Date().getTime() - elapsedTime;
            timerInterval = setInterval(updateTimer, 1000);
        });

        buttonStop.addEventListener('click', event => {
            buttonStop.setAttribute('disabled', 'disabled');
            buttonStart.removeAttribute('disabled');

            const parameter = audioRecorder.parameters.get('isRecording');
            parameter.setValueAtTime(0, audioContext.currentTime);

            clearInterval(timerInterval);

            const blob = encodeAudio(buffers, settings);
            const url = URL.createObjectURL(blob);

            audio.src = url;
            // Set download link href attribute to the recorded audio
    downloadLink.href = url;
    downloadLink.download = 'recorded_audio.wav'; // You can change the filename here
});
 

        buttonPause.addEventListener('click', (event) => {
            const parameter = audioRecorder.parameters.get('isRecording');
            if (isPaused) {
                buttonPause.innerHTML = '<img src="../assets/img/pause.png" alt="Pause" style="width: 90px; height: 70px;">';
                parameter.setValueAtTime(1, audioContext.currentTime);
                isPaused = false;
                startTime = new Date().getTime() - elapsedTime;
                timerInterval = setInterval(updateTimer, 1000);
            } else {
                buttonPause.innerHTML = '<img src="../assets/img/resume-removebg-preview.png" alt="Resume" style="width: 90px; height: 70px;">';
                parameter.setValueAtTime(0, audioContext.currentTime);
                isPaused = true;
                clearInterval(timerInterval); 
            }
        });
        

        function updateTimer() {
            const currentTime = new Date().getTime();
            elapsedTime = currentTime - startTime;
            const formattedTime = formatTime(elapsedTime);
            timerElement.textContent = formattedTime;
        }

    } catch (err) {
        console.error(err);
    }
}

function formatTime(ms) {
    const seconds = Math.floor((ms / 1000) % 60);
    const minutes = Math.floor((ms / (1000 * 60)) % 60);
    const formattedSeconds = seconds < 10 ? `0${seconds}` : seconds;
    const formattedMinutes = minutes < 10 ? `0${minutes}` : minutes;
    return `${formattedMinutes}:${formattedSeconds}`;
}

main();
