$(function() {    
    var isXS = false,
        $accordionXSCollapse = $('.accordion-xs-collapse');
    // Window resize event (debounced)
    var timer;
    $(window).resize(function () {
        if (timer) { clearTimeout(timer); }
        timer = setTimeout(function () {
           if(window.innerWidth <= 767) {
			    isXS = true;
		   } else {
		        isXS = false;
		   
		   }
            // Add/remove collapse class as needed
            if (isXS) {
                $accordionXSCollapse.addClass('collapse');               
            } else {
                $accordionXSCollapse.removeClass('collapse');
            }
        }, 100);
    }).trigger('resize'); //trigger window resize on pageload    
    
    // Initialise the Bootstrap Collapse
    $accordionXSCollapse.each(function () {
        $(this).collapse({ toggle: false });
    });      
    
    // Accordion toggle click event (live)
    $(document).on('click', '.accordion-xs-toggle', function (e) {
        e.preventDefault();

        var $thisToggle = $(this),
            $targetRow = $thisToggle.parent('.tr'),
            $targetCollapse = $targetRow.find('.accordion-xs-collapse');            
    	
        if (isXS && $targetCollapse.length) { 
            var $siblingRow = $targetRow.siblings('.tr'),
                $siblingToggle = $siblingRow.find('.accordion-xs-toggle'),
                $siblingCollapse = $siblingRow.find('.accordion-xs-collapse');
            
            $targetCollapse.collapse('toggle'); //toggle this collapse
            $siblingCollapse.collapse('hide'); //close siblings
            
            $thisToggle.toggleClass('collapsed'); //class used for icon marker
            $siblingToggle.removeClass('collapsed'); //remove sibling marker class
        }
    });

});