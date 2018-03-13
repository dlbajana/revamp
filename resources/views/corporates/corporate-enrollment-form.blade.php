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
                border: 1px solid gray;
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
                    <span class="text-medium text-bold">CORPORATE ENROLLMENT FORM</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">CORPORATE NAME</span>
                </td>
                <td height="15" colspan="3" style="width: 75%;border: 1px dotted gray; border-bottom: 0px; border-left: 0px;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->name }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" colspan="2" style="width: 50%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">CORPORATE NAME TO APPEAR IN CARD</span>
                </td>
                <td height="15" colspan="2" style="width: 50%; border: 1px dotted gray; border-bottom: 0px; border-left: 0px;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->card_name }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">INDUSTRY</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ ($corporate->industry != "Others") ? $corporate->industry : $corporate->industry_others  }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">PREVIOUS HMO / TPA</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;"></td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">CORPORATE INFORMATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">CONTACT NAME</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_name }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">DESIGNATION</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_designation }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">TEL. NO.</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_telephone_no }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">MOBILE NO.</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_mobile_no }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">EMAIL ADDRESS</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_email }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">EMAIL RECIPIENT (HR)</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->hr_email }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">COMPANY ADDRESS</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->completeBusinessAddress() }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">BILLING ADDRESS</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->completeBillingAddress() }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">BUSINESS LANDLINE</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_telephone_no }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">FAX NO.</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->contact_person_fax_no }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">POLICY INFORMATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">EFFECTIVE DATE</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->date_effectivity_from->toFormattedDateString() }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">EXPIRY DATE</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->date_expiry->toFormattedDateString() }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">ACCEPTANCE AGE</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->acceptance_age }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">TERMINATION AGE</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->termination_age }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">PHILHEALTH NO</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->philhealth_no }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">BANK ACCOUNT NAME</span>
                </td>
                <td height="15" colspan="3" style="width: 75%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->bank_account_name }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">BANK ACCOUNT NO</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->bank_account_no }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">BANK BRANCH</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">{{ $corporate->bank_branch }}</span>
                </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">CASH BOND</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;" align="right">
                    <span class="text" style="padding-right: 15px;">{{ $corporate->cash_bond }}</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;">
                    <span class="text" style="padding-left: 15px;">REVOLVING FUND</span>
                </td>
                <td height="15" style="width: 25%; border: 1px dotted gray;" align="right">
                    <span class="text" style="padding-right: 15px;">{{ $corporate->revolving_fund }}</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">BENEFIT INFORMATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td colspan="4" align="center">
                    <img style="width: 200; margin: 5px;" src="{{ url('assets/img/see-attached-benefits.png') }}"/>
                </td>
            </tr>
        </table>

        <div class="page-break"></div>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">BENEFIT INFORMATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">PLAN CODE</span> </td>
                <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px;"><span class="text text-bold">COVERAGE CODE</span> </td>
                <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">BENEFIT</span> </td>
                <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">BENEFIT AMOUNT</span> </td>
            </tr>
           <tr>
               <td colspan="4" align="center" style="padding: 5px;"><span class="text">*** No Benefit Plan and Coverage ***</span> </td>
           </tr>

        </table>
    </body>

</html>
