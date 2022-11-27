window.addEventListener('DOMContentLoaded', event => {
 
    // Activate Bootstrap scrollspy on the main nav element
    const sideNav = document.body.querySelector('#sideNav');
    if (sideNav) {
        new bootstrap.ScrollSpy(document.body, {
            target: '#sideNav',
            offset: 74,
        });
    };

    // Collapse responsive navbar when toggler is visible
    const navbarToggler = document.body.querySelector('.navbar-toggler');
    const responsiveNavItems = [].slice.call(
        document.querySelectorAll('#navbarResponsive .nav-link')
    );
    responsiveNavItems.map(function (responsiveNavItem) {
        responsiveNavItem.addEventListener('click', () => {
            if (window.getComputedStyle(navbarToggler).display !== 'none') {
                navbarToggler.click();
            }
        });
    });

});


function onLogin() {
    document.getElementById("overlayLogin").style.display = "block";
    document.getElementById("overlayRegistrati").style.display = "none";
	document.getElementById("overlayPrenota").style.display = "none";
    document.getElementById("overlayCarrello").style.display = "none";
}
  
function onRegistrati(){
    document.getElementById("overlayLogin").style.display = "none";
    document.getElementById("overlayRegistrati").style.display = "block";
	document.getElementById("overlayPrenota").style.display = "none";
    document.getElementById("overlayCarrello").style.display = "none";
}

function onPrenota(){
	document.getElementById("overlayLogin").style.display = "none";
    document.getElementById("overlayRegistrati").style.display = "none";
	document.getElementById("overlayPrenota").style.display = "block";
    document.getElementById("overlayCarrello").style.display = "none";
}

function onCarrello(){
    document.getElementById("overlayLogin").style.display = "none";
    document.getElementById("overlayRegistrati").style.display = "none";
	document.getElementById("overlayPrenota").style.display = "none";
    document.getElementById("overlayCarrello").style.display = "block";
}

function off() {
    document.getElementById("overlayLogin").style.display = "none";
    document.getElementById("overlayRegistrati").style.display = "none";
	document.getElementById("overlayPrenota").style.display = "none";
    document.getElementById("overlayCarrello").style.display = "none";
}


(function ($) {
    "use strict";

    
    /*==================================================================
    [ Validate ]*/
    var input = $('.validate-input .input100');

    $('.validate-form').on('submit',function(){
        var check = true;

        for(var i=0; i<input.length; i++) {
            if(validate(input[i]) == false){
                showValidate(input[i]);
                check=false;
            }
        }

        return check;
    });


    $('.validate-form .input100').each(function(){
        $(this).focus(function(){
           hideValidate(this);
        });
    });

    function validate (input) {
        if($(input).attr('type') == 'email' || $(input).attr('name') == 'email') {
            if($(input).val().trim().match(/^([a-zA-Z0-9_\-\.]+)@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.)|(([a-zA-Z0-9\-]+\.)+))([a-zA-Z]{1,5}|[0-9]{1,3})(\]?)$/) == null) {
                return false;
            }
        }
        else {
            if($(input).val().trim() == ''){
                return false;
            }
        }
    }

    function showValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).addClass('alert-validate');
    }

    function hideValidate(input) {
        var thisAlert = $(input).parent();

        $(thisAlert).removeClass('alert-validate');
    }
    
    

})(jQuery);