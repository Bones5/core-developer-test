export const eventListScrollEffect = () => {
  const elementsToLoadIn = new Set([
    ...document.querySelectorAll('.list-item'),
  ]);

  function observerCallback(entries) {
    entries.forEach((entry) => {
      if (entry.isIntersecting) {
        entry.target.classList.add('opacity-100', 'translate-y-0');
      } else {
        entry.target.classList.remove('opacity-100', 'translate-y-0');
      }
    });
  }

  const observerOptions = {
    root: null,
    rootMargin: '0px',
    threshold: 0.3,
  };

  const observer = new IntersectionObserver(observerCallback, observerOptions);

  elementsToLoadIn.forEach((el) => observer.observe(el));
};
