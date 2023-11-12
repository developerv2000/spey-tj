// Register Service worker for PWA
if ('serviceWorker' in navigator) {
  // Register a service worker hosted at the root of the
  // site using the default scope.
  navigator.serviceWorker.register(document.location.origin + '/service-worker.js').then(function (registration) {
    console.log('Service worker registration succeeded:', registration);
  }, /*catch*/ function (error) {
    console.log('Service worker registration failed:', error);
  });
} else {
  console.log('Service workers are not supported.');
}


// initialize components
$(document).ready(function () {
  $('.selectize-singular').selectize({
    // options
  });

  $('.selectize--linked').selectize({
    onChange(value) {
      window.location = value;
    }
  });
});


// Ajax CSRF-Token initialization
$.ajaxSetup({
  headers: {
    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
  }
});


// debounce function
function debounce(callback, timeoutDelay = 500) {
  let timeoutId;

  return (...rest) => {
    clearTimeout(timeoutId);
    timeoutId = setTimeout(() => callback.apply(this, rest), timeoutDelay);
  };
}


// Collapse
let menu = document.querySelector('.menu');
let menuSearch = document.querySelector('.menu__search');

document.querySelector('.header__toggles-menu-button').addEventListener('click', () => {
  document.body.style.overflowY = 'hidden';
  menuSearch.classList.remove('menu__search--visible');
  menu.classList.add('menu--visible');
});

document.querySelector('.menu__close-button').addEventListener('click', () => {
  document.body.style.overflowY = 'auto';
  menu.classList.remove('menu--visible');
});

document.querySelector('.header__toggles-search-button').addEventListener('click', () => {
  document.body.style.overflowY = 'hidden';
  menuSearch.classList.add('menu__search--visible');
  menu.classList.add('menu--visible');
  menu.querySelector('.menu__search-input').focus();
});

document.querySelector('.menu__search-input').addEventListener('focus', () => {
  menuSearch.classList.add('menu__search--visible');
});


// Mobile Menu Toggler
document.querySelectorAll('[data-action="toggle-mobile-menu"]').forEach((item) => {
  item.addEventListener('click', (evt) => {
    document.querySelector('.mobile-menu').classList.toggle('mobile-menu--visible');
  });
});


// Tabs
document.querySelectorAll('.tab-button').forEach((item) => {
  item.addEventListener('click', (evt) => {
    let targetButton = evt.target;
    let buttonsContainer = targetButton.closest('.tab-buttons-container');
    let activeButton = buttonsContainer.querySelector('.tab-button--active');

    let targetContent = document.querySelector(`[data-content-id="${targetButton.dataset.targetId}"]`);
    let contentContainer = targetContent.closest('.tab-content-container');
    let activeContentItem = contentContainer.querySelector('.tab-content-item--active');

    // hide content if clicked already active button
    if (targetButton !== activeButton) {
      if (activeButton) {
        activeButton.classList.remove('tab-button--active');
      }
      targetButton.classList.add('tab-button--active');

      if (activeContentItem) {
        activeContentItem.classList.remove('tab-content-item--active');
      }
      targetContent.classList.add('tab-content-item--active');
    }
  });
});


// Menu Tab links
let menuTab = document.querySelector('.menu__tab');
menuTab.querySelectorAll('.tab-button').forEach((item) => {
  item.addEventListener('dblclick', (evt) => {
    window.location.href = item.dataset.link;
  });
});


// Ajax search
let searchResultsContainer = document.querySelector('.menu__search-results-container');
let spinnerContainer = menuSearch.querySelector('.spinner-container');

document.querySelector('.menu__search-form').addEventListener('submit', (evt) => {
  evt.preventDefault();

  let spinnerContainer = menuSearch.querySelector('.spinner-container');
  spinnerContainer.classList.add('spinner-container--visible');

  $.ajax({
    type: 'POST',
    enctype: 'multipart/form-data',
    url: '/search',
    data: { keyword: document.querySelector('.menu__search-input').value },
    success: function (response) {
      searchResultsContainer.innerHTML = response;
      spinnerContainer.classList.remove('spinner-container--visible');
    },
    error: function () {
      spinnerContainer.classList.remove('spinner-container--visible');
      console.log('Ajax search error!');
    }
  });
});


// products carousels
let productsCarousel = $('.products-carousel');
productsCarousel.owlCarousel({
  loop: true,
  margin: 32,
  nav: true,
  navText: ['<span class="material-icons">west</span>', '<span class="material-icons">east</span>'],
  dots: false,
  responsive: {
    0: {
      items: 1,
    },
    991: {
      items: 4,
    }
  }
});


// Accordion
// resize active items
document.querySelectorAll('.accordion__item--active').forEach((item) => {
  let collapse = item.querySelector('.accordion__collapse');
  collapse.style.height = collapse.scrollHeight + "px";
});

document.querySelectorAll('.accordion__button').forEach((item) => {
  item.addEventListener('click', (evt) => {
    let button = evt.target;
    let accordion = button.closest('.accordion');
    let item = button.closest('.accordion__item');
    let collapse = item.querySelector('.accordion__collapse');

    // close active collapse if it isn`t current target
    let activeItem = accordion.querySelector('.accordion__item--active');
    if (activeItem && activeItem !== item) {
      activeItem.classList.remove('accordion__item--active');
      activeItem.querySelector('.accordion__collapse').style.height = null;
    }

    // close active collapse if it is current target
    if (collapse.clientHeight) {
      collapse.style.height = 0;
      item.classList.remove('accordion__item--active');
      // else show collapse body if its hidden
    } else {
      collapse.style.height = collapse.scrollHeight + "px";
      item.classList.add('accordion__item--active');
    }
  });
});


