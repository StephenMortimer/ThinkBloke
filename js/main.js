//If user clicks 'like', then do this
    $(".likeForm").submit(function(e)
    {
        var postData = $(this).serialize();
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData        
        });
        e.preventDefault(); 
        $(function() {        
            $('#likenotif').hide().fadeIn('slow');
            $('#likenotif').delay(1250).fadeOut('slow');
        });
    });

//If user clicks 'dislike', then do this
    $(".dislikeForm").submit(function(e)
    {
        var postData = $(this).serialize();
        var formURL = $(this).attr("action");
        $.ajax(
        {
            url : formURL,
            type: "POST",
            data : postData     
        });
        e.preventDefault(); 
        $(function() {        
            $('#dislikenotif').hide().fadeIn('slow');
            $('#dislikenotif').delay(1250).fadeOut('slow');
        });
    });
    
    
