<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Provider Enrollment Form</title>

        <style type="text/css">
            .text{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 8pt;
            }

            .text-medium{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 10pt;
            }

            .text-large{
                font-family: Arial, Helvetica, sans-serif;
                font-size: 22pt;
            }

            .text-bold{
                font-weight: bold;
            }

            .text-italize{
                font-style: italic;
            }

            .text-underline{
                text-decoration: underline;
            }

            .text-pull-right{
                text-align: right;
            }

            .text-pull-center{
                text-align: center;
            }

            .text-color-green{
                color: rgb(0, 176, 80);
            }

            .text-color-red{
                color: red;
            }

            .border-all{
                border: 1px solid black;
            }

            .page-break {
                page-break-after: always;
            }

            @media  print {
                .header{
                    width: 100%;
                    display: block;
                    position: fixed;
                    padding-top: 0px;
                }
            }

            @page    { margin: 2mm; }
        </style>
    </head>
    <body>
        <div class="header">
        	<img style="width:25%; float:left; margin-left: 50px; margin-top: 10px;" src="{{ url('assets/img/logo-amaphil-350.png') }}"/>
        	<div style="width:50%; float:right; margin-right: 55px; padding-top:10px; text-align: right;">
        		<span class="text text-bold">Advance Medical Access Inc.</span><br/>
        		<span class="text">Unit 304, Aralco Bldg. 820 JP Rizal St. Brgy. Poblacion, Makati City</span><br>
                <span class="text">(02) 809-5360 | (02) 809-5370</span><br>
                {{-- <span class="text">info@amaphil.com.ph</span><br> --}}
                <span class="text">www.amaphil.com.ph</span><br>
                {{-- <span class="text">Date: <span class="text-bold">Feb 21, 2018</span></span> --}}
        	</div>
        </div>

        <table style="width: 100%; border-collapse: collapse; padding-top: 100px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; color: white; background-color: rgb(38,194,129); padding: 5px;">
                    <span class="text-medium text-bold">PROVIDER ENROLLMENT FORM</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td width="25%">
                    <span class="text text-bold">REGISTERED PROVIDER NAME: </span>
                </td>
                <td width="75%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold; adding: 5px;">
                    <span class="text">{{ $provider->name }}</span>
                </td>
            </tr>
            <tr>
                <td width="25%">
                    <span class="text text-bold">COMPLETE ADDRESS: </span>
                </td>
                <td width="75%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold; padding: 5px;">
                    <span class="text">{{ $provider->completeBusinessAddress() }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td width="10%">
                    <span class="text text-bold">REGION: </span>
                </td>
                <td width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold; padding: 5px;">
                    <span class="text">{{ optional($provider->addressRegion)->region }}</span>
                </td>
                <td width="20%" align="right">
                    <span class="text text-bold">PROVIDER TYPE: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold; padding: 5px;">
                    <span class="text">{{ strtoupper($provider->business_type) }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 2px solid rgb(38,194,129);">
                    <span class="text-medium text-bold text-italize">CONTACT DETAILS</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">HMO/INDUSTRIAL DEPARTMENT</span> </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Contact Person: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->name }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Designation: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->designation }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;c. Landline No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->telephone_no }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;d. Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;e. Email Address: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->email }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;f. Fax No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'HMO / Industrial')->first())->fax_no }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">ADMITTING DEPARTMENT</span> </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Contact Person: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->name }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Designation: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->designation }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;c. Landline No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->telephone_no }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;d. Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;e. Email Address: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->email }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;f. Fax No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Admitting')->first())->fax_no }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">EMERGENCY DEPARTMENT</span> </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Contact Person: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->name }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Designation: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->designation }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;c. Landline No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->telephone_no }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;d. Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;e. Email Address: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->email }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;f. Fax No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Emergency')->first())->fax_no }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">BILLING DEPARTMENT</span> </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Contact Person: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->name }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Designation: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->designation }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;c. Landline No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->telephone_no }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;d. Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;e. Email Address: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->email }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;f. Fax No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Billing')->first())->fax_no }}</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">CREDIT AND COLLECTION DEPARTMENT</span> </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Contact Person: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->name }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Designation: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->designation }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;c. Landline No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->telephone_no }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;d. Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;e. Email Address: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->email }}</span>
                </td>
                <td width="20%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;f. Fax No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ optional($provider->providerContactPersons->where('department', 'Credit and Collection')->first())->fax_no }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 2px solid rgb(38,194,129);">
                    <span class="text-medium text-bold text-italize">SIGNATORIES</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="4"><span class="text text-underline text-bold">SIGNATORIES</span> </td>
            </tr>
            <tr>
                <td width="10%">
                    <span class="text">Name: </span>
                </td>
                <td width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->signatory_left_name }}</span>
                </td>
                <td width="15%">
                    <span class="text">Designation: </span>
                </td>
                <td width="35%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->signatory_left_designation }}</span>
                </td>
            </tr>
            <tr>
                <td valign="bottom" width="10%">
                    <span class="text">Name: </span>
                </td>
                <td valign="bottom" width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->signatory_right_name }}</span>
                </td>
                <td valign="bottom" width="15%">
                    <span class="text">Designation: </span>
                </td>
                <td valign="bottom" width="35%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->signatory_right_designation }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 2px solid rgb(38,194,129);">
                    <span class="text-medium text-bold text-italize">PAYMENT TERMS</span>
                </td>
            </tr>
        </table>

        <table style="width: 80%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td width="25%">
                    <span class="text text-bold">PROVIDER TIN: </span>
                </td>
                <td width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->tin }}</span>
                </td>
                <td width="20%">
                    <span class="text">Tax Exempt? </span>
                </td>
                <td width="15%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->tax_exempt ? "YES" : "NO" }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td colspan="2"><span class="text text-underline text-bold">BANK DETAILS:</span> </td>
            </tr>
            <tr>
                <td width="30%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;a. Corporate Account Name: </span>
                </td>
                <td width="70%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->bank_account_name }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td width="15%">
                    <span class="text">&nbsp;&nbsp;&nbsp;&nbsp;b. Account No: </span>
                </td>
                <td width="25%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->bank_account_no }}</span>
                </td>
                <td width="25%" align="right">
                    <span class="text">Bank Name and Branch: </span>
                </td>
                <td width="35%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->bank_name }}, {{ $provider->bank_branch }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 80%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td width="40%">
                    <span class="text text-bold">PAYMENT TERMS: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ ($provider->payment_terms) ? $provider->payment_terms . " Days" : "" }}</span>
                </td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="40%">
                    <span class="text text-bold">SUBMISSION OF CLAIMS: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ ($provider->submission_of_claims) ? $provider->submission_of_claims . " Days" : "" }}</span>
                </td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="40%">
                    <span class="text text-bold">HOSPITAL SETUP: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ strtoupper($provider->payment_setup) }}</span>
                </td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="40%">
                    <span class="text text-bold">WITH PROMPT PAYMENT DISCOUNT? </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ ($provider->prompt_payment_discount) ? "YES" : "NO" }}</span>
                </td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
            <tr>
                <td width="40%">
                    <span class="text text-bold">PPD RATE: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ ($provider->prompt_payment_discount_rate) ? $provider->prompt_payment_discount_rate . "%" : "" }}</span>
                </td>
                <td width="15%"></td>
                <td width="15%"></td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                {{-- left --}}
                <td valign="top" width="60%">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
                        <tr>
                            <td class="text-pull-center" style="color: white; background-color: rgb(38,194,129);">
                                <span class="text ">IN-PATIENT / OPD-OR</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-pull-center">
                                @if ($provider->ip_opd_or_whole)
                                    <span class="text">Whole{{ ($provider->ip_opd_or_whole_through) ? "(" . $provider->ip_opd_or_whole_through . ")" : ""}}</span>
                                @elseif ($provider->ip_opd_or_split_hb_hospital)
                                    <span class="text">Split HB{{ ($provider->ip_opd_or_split_hb_hospital) ? "(" . $provider->ip_opd_or_split_hb_hospital_through . ")" : ""}}</span> |
                                    <span class="text">Split PF{{ ($provider->ip_opd_or_split_pf_doctor) ? "(" . $provider->ip_opd_or_split_pf_doctor_through . ")" : ""}}</span>
                                @else
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 10px;">
                        <tr>
                            <td class="text-pull-center" style="color: white; background-color: rgb(38,194,129);">
                                <span class="text ">EMERGENCY</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-pull-center">
                                @if ($provider->emergency_paid_to_hospital_through)
                                    <span class="text">Paid to Hospital({{ $provider->emergency_paid_to_hospital_through }})</span>
                                @else
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table style="width: 100% border-collapse: collapse;">
                        <tr>
                            <td>
                                <span class="text text-bold">If Check Delivery, please specify the Contact Person and Department:</span>
                            </td>
                        </tr>
                        <tr>
                            <td style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                                <span class="text">
                                    @if ($provider->check_delivery_contact_person)
                                        {{ $provider->check_delivery_contact_person }}

                                        @if ($provider->check_delivery_contact_no)
                                            {{", " . $provider->check_delivery_contact_no }}

                                            @if ($provider->check_delivery_department)
                                                {{", " . $provider->check_delivery_department }}
                                            @endif
                                        @endif
                                    @else
                                        &nbsp;
                                    @endif
                                </span>
                            </td>
                        </tr>
                    </table>
                </td>
                {{-- right --}}
                <td valign="top" width="40%">
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black;">
                        <tr>
                            <td class="text-pull-center" style="color: white; background-color: rgb(38,194,129);">
                                <span class="text ">OUT PATIENT - CONSULT / REFERRAL</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-pull-center">
                                @if ($provider->op_consult_referral_paid_to_hospital)
                                    <span class="text">Paid to Hospital{{ ($provider->op_consult_referral_paid_to_hospital_through) ? "(" . $provider->op_consult_referral_paid_to_hospital_through . ")" : ""}}</span>
                                @elseif ($provider->op_consult_referral_paid_to_doctor)
                                    <span class="text">Paid to Doctor{{ ($provider->op_consult_referral_paid_to_doctor_through) ? "(" . $provider->op_consult_referral_paid_to_doctor_through . ")" : ""}}</span>
                                @else
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 10px;">
                        <tr>
                            <td class="text-pull-center" style="color: white; background-color: rgb(38,194,129);">
                                <span class="text ">OUT PATIENT - LAB / APE / FACILITY FEE</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-pull-center">
                                @if ($provider->op_lab_ape_facility_fee_paid_to_hospital_through)
                                    <span class="text">Paid to Hospital({{ $provider->op_lab_ape_facility_fee_paid_to_hospital_through }})</span>
                                @else
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                    <table style="width: 100%; border-collapse: collapse; border: 1px solid black; margin-top: 10px;">
                        <tr>
                            <td class="text-pull-center" style="color: white; background-color: rgb(38,194,129);">
                                <span class="text ">CLINIC SETTING</span>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-pull-center">
                                @if ($provider->clinic_setting_paid_to_hospital)
                                    <span class="text">Paid to Hospital{{ ($provider->clinic_setting_paid_to_hospital_through) ? "(" . $provider->clinic_setting_paid_to_hospital_through . ")" : ""}}</span>
                                @elseif ($provider->clinic_setting_paid_to_doctor)
                                    <span class="text">Paid to Doctor{{ ($provider->clinic_setting_paid_to_doctor_through) ? "(" . $provider->clinic_setting_paid_to_doctor_through . ")" : ""}}</span>
                                @else
                                    &nbsp;
                                @endif
                            </td>
                        </tr>
                    </table>
                </td>
            </tr>
        </table>

        <div style="margin-left: 50px; margin-right: 50px;">
            <p class="text">
                1. PROFESSIONAL FEES: <br>

            </p>
        </div>

        <table style="width: 100%; border-collapse: collapse; padding-left: 70px; padding-right: 50px;">
            <tr>
                <td colspan="4">
                    <span class="text">a. With Medical Coordinator or (MC)? @if($provider->with_mc) <span class="text-bold">Yes</span> @else <span class="text-bold">No</span> @endif
                    MC IP Fee: @if($provider->with_mc) <span class="text-bold text-underline">{{ $provider->mc_ip_fee }}</span> @else <span class="text-bold text-underline">N/A</span> @endif
                    MC OP Fee: @if($provider->with_mc) <span class="text-bold text-underline">{{ $provider->mc_op_fee }}</span> @else <span class="text-bold text-underline">N/A</span> @endif</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">b. Name of Doctor: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_name }}</span>
                </td>
                <td width="10%" align="right">
                    <span class="text">Specialization: </span>
                </td>
                <td width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_specialization }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp; &nbsp; Doctor's Mobile No: </span>
                </td>
                <td width="30%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_contact_no }}</span>
                </td>
                <td width="10%" align="right">
                    <span class="text">Room No: </span>
                </td>
                <td width="40%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_room_no }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp; &nbsp; Clinic Hours: </span>
                </td>
                <td colspan="3" width="80%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_clinic_hours }}</span>
                </td>
            </tr>
            <tr>
                <td width="20%">
                    <span class="text">&nbsp; &nbsp; Name of Secretary: </span>
                </td>
                <td colspan="3" width="80%" style="border: 1px solid black; border-right: 0px; border-left: 0px; border-top: 0px font-weight: bold;">
                    <span class="text">{{ $provider->mc_secretary_name }}</span>
                </td>
            </tr>
            <tr>
                <td colspan="4">
                    <span class="text">c. PF Rates: </span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-left: 70px; padding-right: 50px;">
            <tr>
                <td class="text-pull-center">
                    <span class="text text-bold">IN-PATIENT PF RATES:</span>
                </td>
                <td class="text-pull-center">
                    <span class="text text-bold">OUT-PATIENT RATES:</span>
                </td>
            </tr>
        </table>
        <table style="width: 100%; border-collapse: collapse; padding-left: 85px; padding-right: 70px;">
            <tr>
                <td>
                    <span class="text">Ward: <span class="text-underline">{{ $provider->ip_rates_ward ? "P " . $provider->ip_rates_ward : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" }}</span></span>
                </td>
                <td>
                    <span class="text">Suite: <span class="text-underline">{{ $provider->ip_rates_suite ? "P " . $provider->ip_rates_suite : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" }}</span></span>
                </td>
                <td>
                    <span class="text">PCP: <span class="text-underline">{{ $provider->op_rates_pcp ? "P " . $provider->op_rates_pcp : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" }}</span></span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="text">Semi-Private: <span class="text-underline">{{ $provider->ip_rates_semi_private ? "P " . $provider->ip_rates_semi_private : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;"}}</span></span>
                </td>
                <td>
                    <span class="text">ICU: <span class="text-underline">{{ $provider->ip_rates_icu ? "P " . $provider->ip_rates_icu : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" }}</span></span>
                </td>
                <td>
                    <span class="text">Specialist: <span class="text-underline">{{ $provider->op_rates_specialist ? "P " . $provider->op_rates_specialist : "&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;" }}</span></span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 2px solid rgb(38,194,129);">
                    <span class="text-medium text-bold text-italize">INTERNET CONNECTIVITY</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td>
                    <span class="text text-bold">Internet Access:</span>
                    <span class="text">
                        <input type="checkbox" name="vehicle" value="Bike" @if($provider->internet_access_industrial) checked @endif style="margin-top: 7px;"> Industrial Department
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike" @if($provider->internet_access_billing) checked @endif style="margin-top: 7px;"> Billing Department
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike" @if($provider->internet_access_emergency) checked @endif style="margin-top: 7px;"> Emergency
                    </span>
                </td>
            </tr>
            <tr>
                <td>
                    <span class="text text-bold">Areas with Free WiFi:</span>
                    <span class="text">
                        <input type="checkbox" name="vehicle" value="Bike" @if ($provider->free_wifi_industrial_hmo) checked @endif style="margin-top: 7px;"> Industrial/HMO Department
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike" @if ($provider->free_wifi_ip_rooms) checked @endif style="margin-top: 7px;"> Hospital In-patient Rooms
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike" @if ($provider->free_wifi_emergency) checked @endif style="margin-top: 7px;"> Emergency
                        &nbsp;&nbsp;&nbsp;&nbsp;<input type="checkbox" name="vehicle" value="Bike" @if ($provider->free_wifi_mab) checked @endif style="margin-top: 7px;"> MAB
                    </span>
                </td>
            </tr>
        </table>
    </body>
</html>
