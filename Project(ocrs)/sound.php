<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Button Sound Example</title>
</head>
<body>

  <button id="successButton">Click Me!</button>

  <!-- AUDIO from a public link -->
  <audio id="successSound" src="/pkkpro/sounds/success.wav" preload="auto"></audio>

  <script>
    document.getElementById('successButton').addEventListener('click', function() {
      const sound = document.getElementById('successSound');
      sound.currentTime = 0;
      sound.play().catch(error => {
        console.error('Audio play failed:', error);
      });
    });
  </script>

</body>
</html>
