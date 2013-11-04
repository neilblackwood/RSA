$(document).ready(function()
{   
    
    jQuery('#cropbox').Jcrop({
            onChange: showCoords,
            onSelect: showCoords
    });

    // Simple event handler, called from onChange and onSelect
    // event handlers, as per the Jcrop invocation above
    function showCoords(c)
    {
            jQuery('#x1').val(c.x);
            jQuery('#y1').val(c.y);
            jQuery('#x2').val(c.x2);
            jQuery('#y2').val(c.y2);
            jQuery('#w').val(c.w);
            jQuery('#h').val(c.h);
    };
    
    function upload_file()
    {
        var input = document.getElementById("file_upload");
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData();
        }

        var i = 0, len = input.files.length, img, reader, file;

        for ( ; i < len; i++ ) {
            file = input.files[i];

            if (!!file.type.match(/image.*/)) {
                if ( window.FileReader ) {
                    reader = new FileReader();
                    reader.onloadend = function (e) {
                        //showUploadedItem(e.target.result, file.fileName);
                    };
                    reader.readAsDataURL(file);
                }

                if (formdata) {
                    formdata.append("image", file);
                    formdata.append("noreturn",1);
                    formdata.append("token", $.cookie("RSAemail").trim());
                }

                if (formdata) {
                    jQuery("#upload_notice").show();

                    jQuery.ajax({
                        url: "/upload_picture",
                        type: "POST",
                        data: formdata,
                        processData: false,
                        contentType: false,
                        success: function (res) {
                         jQuery("#upload_notice").hide();

                         d = new Date();
                         $("#preview").show();
                         $("#preview_pic").attr("src", "/"+res+"?"+d.getTime());
                         $("#preview_pic").Jcrop({
                             onSelect:    showCoords,
                             bgColor:     'black',
                             bgOpacity:   .4,
                             setSelect:   [ 0, 350, 0, 200 ],
                             minSize:  [350, 200],
                             maxSize:  [350, 200],
                             aspectRatio: 16 / 9
                         });
                         $("#new_picture").val("/"+res);
                        }
                    });
                }
            }
            else
            {
                alert("Not a valid image!");
            }
        }
    }    
    
    function isEmailAddress(email)
    {
        email = email.trim();
        
        // check if there's an @ and subsequently a . with at least 2 characters after it
        var emailFormat = email.split('@');
        
        if (typeof emailFormat[1] !== 'undefined' && emailFormat[1].length > 3)
        {
            var tld = emailFormat[1].split('.');
            if (typeof tld[1] !== 'undefined' && tld[1].length > 1) return true;
            else return false;
        }
        else return false;
    }
	
    function validEmail(email)
    {
        email = email.trim();
        var is_rsa_domain = false;

        var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
        var valid_format = (email.length > 4 && regex.test(email)); 

        if (valid_format)
        {
            var domains = 'givenlondon.com,123.ie,ae.rsagroup.com,aktsam.se,alahliaoman.com,ame.rsagroup.com,an.rsagroup.com,ar.rsagroup.com,balta.lv,bh.rsagroup.com,bmu.ie,br.rsagroup.com,cl.rsagroup.com,cn.rsagroup.com,cns.ca,co.rsagroup.com,codan.dk,codanforsikring.no,codanmarine.com,codanmarineservices.com,direct.cz,eu.rsagroup.com,europageneral.com,gcan.ca,gcc.rsagroup.com,glenstonecapital.com,goguenchamplain.com,hk.rsagroup.com,hotmail.co.uk,ie.rsagroup.com,insurancecentre.com,insurancecorporation.com,in-touch.ru,it.rsagroup.com,johnson.ca,laro.rsagroup.com,ld.lt,link4.pl,live.co.uk,morethan.com,morgex.com,mx.rsagroup.com,my.rsagroup.com,om.rsagroup.com,royalsundaram.in,rsaacg.com.ar,rsaelcomercio.com.ar,rsagroup.ca,rsagroup.ee,sa.rsagroup.com,sales.rsagroup.ee,sertus.ie,sg.rsagroup.com,surveyassociation.com,svelandsak.se,tridentpsl.co.uk,trygghansa.no,trygghansa.se,uc.qc.ca,uk.rsagroup.com,unifund.ca,us.rsagroup.com,uy.rsagroup.com,web.cns.ca';

            var domainDetails = email.split('@');

            if ($.inArray(domainDetails[1], domains.split(',')) >= 0) 
            {
                is_rsa_domain = true;
            }
        }

        return is_rsa_domain;
    }

    function existingName(name)
    {
            if (typeof name !== 'undefined') return (name.length > 5);
            else return false;
    }
    
    function login_check()
    {
        if (existingName($('#name').val()) && validEmail($('#email').val()) )
        {
            $('.buttonRow').show();
            
            // reset cookies if different user / name, email and language are initialised from changing controls
            if(typeof $.cookie("RSAemail") !== 'undefined' && $.cookie("RSAemail") !== $('#email').val())
            {
                $.removeCookie('RSApicture');
                $.removeCookie('RSAbody');
                $.removeCookie('RSAlegs');
                $.removeCookie('RSAchoice');
            }
            
            $.cookie("RSAname", $('#name').val());
            $.cookie("RSAemail",  $('#email').val());
        }
        else $('.buttonRow').hide();
    }
	
    $('#email').keyup(function(event)
    {
        if (isEmailAddress($(this).val()) && validEmail($(this).val())) 
        {
            $('.emailError').hide();
            $('.emailfield.success').show();    
        }
        else if( isEmailAddress($(this).val()) ) 
        {
            $('.emailError').show();
            $('.emailfield.success').hide();
        }
        else
        {
            $('.emailError').hide();
            $('.emailfield.success').hide();
        }

        login_check(); 
        
    });
	
    $('#name').keyup(function(event)
    {
        if (existingName( $('#name').val() )) 
        {
            $('.namefield.success').show();
        }
        else 
        {
            $('.namefield.success').hide();
        }

        login_check(); 
    });	
	
        
    $('.item-container').click(function(event)
    {
            var backColor = $(this).css('background-color');

            $('.item-container').each(function(i)
            {
               this.style.backgroundColor = 'white';
               this.style.color = $(this).parent().css('color');
            });

            $(this).attr('rel','selected');
            $(this).css('background-color', backColor);
            $(this).css('color', 'white');

            $.cookie("RSAchoice", $(this).attr('id'));

            $('.buttonRow').show();

    });

    $('#test').click(function()
    {
        $('#source').quicksand( $('#destination li') );
    });
    
    $('#avatars div img').click(function()
    {
       $.cookie("RSApicture", $(this).attr('src'));
       $('#upload_notice').hide();
       $.fancybox.close();
       $('#selected-picture').html('<img src="' + $(this).attr('src') + '">');
       $('.buttonRow').show();
    });
    
    $("#file_upload").on("change", function()
    {
        upload_file();
    });
    
    $("input.use-picture").click(function()
    {
        coords = {
                    "x1": parseInt($('#x1').val()),
                    "y1": parseInt($('#y1').val()),
                    "x2": parseInt($('#x2').val()),
                    "y2": parseInt($('#y2').val()),
                    "w": parseInt($('#w').val()),
                    "h": parseInt($('#h').val()),
                    "pic": $("#preview_pic").attr('src')
                };
        
         $.ajax({
            url: "/save/crop",
            type: "POST",
            data: coords,
            success: function (response) {
               $.cookie("RSApicture", response);
               $('#selected-picture').html('<img src="' + response + '">');
               $('.buttonRow').show();
               $.fancybox.close();
            },
            dataType:'json'
        });
    });
    
    $("#final-picture").click(function()
    {
        $.fancybox.close();
    });
    
    $("#language-select").change(function()
    {
        $.cookie("RSAlanguage", $(this).val());
        location.reload(); 
    });
    
    if (existingName($('#name').val()) && validEmail($('#email').val())) $('.buttonRow').show();

    $(".fancybox").fancybox();    

    $("a#preview-pic").click(function()
    {
        $.cookie("RSAbody", $('.body.active img').attr('src'));
        $.cookie("RSAlegs", $('.legs.active img').attr('src'));

        $.ajax({
            url: "/save",
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
             $('#preview-container img').attr('src', '');
             $('#preview-container img').attr('src', response);
             $('#preview-container').show();
            },
            error: function (error) {
             alert('An unknown error occured. Please contact the system administrator at corporate.responsibility@gcc.rsagroup.com to have this resolved');
            },
        });
    });
    
    $("input#final-picture").click(function()
    {
        $.cookie("RSAbody", $('.body.active img').attr('src'));
        $.cookie("RSAlegs", $('.legs.active img').attr('src'));

        $.ajax({
            url: "/save/email",
            type: "POST",
            processData: false,
            contentType: false,
            success: function (response) {
            },
            error: function (error) {
             alert('An unknown error occured. Please contact the system administrator at corporate.responsibility@gcc.rsagroup.com to have this resolved');
            },
        });
    });    
    
    $('.gallery_item').hover(function()
    {
       $('.gallery_item').removeClass('active');
       $(this).addClass('active');
       
       $('#gallery_large_view').attr('src', $(this).find('img').attr('src') );
       $('#gallery_large_text').html($(this).find('div.gallery_item_text').html() );
       
    });
    
    $('#selected-picture img').on('load', function () {
        
        // webcam
        if($(this).attr('src').substring(0,5) === 'data:')
        {
            $.ajax({
                url: "/save/webcam",
                type: "POST",
                data: {dataURL:$(this).attr('src'), email: $.cookie("RSAemail").trim()},
                success: function (response) {
                   $(this).attr('src','');
                   $(this).attr('src', response);
                   $.cookie("RSApicture", "/" + response);
                },
                error: function (error) {
                    alert('There was a problem with your web camera and file could not be saved');
                },
                dataType:'json'
            });
        }
        
    });

    $('input, textarea').placeholder();
    
    $("select#gallery_countries").change(function() 
    {
        $(this).closest("form").submit();
    });
    
/*
    $("#camera").webcam({
	width: 400,
	height: 200,
	mode: "save",
	swffile: "/assets/js/vendor/webcam/jscam_canvas_only.swf",
	onTick: function() {},
	onSave: function() {},
	onCapture: function() {console.log(webcam.save('/save'));},
	debug: function() {},
	onLoad: function() {}
    });
    */
    
});



