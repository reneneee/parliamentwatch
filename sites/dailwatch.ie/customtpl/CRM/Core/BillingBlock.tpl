{*
+--------------------------------------------------------------------+
| CiviCRM version 4.1                                                |
+--------------------------------------------------------------------+
| Copyright CiviCRM LLC (c) 2004-2011                                |
+--------------------------------------------------------------------+
| This file is a part of CiviCRM.                                    |
|                                                                    |
| CiviCRM is free software; you can copy, modify, and distribute it  |
| under the terms of the GNU Affero General Public License           |
| Version 3, 19 November 2007 and the CiviCRM Licensing Exception.   |
|                                                                    |
| CiviCRM is distributed in the hope that it will be useful, but     |
| WITHOUT ANY WARRANTY; without even the implied warranty of         |
| MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.               |
| See the GNU Affero General Public License for more details.        |
|                                                                    |
| You should have received a copy of the GNU Affero General Public   |
| License and the CiviCRM Licensing Exception along                  |
| with this program; if not, contact CiviCRM LLC                     |
| at info[AT]civicrm[DOT]org. If you have questions about the        |
| GNU Affero General Public License or the licensing of CiviCRM,     |
| see the CiviCRM license FAQ at http://civicrm.org/licensing        |
+--------------------------------------------------------------------+
*}
<div class="crm-section">
    <div class="label2">{ts}Choose your method of payment{/ts}</div>
    <div class="clear"></div>
</div>
{if $paymentProcessor.billing_mode & 2 and !$hidePayPalExpress }
    <div class="crm-section">
        <div class="content"><input type="radio" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
    </div>
{else}
    {if $paymentProcessor.payment_type & 2}
        <div class="crm-section">
            <div class="content"><input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
        </div>
    {else}
        <div class="crm-section">
            <div class="content"><input type="radio" class="form-radio" name="payment_method" id="payment_1" value="payment_debit">&nbsp;Direct debit authorization&nbsp;&nbsp;&nbsp;<input type="radio" checked="checked" class="form-radio" name="payment_method" id="payment_2" value="payment_credit">&nbsp;Credit card&nbsp;&nbsp;<input type="radio" class="form-radio" name="payment_method" id="payment_3" value="paypal">Paypal</div>
        </div>
    {/if}
{/if}
<div class="crm-section">
    <div class="content"><div id="img-payment-processor-wait" style="display: none">{ts}Please wait...{/ts}</div></div>
