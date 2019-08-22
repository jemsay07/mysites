(function($){

  var baseURL = window.location.origin; /**base url*/

  /**for-sidebar-collapse*/
  $('#sidebarCollapse').on('click', function(e){
    e.preventDefault();
    // $('#jWrapAdminMenu').toggleClass('active');
    $('#jAdminNavBG, #jAdminNavWrap, #jWrapContent').toggleClass('active');
    var icon = $(this).find('i');
    icon.toggleClass( 'fa-chevron-right fa-chevron-left' );
  });

})(jQuery);