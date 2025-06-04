<?php
session_start();
 include("db/config.php");
 if (isset($_GET['courseid'])) {
  $courseid = intval($_GET['courseid']);
 }
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Reservation Success</title>
  <style>
    * {
      box-sizing: border-box;
    }

    body {
      margin: 0;
      background: linear-gradient(to right, #f0f4f8, #e0f7ff);
      font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
      height: 100vh;
      display: flex;
      align-items: center;
      justify-content: center;
      overflow: hidden;
      position: relative;
    }

    .success-wrapper {
      text-align: center;
      animation: fadeIn 1s ease;
      z-index: 2;
    }

    .tick-circle {
      background-color: purple;
      width: 110px;
      height: 110px;
      border-radius: 50%;
      display: flex;
      justify-content: center;
      align-items: center;
      margin: 0 auto 20px;
      box-shadow: 0 0 30px rgba(104, 3, 236, 0.8);
      animation: popIn 0.5s ease-out;
      position: relative;
    }

    .tick-circle svg {
      width: 55px;
      height: 55px;
      stroke: white;
      stroke-width: 4;
      fill: none;
      stroke-dasharray: 48;
      stroke-dashoffset: 48;
      animation: drawTick 0.6s forwards 0.3s ease-out;
    }

    .success-text {
      font-size: 26px;
      font-weight: 600;
      color: #1e3a3a;
    }

    .sub-text {
      font-size: 16px;
      color: #475569;
      margin-top: 8px;
      margin-bottom: 30px;
    }

    .btn-course {
      background: linear-gradient(to right,rgb(128,0,128),rgb(172, 37, 172));
      color: white;
      border: none;
      padding: 12px 30px;
      font-size: 16px;
      border-radius: 30px;
      cursor: pointer;
      font-weight: 500;
      transition: background 0.3s ease;
      box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15);
    }

    .btn-course:hover {
      background: linear-gradient(to right,rgb(171, 0, 171), rgb(218, 112, 218));
    }

    @keyframes drawTick {
      to {
        stroke-dashoffset: 0;
      }
    }

    @keyframes popIn {
      0% {
        transform: scale(0.6);
        opacity: 0;
      }
      100% {
        transform: scale(1);
        opacity: 1;
      }
    }

    @keyframes fadeIn {
      from {
        opacity: 0;
        transform: translateY(20px);
      }
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    
    .confetti {
      position: absolute;
      width: 10px;
      height: 10px;
      background-color: #ff00c8; 
      animation: fall linear infinite;
      opacity: 0.9;
      z-index: 1;
    }

    @keyframes fall {
      0% {
        transform: translateY(-100px) rotate(0deg);
        opacity: 1;
      }
      100% {
        transform: translateY(110vh) rotate(720deg);
        opacity: 0;
      }
    }
  </style>
</head>
<body>

  <div class="success-wrapper">
    <div class="tick-circle">
      <svg viewBox="0 0 24 24">
        <polyline points="20 6 9 17 4 12" />
      </svg>
    </div>
    <div class="success-text">Payment Successful!</div>
    <div class="sub-text">You’re enrolled. Let the learning begin!</div>
    <audio id="successSound" src="/pkkpro/sounds/success1" preload="auto"></audio>

    <button class="btn-course">Start Learning</button>
  </div>
  
  
  <script>
    const colors = [
      "#ff007f", 
      "#00f0ff",
      "#fcd34d",
      "#7c3aed", 
      "#f43f5e",
      "#10b981", 
      "#f97316", 
      "#22d3ee", 
      "#e11d48", 
      "#38bdf8"  
    ];

    for (let i = 0; i < 80; i++) {
      const confetti = document.createElement('div');
      confetti.classList.add('confetti');
      confetti.style.left = Math.random() * 100 + 'vw';
      confetti.style.backgroundColor = colors[Math.floor(Math.random() * colors.length)];
      confetti.style.animationDuration = (Math.random() * 2 + 3) + 's';
      confetti.style.opacity = Math.random() * 0.9 + 0.5;
      confetti.style.borderRadius = Math.random() < 0.5 ? '50%' : '0%';
      document.body.appendChild(confetti);
    }
    document.querySelector('.btn-course').addEventListener('click', function(event) {
    event.preventDefault();
    const sound = document.getElementById('successSound');
    sound.play();
    
    setTimeout(function() {
      window.location.href = "/pkkpro/dummy.php?courseid=<?php echo $courseid ?>";
    }, 1000); 
  });
    
  </script>
  




</body>
</html>
