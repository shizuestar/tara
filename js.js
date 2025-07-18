lottie.loadAnimation({
        container: document.getElementById("animasiLoading"),
        renderer: "svg",
        loop: true,
        autoplay: true,
        path: "", // Golek Icon Loading lek
      });

      let loading = 0;
      let interval = setInterval(() => {
        loading++;
        if (loading >= 100) {
          clearInterval(interval);
          gsap.to("#loadingScreen", {
            duration: 1,
            opacity: 0,
            onComplete: () => {
              document.getElementById("loadingScreen").style.display = "none";
              gsap.to("#mainContent", {
                duration: 1.2,
                opacity: 1,
                ease: "power2.out",
              });
            },
          });
        }
      }, 30);

      particlesJS("particles-js", {
        particles: {
          number: { value: 80 },
          color: { value: "#ffffff" },
          shape: { type: "circle" },
          opacity: { value: 0.2 },
          size: { value: 3 },
          move: { enable: true, speed: 0.6 },
          line_linked: { enable: false },
        },
        interactivity: {
          events: {
            onhover: { enable: true, mode: "repulse" },
            onclick: { enable: true, mode: "push" },
          },
          modes: {
            repulse: { distance: 80 },
            push: { particles_nb: 4 },
          },
        },
        retina_detect: true,
      });