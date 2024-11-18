document.addEventListener('DOMContentLoaded', () => {
    updateClock();
    setInterval(updateClock, 1000);
    updateDate();
    fetchWeather();
    fetchTips();
});

function updateClock() {
    const clockElement = document.getElementById('clockText');
    const dateElement = document.getElementById('dateText');

    const now = new Date();

    const time = now.toLocaleTimeString();
    clockElement.textContent = time;

    const date = now.toLocaleDateString('en-GB');
    dateElement.textContent = date;
}


function updateDate() {
    const dateElement = document.getElementById('dateText');
    const now = new Date();
    dateElement.textContent = now.toLocaleDateString();
}

function fetchWeather() {
    const url = 'https://api.open-meteo.com/v1/forecast?latitude=31.9454&longitude=35.9284&hourly=temperature_2m,precipitation';


    fetch(url)
        .then(response => response.json())
        .then(data => {
            const weatherElement = document.getElementById('weatherText');
            const temperature = data.hourly.temperature_2m[0];
            const precipitation = data.hourly.precipitation[0];
            weatherElement.textContent = `Temperature: ${temperature}°C,`;
        })
        .catch(error => {
            console.error('Error fetching weather data:', error);
            document.getElementById('weatherText').textContent = 'Unable to fetch weather data.';
        });
}

function fetchTips() {
    const url = 'https://api.adviceslip.com/advice';

    fetch(url)
        .then(response => response.json())
        .then(data => {
            const tipsElement = document.getElementById('tipsText');
            const tip = data.slip.advice;
            tipsElement.textContent = `Tip: ${tip}`;
        })
        .catch(error => {
            console.error('Error fetching tips:', error);
            document.getElementById('tipsText').textContent = 'Unable to fetch tips.';
        });
}