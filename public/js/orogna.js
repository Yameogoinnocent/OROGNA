document.addEventListener("DOMContentLoaded", () => {
  document.documentElement.classList.add("js-reveal");
  const revealItems = document.querySelectorAll(".reveal");
  if ("IntersectionObserver" in window) {
    const observer = new IntersectionObserver((entries) => {
      entries.forEach((entry) => {
        if (entry.isIntersecting) {
          entry.target.classList.add("is-visible");
          observer.unobserve(entry.target);
        }
      });
    }, { threshold: 0.08 });
    revealItems.forEach((item) => observer.observe(item));
  } else {
    revealItems.forEach((item) => item.classList.add("is-visible"));
  }

  const header = document.querySelector("[data-header]");
  if (header) {
    const updateHeader = () => header.classList.toggle("shadow-lg", window.scrollY > 20);
    updateHeader();
    window.addEventListener("scroll", updateHeader, { passive: true });
  }
});
