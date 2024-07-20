document.addEventListener('DOMContentLoaded', function () {
    mobileMenuHandler();
});

window.addEventListener('scroll', function(){ 
    scrollpos = window.scrollY;
 
    scrollpos > 70 ? addMenuClassOnScroll() : removeMenuClassOnScroll();
});

// Get Header element
const headerContent = document.querySelector( '.header' );
const menuContent = document.querySelector( '.menu.main-menu' );
const btnContactHeader = document.querySelector( '.btn.btn-menu-contact' );

// Add class on scroll
function addMenuClassOnScroll() {
    headerContent ? headerContent.classList.add( 'sticky' ) : '';
    menuContent ? menuContent.classList.add( 'menu-sticky' ) : '';
    btnContactHeader ? btnContactHeader.classList.add( 'btn-sticky' ) : '';
}

// Remove class on scroll
function removeMenuClassOnScroll() {
    headerContent ? headerContent.classList.remove( 'sticky' ) : '';
    menuContent ? menuContent.classList.remove( 'menu-sticky' ) : '';
    btnContactHeader ? btnContactHeader.classList.remove( 'btn-sticky' ) : '';
}

// Mobile menu hanler
function mobileMenuHandler() {
    const btnMenu = document.querySelector('.btn-mobile-menu');
    const menuContent = document.querySelector('.main-menu');

    if ( btnMenu ) {
        btnMenu.addEventListener('click', function () {
            this.classList.toggle('close');
            menuContent.classList.toggle('open');
        }, false);
    }   
}