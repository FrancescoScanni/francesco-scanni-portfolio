//about me button
function scrollWithOffset(event, id) {
    event.preventDefault();
    const element = document.getElementById(id);
    const yOffset = -170;
    const y = element.getBoundingClientRect().top + window.pageYOffset + yOffset;

    window.scrollTo({ top: y, behavior: 'smooth' });
  }