import Isotope from 'isotope-layout';

document.addEventListener('DOMContentLoaded', function () {
  const elem = document.querySelector('.list-facilities');
  if (elem) {
    const iso = new Isotope(elem, {
      itemSelector: '.item',
      layoutMode: 'fitRows',
    });

    document.querySelectorAll('.filter-button').forEach(button => {
      button.addEventListener('click', () => {
        document.querySelectorAll('.filter-button').forEach(itemButton => {
          itemButton.classList.replace('bg-blue', 'bg-white');
          itemButton.classList.replace('text-white', 'text-blue');
        });

        button.classList.replace('bg-white', 'bg-blue');
        button.classList.replace('text-blue', 'text-white');

        iso.arrange({ filter: button.getAttribute('data-filter') });
      });
    });
  }
})