    function toggle_visibility(id) {
       var e = document.getElementById(id);
       if(e.style.display == 'block')
          e.style.display = 'none';
       else
          e.style.display = 'block';
    }
    
    function button1() {
        createPopup.style.display = 'block';
        grey.style.display = 'block';
        loginPopup.style.display = 'none';
        
    }
    
    function button2() {
        createPopup.style.display = 'none';
        grey.style.display = 'block';
        loginPopup.style.display = 'block'; 
    }

