$(document).ready(function() {
    $('.toggler').on('click', function() {
      $('.menu-container').toggleClass('active');
    });
  
    $('.nav-toggler').on('click', function() {
      $('.navbar-toggler').toggleClass('is-active');
      $('.navbar-menu').toggleClass('is-active');
    });
  
    
  });