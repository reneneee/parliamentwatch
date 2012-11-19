function getUrlParams() {
    var params = {};
    window.location.search.replace(/[?&]+([^=&]+)=([^&]*)/gi,
        function (str, key, value) {
            params[key] = value;
        });
    return params;
}
jQuery(function(){
    //Get parameters from URL
    //    var params = getUrlParams();
    //    if(params.action != ""){
    //        var params_action = "&action="+params.action;
    //    }
    
    var date = new Date();
    date.setTime(date.getTime() + (1 * 60 * 1000));
    //var server = 'local';
    var server = 'live';
    
    var url_1;
    var url_2;
    var url_3;
    var council_dd;
    var street_add;
    if(server == 'live'){
        //        url_1 = Drupal.settings.basePath+"civicrm/contribute/transact?reset="+params.reset+"&id="+params.id+params_action;
        url_1 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=4&action=preview";
        url_2 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=5&action=preview";
        url_3 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=6&action=preview";
        council_dd = 'custom_17';
        street_add = 'street_address-Primary';
    } else {
        url_1 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=1&action=preview";
        url_2 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=2&action=preview";
        url_3 = Drupal.settings.basePath+"civicrm/contribute/transact?reset=1&id=3&action=preview";
        council_dd = 'custom_4';
        street_add = 'street_address-1';
    }
    
    jQuery("#donation-billing-name-section").hide();
    
    if(jQuery.cookie("contibution_ammount") != ""){
        var index;
        var val = jQuery.cookie("contibution_ammount");
        if(val == 0){
            index = 0;
        }
        if(val == 3){
            index = 1;
        }
        if(val == 6){
            index = 2;
        }
        if(val == 9){
            index = 3;
            jQuery("#amount_other").val(jQuery.cookie("amount_other"));
        }        
        jQuery("input:radio[name='amount']:eq("+index+")").attr("checked","checked");
    }
    /*/**********************************************/
    if(jQuery(".custom-error-message").html() != "Please fill in the required fields"){
        jQuery("#first_name").val(jQuery.cookie("fname"));
        jQuery("#last_name").val(jQuery.cookie("lname"));
        jQuery("#"+street_add).val(jQuery.cookie("street_address"));
        jQuery("#addressee_custom").val(jQuery.cookie("house_number"));
        jQuery("#postal_code-Primary").val(jQuery.cookie("postal_code"));
        jQuery("#city-Primary").val(jQuery.cookie("city"));
        jQuery("#phone-Primary-1").val(jQuery.cookie("phone"));
        // TO set title if any ie.MR.MRS.MS
        if(jQuery.cookie("prefix_title") != ""){
            jQuery("#individual_prefix").val(jQuery.cookie("prefix_title"));
        }   
    
        /*/**********************************************/
        //Default Values for Personal Information FORM

        if(jQuery.trim(jQuery("#first_name").val()) ==""){
            jQuery("#first_name").val("First name");
        } 
        if(jQuery.trim(jQuery("#last_name").val()) ==""){
            jQuery("#last_name").val("Family name");
        }
        if(jQuery.trim(jQuery("#"+street_add).val()) ==""){
            jQuery("#"+street_add).val("Street and housenumber");
        }
        if(jQuery.trim(jQuery("#postal_code-Primary").val()) ==""){
            jQuery("#postal_code-Primary").val("Postal code");
        }
        if(jQuery.trim(jQuery("#city-Primary").val()) ==""){
            jQuery("#city-Primary").val("City");
        }
        if(jQuery.trim(jQuery("#phone-Primary-1").val()) ==""){
            jQuery("#phone-Primary-1").val("Telephone (optional)");
        }
    }
    jQuery('#billing_first_name').blur(function(){
        if(jQuery.trim(jQuery(this).val()) == ""){
            jQuery('#billing_first_name').val("First name");
        }
    });
    jQuery('#billing_first_name').focus(function(){
        if(jQuery.trim(jQuery('#billing_first_name').val()) == "First name"){
            jQuery('#billing_first_name').val("");
        }
    });
    
    jQuery('#billing_last_name').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#billing_last_name').val("Last name");
        }
    });
    jQuery('#billing_last_name').focus(function(){
        if(jQuery.trim(jQuery('#billing_last_name').val()) == "Last name"){
            jQuery('#billing_last_name').val("");
        }
    });
    
    jQuery('#billing_street_address-5').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#billing_street_address-5').val("Street and housenumber");
        }
    });
    jQuery('#billing_street_address-5').focus(function(){
        if(jQuery.trim(jQuery('#billing_street_address-5').val()) == "Street and housenumber"){
            jQuery('#billing_street_address-5').val("");
        }
    });
    
    jQuery('#billing_city-5').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#billing_city-5').val("City");
        }
    });
    jQuery('#billing_city-5').focus(function(){
        if(jQuery.trim(jQuery('#billing_city-5').val()) == "City"){
            jQuery('#billing_city-5').val("");
        }
    });
    
    jQuery('#billing_postal_code-5').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#billing_postal_code-5').val("Postal code");
        }
    });
    jQuery('#billing_postal_code-5').focus(function(){
        if(jQuery.trim(jQuery('#billing_postal_code-5').val()) == "Postal code"){
            jQuery('#billing_postal_code-5').val("");
        }
    });

    
    
    /* Personal Information FORM */
    // On focus blank the field
    jQuery('#first_name').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#first_name').val("First name");
        }
    });
    jQuery('#first_name').focus(function(){
        if(jQuery.trim(jQuery('#first_name').val()) == "First name"){
            jQuery('#first_name').val("");
        }
    });
    
    jQuery('#last_name').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#last_name').val("Family name");
        }
    });
    jQuery('#last_name').focus(function(){
        if(jQuery.trim(jQuery('#last_name').val()) == "Family name"){
            jQuery('#last_name').val("");
        }
    });

    jQuery('#'+street_add).blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#'+street_add).val("Street and housenumber");
        }
    });
    jQuery('#'+street_add).focus(function(){
        if(jQuery.trim(jQuery('#'+street_add).val()) == "Street and housenumber"){
            jQuery('#'+street_add).val("");
        }
    });
    
    jQuery('#postal_code-Primary').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#postal_code-Primary').val("Postal code");
        }
    });
    jQuery('#postal_code-Primary').focus(function(){
        if(jQuery.trim(jQuery('#postal_code-Primary').val()) == "Postal code"){
            jQuery('#postal_code-Primary').val("");
        }
    });
    
    jQuery('#city-Primary').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#city-Primary').val("City");
        }
    });
    jQuery('#city-Primary').focus(function(){
        if(jQuery.trim(jQuery('#city-Primary').val()) == "City"){
            jQuery('#city-Primary').val("");
        }
    });
    
    jQuery('#phone-Primary-1').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#phone-Primary-1').val("Telephone (optional)");
        }
    });
    jQuery('#phone-Primary-1').focus(function(){
        if(jQuery.trim(jQuery('#phone-Primary-1').val()) == "Telephone (optional)"){
            jQuery('#phone-Primary-1').val("");
        }
    });
    /************************* Billing Name and Address Focus Event **********************/

    
    // Cut email field from top and place in PERSONAL INFORMATION block.

    var email_txt = jQuery(".crm-contribution-main-form-block .email-5-section").html();
    jQuery('<div class="crm-section email-Primary-1-section">'+email_txt+'</div>').insertAfter('.phone-Primary-1-section');
    jQuery(".crm-contribution-main-form-block .email-5-section").remove();
    if(jQuery(".custom-error-message").html() != "Please fill in the required fields"){
        jQuery("#email-5").val(jQuery.cookie("email"));
        if(jQuery.trim(jQuery("#email-5").val()) == ""){
            jQuery("#email-5").val("E-mail address");
        } else {
            jQuery("#email-5").val(jQuery.cookie("email"));
        }
    }
    
    // Check if other amount is check then enable the textfield for it.else disable it.
    if(!jQuery("#CIVICRM_QFID_amount_other_radio_8").attr("checked")){
        jQuery("#amount_other").attr("disabled","true");
    } else {
        jQuery("#amount_other").removeAttr("disabled");
    }
    
    jQuery("input:radio[name=amount]").click(function() {
        var value = jQuery(this).val();
        if(value == 'amount_other_radio'){
            jQuery("#amount_other").removeAttr("disabled");
        } else{
            jQuery("#amount_other").attr("disabled","true");        
        }
    });
    
    //TO remove label (Other Amount) From Contribution amount section.
    jQuery("label[for='CIVICRM_QFID_amount_other_radio_8']").html('');
    //    jQuery("label[for='amount_other']").html('');
    //TO remove label (Email Address) From Contribution amount section.
    jQuery("label[for='email-5']").html('');
    
    // To bring the STATES and COUNCILS fields up to the FORM.
    var states = jQuery(".custom_pre_profile-group .state_province-Primary-section").html();
    jQuery('.country-states-section').append(""+states);
    
    jQuery(".custom_pre_profile-group .state_province-Primary-section").remove();

    var concils = jQuery(".custom_pre_profile-group ."+council_dd+"-section .content").html();
    jQuery(".country-states-section .content").append('<span class="states-council-section"><span id="ajax_councils">'+concils+'</span></span>');
    jQuery(".custom_pre_profile-group ."+council_dd+"-section .content").remove();
    
    
   
    jQuery("#state_province-Primary").change(function(){
        var state_id = jQuery("#state_province-Primary").val();
        var cid = jQuery("#"+council_dd).val();
        if(state_id == '') {
            jQuery("#"+council_dd).hide();   
        } else {
            jQuery("#ajax_councils").html('<img src="'+Drupal.settings.basePath+'sites/all/modules/civicrm/i/loading.gif" />');
            jQuery.ajax({
                type: "POST",
                url: Drupal.settings.basePath+'?q=german_councils',
                data: "state_id="+state_id+"&cid="+council_dd,
                success: function(response){
                    jQuery("#ajax_councils").html(response);
                }
            });
            jQuery("#"+council_dd).show();
        }
    });
    
    var state_val = ''+jQuery.cookie("state");
    jQuery("#state_province-Primary").val(state_val);
    
    if(jQuery("#state_province-Primary").val() != ''){
        jQuery("#"+council_dd).show();
        var cid = jQuery("#"+council_dd).val();
        jQuery("#ajax_councils").html('<img src="'+Drupal.settings.basePath+'sites/all/modules/civicrm/i/loading.gif" />');
        jQuery.ajax({
            type: "POST",
            url: Drupal.settings.basePath+'?q=german_councils',
            data: "state_id="+state_val+"&cid="+council_dd,
            success: function(response){
                jQuery("#ajax_councils").html(response);
            }
        });
        var council_val = jQuery.cookie("council");
        setTimeout("jQuery('#"+council_dd+"').val("+council_val+");",2000);
    } else {
        jQuery("#"+council_dd).hide();
    }

    // Switching between debit and credit cards and putting the form value in cookie here.
    jQuery("input:radio[name=payment_method]").click(function() {
        jQuery("#img-payment-processor-wait").show();
        jQuery("#img-payment-processor-wait").before('<img src="'+Drupal.settings.basePath+'sites/all/modules/civicrm/i/loading.gif" />'); 
        var paymentMethod = jQuery(this).val();

        var fname = jQuery("#first_name").val();
        var lname = jQuery("#last_name").val();
        var street_address = jQuery("#"+street_add).val();
        var house_number = jQuery("#addressee_custom").val();
        var postal_code = jQuery("#postal_code-Primary").val();
        var city = jQuery("#city-Primary").val();
        var phone = jQuery("#phone-Primary-1").val();
        var state = jQuery("#state_province-Primary").val();
        var council = jQuery("#"+council_dd).val();
        var email = jQuery("#email-5").val();
        var prefix_title = jQuery("#individual_prefix").val();
        var contibution_ammount = jQuery("input:radio[name='amount']:checked").index();
        
        if(contibution_ammount == 9){
            var amount_other = jQuery("#amount_other").val();
            jQuery.cookie("amount_other", amount_other,{
                expires: date
            });
        }
        
        if(jQuery("#CIVICRM_QFID_0_10").attr("checked")){
            jQuery.cookie("pledge", "Daily", {
                expires: date
            });
        } else {
            jQuery.cookie("pledge", "Monthly", {
                expires: date
            });
            var pledge_time = jQuery("#custom_pledge_frequency_unit").val();
            jQuery.cookie("pledge_time", pledge_time, {
                expires: date
            });
        }
        jQuery.cookie("fname", fname, {
            expires: date
        }); 
        jQuery.cookie("lname", lname, {
            expires: date
        }); 
        jQuery.cookie("street_address", street_address, {
            expires: date
        }); 
        jQuery.cookie("house_number", house_number, {
            expires: date
        }); 
        jQuery.cookie("postal_code", postal_code, {
            expires: date
        }); 
        jQuery.cookie("city", city, {
            expires: date
        }); 
        jQuery.cookie("phone", phone, {
            expires: date
        }); 
        jQuery.cookie("state", state, {
            expires: date
        });
        jQuery.cookie("email", email, {
            expires: date
        });
        jQuery.cookie("prefix_title", prefix_title, {
            expires: date
        });
        jQuery.cookie("contibution_ammount", contibution_ammount+"", {
            expires: date
        }); 
        if(council != ""){
            jQuery.cookie("council", council, {
                expires: date
            });
        }
        if(paymentMethod == 'payment_debit'){
            window.location = url_1;
        } else if(paymentMethod == 'payment_credit'){
            window.location = url_2;
        } else {
            window.location = url_3;
        }
    });   
    
    
    if(jQuery("#payment_1").attr("checked")){
        jQuery("#first_name").keyup(function(){
            jQuery("#account_holder").val(jQuery("#first_name").val());
        });
        jQuery("#last_name").keyup(function(){
            jQuery("#account_holder").val(jQuery("#first_name").val() + " " +jQuery("#last_name").val());
        });
    }
    
    /*
     * If click on submit button and the (billing address differs) checkbox is not checked.
     * Then assign billing the same value as personal information
     */
    jQuery("#_qf_Main_upload-bottom").click(function(){
        //Copy values and assign to Billing and Name    
        var $checked = jQuery("#sameBilling").is(":checked");
        if($checked == false){
            fname = jQuery("#first_name").val();
            lname = jQuery("#last_name").val();
            street_address = jQuery("#"+street_add).val();
            house_number = jQuery("#addressee_custom").val();
            postal_code = jQuery("#postal_code-Primary").val();
            city = jQuery("#city-Primary").val();
            phone = jQuery("#phone-Primary-1").val();
            state = jQuery("#state_province-Primary").val();
            var council = jQuery("#"+council_dd).val();
            if(state == '' || state == null){
                state = '2250';
            }
            jQuery("#billing_first_name").val(fname);
            jQuery("#billing_last_name").val(lname);
            jQuery("#billing_street_address-5").val(street_address+" "+house_number);
            jQuery("#billing_city-5").val(city);
            jQuery("#billing_country_id-5").val('1082');
            jQuery("#billing_state_province_id-5").val(state);
            jQuery("#billing_postal_code-5").val(postal_code);
            
            if(jQuery("#CIVICRM_QFID_0_10").attr("checked")){
                jQuery.cookie("pledge", "Daily", {
                    expires: date
                });
            } else {
                jQuery.cookie("pledge", "Monthly", {
                    expires: date
                });
                var pledge_time = jQuery("#custom_pledge_frequency_unit").val();
                jQuery.cookie("pledge_time", pledge_time, {
                    expires: date
                });
            }
            jQuery.cookie("state", state, {
                expires: date
            });
            if(council != ""){
                jQuery.cookie("council", council, {
                    expires: date
                });
            }
        }
    });
    jQuery("#sameBilling").click(function(){
        var $checked = jQuery("#sameBilling").is(":checked");
        if($checked){
            jQuery("#donation-billing-name-section").show();
            /*************************Default values for Billing Name and Address   **********************/
            //            if(jQuery.trim(jQuery("#billing_first_name").val()) ==""){
            jQuery("#billing_first_name").val("First name");
            //            }
            //            if(jQuery.trim(jQuery("#billing_last_name").val()) ==""){
            jQuery("#billing_last_name").val("Last name");
            //            }
            //            if(jQuery.trim(jQuery("#billing_street_address-5").val()) ==""){
            jQuery("#billing_street_address-5").val("Street and housenumber");
            //            }
            //            if(jQuery.trim(jQuery("#billing_city-5").val()) ==""){
            jQuery("#billing_city-5").val("City");
            //            }
            //            if(jQuery.trim(jQuery("#billing_postal_code-5").val()) ==""){
            jQuery("#billing_postal_code-5").val("Postal code");
        //            }
        /*************************************************************************************************************/
        } else {
            jQuery("#donation-billing-name-section").hide();
        }
    });
    
    /* DEBIT CART FORM */
    //Default Values
    if(jQuery.trim(jQuery("#account_holder").val()) == ""){
        jQuery("#account_holder").val("Account holder");
    }
    if(jQuery.trim(jQuery("#bank_account_number").val()) == ""){
        jQuery("#bank_account_number").val("Account number");
    }
    if(jQuery.trim(jQuery("#bank_identification_number").val()) == ""){
        jQuery("#bank_identification_number").val("Bank code/number");
    }
    if(jQuery.trim(jQuery("#bank_name").val()) == ""){
        jQuery("#bank_name").val("Name of the bank");
    }
    
    // On focus blank the field
    jQuery('#account_holder').blur(function(){
        if(jQuery.trim(jQuery(this).val()) == ""){
            jQuery('#account_holder').val("Account holder")
        }
    });
    jQuery('#account_holder').focus(function(){
        if(jQuery.trim(jQuery('#account_holder').val()) == "Account holder"){
            jQuery('#account_holder').val("");
        }
    });
    
    jQuery('#bank_account_number').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#bank_account_number').val("Account number")
        }
    });
    jQuery('#bank_account_number').focus(function(){
        if(jQuery.trim(jQuery('#bank_account_number').val()) == "Account number"){
            jQuery('#bank_account_number').val("");
        }
    });

    jQuery('#bank_identification_number').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#bank_identification_number').val("Bank code/number")
        }
    });
    jQuery('#bank_identification_number').focus(function(){
        if(jQuery.trim(jQuery('#bank_identification_number').val()) == "Bank code/number"){
            jQuery('#bank_identification_number').val("");
        }
    });

    jQuery('#bank_name').blur(function(){
        if(jQuery.trim(jQuery(this).val()) == ""){
            jQuery('#bank_name').val("Name of the bank");
        }
    });
    jQuery('#bank_name').focus(function(){
        if(jQuery.trim(jQuery('#bank_name').val()) == "Name of the bank"){
            jQuery('#bank_name').val("");
        }
    });

    /* END DEBIT CART FORM*/


    /* CREDIT CART FORM */
    //Default Values
    jQuery("#credit_card_number").val("Card number");
    
    // On focus blank the field
    jQuery('#credit_card_number').blur(function(){
        if(jQuery.trim(jQuery(this).val()) ==""){
            jQuery('#credit_card_number').val("Card number")
        }
    });
    jQuery('#credit_card_number').focus(function(){
        if(jQuery.trim(jQuery('#credit_card_number').val()) == "Card number"){
            jQuery('#credit_card_number').val("");
        }
    });
    
    //    if(jQuery.cookie("state") !=""){
    //        jQuery("#state_province-Primary").val(jQuery.cookie("state"));
    //    } 
    
    jQuery('#email-5').blur(function(){
        if(jQuery.trim(jQuery("#email-5").val()) ==""){
            jQuery('#email-5').val("E-mail address");
        }
    });
    jQuery('#email-5').focus(function(){
        if(jQuery.trim(jQuery('#email-5').val()) == "E-mail address"){
            jQuery('#email-5').val("");
        }
    });
    /* END CREDIT CART FORM*/

    /*Replace all error spans with error image */
    jQuery("span.crm-error").removeClass("crm-error").html('<img src="'+Drupal.settings.basePath+'sites/all/modules/custom/civiCRM_setting/images/exclamation_red.png" width="16px" height="16px" alt="Reqired" />');
    jQuery(".crm-error-label").remove();
    
    
    var a = jQuery(".is_pledge-section .content").html().replace('&nbsp;installments.', '');
    var b = a.replace('&nbsp;for&nbsp;', '<select class="form-select" id="custom_pledge_frequency_unit"><option value="1month">month</option><option value="3months">three months</option><option value="6months">half a year</option><option value="1year">every year</option></select>');
    jQuery(".is_pledge-section .content").html(b);
    
    // To set month to 1 by default
    jQuery("#pledge_frequency_interval").val('1');
    jQuery("#pledge_frequency_interval").hide();
    // To set Installments value to 12 (Max in civicrm)
    jQuery("#pledge_installments").val('12');
    jQuery("#pledge_installments").hide();
    // To hide frequency unit (Month & Year)
    jQuery("#pledge_frequency_unit").hide();
    
    // To set pledge value after redirecting to new page from cookie.
    if(jQuery.cookie("pledge") =="Daily"){
        jQuery("#CIVICRM_QFID_0_10").attr("checked","checked");
    } else if(jQuery.cookie("pledge") =="Monthly"){
        jQuery("#CIVICRM_QFID_1_12").attr("checked","checked");
        jQuery("#custom_pledge_frequency_unit").val(jQuery.cookie("pledge_time"));
    }

    // To set value in frequency unit by changing custom select list.
    jQuery("#custom_pledge_frequency_unit").change(function(){
        jQuery("#CIVICRM_QFID_1_12").attr("checked","checked");
        switch(jQuery(this).val()){
            case '1month':
                jQuery("#pledge_frequency_interval").val('1');
                jQuery("#pledge_frequency_unit").val('month');
                break;
            case '3months':
                jQuery("#pledge_frequency_interval").val('3');
                jQuery("#pledge_frequency_unit").val('month');
                break;
            case '6months':
                jQuery("#pledge_frequency_interval").val('6');
                jQuery("#pledge_frequency_unit").val('month');
                break;
            case '1year':
                jQuery("#pledge_frequency_interval").val('1');
                jQuery("#pledge_frequency_unit").val('year');
                break;
        }
    });
//    jQuery("#credit_card_type").val("Visa");
//    jQuery("#credit_card_number").val("4111111111111111");
//    jQuery("#cvv2").val("111");
//    jQuery("#credit_card_exp_date[M]").val("1");
//    jQuery("#credit_card_exp_date[Y]").val("2013");
//
//    jQuery("#account_holder").val("Senders Name");
//    jQuery("#bank_account_number").val("3503007767");
//    jQuery("#bank_identification_number").val("10000000");
//    jQuery("#bank_name").val("Bundesbank");

});