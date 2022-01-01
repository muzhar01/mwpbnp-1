$(document).ready(function() {
    $( ".team-title" ).click(function() {
        $(".team-title").removeClass("active-team-title");
        $(this).addClass("active-team-title");
        var memberGroup = $(this).attr("memberGroup");
        if(memberGroup == "all"){
             $(".team-member").show();
        }
        else{
            $( ".team-member" ).each(function( index ) {
                 if($(this).attr("belongTo") == memberGroup)
                     $(this).show();
                 else
                     $(this).hide();
            });
        }
    });
});
