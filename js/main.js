document.addEventListener('DOMContentLoaded', function () {
    mobileMenuHandler();
    removeProjectSectionsAttributes();
    tabsCategories();
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

// Remove tag attributes in Projects sections
function removeProjectSectionsAttributes() {
    const videoElement = document.querySelector( '.wp-video' );

    if ( videoElement ) {
        videoElement.removeAttribute('style');
    }
}

// Tabs Categories
function tabsCategories() {
    const tabButtons = document.querySelectorAll('.tabs-category .tab-btn');
    const tabPanels = document.querySelectorAll('.tabs-category .tab-panel');

    
    if ( tabButtons ) {
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const targetPanel = document.getElementById(targetId);
    
                // Deactivate all tabs and hide panels
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanels.forEach(panel => panel.classList.remove('active'));
    
                // Activate tab and display panel
                button.classList.add('active');
                targetPanel.classList.add('active');
            });
        });
    }
}

/*$(document).ready(function() {
    $('.carousel-custom.carousel-home-projects').owlCarousel({
        stagePadding: 50,
        loop:true,
        margin:10,
        nav:true,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:3
            },
            1000:{
                items:4
            }
        }
    })
});*/