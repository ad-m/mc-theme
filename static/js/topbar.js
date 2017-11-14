(function() {
    Array.prototype.slice.call(document.querySelectorAll('.menu-handler')).forEach(function(item) {
        item.addEventListener('click', function(ev) {
            ev.preventDefault();
            var menu = document.querySelector('.navbar__menu-list');
            menu.setAttribute('aria-expanded', menu.getAttribute('aria-expanded') === 'true' ? 'false' : 'true' );
        })
    })
})();