</div>
{if $form.credit_card_number or $form.bank_account_number}
    <div id="payment_information">
        <fieldset class="billing_mode-group {if $paymentProcessor.payment_type & 2}direct_debit_info-group{else}credit_card_info-group{/if}">
            <legend>
                {if $paymentProcessor.payment_type & 2}
                    {ts}Direct Debit Information{/ts}
                {else}
                    {ts}Credit Card Information{/ts}
                {/if}
            </legend> 
            {if $paymentProcessor.billing_mode & 2 and !$hidePayPalExpress }
                <div class="crm-section no-label paypal_button_info-section">	
                    <div class="content description">
                        {ts}If you have a PayPal account, you can click the PayPal button to continue.{/ts}
                    </div>
                </div>
                <div class="crm-section no-label {$form.$expressButtonName.name}-section">	
                    <div class="content description">
                        {$form.$expressButtonName.html}
                    </div>
                </div>
            {/if} 

            {if $paymentProcessor.billing_mode & 1}
                <div class="crm-section billing_mode-section {if $paymentProcessor.payment_type & 2}direct_debit_info-section{else}credit_card_info-section{/if}">
                    {if $paymentProcessor.payment_type & 2}
                        <div class="crm-section {$form.account_holder.name}-section">	
                            <div class="content">{$form.account_holder.html}</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section {$form.bank_account_number.name}-section">	
                            <div class="content">{$form.bank_account_number.html}</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section {$form.bank_identification_number.name}-section">	
                            <div class="content">{$form.bank_identification_number.html}</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section {$form.bank_name.name}-section">	
                            <div class="content">{$form.bank_name.html}</div>
                            <div class="clear"></div> 
                        </div>
                    {else}
                        {if $paymentProcessor.billing_mode & 2 and !$hidePayPalExpress }
                        {else}
                            <div class="crm-section {$form.credit_card_type.name}-section">	
                                <div class="content">{$form.credit_card_type.html}</div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section {$form.credit_card_number.name}-section">	
                                <div class="content">{$form.credit_card_number.html}
                                </div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section {$form.cvv2.name}-section">	
                                <div class="content">
                                    {$form.cvv2.html}
                                    <img src="{$config->resourceBase}i/mini_cvv2.gif" alt="{ts}Security Code Location on Credit Card{/ts}" style="vertical-align: text-bottom;" />
                                </div>
                                <div class="clear"></div> 
                            </div>
                            <div class="crm-section {$form.credit_card_exp_date.name}-section">	
                                <div class="content">{$form.credit_card_exp_date.html}</div>
                                <div class="clear"></div>
                            </div>
                        {/if}
                    {/if}
                </div>
            </fieldset>

            {if $paymentProcessor.billing_mode & 2 and !$hidePayPalExpress }
            {else}
                <div class="crm-section sameBilling-section">
                    <div class="label"><label for="sameBilling"></label></div>
                    <div>{ts}billing address differs from my personal address{/ts}</div>
                    <div class="content">
                        <input type="checkbox" name="sameBilling" id="sameBilling"/>
                    </div>
                    <div class="clear"></div>
                </div>
            {/if}
            <div id="donation-billing-name-section">
                <fieldset class="billing_name_address-group">
                    <legend>{ts}Billing Name and Address{/ts}</legend>
                    <div class="crm-section billing_name_address-section">
                        <div class="crm-section billingNameInfo-section">	
                            <div class="content description">
                                {if $paymentProcessor.payment_type & 2}
                                    {ts}Enter the name of the account holder, and the corresponding billing address.{/ts}
                                {else}
                                    {ts}Enter the name as shown on your credit or debit card, and the billing address for this card.{/ts}
                                {/if}
                            </div>
                        </div>
                        <div class="crm-section {$form.billing_first_name.name}-section">	
                            <div class="content">{$form.billing_first_name.html}</div>
                            <div class="clear"></div> 
                        </div>
                        <div class="crm-section {$form.billing_last_name.name}-section">	
                            <div class="content">{$form.billing_last_name.html}</div>
                            <div class="clear"></div> 
                        </div>
                        {assign var=n value=billing_street_address-$bltID}
                        <div class="crm-section {$form.$n.name}-section">	
                            <div class="content">{$form.$n.html}</div>
                            <div class="clear"></div> 
                        </div>
                        {assign var=n value=billing_city-$bltID}
                        <div class="crm-section {$form.$n.name}-section">	
                            <div class="content">{$form.$n.html}</div>
                            <div class="clear"></div> 
                        </div>
                        {assign var=n value=billing_country_id-$bltID}
                        <div class="crm-section {$form.$n.name}-section">	
                            <div class="content">{$form.$n.html|crmReplace:class:big}</div>
                            <div class="clear"></div> 
                        </div>
                        {assign var=n value=billing_state_province_id-$bltID}
                        <div class="crm-section {$form.$n.name}-section">	
                            <div class="content">{$form.$n.html|crmReplace:class:big}</div>
                            <div class="clear"></div> 
                        </div>
                        {assign var=n value=billing_postal_code-$bltID}
                        <div class="crm-section {$form.$n.name}-section">	
                            <div class="content">{$form.$n.html}</div>
                            <div class="clear"></div> 
                        </div>
                    </div>
                </fieldset>
            </div>
        {else}
        </fieldset>
    {/if}
</div>
{/if}
