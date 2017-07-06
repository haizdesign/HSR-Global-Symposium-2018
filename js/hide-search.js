/* 
 * Toggles search on and off
 */
jQuery(document).ready(function($){
    $(".search-toggle").click(function(){
        $(".search-box-wrapper").slideToggle('fast', function(){
            $('.search-toggle').toggleClass('active');
        });
        return false;
    });
});