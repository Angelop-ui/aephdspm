const song = document.getElementById("song");
const progress = document.getElementById("progress");
const playPause = document.querySelector(".play-pause");
const controlIcon = document.getElementById("control");

const songName = document.getElementById("songName");
const artistName = document.getElementById("artistName");
const cover = document.getElementById("cover");

const btnNext = document.querySelector(".siguiente");
const btnBack = document.querySelector(".regresar");

const songs = [
  {
    title: "Blah Blah Blah",
    name: "Armin van Buuren",
    source: "Armin van Buuren - Blah Blah Blah (Official Lyric Video).mp3",
    cover: "blah.jpg"
  },
  {
    title: "Turn It Up",
    name: "Armin van Buuren",
    source: "Armin van Buuren - Turn It Up (Official Lyric Video).mp3",
    cover: "turn.jpg"
  },
  {
    title: "Great Spirit",
    name: "Armin van Buuren vs Vini Vici feat. Hilight Tribe",
    source: "Armin van Buuren vs Vini Vici feat. Hilight Tribe - Great Spirit (Extended Mix).mp3",
    cover: "great.jpg"
  },
  {
    title: "I'm an Albatraoz",
    name: "AronChupa",
    source: "AronChupa - I'm an Albatraoz OFFICIAL VIDEO.mp3",
    cover: "albatraoz.jpg"
  },
  {
    title: "Doppler",
    name: "Charlotte de Witte",
    source: "Charlotte de Witte - Doppler (Original Mix) [KNTXT010].mp3",
    cover: "doppler.jpg"
  },
  {
    title: "Bad",
    name: "David Guetta & Showtek",
    source: "David Guetta & Showtek - Bad ft.Vassy (Lyrics Video).mp3",
    cover: "bad.jpg"
  },
  {
    title: "El toro",
    name: "Timmy Trumpet",
    source: "El Toro (feat. Afandi).mp3",
    cover: "toro.jpg"
  },
  {
    title: "Embalao",
    name: "Jochill",
    source: "Embalao (Original Mix).mp3",
    cover: "embalao.jpg"
  },
  {
    title: "Space Jungle",
    name: "Eva Shaw",
    source: "Eva Shaw - Space Jungle (Showtek Edit) [Official Music Video].mp3",
    cover: "sapace.jpg"
  },
  {
    title: "judgement Day",
    name: "D'devils",
    source: "Judgement Day (Radio Edit).mp3",
    cover: "devils.jpg"
  }
];

let currentSongIndex = 0;

function updateSongInfo() {
  const current = songs[currentSongIndex];
  song.src = current.source;
  cover.src = current.cover;
  songName.textContent = current.title;
  artistName.textContent = current.name;
  progress.value = 0;
  controlIcon.classList.replace("fa-pause", "fa-play");
}

// Reproducir o pausar
playPause.addEventListener("click", () => {
  if (song.paused) {
    song.play();
    controlIcon.classList.replace("fa-play", "fa-pause");
  } else {
    song.pause();
    controlIcon.classList.replace("fa-pause", "fa-play");
  }
});

// Avanzar a siguiente canción
btnNext.addEventListener("click", () => {
  currentSongIndex = (currentSongIndex + 1) % songs.length;
  updateSongInfo();
  song.play();
  controlIcon.classList.replace("fa-play", "fa-pause");
});

// Regresar a canción anterior
btnBack.addEventListener("click", () => {
  currentSongIndex = (currentSongIndex - 1 + songs.length) % songs.length;
  updateSongInfo();
  song.play();
  controlIcon.classList.replace("fa-play", "fa-pause");
});

// Barra de progreso
song.addEventListener("timeupdate", () => {
  if (!isNaN(song.duration)) {
    progress.value = (song.currentTime / song.duration) * 100;
  }
});

// Cambiar posición desde la barra
progress.addEventListener("input", () => {
  song.currentTime = (progress.value / 100) * song.duration;
});

// Cargar primera canción
updateSongInfo();
