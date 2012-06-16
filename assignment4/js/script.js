$(document).ready(function(){
    function viewport() {
        var e = window
        ,   a = 'inner';
        
        if ( !( 'innerWidth' in window ) ) {
            a = 'client';
            e = document.documentElement || document.body;
        }
        return { width : e[ a+'Width' ] , height : e[ a+'Height' ] };
    }
    
    function isDesktop() {
        var viewportSize = viewport();   
        if (viewportSize.width >= 1080) {return true;}
        else {return false;}
    }
    
    
    if(isDesktop()){
        //Remove progressive enchancement fallback styles
        $("dl").hide();
        $(".center").removeClass("center");
        $("h2").each(function(){$(this).addClass("right-arrow");});
        
        // Set up click handlers
        (function(){
            var toggleArrow = function(toggledObject){
                if (toggledObject.hasClass("right-arrow")){
                  toggledObject.removeClass("right-arrow");
                  toggledObject.addClass("down-arrow");
                } else if (toggledObject.hasClass("down-arrow")) {
                  toggledObject.removeClass("down-arrow");
                  toggledObject.addClass("right-arrow");  
                }
            };
        
            
            $("h2").click(function(){
                $(this).parent().children('dl').toggle();
                toggleArrow($(this));
            });
            $('dl').click(function(){
                $(this).toggle();
                toggleArrow($(this).parent().children("h2"));
            });
        })();
    }
});