// ===== SLIDER AUTO (UNTUK DASHBOARD) =====
const slides = document.querySelector('.slides');

if (slides) {
  let index = 0;
  const total = slides.children.length;

  function showSlide() {
    index++;
    slides.style.transition = "transform 1s ease-in-out";
    slides.style.transform = `translateX(-${index * 100}%)`;

    // reset loop (biar infinite smooth)
    if (index >= total - 5) {
      setTimeout(() => {
        slides.style.transition = "none";
        index = 0;
        slides.style.transform = `translateX(0)`;
      }, 1000);
    }
  }

  setInterval(showSlide, 4000);
}


// ===== FADE-IN SAAT SCROLL =====
const fadeSections = document.querySelectorAll('.fade-section');

window.addEventListener('scroll', () => {
  fadeSections.forEach(section => {
    const rect = section.getBoundingClientRect();

    if (rect.top < window.innerHeight - 100) {
      section.style.opacity = '1';
      section.style.transform = 'translateY(0)';
    }
  });
});


// ===== SCROLL TO TOP =====
const toTop = document.getElementById('toTop');

if (toTop) {
  window.addEventListener('scroll', () => {
    if (window.scrollY > 300) {
      toTop.style.display = 'block';
    } else {
      toTop.style.display = 'none';
    }
  });

  toTop.onclick = () => {
    window.scrollTo({
      top: 0,
      behavior: 'smooth'
    });
  };
}