$(document).ready(function(){
    $("dl").hide();
    $(".center").removeClass("center");
    $("h2").click(function(){
        $(this).parent().children('dl').toggle();
        $('dl').click(function(){$(this).toggle()});
    });
});