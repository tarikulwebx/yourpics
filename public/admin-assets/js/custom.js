





$(document).ready(function () {
    // Navbar Fixed
    $('body').addClass('layout-navbar-fixed');

    
    // Theme Toggle
    if (localStorage.getItem('theme') === 'dark') {
        $('body').addClass('dark-mode');
    }

    $('#themeToggler').on('click', function(e){
        if (localStorage.getItem('theme') === 'dark') {
            $('body').removeClass('dark-mode');
            localStorage.setItem('theme', 'light');
        } else {
            $('body').addClass('dark-mode');
            localStorage.setItem('theme', 'dark');
            
        }
    });
});