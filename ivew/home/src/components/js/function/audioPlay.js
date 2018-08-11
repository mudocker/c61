export function audio(v) {
  var id='player'
  var audio = document.getElementById(id);
  if (!audio) {
    audio = document.createElement('audio')
    audio.id = id
    document.body.appendChild(audio);
    var mp3 = document.createElement('source')
    mp3.src = '/static/voice.mp3'
    mp3.type = 'audio/mp3';
    audio.appendChild(mp3)
  }
  audio.volume = v
  audio.currentTime = 0
  audio.play()
}
