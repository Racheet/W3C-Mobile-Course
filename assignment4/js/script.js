$(document).ready(function(){
    //Remove progressive enchancement fallback styles
    $("dl").hide();
    $(".center").removeClass("center");
    $("h2").each(function(){$(this).addClass("right-arrow");});
    // Set up click handlers
    (function(){
        var toggleArrow = function(){
            var testedObject = $(this);
            if (testedObject.hasClass("right-arrow")){
              testedObject.removeClass("right-arrow");
              testedObject.addClass("down-arrow");
            } else if (testedObject.hasClass("down-arrow")) {
              testedObject.removeClass("down-arrow");
              testedObject.addClass("right-arrow");  
            }
        };
    
        
        $("h2").click(function(){
            $(this).parent().children('dl').toggle();
            toggleArrow();
        });
        $('dl').click(function(){
            $(this).toggle();
            toggleArrow();
        });
    })();
});