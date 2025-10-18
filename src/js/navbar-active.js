$(document).ready(function () {
  // Get current page filename (e.g., 'home.php')
  var path = window.location.pathname;
  var page = path.substring(path.lastIndexOf('/') + 1);

  // Normalize for index.php or empty (home)
  if (page === '' || page === 'index.php') page = 'home.php';

  // Define the active class (match PHP version)
  var activeClass = 'text-pink-500 border-b-2 border-pink-500 pb-1 transition-all duration-300 ease-in-out';
  var activeClasses = activeClass.split(' ');

  // Find all navbar links
  $('#nav-menu a').each(function () {
    var $link = $(this);
    var href = $link.attr('href');
    if (!href) return;
    var hrefPage = href.substring(href.lastIndexOf('/') + 1);

    // Remove any previous active class
    $link.removeClass(activeClasses.join(' '));

    // If matches current page, add active class
    if (hrefPage === page) {
      $link.addClass(activeClasses.join(' '));
    }
  });
});