$(function () {
   
    if ( var_object.search ) {
        $('html, body').animate({scrollTop: $('#resource_list_container .featured-content').offset().top}, 'slow');
    }
    //$(".resource-landing .row:gt(" + var_object.show_more_limit + ")").hide();
    
    console.log(var_object.newsPressFilter);
    if ( var_object.newsPressFilter ) {
        if ( $('.news-landing .featured-row:last .description').length) {
            $('html, body').animate({scrollTop: $('.news-landing .featured-row:last  .description').offset().top}, 'slow');
        }
    }
    
    $('.resource-show-more-pages').on('click', function (e) {
        $this = $(this);
        $insertbefore = $(this).parent();
        e.preventDefault();
        var offset = $this.next().val();
        
        if ( var_object.search ) {
            var search = var_object.search;
        }
        else {
            var search = '';
        }
        $.ajax({
            url      : var_object.ajax_url,
            dataType : 'json',
            type     : 'post',
            data: {
                action: 'resource_show_more_articles',  
                offset: offset,
                search   : search
            },
            beforeSend: function () {
                $insertbefore.next().find('#loading-image').show();
                $insertbefore.hide();
            },
            success: function (response) {
                $insertbefore.next().find('#loading-image').hide();
                if (response.status == 'error') {
                    $insertbefore.hide();
                } else {
                    $insertbefore.show();
                    $this.next().val(++offset);
                }
                $(response.data).insertBefore($insertbefore);
            }
        });
    });
    
    // Pagination of press releases and news articles
    $('.show-more-press-news').on('click', function (e) {
        $this         = $(this);
        $insertbefore = $(this).parent();
        e.preventDefault();
        var offset = $this.next().val();
      
        if ( var_object.newsPressFilter ) {
            var search = var_object.newsPressFilter;
        }
        else {
            var search = '';
        }
        $.ajax({
            url      : var_object.ajax_url,
            dataType : 'json',
            type     : 'post',
            data: {
                action   : 'news_press_show_more_articles',  
                offset   : offset,
                search   : search
            },
            beforeSend: function () {
                $insertbefore.next().find('#loading-image').show();
                $insertbefore.hide();
            },
            success: function (response) {
                $insertbefore.next().find('#loading-image').hide();
                if (response.status == 'error') {
                    $insertbefore.hide();
                } else {
                    $insertbefore.show();
                    $this.next().val(++offset);
                }
                $(response.data).insertBefore($insertbefore);
            }
        });
    });
    
    
    $('ul.termloan-use-point li:gt(5)').hide();

    $('.show-more-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').show('slow');
        $(".show-more-term-loan").hide();
        $(".show-less-term-loan").show();
        $('html, body').animate({scrollTop: $('#use_termloan_for').offset().top}, slow);
    });

    $('.show-less-term-loan').click(function (e) {
        e.preventDefault();
        $('ul.termloan-use-point li:gt(5)').hide('slow');
        $(".show-more-term-loan").show();
        $(".show-less-term-loan").hide();
        $('html, body').animate({scrollTop: $('#use_termloan_for').offset().top}, slow);
    });

    //show more and show hide for terms and payments section.
    $('ul.details-point').find('li:gt(3)').hide();
    $('.show-more-termDetail-loan').click(function (e) {
        e.preventDefault();
        $('ul.details-point').find('li:gt(3)').show('slow');
        $(".show-more-termDetail-loan").hide();
        $(".show-less-termDetail-loan").show();
        //$('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, 1000);
    });

    $('.show-less-termDetail-loan').click(function (e) {
        e.preventDefault();
        $('ul.details-point').find('li:gt(3)').hide('slow');
        $(".show-more-termDetail-loan").show();
        $(".show-less-termDetail-loan").hide();
        // $('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, slow);
    });

    //show more and show less functionality for member benefits.
    $('#member_benefit').find('div.benefits:gt(2)').hide();
    $('.show-more-member-benefits').click(function (e) {
        e.preventDefault();
        $('#member_benefit').find('div.benefits:gt(2)').show('slow');
        $(".show-more-member-benefits").hide();
        $(".show-less-member-benefits").show();
        //$('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, 1000);
    });

    $('.show-less-member-benefits').click(function (e) {
        e.preventDefault();
        $('#member_benefit').find('div.benefits:gt(2)').hide('slow');
        $(".show-more-member-benefits").show();
        $(".show-less-member-benefits").hide();
        // $('html, body').animate({scrollTop: $('#details_termsloan').offset().top}, slow);
    });
    
    
    $('#filter_by_business_type select').change(function (e) {
        $("#filter_by_business_type").submit();
    });
   
    //for validating get a quote form
    jQuery(".submitButton").click(function () {
        var name = jQuery('#name').val();
        var strLenght = name.length;
        //var email = jQuery('#email').val();
        //var amount = jQuery('#amount').val();
        var nameReg = /^[a-zA-Z]+$/;
        //var emailReg = /^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i;
        if (strLenght != 0) {
            if ((strLenght < 2) || !nameReg.test(name)) {
                jQuery('.name').find('span').remove();
                jQuery('.name').append('<span class="wpcf7-not-valid-tip" role="alert">Please enter a valid name.</span>');
                return false;
            } else
            {
                $(".wpcf7-form").submit();
            }
        }
    });

    //jQuery("#phone").mask("(999) 999-9999", {autoclear: false});
    $('#phone').formatter({
  'pattern': '({{999}}) {{999}}-{{9999}}'
});

    $('#news-press-types select').change(function() {
       $('#news-press-types').submit();
    });

    $('#newsletter-subscription').validate({
        // Specify the validation rules
        rules: {
            email: {
                required: true,
                validateEmail: true
            }
        },
        // Specify the validation error messages
        messages: {
            email: {
                required: "Email Address is required",
                validateEmail: "Invalid Email Address",
            }
        },
        submitHandler: function (form, event) {
            event.preventDefault();
            var email = $(form).find('input[type="text"]').val();
            $.ajax({
                url: var_object.ajax_url,
                dataType: 'json',
                type: 'post',
                data: {
                    action: 'newsletter_subscribe',
                    email: email
                },
                beforeSend: function () {
                    $('.newsletter-button').hide();
                    $('.resource-sidebar-newsletter-loader #loading-image').show();
                },
                success: function (response) {
                    if (response.msg == 'Sucess') {
                        $(form).find('input[type="text"]').val('');
                        $('label.sucess').remove();
                        $(response.data).insertBefore(".news-letter-heading");
                        $('.newsletter-button').show();
                        $('.resource-sidebar-newsletter-loader #loading-image').hide();
                    }
                }
            });
        }
    });


    $('#ebook-form').validate({
        // Specify the validation rules
        rules: {
            email: {
                required: true,
                validateEmail: true
            }
        },
        // Specify the validation error messages
        messages: {
            email: {
                required: "Email Address is required",
                validateEmail: "Invalid Email Address",
            }
        },
          submitHandler: function (form, event) {
            event.preventDefault();
            var email = $(form).find('input[type="text"]').val();
            $.ajax({
                url: var_object.ajax_url,
                dataType: 'json',
                type: 'post',
                data: {
                    action: 'e_book_subscription',
                    email: email
                },
                beforeSend: function () {
                    $('.e-book-button').hide();
                    $('.ebook-loader-container .loading-image').show();
                },
                success: function (response) {
                    if (response.msg == 'Sucess') {
                        $(form).find('input[type="text"]').val('');
                        $('.get-e-book').find('label.sucess').remove();
                        $(response.data).insertBefore(".e-book-heading");
                        $('.e-book-button').show();
                        $('.ebook-loader-container .loading-image').hide();
                    }
                }
            });
        }
        
    });
    
    // Partner lead generation validations
    $('#partner-lead-generation').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            email: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            phone_number: {
                required: true,
                minlength: 10,
                onlyspaces: true
                        //maxlength   : 10 
            },
            legal_business_name: {
                required: true,
                onlyspaces: true
            },
            title: {
                required: true,
                onlyspaces: true
            },
            txtcomments: {
                required: true,
                onlyspaces: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.validationsErrs.first_name_required,
                minlength: var_object.validationsErrs.first_name_min_chars,
                lettersonly: var_object.validationsErrs.first_name_min_chars,
                onlyspaces: var_object.validationsErrs.first_name_required
            },
            last_name: {
                required: var_object.validationsErrs.last_name_required,
                minlength: var_object.validationsErrs.last_name_min_chars,
                lettersonly: var_object.validationsErrs.last_name_min_chars,
                onlyspaces: var_object.validationsErrs.last_name_required
            },
            email: {
                required: var_object.validationsErrs.email_required,
                validateEmail: var_object.validationsErrs.email,
                onlyspaces: var_object.validationsErrs.email_required
            },
            phone_number: {
                required: var_object.validationsErrs.phone_no_required,
                minlength: "Minimum 10 numbers are allowed",
                onlyspaces: var_object.validationsErrs.phone_no_required
            },
            legal_business_name: {
                required: var_object.validationsErrs.business_required,
                onlyspaces: var_object.validationsErrs.business_required
            },
            title: {
                required: var_object.validationsErrs.title_required,
                onlyspaces: var_object.validationsErrs.title_required
            },
            txtcomments: {
                required: var_object.validationsErrs.msg_required,
                onlyspaces: var_object.validationsErrs.msg_required
            }
        },
       submitHandler: function (form) {
           var formdata = {};
            $("#partner-lead-generation :input").each(function() {
                var key = this.id;
               formdata[key] = this.value;
            });
            
            var business_type = $('input[name=business_type]:checked', '#partner-lead-generation').val();
           
            formdata['business_type'] = business_type;
            var jsonString = JSON.stringify(formdata);
            $.ajax({
                url: var_object.ajax_url,
                dataType: 'json',
                type: 'post',
                data: {
                    action   : 'partner_lead_genration_save',
                    formdata : jsonString
                },
                success: function (response) {
                    if (response.status == 'success') { 
                        form.submit();
                    }
                    else {
                     return false;
                    }
                }
            });
            
            var first_name = $('input#first_name').val();
            var last_name = $('input#last_name').val();
            var email = $('input#email').val();
            var phone_number = $('input#phone_number').val();
            var legal_business_name = $('input#legal_business_name').val();
            var title = $('input#title').val();
            var comments = $('textarea#txtcomments').val();

            $.ajax({
              url: var_object.ajax_url,
              dataType: 'json',
              type: 'post',
              data: {
                 action: 'partners_email',
                 first_name: first_name,
                 last_name: last_name,
                 email: email,
                 phone_number: phone_number,
                 legal_business_name: legal_business_name,
                 title: title,
                 comments:comments,
                 partner_type: business_type
                    }
                });
       }
    });

    jQuery.validator.addMethod("lettersonly", function (value, element) {
        return this.optional(element) || /^[a-zA-Z\s]+$/.test(value);
    }, "No number or special character allowed")

    jQuery.validator.addMethod("validateEmail", function (value, element) {
        var re = /^(([^<>()\[\]\\.,;:\s@"]+(\.[^<>()\[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(value);
    }, "Invalid Email")

    jQuery.validator.addMethod("onlyspaces", function (value, element) {
        if ($.trim(value).length == 0) {
            return false;
        } else {
            return true;
        }
    }, "Required")

    jQuery.validator.addMethod("spacewithchar", function (value, element) {
        if ($.trim(value).length == 1) {
            return false;
        } else {
            return true;
        }
    }, "lettersonly")

    jQuery.validator.addMethod("exactlengthphone", function (value, element) {
        return this.optional(element) ||  /^\(\d{3}\) \d{3}\-\d{4}( x\d{1,6})?$/.test(value);
    },"Please enter exactly 10 characters.");

    jQuery.validator.addMethod("requiredCombobox",function (value, element){
       if (element.value == "") {
          return false;
       }
       else { 
           return true;
        }
    }, "Please select an option");
    
   /* jQuery.validator.addMethod("phoneUS", function (phone_number, element) {
    phone_number = phone_number.replace(/\s+/g, "");
    return this.optional(element) || phone_number.length > 9 &&
		phone_number.match(/^(1-?)?(\([2-9]\d{2}\)|[2-9]\d{2})-?[2-9]\d{2}-?\d{4}$/);
}, "Please specify a valid phone number");*/

    $('.refine-by-topic-checkbox').on('change', function () {
        $('#refine-by-topic-form').submit();
    });

    if (var_object.resourceFilteredParameters.filteredTopics) {
        $(".clear-all").show("slow");
    }

    $.validator.addMethod("validannualsales",function (value, element) {
       if (parseInt(element.value) >= 54000 && parseInt(element.value) <= 12000000) { 
          return true;
       }
       else { 
           return false;
        }
    },"Please enter an amount between $54,000 and $12 million");
f
    //Resource search form validations
    $('#resource-search').submit(function (e) {
        if( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
            var msg = "Please enter search keyword";
        }
        else {
            var msg = "Please enter either search keyword or choose business type";
        }
        var submit = true;
        var search_keyword = $('#search-keyword').val();
        var business_type = $('#business-type').val();

        if (search_keyword == '' && business_type == '') {
            $('<label class="error">'+msg+'</label>').insertAfter("#search-keyword");
            e.preventDefault();
        }
    });

    // Get the active tab on resource sorting page
    var currentTab = "Most Popular";
    $('a[data-toggle="tab"]').on('shown.bs.tab', function (e) {
        currentTab = $(e.target).text(); // get current tab
    });

    $('.resource-filter-paging').on('click', function (e) {
        $this = $(this);
        $insertbefore = $(this).parent();
        e.preventDefault();
        var offset = $this.next().val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_resources_pagination',
                resourceFilteredParameters: var_object.resourceFilteredParameters,
                offset: offset,
                currentTab: currentTab
            },
            beforeSend: function () {
                $insertbefore.next().find('#loading-image').show();
                $insertbefore.hide();
            },
            success: function (response) {
                $insertbefore.next().find('#loading-image').hide();
                if (response.status == 'error') {
                    $insertbefore.hide();
                } else {
                    $insertbefore.show();
                    $this.next().val(++offset);
                }
                $(response.data).insertBefore($insertbefore);
            }
        });
    });
    var prevent = false;
    //Quick Quote Validations 
    $(document).on('click', 'form button[type=submit][id=get-quote-submit]', function (e) {
        $("#name").val($.trim($("#name").val()));
        var phone = $('#phone').val();
        phone = phone.replace(/\D/g, '');
        if (phone.length == 0) {
            $('.get-Quote-col').find('div#phone-error:first').remove();
            $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
            $('#phone').attr('aria-invalid', 'true');
            prevent = false;
        }
    });
    $('#get_quote_submit_form').resetForm();
    // Quick Quote validations
    $('#get_quote_submit_form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true,
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            annual_revenue: {
                required: true,
                onlyspaces: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.quickQuotevalidationsErrs.firstname_required,
                minlength: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                lettersonly: var_object.quickQuotevalidationsErrs.first_name_min_chars,
                onlyspaces: var_object.quickQuotevalidationsErrs.firstname_required,
                spacewithchar: var_object.quickQuotevalidationsErrs.first_name_min_chars,
            },
            email_address: {
                required: var_object.quickQuotevalidationsErrs.email_required,
                email: var_object.quickQuotevalidationsErrs.email,
                onlyspaces: var_object.quickQuotevalidationsErrs.email_required,
            },
            annual_revenue: {
                required: var_object.quickQuotevalidationsErrs.anuualrevenue_required,
                min: var_object.quickQuotevalidationsErrs.loan_amount,
                max: var_object.quickQuotevalidationsErrs.loan_amount,
                onlyspaces: var_object.quickQuotevalidationsErrs.anuualrevenue_required,
            }
        },
        onfocusout: function (element, event) {
            $.validator.defaults.onfocusout.call(this, element, event);
            if (element.name == "business_phone_number") {
                phone = element.value.replace(/\D/g, '');
                if (phone.length < 10 && phone.length > 0) {
                    $('#get_quote_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number should be 10 digits long.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else if (phone.length == 0)
                {
                    $('#get_quote_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else
                {
                    $('#get_quote_submit_form').find('div#phone-error:first').remove();
                     //$('#phone').attr('aria-invalid', 'false');
                    prevent = true;
                    
                }
            }
            else
            {
                this.element(element);
            }
            

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            if (prevent) {
               /* $(form).ajaxSubmit({
                    type: "POST",
                    url: var_object.fieldOptionValue.post_url,
                    beforeSend: function () {
                        $('#get_quote_submit_form').find('#loading-image-getquote').show();
                    },
                    success: function () {
                        $('#get_quote_submit_form').find('#loading-image-getquote').hide();
                        $('#get_quote_submit_form').insertAfter('<span>Your form has been submitted successfully.</span>').show();
                    },
                    error: function () {
                        $('#get_quote_submit_form').find('#loading-image-getquote').hide();
                        $('.container').find('label#responseError:first').remove();
                        $('<label class="error" id="responseError">Error has occurred.</label>').insertAfter("#get_quote_submit_form");
                    }
                });*/
                form.submit();
            }
        }
    });
    // E2E Direct Validation 
    $('#e2e_direct_submit_form').resetForm();
   
    // Quick Quote validations
    $('#e2e_direct_submit_form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.e2eDirectvalidationsErrs.firstname_required,
                minlength: var_object.e2eDirectvalidationsErrs.first_name_min_chars,
                lettersonly: var_object.e2eDirectvalidationsErrs.first_name_min_chars,
                onlyspaces: var_object.e2eDirectvalidationsErrs.firstname_required,
                spacewithchar: var_object.e2eDirectvalidationsErrs.first_name_min_chars,
            },
            email_address: {
                required: var_object.e2eDirectvalidationsErrs.email_required,
                email: var_object.e2eDirectvalidationsErrs.email,
                onlyspaces: var_object.e2eDirectvalidationsErrs.email_required,
            },
            last_name: {
                required: var_object.e2eDirectvalidationsErrs.last_name_required,
                minlength: var_object.e2eDirectvalidationsErrs.last_name_min_chars,
                lettersonly: var_object.e2eDirectvalidationsErrs.last_name_min_chars,
                onlyspaces: var_object.e2eDirectvalidationsErrs.last_name_required,
                spacewithchar: var_object.e2eDirectvalidationsErrs.last_name_min_chars,
            }
        },
        onfocusout: function (element, event) {
            $.validator.defaults.onfocusout.call(this, element, event);
            if (element.name == "business_phone_number") {
                phone = element.value.replace(/\D/g, '');
                if (phone.length < 10 && phone.length > 0) {
                    $('#e2e_direct_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number should be 10 digits long.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else if (phone.length == 0)
                {
                    $('#e2e_direct_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else
                {
                    $('#e2e_direct_submit_form').find('div#phone-error:first').remove();
                     //$('#phone').attr('aria-invalid', 'false');
                    prevent = true;
                    
                }
            }
            else
            {
                this.element(element);
            }
            

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            if (prevent) {
                form.submit();
            }
        }
    });
    
    //Lead Capture Detailed Validations
    $('#lead_capture_detailed_submit_form').resetForm();


    $('#lead_capture_detailed_submit_form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            legal_business_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.leadcaptureDetailedvalidationsErrs.firstname_required,
                minlength: var_object.leadcaptureDetailedvalidationsErrs.first_name_min_chars,
                lettersonly: var_object.leadcaptureDetailedvalidationsErrs.first_name_min_chars,
                onlyspaces: var_object.leadcaptureDetailedvalidationsErrs.firstname_required,
                spacewithchar: var_object.leadcaptureDetailedvalidationsErrs.first_name_min_chars,
            },
            email_address: {
                required: var_object.leadcaptureDetailedvalidationsErrs.email_required,
                email: var_object.leadcaptureDetailedvalidationsErrs.email,
                onlyspaces: var_object.leadcaptureDetailedvalidationsErrs.email_required,
            },
            legal_business_name: {
                required: var_object.leadcaptureDetailedvalidationsErrs.business_name_required,
                minlength: var_object.leadcaptureDetailedvalidationsErrs.business_name_min_chars,
                lettersonly: var_object.leadcaptureDetailedvalidationsErrs.business_name_min_chars,
                onlyspaces: var_object.leadcaptureDetailedvalidationsErrs.business_name_required,
                spacewithchar: var_object.leadcaptureDetailedvalidationsErrs.business_name_min_chars,
            }
        },
        onfocusout: function (element, event) {
            $.validator.defaults.onfocusout.call(this, element, event);
            if (element.name == "business_phone_number") {
                phone = element.value.replace(/\D/g, '');
                if (phone.length < 10 && phone.length > 0) {
                    $('#lead_capture_detailed_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number should be 10 digits long.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else if (phone.length == 0)
                {
                    $('#lead_capture_detailed_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else
                {
                    $('#lead_capture_detailed_submit_form').find('div#phone-error:first').remove();
                     //$('#phone').attr('aria-invalid', 'false');
                    prevent = true;
                    
                }
            }
            else
            {
                this.element(element);
            }
            

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            if (prevent) {
                form.submit();
            }
        }
    });
    
    // Lead Capture Simple validations
    $('#lead_capture_simple_submit_form').resetForm();
   
    $('#lead_capture_simple_submit_form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            legal_business_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true,
                spacewithchar:true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.leadcaptureSimplevalidationsErrs.firstname_required,
                minlength: var_object.leadcaptureSimplevalidationsErrs.first_name_min_chars,
                lettersonly: var_object.leadcaptureSimplevalidationsErrs.first_name_min_chars,
                onlyspaces: var_object.leadcaptureSimplevalidationsErrs.firstname_required,
                spacewithchar: var_object.leadcaptureSimplevalidationsErrs.first_name_min_chars,
            },
            email_address: {
                required: var_object.leadcaptureSimplevalidationsErrs.email_required,
                email: var_object.leadcaptureSimplevalidationsErrs.email,
                onlyspaces: var_object.leadcaptureSimplevalidationsErrs.email_required,
            },
            legal_business_name: {
                required: var_object.leadcaptureSimplevalidationsErrs.business_name_required,
                minlength: var_object.leadcaptureSimplevalidationsErrs.business_name_min_chars,
                lettersonly: var_object.leadcaptureSimplevalidationsErrs.business_name_min_chars,
                onlyspaces: var_object.leadcaptureSimplevalidationsErrs.business_name_required,
                spacewithchar: var_object.leadcaptureSimplevalidationsErrs.business_name_min_chars,
            }
        },
        onfocusout: function (element, event) {
            $.validator.defaults.onfocusout.call(this, element, event);
            if (element.name == "business_phone_number") {
                phone = element.value.replace(/\D/g, '');
                if (phone.length < 10 && phone.length > 0) {
                    $('#lead_capture_simple_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number should be 10 digits long.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else if (phone.length == 0)
                {
                    $('#lead_capture_simple_submit_form').find('div#phone-error:first').remove();
                    $('#phone').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
                    $('#phone').attr('aria-invalid', 'true');
                    prevent = false;
                } else
                {
                    $('#lead_capture_simple_submit_form').find('div#phone-error:first').remove();
                     //$('#phone').attr('aria-invalid', 'false');
                    prevent = true;
                    
                }
            }
            else
            {
                this.element(element);
            }
            

        },
        submitHandler: function (form) {
            var formData = $(form).serialize();
            if (prevent) {
                form.submit();
            }
        }
    });
    
    
    $('#fb-share-button').click(function (e) {
        console.log(var_object.resourceURL);
        e.preventDefault();
        FB.ui({
            method : 'share',
            href   : var_object.resourceURL
        }, function (response) {
        });
    });

    // Paginate resource listing
    $('.paginate-topic-listing').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#paginate-listing-resources-offset").val();
        var term = $('#resource-topic-term').val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_resources_listing_pagination',
                offset: offset,
                term: term
            },
            beforeSend: function () { // show loader before ajax success
                $("#loading-image").show();
                $('.show-more-terms').hide();
            },
            success: function (response) {
                $("#loading-image").hide();
                if (response.status == 'error') {
                    $('.show-more-terms').hide();
                } else {
                    $('.show-more-terms').show();
                    $('#paginate-listing-resources-offset').val(++offset);
                }
                $(response.data).insertBefore(".paginate-topic-listing");
            }
        });
    });

    // Paginate author listing
    $('.paginate-author-listing').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#paginate-author-offset").val();

        var author = $('#author-id').val();
        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_author_listing_pagination',
                offset: offset,
                author: author
            },
            beforeSend: function () {
                $("#loading-image").show();
                $('.show-more-terms').hide();
            },
            success: function (response) {
                $("#loading-image").hide();
                if (response.status == 'error') {
                    $('.show-more-terms').hide();
                } else {
                    $('.show-more-terms').show();
                    $('#paginate-author-offset').val(++offset);
                }
                $(response.data).insertBefore(".paginate-author-listing");
                //$('#listing-resources').append(response.data);
            }
        });
    });

     // CRM Landing used by Trakloan and Installmentloan validations
    $('#crm_landing').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            email: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            phone_number: {
                required: true,
                exactlengthphone: true,
                onlyspaces: true
            },
            business_legal_name: {
                required: true,
                minlength: 2,
                onlyspaces: true
            },
            industry:{
                requiredCombobox: true
            },
            annual_sales:{
                required: true,
                validannualsales:true
            },
            time_in_business:{
               requiredCombobox: true
            },
            credit_score_range:{
               requiredCombobox: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.instant_quote_validations_error_msg.firstname_required,
                minlength: var_object.instant_quote_validations_error_msg.first_name_min_chars,
                lettersonly: var_object.instant_quote_validations_error_msg.first_name_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.firstname_required
            },
            last_name: {
                required: var_object.instant_quote_validations_error_msg.lastname_required,
                minlength: var_object.instant_quote_validations_error_msg.last_name_min_chars,
                lettersonly: var_object.instant_quote_validations_error_msg.last_name_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.lastname_required
            },
            email: {
                required: var_object.instant_quote_validations_error_msg.email_required,
                email: var_object.instant_quote_validations_error_msg.email,
                onlyspaces: var_object.instant_quote_validations_error_msg.email_required
            },
            phone_number: {
                required: var_object.instant_quote_validations_error_msg.phone_required,
                onlyspaces: var_object.instant_quote_validations_error_msg.phone_required
            },
            business_legal_name: {
                required: var_object.instant_quote_validations_error_msg.business_required,
                minlength: var_object.instant_quote_validations_error_msg.business_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.business_required
            },
            annual_sales:{
                required: var_object.instant_quote_validations_error_msg.annual_required
            }
        },
        submitHandler: function (form) {
                var first_name = $(form).find('input#first_name').val();
                var last_name = $(form).find('input#last_name').val();
                var email = $(form).find('input#email').val();
                var phone_number = $(form).find('input#phone_number').val();
                var business_legal_name = $(form).find('input#business_legal_name').val();
                var industry = $(form).find('select#industry').val();
                var annual_sales = $(form).find('input#annual_sales').val();
                var time_in_business = $(form).find('select#time_in_business').val();
                   $.ajax({
                    url: var_object.ajax_url,
                    dataType: 'json',
                    type: 'post',
                    data: {
                    action: 'crm_landing_email',
                    first_name: first_name,
                    last_name: last_name,
                    email: email,
                    phone_number: phone_number,
                    business_legal_name: business_legal_name,
                    industry: industry,
                    annual_sales: annual_sales,
                    time_in_business: time_in_business,
                    }
                });
          form.submit();
        }
    });

    // Instant Quote validations
    $('#instant_quote').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            email_address: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            business_phone_number: {
                required: true,
                exactlengthphone: true,
                onlyspaces: true
            },
            legal_business_name: {
                required: true,
                minlength: 2,
                onlyspaces: true
            },
            business_industry:{
                requiredCombobox: true
            },
            annual_revenue:{
                required: true,
                validannualsales:true
            },
            business_age:{
               requiredCombobox: true
            },
            credit_score_range:{
               requiredCombobox: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.instant_quote_validations_error_msg.firstname_required,
                minlength: var_object.instant_quote_validations_error_msg.first_name_min_chars,
                lettersonly: var_object.instant_quote_validations_error_msg.first_name_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.firstname_required
            },
            last_name: {
                required: var_object.instant_quote_validations_error_msg.lastname_required,
                minlength: var_object.instant_quote_validations_error_msg.last_name_min_chars,
                lettersonly: var_object.instant_quote_validations_error_msg.last_name_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.lastname_required
            },
            email_address: {
                required: var_object.instant_quote_validations_error_msg.email_required,
                email: var_object.instant_quote_validations_error_msg.email,
                onlyspaces: var_object.instant_quote_validations_error_msg.email_required
            },
            business_phone_number: {
                required: var_object.instant_quote_validations_error_msg.phone_required,
                onlyspaces: var_object.instant_quote_validations_error_msg.phone_required
            },
            legal_business_name: {
                required: var_object.instant_quote_validations_error_msg.business_required,
                minlength: var_object.instant_quote_validations_error_msg.business_min_chars,
                onlyspaces: var_object.instant_quote_validations_error_msg.business_required
            },
            annual_revenue:{
                required: var_object.instant_quote_validations_error_msg.annual_required
            }
        },
        submitHandler: function (form) {
                var first_name = $(form).find('input#first_name').val();
                var last_name = $(form).find('input#last_name').val();
                var email_address = $(form).find('input#email_address').val();
                var business_phone_number = $(form).find('input#business_phone_number').val();
                var legal_business_name = $(form).find('input#legal_business_name').val();
                var business_industry = $(form).find('select#business_industry').val();
                var annual_revenue = $(form).find('input#annual_revenue').val();
                var business_age = $(form).find('select#business_age').val();
                var credit_score_range = $(form).find('select#credit_score_range').val();
                   $.ajax({
                    url: var_object.ajax_url,
                    dataType: 'json',
                    type: 'post',
                    data: {
                    action: 'instant_quote_email',
                    first_name: first_name,
                    last_name: last_name,
                    email_address: email_address,
                    business_phone_number: business_phone_number,
                    legal_business_name: legal_business_name,
                    business_industry: business_industry,
                    annual_revenue: annual_revenue,
                    business_age: business_age,
                    credit_score_range: credit_score_range
                    }
                });
            form.submit();
        }
    });
     $(document).on('click', 'form button[type=submit][id=contact-form-btn]', function (e) {
        var phone = $('#phone_number').val();
        phone = phone.replace(/\D/g, '');
        if (phone.length == 0) {
            $('#contact-form').find('div#phone-error:first').remove();
            $('#phone_number').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
            $('#phone_number').attr('aria-invalid', 'true');
            prevent = false;
        }
    });
    // Contact Us validations
    $('#contact-form').validate({
        // Specify the validation rules
        rules: {
            first_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            last_name: {
                required: true,
                minlength: 2,
                lettersonly: true,
                onlyspaces: true
            },
            email: {
                required: true,
                validateEmail: true,
                onlyspaces: true
            },
            legal_business_name: {
                required: true,
                onlyspaces: true
            },
            title: {
                required: true,
                onlyspaces: true
            },
            comments: {
                required: true,
                onlyspaces: true
            }
        },
        // Specify the validation error messages
        messages: {
            first_name: {
                required: var_object.contact_us_validations_error_msg.firstname_required,
                minlength: var_object.contact_us_validations_error_msg.first_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.first_name_min_chars,
                onlyspaces: var_object.contact_us_validations_error_msg.firstname_required
            },
            last_name: {
                required: var_object.contact_us_validations_error_msg.lastname_required,
                minlength: var_object.contact_us_validations_error_msg.last_name_min_chars,
                lettersonly: var_object.contact_us_validations_error_msg.last_name_min_chars,
                onlyspaces: var_object.contact_us_validations_error_msg.lastname_required
            },
            email: {
                required: var_object.contact_us_validations_error_msg.email_required,
                email: var_object.contact_us_validations_error_msg.email,
                onlyspaces: var_object.contact_us_validations_error_msg.email_required
            },
            legal_business_name: {
                required: var_object.contact_us_validations_error_msg.business_required,
                onlyspaces: var_object.contact_us_validations_error_msg.business_required
            },
            title: {
                required: var_object.contact_us_validations_error_msg.title_required,
                onlyspaces: var_object.contact_us_validations_error_msg.title_required
            },
            comments: {
                required: var_object.contact_us_validations_error_msg.message_required,
                onlyspaces: var_object.contact_us_validations_error_msg.message_required
            }
        },
        onfocusout: function (element, event) {
            $.validator.defaults.onfocusout.call(this, element, event);
            if (element.name == "phone_number") {
                phone = element.value.replace(/\D/g, '');
                if (phone.length < 10 && phone.length > 0) {
                    $('#contact-form').find('div#phone-error:first').remove();
                    $('#phone_number').after('<div class="error" id="phone-error" for="phone">Phone number should be 10 digits long.</div>');
                    $('#phone_number').attr('aria-invalid', 'true');
                    prevent = false;
                } else if (phone.length == 0)
                {
                    $('#contact-form').find('div#phone-error:first').remove();
                    $('#phone_number').after('<div class="error" id="phone-error" for="phone">Phone number cannot be empty.</div>');
                    $('#phone_number').attr('aria-invalid', 'true');
                    prevent = false;
                } else
                {
                    $('#contact-form').find('div#phone-error:first').remove();
                     //$('#phone').attr('aria-invalid', 'false');
                    prevent = true;
                    
                }
            }
            

        },
        submitHandler: function (form) {
            if (prevent) {
              var first_name = $(form).find('input#first_name').val();
              var last_name = $(form).find('input#last_name').val();
              var email = $(form).find('input#email').val();
              var phone_number = $(form).find('input#phone_number').val();
              var legal_business_name = $(form).find('input#legal_business_name').val();
              var title = $(form).find('input#title').val();
              var comments = $(form).find('textarea#comments').val();

              $.ajax({
                url: var_object.ajax_url,
                dataType: 'json',
                type: 'post',
                data: {
                  action: 'contact_email',
                  first_name: first_name,
                  last_name: last_name,
                  email: email,
                  phone_number: phone_number,
                  legal_business_name: legal_business_name,
                  title: title,
                  comments:comments
                  }
                });
             form.submit();
            }
        }
    });
    //$("#phone_number").mask("(999) 999-9999",{autoclear:false});
    //$("#business_phone_number").mask("(999) 999-9999",{autoclear:false});
    $('#phone_number').formatter({
  'pattern': '({{999}}) {{999}}-{{9999}}'
});
    $('#business_phone_number').formatter({
  'pattern': '({{999}}) {{999}}-{{9999}}'
});
    
    // Commented code because creating problem in running code.
    $("#annual_revenue").numeric();
    $("#annual_sales").numeric();
    $('#loan-amount').numeric();
    //$("#loan-amount").maskMoney({prefix:'$ ', thousands:'', decimal:',', affixesStay: true});
    // Glossary show more
    $('.glossary-filter-paging').click(function (e) {
        $this = $(this);
        e.preventDefault();
        var offset = $("#glossary-filtered-resources-offset").val();

        $.ajax({
            url: var_object.ajax_url,
            dataType: 'json',
            type: 'post',
            data: {
                action: 'ajax_glossary_pagination',
                offset: offset
            },
            beforeSend: function () {
                $("#loading-image").show();
                $('.show-more-terms').hide();
            },
            success: function (response) {
                $("#loading-image").hide();
                if (response.status == 'error') {
                    $('.show-more-terms').hide();
                } else {
                    $('.show-more-terms').show();
                    $('#glossary-filtered-resources-offset').val(++offset);
                }

                if ($("#mostRecentGlossary div.row:last").find('.section-heading').html() == $(response.data).find('.section-heading').html()) {
                    var resource_title = $(response.data).filter("div.row:first");

                    //var resource_title = $(response.data).find('div').first();
                    var resource = $(resource_title).find('p');
                    $("#mostRecentGlossary div.row:last .col-sm-12").append(resource);
                    var last_element = $(response.data).filter("div.row:not(:first)");
                    $(last_element).insertBefore(".glossary-show-more");
                } else {
                    $(response.data).insertBefore(".glossary-show-more");
                }
            }
        });
    });

    $(".boldchat").hide();
    var livechat = $('#menu-item-879').is(":visible");
    if (livechat == true) {
        $("#menu-item-879").append($(".boldchat").show());
    }


});
