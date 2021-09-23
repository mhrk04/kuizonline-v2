<style>
  * {
    box-sizing: border-box;
    margin: 0;
    padding: 0;
  }


  .wrapper {
    /* position: absolute; */
    top: 0;
    left: 0;
    width: 100%;
    /* height: 100vh; */
    display: flex;
    align-items: center;
    justify-content: center;
    perspective: 1000px;
    margin-top: 50px;
    margin-bottom: -37px;
  }

  /******** Laptop ********/

  .laptop {
    position: relative;
    animation: laptop 1s 1s ease-out forwards;
    transform-style: preserve-3d;
    transform: scale(0.5);
  }

  .laptop::before {
    position: absolute;
    content: "";
    top: 60%;
    width: 100%;
    height: 5rem;
    left: 50%;
    background: radial-gradient(#0003,
        #0000 70%);
    transform: translate(-50%) scaleY(0.6);
    opacity: 0;
    animation:
      shadow 0.2s 1s ease-out forwards;
  }

  /******** Screen ********/

  .laptop .screen {
    position: relative;
    width: 15rem;
    height: 10rem;
    background-color: #1c1c1c;
    border: 0.5rem solid #222;
    border-radius: 4px;
    transform-origin: 50% 100%;
    transform: rotate3d(1, 0, 0, -90deg);
    animation:
      screen 1s 1s ease-out forwards;
  }

  /******** Wallpaper ********/

  .laptop .screen .wallpaper {
    position: relative;
    width: 100%;
    height: 100%;
    background: linear-gradient(135deg,
        hsl(220, 80%, 60%),
        hsl(220, 80%, 30%));
    opacity: 0;
    border-radius: 0px;
    animation:
      wallpaper 0.4s 2s ease-out forwards;
  }

  .laptop .screen .wallpaper::before {
    position: absolute;
    content: "";
    left: 50%;
    bottom: 0rem;
    width: 100%;
    height: 0.5rem;
    transform: translate(-50%);
    background-color: #fff5;
  }

  .laptop .screen .wallpaper::after {
    position: absolute;
    content: "";
    right: 0.5rem;
    bottom: 1rem;
    width: 0.5rem;
    height: 0.5rem;
    border-radius: 0.15rem;
    background-color: #fff5;
  }

  /******** Terminal ********/

  .laptop .screen .wallpaper .terminal {
    position: absolute;
    top: 10%;
    left: 5%;
    width: 75%;
    height: 60%;
    background-color: #222;
    border-radius: 4px;
    border-top: 8px solid #555;
    font-size: 0.7rem;
    color: #fff;
    font-family: monospace;
    padding: 0.25rem;
  }

  .laptop .screen .wallpaper .terminal::before {
    color: #fff;
    content: "> ";
    animation:
      typing 4s 2.5s linear alternate infinite;
  }

  /******** Keyboard ********/

  .laptop .keyboard {
    position: relative;
    width: 15rem;
    height: 10rem;
    background-color: #222;
    transform-origin: 50% 0%;
    border-radius: 4px;
    transform: rotate3d(1, 0, 0, 90deg);
    animation:
      keyboard 1s 1s ease-out forwards;
  }

  .laptop .keyboard::before {
    position: absolute;
    content: "";
    top: 0.5rem;
    left: 0.5rem;
    width: calc(100% - 1rem);
    height: calc(70% - 1rem);
    background-color: #333;
    border-radius: 4px;
  }

  .laptop .keyboard::after {
    position: absolute;
    content: "";
    bottom: 0.5rem;
    left: 50%;
    width: 30%;
    height: 25%;
    background-color: #333;
    border-radius: 4px;
    transform: translateX(-50%);
  }

  /* Keyframes for Animations */

  @keyframes shadow {
    100% {
      opacity: 1
    }
  }

  @keyframes screen {
    0% {
      transform: rotate3d(1, 0, 0, -90deg)
    }

    100% {
      transform: rotate3d(1, 0, 0, 0deg)
    }
  }

  @keyframes wallpaper {
    0% {
      opacity: 0
    }

    100% {
      opacity: 1
    }
  }

  @keyframes keyboard {
    0% {
      transform: rotate3d(1, 0, 0, 90deg)
    }

    100% {
      transform: rotate3d(1, 0, 0, 70deg)
    }
  }

  @keyframes laptop {
    0% {
      transform: scale(0.5)
    }

    100% {
      transform: scale(1.0)
    }
  }

  @keyframes typing {
    0% {
      content: "> ";
    }

    5% {
      content: "> _";
    }

    10% {
      content: "> ";
    }

    15% {
      content: "> _";
    }

    20% {
      content: "> S_";
    }

    25% {
      content: "> SE_";
    }

    30% {
      content: "> SEL_";
    }

    35% {
      content: "> SELA_";
    }

    40% {
      content: "> SELAMAT_";
    }

    45% {
      content: "> SELAMAT _";
    }

    50% {
      content: "> SELAMAT D_";
    }

    55% {
      content: "> SELAMAT DA_";
    }

    60% {
      content: "> SELAMAT DATA_";
    }

    65% {
      content: "> SELAMAT DATAN_";
    }

    70% {
      content: "> SELAMAT DATANG_";
    }

    75% {
      content: "> SELAMAT DATANG!_";
    }

    80% {
      content: "> SELAMAT DATANG!";
    }

    85% {
      content: "> SELAMAT DATANG!_";
    }

    90% {
      content: "> SELAMAT DATANG!";
    }

    95% {
      content: "> SELAMAT DATANG!_";
    }

    100% {
      content: "> SELAMAT DATANG!";
    }
  }
</style>