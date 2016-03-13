/*
 * Template Name: Unify - Responsive Bootstrap Template
 * Description: Business, Corporate, Portfolio, E-commerce and Blog Theme.
 * Version: 1.7
 * Author: @htmlstream
 * Website: http://htmlstream.com
*/

var App = function () {
    //Fixed Header
    function handleHeader() {
         jQuery(window).scroll(function() {
            if (jQuery(window).scrollTop()){
                jQuery(".header-fixed .header-sticky").addClass("header-fixed-shrink");
            }
            else {
                jQuery(".header-fixed .header-sticky").removeClass("header-fixed-shrink");
            }
        });
    }

    // TopBar (Header v8)
    function handleTopBar() {
        $(".topbar-toggler").on("click", function() {
          if (jQuery(".topbar-toggler").hasClass("topbar-list-visible")) {
            jQuery(".topbar-menu").slideUp();
            jQuery(this).removeClass("topbar-list-visible");
          } else {
            jQuery(".topbar-menu").slideDown();
            jQuery(this).addClass("topbar-list-visible");
          }
        });
    }

    // TopBar SubMenu (Header v8)
    function handleTopBarSubMenu() {
        $(".topbar-list > li").on("click", function(e) {
          if (jQuery(this).children("ul").hasClass("topbar-dropdown")) {
            if (jQuery(this).children("ul").hasClass("topbar-dropdown-visible")) {
              jQuery(this).children(".topbar-dropdown").slideUp();
              jQuery(this).children(".topbar-dropdown").removeClass("topbar-dropdown-visible");
            } else {
              jQuery(this).children(".topbar-dropdown").slideDown();
              jQuery(this).children(".topbar-dropdown").addClass("topbar-dropdown-visible");
            }
          }
          //e.preventDefault();
        });
    }

    //Sidebar Navigation Toggle
    function handleToggle() {
        jQuery('.list-toggle').on('click', function() {
            jQuery(this).toggleClass('active');
        });

        /*
        jQuery('#serviceList').on('shown.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-up').removeClass('glyphicon-chevron-down');
        }

        jQuery('#serviceList').on('hidden.bs.collapse'), function() {
            jQuery(".servicedrop").addClass('glyphicon-chevron-down').removeClass('glyphicon-chevron-up');
        }
        */
    }

    //Equal Height Columns    
    function handleEqualHeightColumns() {
        var EqualHeightColumns = function () {            
            $(".equal-height-columns").each(function() {
                heights = [];              
                $(".equal-height-column", this).each(function() {
                    $(this).removeAttr("style");
                    heights.push($(this).height()); // write column's heights to the array
                });
                $(".equal-height-column", this).height(Math.max.apply(Math, heights)); //find and set max
            });
        }

        EqualHeightColumns();        
        $(window).resize(function() {            
            EqualHeightColumns();
        });
        $(window).load(function() {
            EqualHeightColumns("img.equal-height-column");
        });
    }    

    //Bootstrap Tooltips and Popovers
    function handleBootstrap() {
    	// REMOVE # FROM URL
    	jQuery( 'a[href="#"]' ).click( function(e) {
    		e.preventDefault();
    	});

        /*Bootstrap Carousel*/
        jQuery('.carousel').carousel({
            interval: 15000,
            pause: 'hover'
        });

        /*Tooltips*/
        jQuery('.tooltips').tooltip();
        jQuery('.tooltips-show').tooltip('show');      
        jQuery('.tooltips-hide').tooltip('hide');       
        jQuery('.tooltips-toggle').tooltip('toggle');       
        jQuery('.tooltips-destroy').tooltip('destroy');       

        /*Popovers*/
        jQuery('.popovers').popover();
        jQuery('.popovers-show').popover('show');
        jQuery('.popovers-hide').popover('hide');
        jQuery('.popovers-toggle').popover('toggle');
        jQuery('.popovers-destroy').popover('destroy');
    }

    return {
        init: function () {
            handleBootstrap();
            handleTopBar();
            handleTopBarSubMenu();         
            handleToggle();
            handleHeader();
            handleHoverSelector();
            handleEqualHeightColumns();
        },

        //Counters 
        initCounter: function () {
            jQuery('.counter').counterUp({
                delay: 10,
                time: 1000
            });
        },

        //Scroll Bar
        initScrollBar: function () {
            jQuery('.mCustomScrollbar').mCustomScrollbar({
                theme:"minimal",
                scrollInertia: 200,
                scrollEasing: "linear"
            });
        },

        //Animate Dropdown
        initAnimateDropdown: function() {
          function MenuMode() {
            jQuery('.dropdown').on('show.bs.dropdown', function() {
              jQuery(this).find('.dropdown-menu').first().stop(true, true).slideDown();
            });
            jQuery('.dropdown').on('hide.bs.dropdown', function() {
              jQuery(this).find('.dropdown-menu').first().stop(true, true).slideUp();
            });
          }

          jQuery(window).resize(function() {
            if (jQuery(window).width() > 768) {
              MenuMode();
            }
          });

          if (jQuery(window).width() > 768) {
            MenuMode();
          }
        },

    };

}();