
(function($) {
    $(function() {
        sponsor.init();


    });
    var sponsor = {
       
        init: function() {
            sponsor.setNull();
            /* The following code is executed once the DOM is loaded */
            $(".sponsorFlip").click( function(){

                var element = $(this),
                    all_element = $(".sponsorFlip"),
                    first = $("#first"),
                    id_first = $("#idfirst"),
                    second = $("#second"),
                    id_second = $("#idsecond");

               
                if (element.hasClass("inactive")) { }
                else if (!element.hasClass("wait")) {
                    sponsor.clickturn(element);
                    element.addClass("wait");

                    img_val = element.children("img").attr("alt");
                    id_element = element.attr("id");

                    if (first.val() == "") {
                        first.val(img_val);
                        id_first.val(id_element);
                    }
                    else if (second.val() == "") {
                        second.val(img_val);
                        id_second.val(id_element);
                        all_element.addClass("wait");

                        if (second.val() == first.val()) {
                            //alert("==");
                            element.addClass("inactive");
                            $("#"+id_first.val()).addClass("inactive");
                            all_element.removeClass("wait");
                            sponsor.setNull();
                        } else {
                            //alert("!=");
                            setTimeout(function () {
                                element.revertFlip();
                                close = "#"+id_first.val();
                                $(close).revertFlip();
                                all_element.removeClass("wait");
                                sponsor.setNull();
                            },1000);
                        }
                    }
                    all_element.unbind('mouseenter mouseleave');
                }
            });
        },
        clickturn: function(elem) {
            // $(this) point to the clicked .sponsorFlip element (caching it in elem for speed):
            // data('flipped') is a flag we set when we flip the element:
            if(elem.data('flipped')) {
                // If the element has already been flipped, use the revertFlip method
                // defined by the plug-in to revert to the default state automatically:
                elem.revertFlip();
                // Unsetting the flag:
                elem.data('flipped',false)
            } else {
                // Using the flip method defined by the plugin:
                elem.flip({
                    direction:'lr',
                    speed: 350,
                    onBefore: function(){
                        // Insert the contents of the .sponsorData div (hidden from view with display:none)
                        // into the clicked .sponsorFlip div before the flipping animation starts:
                        elem.html(elem.siblings('.sponsorData').html());
                    }
                });
                // Setting the flag:
                elem.data('flipped',true);
            }
        },
        setNull: function() {
            $("#first,#idfirst,#idsecond,#second,").val("");
        },
        turn: function(elem) {
            // Using the flip method defined by the plugin:
            elem.flip({
                direction:'lr',
                speed: 350,
                onBefore: function(){
                    // Insert the contents of the .sponsorData div (hidden from view with display:none)
                    // into the clicked .sponsorFlip div before the flipping animation starts:
                    elem.html(elem.siblings('.sponsorData').html());
                }
            });
            // Setting the flag:
            elem.data('flipped',true);
        }
    };
})(jQuery);