// Counter
if ($('.counter-box').length) {
  $('.counter-box').appear(function () {
    var $t = $(this),
      n = $t.find('.counter-number').attr('data-stop'),
      r = parseInt($t.find('.counter-number').attr('data-speed'), 10);
    if (!$t.hasClass('counted')) {
      $t.addClass('counted');
      $({
        countNum: $t.find('.counter-number').text()
      }).animate({
        countNum: n
      }, {
        duration: r,
        easing: 'linear',
        step: function () {
          $t.find('.counter-number').text(Math.floor(this.countNum));
        },
        complete: function () {
          $t.find('.counter-number').text(this.countNum);
        }
      });
    }
  }, {
    accY: 0
  });
}


// Font switcher
document.querySelectorAll('.font-controller__radio').forEach((item) => {
  item.addEventListener('change', (evt) => {
    let target = evt.target;
    let postBody = document.querySelector('.post__body');

    if (target.checked == true) {
      let smallClass = 'post__body--small-font';
      let mediumClass = 'post__body--medium-font';
      let largeClass = 'post__body--large-font';
      let giantClass = 'post__body--giant-font';

      switch (target.value) {
        case 'small':
          postBody.classList.remove(largeClass);
          postBody.classList.remove(mediumClass);
          postBody.classList.remove(giantClass);
          postBody.classList.add(smallClass);
          document.cookie = "fontSize=small";
          break;

        case 'medium':
          postBody.classList.remove(smallClass);
          postBody.classList.remove(largeClass);
          postBody.classList.remove(giantClass);
          postBody.classList.add(mediumClass);
          document.cookie = "fontSize=medium";
          break;

        case 'large':
          postBody.classList.remove(smallClass);
          postBody.classList.remove(mediumClass);
          postBody.classList.remove(giantClass);
          postBody.classList.add(largeClass);
          document.cookie = "fontSize=large";
          break;

        case 'giant':
          postBody.classList.remove(smallClass);
          postBody.classList.remove(mediumClass);
          postBody.classList.remove(largeClass);
          postBody.classList.add(giantClass);
          document.cookie = "fontSize=giant";
          break;
      }
    }
  });
});



// Plyr
let videos = document.querySelectorAll('.plyr');

videos.forEach((item) => {
  new Plyr(item, {
    captions: {
      active: true,
      language: 'en'
    },
    controls: ['play-large', 'play', 'progress', 'current-time', 'mute', 'volume', 'captions', 'settings', 'airplay', 'fullscreen']
  });
});

// pause other videos while playing new one
videos.forEach((item) => {
  item.addEventListener('play', (evt) => {
    let targ = evt.target;

    videos.forEach(vid => {
      if (vid !== targ) {
        vid.pause();
      }
    });
  })
});


// Magnify image
let magnifierImage = document.querySelector('#magnifier-image');

if (magnifierImage) {
  if (magnifierImage.complete) {
    runMagnifier();
  } else {
    magnifierImage.addEventListener('load', runMagnifier);
  }
}

function runMagnifier() {
  magnify('magnifier-image', 3);
}

function magnify(imgID, zoom) {
  var img, glass, w, h, bw;
  img = document.getElementById(imgID);

  /* Create magnifier glass: */
  glass = document.createElement("DIV");
  glass.setAttribute("class", "img-magnifier-glass");

  /* Insert magnifier glass: */
  img.parentElement.insertBefore(glass, img);

  /* Set background properties for the magnifier glass: */
  glass.style.backgroundImage = "url('" + img.src + "')";
  glass.style.backgroundRepeat = "no-repeat";
  glass.style.backgroundSize = (img.width * zoom) + "px " + (img.height * zoom) + "px";
  bw = 3;
  w = glass.offsetWidth / 2;
  h = glass.offsetHeight / 2;

  /* Execute a function when someone moves the magnifier glass over the image: */
  glass.addEventListener("mousemove", moveMagnifier);
  img.addEventListener("mousemove", moveMagnifier);

  /*and also for touch screens:*/
  glass.addEventListener("touchmove", moveMagnifier);
  img.addEventListener("touchmove", moveMagnifier);
  function moveMagnifier(e) {
    var pos, x, y;
    /* Prevent any other actions that may occur when moving over the image */
    e.preventDefault();
    /* Get the cursor's x and y positions: */
    pos = getCursorPos(e);
    x = pos.x;
    y = pos.y;
    /* Prevent the magnifier glass from being positioned outside the image: */
    if (x > img.width - (w / zoom)) { x = img.width - (w / zoom); }
    if (x < w / zoom) { x = w / zoom; }
    if (y > img.height - (h / zoom)) { y = img.height - (h / zoom); }
    if (y < h / zoom) { y = h / zoom; }
    /* Set the position of the magnifier glass: */
    glass.style.left = (x - w) + "px";
    glass.style.top = (y - h) + "px";
    /* Display what the magnifier glass "sees": */
    glass.style.backgroundPosition = "-" + ((x * zoom) - w + bw) + "px -" + ((y * zoom) - h + bw) + "px";
  }

  function getCursorPos(e) {
    var a, x = 0, y = 0;
    e = e || window.event;
    /* Get the x and y positions of the image: */
    a = img.getBoundingClientRect();
    /* Calculate the cursor's x and y coordinates, relative to the image: */
    x = e.pageX - a.left;
    y = e.pageY - a.top;
    /* Consider any page scrolling: */
    x = x - window.pageXOffset;
    y = y - window.pageYOffset;
    return { x: x, y: y };
  }
}
