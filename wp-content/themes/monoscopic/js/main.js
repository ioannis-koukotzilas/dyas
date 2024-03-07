document.addEventListener('DOMContentLoaded', function () {
  initMobileNav();
  initHighlightsSwiper();
  initElidekModal();
  initCookiesModal();
  initGalleryModal();
});

/*
Mobile Nav
*/

function initMobileNav() {
  const btnMobileNav = document.querySelector('#btn-mobile-nav');
  const mobileNav = document.querySelector('#mobile-nav');

  btnMobileNav.addEventListener('click', () => {
    btnMobileNav.classList.toggle('active');
    mobileNav.classList.toggle('active');
  });

  document.addEventListener('click', (event) => {
    const target = event.target;

    if (!target.closest('#btn-mobile-nav') && !target.closest('#mobile-nav')) {
      btnMobileNav.classList.remove('active');
      mobileNav.classList.remove('active');
    }
  });
}

/*
Highlights Swiper
*/

function initHighlightsSwiper() {
  const swiper = document.querySelector('.highlights-swiper');

  if (!swiper) return;

  return new Swiper(swiper, {
    loop: true,
    autoHeight: true,
    // autoplay: { delay: 8000 },
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },
    spaceBetween: 20,
    keyboard: {
      enabled: true,
      onlyInViewport: true,
    },
  });
}

/*
Elidek Modal
*/

function initElidekModal() {
  const elidekModal = document.querySelector('.elidek-modal');
  const elidekModalToggle = document.querySelector('.elidek-modal-toggle');

  elidekModalToggle.addEventListener('click', function (e) {
    e.preventDefault();
    elidekModal.classList.add('active');
  });

  const elidekModalClose = document.querySelector('.elidek-modal-close');

  elidekModalClose.addEventListener('click', function (e) {
    e.preventDefault();
    elidekModal.classList.remove('active');
  });

  document.addEventListener('keydown', function (e) {
    if (e.key === 'Escape' && elidekModal.classList.contains('active')) {
      e.preventDefault();
      elidekModal.classList.remove('active');
    }
  });
}

/*
Cookies Modal
*/

function initCookiesModal() {
  const cookiesModal = document.querySelector('.cookies-modal');
  const cookiesModalToggle = document.querySelector('.cookies-modal-toggle');

  if (localStorage.getItem('cookiesModal')) {
    cookiesModal.classList.remove('active');
  } else {
    cookiesModal.classList.add('active');
  }

  cookiesModalToggle.addEventListener('click', function (e) {
    e.preventDefault();
    cookiesModal.classList.add('active');
  });

  const cookiesModalClose = document.querySelector('.cookies-modal-close');

  cookiesModalClose.addEventListener('click', function (e) {
    e.preventDefault();
    localStorage.setItem('cookiesModal', true);
    cookiesModal.classList.remove('active');
  });
}

/*
Gallery
*/

function initGalleryModal() {
  var swiper;
  var modal = document.getElementById('gallery-modal');
  var galleryItems = document.querySelectorAll('.gallery-item');
  var closeModalButton = document.querySelector('.close-modal');
  var body = document.body;

  function initSwiper() {
    return new Swiper('.gallery-swiper', {
      loop: true,
      pagination: {
        el: '.swiper-pagination',
        type: 'custom',
        renderCustom: function (swiper, current, total) {
          return current + '/' + total;
        },
      },
      navigation: {
        nextEl: '.swiper-button-next',
        prevEl: '.swiper-button-prev',
      },
      spaceBetween: 20,
      keyboard: {
        enabled: true,
        onlyInViewport: true,
      },
    });
  }

  function openModal(index) {
    swiper = initSwiper();
    modal.classList.add('active');
    body.classList.add('gallery-modal-active');
    swiper.slideToLoop(index, 0, false);
  }

  function closeModal() {
    modal.classList.remove('active');
    body.classList.remove('gallery-modal-active');
    if (swiper !== undefined) {
      swiper.destroy(true, true);
    }
  }

  if (galleryItems && galleryItems.length) {
    galleryItems.forEach(function (item, index) {
      item.addEventListener('click', function (event) {
        event.preventDefault();
        openModal(index);
      });
    });
  }

  if (closeModalButton) {
    closeModalButton.addEventListener('click', closeModal);
  }

  document.addEventListener('keydown', function (event) {
    if (event.key === 'Escape' && modal.classList.contains('active')) {
      closeModal();
    }
  });
}
