(function($) {
    $(function() {
        jquery_flip.init();
        jquery_flip.hover();
    });
    var jquery_flip = {
       
        ttmnow: 0,
        ths:"0",
        thn: 0,
        tms: "0",
        tmn: 0,
        tss: "0",
        tsn: 0,
        
        init: function() {
            jquery_flip.setNull();
            /* The following code is executed once the DOM is loaded */
            $(".sponsorFlip").click( function(){

                var element = $(this),
                    all_element = $(".sponsorFlip"),
                    first = $("#first"),
                    id_first = $("#idfirst"),
                    second = $("#second"),
                    id_second = $("#idsecond");
                    
                if (!$("#time span").hasClass("init")) {
                    jquery_flip.startChronometer();
                }
                if (element.hasClass("inactive")) { }
                else if (!element.hasClass("wait")) {
                    jquery_flip.clickturn(element);
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
                            hits =  parseInt($("#hits span").html());
                            $("#hits span").html(hits+1);
                            element.addClass("inactive");
                            $("#"+id_first.val()).addClass("inactive");
                            all_element.removeClass("wait");
                            jquery_flip.setNull();
                            jquery_flip.stopChronometer();
                        } else {
                            //alert("!=");
                            errors = parseInt($("#errors span").html());
                            $("#errors span").html(errors+1);
                            setTimeout(function () {
                                element.revertFlip();
                                close = "#"+id_first.val();
                                $(close).revertFlip();
                                all_element.removeClass("wait");
                                jquery_flip.setNull();
                            },1000);
                        }
                    }
                }
            });
        },
        stopChronometer: function() {
            hits = parseInt($("#hits span").html());
            errors = parseInt($("#errors span").html());
            time = $("#time span").html();
            charts = parseInt($("#qtdcharts").val());
            
            href = $('#winner').attr("href");
            
            if ((charts/2) == hits) {
                $("#time").attr("id", "");
                setTimeout(function () {
                    time = time.replace(":", "-");
                    time = time.replace(":", "-");
                    
                    new_href = href + "/" + hits + "/" + errors + "/" + time;
                    
                    $('#winner').attr("href", new_href);
                    
                    $().piroBox_ext({
                        piro_speed : 700,
                        bg_alpha : 0.7
                    });
                    
                    $('#winner').click();
                },1500)
            }
        },
        startChronometer: function() {
            jquery_flip.ths=jquery_flip.thn;
            jquery_flip.tms=jquery_flip.tmn;
            jquery_flip.tss=jquery_flip.tsn;
            if (jquery_flip.thn<10)
                jquery_flip.ths="0" + jquery_flip.ths;
            if (jquery_flip.tmn<10)
                jquery_flip.tms="0"+jquery_flip.tms;
            if (jquery_flip.tsn<10)
                jquery_flip.tss="0"+jquery_flip.tss;
            //document.ttmfm.ttm.value = "" + ths+":"+tms+":"+tss;
            $("#time span").html("" + jquery_flip.ths+":"+jquery_flip.tms+":"+jquery_flip.tss);
            $("#time span").addClass("init");
            if (jquery_flip.ttmnow)
            {
                clearTimeout(jquery_flip.ttmnow);
                jquery_flip.ttmnow=0;
            }
            jquery_flip.tsn+=1;
            if (jquery_flip.tsn>59)
            {
                jquery_flip.tmn+=1;
                jquery_flip.tsn=0;
                if (jquery_flip.tmn>59)
                {
                    jquery_flip.thn+=1;
                    jquery_flip.tmn=0;
                    if (jquery_flip.thn>23)
                        jquery_flip.thn=0;
                }
            }
            jquery_flip.ttmnow=setTimeout(function () {
                jquery_flip.startChronometer();
            },1000);
        },
        hover: function() {
            
            $(".sponsorFlip").hover(function (){
                $(this).addClass("sponsorFlip_hover");
            }, function (){
                $(".sponsorFlip").removeClass("sponsorFlip_hover");
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