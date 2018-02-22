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
                    <span class="text-medium text-bold">MEDICAL DOCTOR ACCREDITATION FORM</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">I. BASIC INFORMATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" colspan="2" style="width: 33%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">LAST NAME</span> </td>
                <td height="15" colspan="2" style="width: 32%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">GIVEN NAME</span> </td>
                <td height="15" style="width: 35%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">FULL MAIDEN NAME</span> </td>
            </tr>
            <tr>
                <td height="15" colspan="2" style="width: 33%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->last_name }}</span> </td>
                <td height="15" colspan="2" style="width: 32%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->first_name }}</span> </td>
                <td height="15" style="width: 35%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->middle_name }}</span> </td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">BIRTHDAY (MM/DD/YY)</span> </td>
                <td height="15" style="width: 8%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">GENDER</span></td>
                <td height="15" style="width: 7%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">AGE</span></td>
                <td height="15" style="width: 25%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">CIVIL STATUS</span></td>
                <td height="15" style="width: 35%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">FULL MOTHER'S MAIDEN NAME</span></td>
            </tr>
            <tr>
                <td height="15" style="width: 25%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->birthday->toFormattedDateString() }}</span> </td>
                <td height="15" style="width: 8%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ strtoupper($physician->gender) }}</span></td>
                <td height="15" style="width: 7%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->birthday->age }}</span></td>
                <td height="15" style="width: 25%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ strtoupper($physician->civil_status) }}</span></td>
                <td height="15" style="width: 35%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->mothers_maiden_name }}</span></td>
            </tr>
        </table>
        <table style="width: 100%; border: 1px solid gray; border-top: 0px; border-collapse: collapse; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px; border-top: 0px;"><span class="text" style="padding-left: 15px;">HOME ADDRESS</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px; border-top: 0px;"><span class="text" style="padding-left: 15px;">PROVINCIAL ADDRESS</span> </td>
            </tr>
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px; padding-left: 15px;"><span class="text">{{ $physician->completeHomeAddress() }}</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px; padding-left: 15px;"><span class="text">{{ $physician->completeProvincialAddress() }}</span></td>
            </tr>
            <tr>
                <td height="15" colspan="2" style="width: 50%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">Type of Doctor / Specialization(s)</span> </td>
            </tr>
            <tr>
                <td height="15" colspan="2" style="width: 50%; border: 1px solid gray; border-top:0px;">
                    <span class="text" style="padding-left: 15px;">
                        {{ optional($physician->specialization)->specialization_name }}, {{ optional($physician->subSpecialization)->subspecialization_name }}
                    </span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">II. CONTACT DETAILS</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">TIN NUMBER</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">SSS / GSIS NUMBER</span> </td>
            </tr>
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->tin }}</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->sss_no }}</span></td>
            </tr>
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">PRC LICENSE</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-bottom: 0px;"><span class="text" style="padding-left: 15px;">PRC VALIDITY DATE</span> </td>
            </tr>
            <tr>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->prc_license_no }}</span> </td>
                <td height="15" style="width: 50%; border: 1px solid gray; border-top: 0px;"><span class="text" style="padding-left: 15px;">{{ $physician->prc_validity_date->toFormattedDateString() }}</span></td>
            </tr>
        </table>

        <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
            <tr>
                <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                    <span class="text text-bold text-italize">III. PROVIDER AFFILIATION</span>
                </td>
            </tr>
        </table>

        <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
            <tr>
                <td height="15" align="center" style="border: 1px solid gray; border-right: 0px;"><span class="text">HOSPITAL / CLINIC NAME</span> </td>
                <td height="15" align="center" style="border: 1px solid gray; border-left: 0px; border-right: 0px;"><span class="text">ADDRESS</span> </td>
                <td height="15" align="center" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px;"><span class="text">CONTACT NO</span> </td>
                <td height="15" align="center" style="width: 20%; border: 1px solid gray; border-left: 0px;"><span class="text">CLINIC SCHEDULE</span> </td>
            </tr>
            <tr>
                <td colspan="4" align="center">
                    <img style="width: 200; margin: 5px;" src="{{ url('assets/img/see-attached-provider-affiliates.png') }}"/>
                </td>
            </tr>
        </table>
        <p class="text" style="margin-left: 50px; margin-right: 50px;">
            &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; I hereby attest that all above information are true and correct to my own knowledge. I hereby authorize Advanced Medical Access Philippines, Inc.
             to validate any of the above given information from whatever source it may consider appropriate. Any misrepresentation or parody on the above information shall constitute a
             just grounds for the rejection of my application or the termination of my contract with the Company.
         </p>

         <table style="width: 100%; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
             <tr>
                 <td height="15" style="width: 70%;"></td>
                 <td height="15" style="width: 30%; border: 1px solid black; border-top: 0px; border-left: 0px; border-right: 0px;">&nbsp;</td>
             </tr>
             <tr>
                 <td height="15" style="width: 70%;"></td>
                 <td height="15" style="width: 30%; border: 1px solid black; border-bottom: 0px; border-left: 0px; border-right: 0px;" align="center"><span class="text text-bold">Signature of Applicant</span> </td>
             </tr>
         </table>

         <table style="width: 100%; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
             <tr>
                 <td height="15" align="right" style="width: 75%"><span class="text">Date: </span></td>
                 <td height="15" style="width: 25%; border: 1px solid black; border-top:0px; border-left: 0px; border-right: 0px;"></td>
             </tr>
         </table>

         <div class="page-break"></div>

         <table style="width: 100%; border-collapse: collapse; border: 1px solid rgb(38,194,129); padding-top: 10px; padding-left: 50px; padding-right: 50px;">
             <tr>
                 <td style="text-align: center; padding: 5px; border: 1px solid rgb(38,194,129);">
                     <span class="text text-bold text-italize">PROVIDER AFFILIATION</span>
                 </td>
             </tr>
         </table>

         <table style="width: 100%; border: 1px solid gray; border-collapse: collapse; padding-left: 50px; padding-right: 50px; padding-top: 5px;">
             <tr>
                 <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">PROVIDER CODE</span> </td>
                 <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px;"><span class="text text-bold">PROVIDER NAME</span> </td>
                 <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">LOCATION</span> </td>
                 <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text text-bold">CONTACT NO.</span> </td>
             </tr>
             @if ($physician->providers->count() > 0)
                 @foreach ($physician->providers as $key => $provider)
                     <tr>
                         <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text">{{ sprintf('%06d', $provider->id) }}</span> </td>
                         <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text">{{ $provider->name }}</span> </td>
                         <td height="15" align="left" style="border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text">{{ $provider->completeBusinessAddress() }}</span> </td>
                         <td height="15" align="left" style="width: 20%; border: 1px solid gray; border-left: 0px; border-right: 0px; padding-left: 15px;"><span class="text">{{ optional($provider->providerContactPersons->first())->telephone_no }}</span> </td>
                     </tr>
                 @endforeach
             @else
                <tr>
                    <td colspan="4" align="center" style="padding: 5px;"><span class="text">*** No Affiliated Provider ***</span> </td>
                </tr>
             @endif

         </table>
    </body>
</html>
