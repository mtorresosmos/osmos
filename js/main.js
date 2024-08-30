document.addEventListener('DOMContentLoaded', function () {
    mobileMenuHandler();
    removeProjectSectionsAttributes();
    tabsCategories();
});

window.addEventListener('scroll', function(){ 
    scrollpos = window.scrollY;
 
    scrollpos > 70 ? addMenuClassOnScroll() : removeMenuClassOnScroll();


    handleIntersection();
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
    const videoElement = document.querySelectorAll( '.wp-video' );

    if ( videoElement ) {
        videoElement.forEach(video => video.removeAttribute('style'));   
    }
}

// Tabs Categories
function tabsCategories() {
    const tabButtons = document.querySelectorAll('.tabs-category .tab-btn');
    const tabPanels = document.querySelectorAll('.tabs-category .tab-panel');
    const tabWrapper = document.querySelector('.tab-btn-wrapper');

    
    if ( tabButtons ) {
        tabButtons.forEach(button => {
            button.addEventListener('click', () => {
                const targetId = button.getAttribute('data-target');
                const targetColor = button.getAttribute('data-color');
                const targetPanel = document.getElementById(targetId);
    
                // Deactivate all tabs and hide panels
                tabButtons.forEach(btn => btn.classList.remove('active'));
                tabPanels.forEach(panel => panel.classList.remove('active'));
    
                // Activate tab and display panel
                button.classList.add('active');
                targetPanel.classList.add('active');
                
                switch(targetColor) {
                    case 'orange':
                        tabWrapper.removeAttribute('class');
                        tabWrapper.setAttribute('class', 'tab-btn-wrapper border-orange' );
                        break;
                    case 'green':
                        tabWrapper.removeAttribute('class');
                        tabWrapper.setAttribute('class', 'tab-btn-wrapper border-green' );
                        break;
                    case 'blue':
                        tabWrapper.removeAttribute('class');
                        tabWrapper.setAttribute('class', 'tab-btn-wrapper border-blue' );
                        break;
                    case 'purple':
                        tabWrapper.removeAttribute('class');
                        tabWrapper.setAttribute('class', 'tab-btn-wrapper border-purple' );
                        break;
                    default:
                        tabWrapper.removeAttribute('class');
                        tabWrapper.setAttribute('class', 'tab-btn-wrapper border-black' );
                        break;
                }
            });
        });
    }
}

// Función que se llama cuando un elemento entra o sale del viewport
function handleIntersection(entries, observer) {
    if ( entries ) {
        entries.forEach(entry => {
            if (entry.isIntersecting) {
                entry.target.classList.add('onScreen');
            } else {
                //console.log(`${entry.target.id} ya no es visible en la pantalla`);
            }
        });
    }
}

// Crear un IntersectionObserver y pasarle la función de callback
const observer = new IntersectionObserver(handleIntersection, {
    root: null, // El viewport
    rootMargin: '0px',
    threshold: 0.1 // Porcentaje de visibilidad que debe tener el elemento para que se considere visible
});

// Seleccionar los elementos que quieres observar
const elementsToObserve = document.querySelectorAll('[id]');
elementsToObserve.forEach(element => {
    observer.observe(element);
});


$(document).ready(function() {
    $('.carousel-custom.carousel-home-projects').owlCarousel({
        stagePadding: 160,
        loop:true,
        margin: 20,
        nav:true,
        responsive:{
            0:{
                margin: 20,
                items:1,
                stagePadding: 20,
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    });

    $('.carousel-custom.carousel-blog-related').owlCarousel({
        loop:false,
        margin: 20,
        nav:false,
        responsive:{
            0:{
                items:1,
            },
            600:{
                items:2
            },
            1000:{
                items:3
            }
        }
    })
});