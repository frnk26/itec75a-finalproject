(function () {
  const i = document.createElement('link').relList;
  if (i && i.supports && i.supports('modulepreload')) return;
  for (const e of document.querySelectorAll('link[rel="modulepreload"]')) l(e);
  new MutationObserver((e) => {
    for (const t of e)
      if (t.type === 'childList')
        for (const s of t.addedNodes)
          s.tagName === 'LINK' && s.rel === 'modulepreload' && l(s);
  }).observe(document, { childList: !0, subtree: !0 });
  function c(e) {
    const t = {};
    return (
      e.integrity && (t.integrity = e.integrity),
      e.referrerpolicy && (t.referrerPolicy = e.referrerpolicy),
      e.crossorigin === 'use-credentials'
        ? (t.credentials = 'include')
        : e.crossorigin === 'anonymous'
        ? (t.credentials = 'omit')
        : (t.credentials = 'same-origin'),
      t
    );
  }
  function l(e) {
    if (e.ep) return;
    e.ep = !0;
    const t = c(e);
    fetch(e.href, t);
  }
})();
// ito lang ginawa ko hahaha ung mga nasa taas wala lang yan wag mo nalang galawin pri thank you
const o = document.querySelector('#menu-btn'),
  a = document.querySelector('[role="menubar"]'),
  u = document.querySelector('#cart-btn'),
  d = document.querySelector('#xbtn'),
  n = document.querySelector('[role="cartdrawer"]');
o.addEventListener('click', () => {
  const r = JSON.parse(o.getAttribute('aria-expanded'));
  o.setAttribute('aria-expanded', !r),
    a.classList.toggle('hidden'),
    a.classList.toggle('flex');
});
u.addEventListener('click', () => {
  const r = JSON.parse(o.getAttribute('aria-expanded'));
  d.setAttribute('aria-expanded', !r),
    n.classList.toggle('hidden'),
    n.classList.toggle('flex');
});
d.addEventListener('click', () => {
  const r = JSON.parse(o.getAttribute('aria-expanded'));
  d.setAttribute('aria-expanded', !r),
    n.classList.toggle('hidden'),
    n.classList.toggle('flex');
});
// ito ung sa slider for shop pri
new Glider(document.querySelector('.glider'), {
  slidesToShow: 1,
  draggable: !0,
  arrows: { prev: '.glider-prev', next: '.glider-next' },
  responsive: [
    {
      breakpoint: 775,
      settings: {
        slidesToShow: 'auto',
        slidesToScroll: 'auto',
        itemWidth: 150,
        duration: 0.25,
      },
    },
    {
      breakpoint: 1024,
      settings: {
        slidesToShow: 2,
        slidesToScroll: 1,
        itemWidth: 150,
        duration: 0.25,
      },
    },
  ],
});
