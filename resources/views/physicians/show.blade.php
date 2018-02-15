@extends('layouts.main')

@section('nav_physicians')
    current_section
@endsection

@section('breadcrumbs')
    <div id="top_bar">
        <ul id="breadcrumbs">
            <li><a href="{{ route('physicians.index') }}">Physicians</a></li>
            <li><span>{{ $physician->fullName() }}</span> </li>
        </ul>
    </div>
@endsection

@section('page-content')
    <h4 class="heading_b uk-margin-bottom">Physicians</h4>
    <div class="md-card">
        <div class="user_heading">
            <div class="user_heading_menu hidden-print">
                <div class="uk-display-inline-block" data-uk-dropdown="{post:'left-top'}">
                    <i class="md-icon material-icons md-icon-light">&#xE5D4;</i>
                    <div class="uk-dropdown uk-dropdown-small">
                        <ul class="uk-nav">
                            <li>
                                <a href="#" data-uk-modal="{target:'#modal_update_status'}">Actions</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class="uk-display-inline-block"><i class="md-icon md-icon-light material-icons" id="page_print">&#xE8ad;</i></div>
            </div>
            <div class="user_heading_avatar">
                <div class="thumbnail">
                    <img src="/assets/img/clipart_nurse.png"/>
                </div>
            </div>
            <div class="user_heading_content">
                <h2 class="heading_b uk-margin-bottom">
                    <span class="uk-text-truncate">[{{ sprintf('%06d', $physician->id) }}] {{ $physician->fullName() }}</span>
                    <span class="sub-heading">{{ $physician->home_address }}</span>
                </h2>
                <ul class="user_stats">
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Providers</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Transactions</span></h4>
                    </li>
                    <li>
                        <h4 class="heading_a">0 <span class="sub-heading">Claims</span></h4>
                    </li>
                </ul>
            </div>
            <a class="md-fab md-fab-small md-fab-accent hidden-print" href="{{ route('physicians.edit', $physician->id) }}"><i class="material-icons">&#xE150;</i></a>
        </div>
        <div class="user_content">
            <ul id="user_profile_tabs" class="uk-tab" data-uk-tab="{connect:'#user_profile_tabs_content', animation:'slide-horizontal'}">
                <li class="uk-active"><a href="#">Details</a></li>
                <li><a href="#">Providers</a></li>
                <li><a href="#">Logs</a></li>
            </ul>
            <ul id="user_profile_tabs_content" class="uk-switcher uk-margin">
                <li>
                    <h3 class="full_width_in_card heading_c uk-margin-small-top">
                        Information
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-medium-3-10">
                            <label>First Name</label>
                            <input type="text" value="{{ $physician->first_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-3-10">
                            <label>Middle Name</label>
                            <input type="text" value="{{ $physician->middle_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-3-10">
                            <label>Last Name</label>
                            <input type="text" value="{{ $physician->last_name }}" readonly class="md-input label-fixed"/>
                        </div>
                        <div class="uk-width-medium-1-10">
                            <label>Suffix</label>
                            <input type="text" value="{{ $physician->suffix }}" readonly class="md-input label-fixed"/>
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Mother's Full Maiden Name</label>
                            <input type="text" value="{{ $physician->mothers_maiden_name }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-4">
                            <label>Nationality</label>
                            <input type="text" value="{{ strtoupper($physician->nationality) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Civil Status</label>
                            <input type="text" value="{{ strtoupper($physician->civil_status) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Birthday</label>
                            <input type="text" value="{{ optional($physician->birthday)->toFormattedDateString() }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-4">
                            <label>Gender</label>
                            <input type="text" value="{{ strtoupper($physician->gender) }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>Accreditation Status</label>
                            <input type="text" value="{{ strtoupper($physician->accreditation_status) }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Suspected Fraud</label>
                            <input type="text" value="{{ $physician->suspected_fraud ? "YES" : "NO" }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Specialization</label>
                            <input type="text" value="{{ $physician->specialization->specialization_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Sub Specialization</label>
                            <input type="text" value="{{ $physician->subSpecialization->subspecialization_name }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Contact Details</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-3">
                            <label>Email</label>
                            <input type="text" value="{{ $physician->email }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Mobile Number</label>
                            <input type="text" value="{{ $physician->mobile_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>Landline Number</label>
                            <input type="text" value="{{ $physician->telephone_no }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Bank Details</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Account Name</label>
                            <input type="text" value="{{ $physician->bank_account_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Account Number</label>
                            <input type="text" value="{{ $physician->bank_account_number }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>Bank Name</label>
                            <input type="text" value="{{ $physician->bank_name }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>Bank Branch</label>
                            <input type="text" value="{{ $physician->bank_branch }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">PHIC Accreditation</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation Start Date</label>
                            <input type="text" value="{{ optional($physician->phic_accreditation_from)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                        <div class="uk-width-1-2">
                            <label>PHIC Accreditation End Date</label>
                            <input type="text" value="{{ optional($physician->phic_accreditation_to)->toFormattedDateString() }}" readonly class="md-input label-fixed" />
                        </div>
                    </div>
                    <h3 class="heading_c uk-margin-medium-top uk-text-success uk-text-italic">Address</h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Home Address</label>
                            <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $physician->home_address }}</textarea>
                        </div>
                        <div class="uk-width-1-1 uk-margin-medium-top">
                            <label>Provincial Address</label>
                            <textarea cols="30" rows="2" class="md-input label-fixed" readonly>{{ $physician->provincial_address }}</textarea>
                        </div>
                    </div>
                    <h3 class="full_width_in_card heading_c uk-margin-medium-top">
                        License
                    </h3>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Tax Identification Number</label>
                            <input type="text" value="{{ $physician->tin }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-2">
                            <label>SSS / GSIS Number</label>
                            <input type="text" value="{{ $physician->sss_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-2">
                            <label>PhilHealth Number</label>
                            <input type="text" value="{{ $physician->philhealth_no }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-2-3">
                            <label>PRC License Number</label>
                            <input type="text" value="{{ $physician->prc_license_no }}" readonly class="md-input label-fixed">
                        </div>
                        <div class="uk-width-1-3">
                            <label>PRC Validity Date</label>
                            <input type="text" value="{{ optional($physician->prc_validity_date)->toFormattedDateString() }}" readonly class="md-input label-fixed">
                        </div>
                    </div>
                    <div class="uk-grid">
                        <div class="uk-width-1-1">
                            <label>Remarks</label>
                            <textarea rows="2" cols="30" class="md-input label-fixed" readonly>{{ $physician->remarks }}</textarea>
                        </div>
                    </div>
                </li>
                <li>
                    <table id="dt_scroll" class="uk-table" cellspacing="0" width="100%">
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </thead>

                        <tfoot>
                        <tr>
                            <th>Name</th>
                            <th>Position</th>
                            <th>Office</th>
                            <th>Age</th>
                            <th>Start date</th>
                            <th>Salary</th>
                        </tr>
                        </tfoot>

                        <tbody>
                        <tr>
                            <td>Tiger Nixon</td>
                            <td>System Architect</td>
                            <td>Edinburgh</td>
                            <td>61</td>
                            <td>2011/04/25</td>
                            <td>$320,800</td>
                        </tr>
                        <tr>
                            <td>Garrett Winters</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>63</td>
                            <td>2011/07/25</td>
                            <td>$170,750</td>
                        </tr>
                        <tr>
                            <td>Ashton Cox</td>
                            <td>Junior Technical Author</td>
                            <td>San Francisco</td>
                            <td>66</td>
                            <td>2009/01/12</td>
                            <td>$86,000</td>
                        </tr>
                        <tr>
                            <td>Cedric Kelly</td>
                            <td>Senior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2012/03/29</td>
                            <td>$433,060</td>
                        </tr>
                        <tr>
                            <td>Airi Satou</td>
                            <td>Accountant</td>
                            <td>Tokyo</td>
                            <td>33</td>
                            <td>2008/11/28</td>
                            <td>$162,700</td>
                        </tr>
                        <tr>
                            <td>Brielle Williamson</td>
                            <td>Integration Specialist</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2012/12/02</td>
                            <td>$372,000</td>
                        </tr>
                        <tr>
                            <td>Herrod Chandler</td>
                            <td>Sales Assistant</td>
                            <td>San Francisco</td>
                            <td>59</td>
                            <td>2012/08/06</td>
                            <td>$137,500</td>
                        </tr>
                        <tr>
                            <td>Rhona Davidson</td>
                            <td>Integration Specialist</td>
                            <td>Tokyo</td>
                            <td>55</td>
                            <td>2010/10/14</td>
                            <td>$327,900</td>
                        </tr>
                        <tr>
                            <td>Colleen Hurst</td>
                            <td>Javascript Developer</td>
                            <td>San Francisco</td>
                            <td>39</td>
                            <td>2009/09/15</td>
                            <td>$205,500</td>
                        </tr>
                        <tr>
                            <td>Sonya Frost</td>
                            <td>Software Engineer</td>
                            <td>Edinburgh</td>
                            <td>23</td>
                            <td>2008/12/13</td>
                            <td>$103,600</td>
                        </tr>
                        <tr>
                            <td>Jena Gaines</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>30</td>
                            <td>2008/12/19</td>
                            <td>$90,560</td>
                        </tr>
                        <tr>
                            <td>Quinn Flynn</td>
                            <td>Support Lead</td>
                            <td>Edinburgh</td>
                            <td>22</td>
                            <td>2013/03/03</td>
                            <td>$342,000</td>
                        </tr>
                        <tr>
                            <td>Charde Marshall</td>
                            <td>Regional Director</td>
                            <td>San Francisco</td>
                            <td>36</td>
                            <td>2008/10/16</td>
                            <td>$470,600</td>
                        </tr>
                        <tr>
                            <td>Haley Kennedy</td>
                            <td>Senior Marketing Designer</td>
                            <td>London</td>
                            <td>43</td>
                            <td>2012/12/18</td>
                            <td>$313,500</td>
                        </tr>
                        <tr>
                            <td>Tatyana Fitzpatrick</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>19</td>
                            <td>2010/03/17</td>
                            <td>$385,750</td>
                        </tr>
                        <tr>
                            <td>Michael Silva</td>
                            <td>Marketing Designer</td>
                            <td>London</td>
                            <td>66</td>
                            <td>2012/11/27</td>
                            <td>$198,500</td>
                        </tr>
                        <tr>
                            <td>Paul Byrd</td>
                            <td>Chief Financial Officer (CFO)</td>
                            <td>New York</td>
                            <td>64</td>
                            <td>2010/06/09</td>
                            <td>$725,000</td>
                        </tr>
                        <tr>
                            <td>Gloria Little</td>
                            <td>Systems Administrator</td>
                            <td>New York</td>
                            <td>59</td>
                            <td>2009/04/10</td>
                            <td>$237,500</td>
                        </tr>
                        <tr>
                            <td>Bradley Greer</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>41</td>
                            <td>2012/10/13</td>
                            <td>$132,000</td>
                        </tr>
                        <tr>
                            <td>Dai Rios</td>
                            <td>Personnel Lead</td>
                            <td>Edinburgh</td>
                            <td>35</td>
                            <td>2012/09/26</td>
                            <td>$217,500</td>
                        </tr>
                        <tr>
                            <td>Jenette Caldwell</td>
                            <td>Development Lead</td>
                            <td>New York</td>
                            <td>30</td>
                            <td>2011/09/03</td>
                            <td>$345,000</td>
                        </tr>
                        <tr>
                            <td>Yuri Berry</td>
                            <td>Chief Marketing Officer (CMO)</td>
                            <td>New York</td>
                            <td>40</td>
                            <td>2009/06/25</td>
                            <td>$675,000</td>
                        </tr>
                        <tr>
                            <td>Caesar Vance</td>
                            <td>Pre-Sales Support</td>
                            <td>New York</td>
                            <td>21</td>
                            <td>2011/12/12</td>
                            <td>$106,450</td>
                        </tr>
                        <tr>
                            <td>Doris Wilder</td>
                            <td>Sales Assistant</td>
                            <td>Sidney</td>
                            <td>23</td>
                            <td>2010/09/20</td>
                            <td>$85,600</td>
                        </tr>
                        <tr>
                            <td>Angelica Ramos</td>
                            <td>Chief Executive Officer (CEO)</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2009/10/09</td>
                            <td>$1,200,000</td>
                        </tr>
                        <tr>
                            <td>Gavin Joyce</td>
                            <td>Developer</td>
                            <td>Edinburgh</td>
                            <td>42</td>
                            <td>2010/12/22</td>
                            <td>$92,575</td>
                        </tr>
                        <tr>
                            <td>Jennifer Chang</td>
                            <td>Regional Director</td>
                            <td>Singapore</td>
                            <td>28</td>
                            <td>2010/11/14</td>
                            <td>$357,650</td>
                        </tr>
                        <tr>
                            <td>Brenden Wagner</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>28</td>
                            <td>2011/06/07</td>
                            <td>$206,850</td>
                        </tr>
                        <tr>
                            <td>Fiona Green</td>
                            <td>Chief Operating Officer (COO)</td>
                            <td>San Francisco</td>
                            <td>48</td>
                            <td>2010/03/11</td>
                            <td>$850,000</td>
                        </tr>
                        <tr>
                            <td>Shou Itou</td>
                            <td>Regional Marketing</td>
                            <td>Tokyo</td>
                            <td>20</td>
                            <td>2011/08/14</td>
                            <td>$163,000</td>
                        </tr>
                        <tr>
                            <td>Michelle House</td>
                            <td>Integration Specialist</td>
                            <td>Sidney</td>
                            <td>37</td>
                            <td>2011/06/02</td>
                            <td>$95,400</td>
                        </tr>
                        <tr>
                            <td>Suki Burks</td>
                            <td>Developer</td>
                            <td>London</td>
                            <td>53</td>
                            <td>2009/10/22</td>
                            <td>$114,500</td>
                        </tr>
                        <tr>
                            <td>Prescott Bartlett</td>
                            <td>Technical Author</td>
                            <td>London</td>
                            <td>27</td>
                            <td>2011/05/07</td>
                            <td>$145,000</td>
                        </tr>
                        <tr>
                            <td>Gavin Cortez</td>
                            <td>Team Leader</td>
                            <td>San Francisco</td>
                            <td>22</td>
                            <td>2008/10/26</td>
                            <td>$235,500</td>
                        </tr>
                        <tr>
                            <td>Martena Mccray</td>
                            <td>Post-Sales support</td>
                            <td>Edinburgh</td>
                            <td>46</td>
                            <td>2011/03/09</td>
                            <td>$324,050</td>
                        </tr>
                        <tr>
                            <td>Unity Butler</td>
                            <td>Marketing Designer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/12/09</td>
                            <td>$85,675</td>
                        </tr>
                        <tr>
                            <td>Howard Hatfield</td>
                            <td>Office Manager</td>
                            <td>San Francisco</td>
                            <td>51</td>
                            <td>2008/12/16</td>
                            <td>$164,500</td>
                        </tr>
                        <tr>
                            <td>Hope Fuentes</td>
                            <td>Secretary</td>
                            <td>San Francisco</td>
                            <td>41</td>
                            <td>2010/02/12</td>
                            <td>$109,850</td>
                        </tr>
                        <tr>
                            <td>Vivian Harrell</td>
                            <td>Financial Controller</td>
                            <td>San Francisco</td>
                            <td>62</td>
                            <td>2009/02/14</td>
                            <td>$452,500</td>
                        </tr>
                        <tr>
                            <td>Timothy Mooney</td>
                            <td>Office Manager</td>
                            <td>London</td>
                            <td>37</td>
                            <td>2008/12/11</td>
                            <td>$136,200</td>
                        </tr>
                        <tr>
                            <td>Jackson Bradshaw</td>
                            <td>Director</td>
                            <td>New York</td>
                            <td>65</td>
                            <td>2008/09/26</td>
                            <td>$645,750</td>
                        </tr>
                        <tr>
                            <td>Olivia Liang</td>
                            <td>Support Engineer</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2011/02/03</td>
                            <td>$234,500</td>
                        </tr>
                        <tr>
                            <td>Bruno Nash</td>
                            <td>Software Engineer</td>
                            <td>London</td>
                            <td>38</td>
                            <td>2011/05/03</td>
                            <td>$163,500</td>
                        </tr>
                        <tr>
                            <td>Sakura Yamamoto</td>
                            <td>Support Engineer</td>
                            <td>Tokyo</td>
                            <td>37</td>
                            <td>2009/08/19</td>
                            <td>$139,575</td>
                        </tr>
                        <tr>
                            <td>Thor Walton</td>
                            <td>Developer</td>
                            <td>New York</td>
                            <td>61</td>
                            <td>2013/08/11</td>
                            <td>$98,540</td>
                        </tr>
                        <tr>
                            <td>Finn Camacho</td>
                            <td>Support Engineer</td>
                            <td>San Francisco</td>
                            <td>47</td>
                            <td>2009/07/07</td>
                            <td>$87,500</td>
                        </tr>
                        <tr>
                            <td>Serge Baldwin</td>
                            <td>Data Coordinator</td>
                            <td>Singapore</td>
                            <td>64</td>
                            <td>2012/04/09</td>
                            <td>$138,575</td>
                        </tr>
                        <tr>
                            <td>Zenaida Frank</td>
                            <td>Software Engineer</td>
                            <td>New York</td>
                            <td>63</td>
                            <td>2010/01/04</td>
                            <td>$125,250</td>
                        </tr>
                        <tr>
                            <td>Zorita Serrano</td>
                            <td>Software Engineer</td>
                            <td>San Francisco</td>
                            <td>56</td>
                            <td>2012/06/01</td>
                            <td>$115,000</td>
                        </tr>
                        <tr>
                            <td>Jennifer Acosta</td>
                            <td>Junior Javascript Developer</td>
                            <td>Edinburgh</td>
                            <td>43</td>
                            <td>2013/02/01</td>
                            <td>$75,650</td>
                        </tr>
                        <tr>
                            <td>Cara Stevens</td>
                            <td>Sales Assistant</td>
                            <td>New York</td>
                            <td>46</td>
                            <td>2011/12/06</td>
                            <td>$145,600</td>
                        </tr>
                        <tr>
                            <td>Hermione Butler</td>
                            <td>Regional Director</td>
                            <td>London</td>
                            <td>47</td>
                            <td>2011/03/21</td>
                            <td>$356,250</td>
                        </tr>
                        <tr>
                            <td>Lael Greer</td>
                            <td>Systems Administrator</td>
                            <td>London</td>
                            <td>21</td>
                            <td>2009/02/27</td>
                            <td>$103,500</td>
                        </tr>
                        <tr>
                            <td>Jonas Alexander</td>
                            <td>Developer</td>
                            <td>San Francisco</td>
                            <td>30</td>
                            <td>2010/07/14</td>
                            <td>$86,500</td>
                        </tr>
                        <tr>
                            <td>Shad Decker</td>
                            <td>Regional Director</td>
                            <td>Edinburgh</td>
                            <td>51</td>
                            <td>2008/11/13</td>
                            <td>$183,000</td>
                        </tr>
                        <tr>
                            <td>Michael Bruce</td>
                            <td>Javascript Developer</td>
                            <td>Singapore</td>
                            <td>29</td>
                            <td>2011/06/27</td>
                            <td>$183,000</td>
                        </tr>
                        <tr>
                            <td>Donna Snider</td>
                            <td>Customer Support</td>
                            <td>New York</td>
                            <td>27</td>
                            <td>2011/01/25</td>
                            <td>$112,000</td>
                        </tr>
                        </tbody>
                    </table>
                </li>
                <li>
                    <ul class="md-list">
                        @foreach ($physician->physicianLogs->sortByDesc('created_at') as $key => $log)
                            <li>
                                <div class="md-list-content">
                                    <span class="md-list-heading"><a href="#">{{ $log->title }}</a></span>
                                    <div class="uk-margin-small-top">
                                    <span class="uk-margin-right">
                                        <i class="material-icons">&#xE192;</i> <span class="uk-text-muted uk-text-small">{{ $log->created_at->toDateTimeString() }}</span>
                                    </span>
                                    @if ($log->createdBy)
                                        <span class="uk-margin-right">
                                            <i class="material-icons">&#xE853;</i> <span class="uk-text-muted uk-text-small">{{ $log->createdBy->fullName() }}</span>
                                        </span>
                                    @endif
                                    </div>
                                </div>
                            </li>
                            @endforeach
                    </ul>
                </li>
            </ul>
        </div>
    </div>

    <div class="uk-modal" id="modal_update_status">
        <div class="uk-modal-dialog">
            <form action="{{ route('physicians.action', $physician->id) }}" method="post">
                {{ csrf_field() }}
                <div class="uk-modal-header">
                    <h3 class="uk-modal-title">Update Status</h3>
                </div>
                <p>
                    You may update the physician's status immediately or you may specify a date where the action will take effect.
                    Terminated physician can <span class="uk-text-bold">no longer be reactivated</span> .
                </p>
                <div class="uk-grid">
                    <div class="uk-width-1-2">
                        <select name="status" class="md-input" style="margin-top: 20px;">
                            <option value="" disabled selected hidden>Action...</option>
                            <option value="suspended">Suspend</option>
                            <option value="accredited">Accredit</option>
                            <option value="disaccredited">Disaccredit</option>
                            <option value="terminated">Terminate</option>
                            <option value="reactivated">Reactivate</option>
                        </select>
                    </div>
                    <div class="uk-width-1-2">
                        <span class="uk-input-group-addon" style="padding-top: 15px;">
                            <input id="check_effective_immediately" type="checkbox" name="effective_immediately" value="1" data-md-icheck/>
                            <label for="check_effective_immediately" class="inline-label">Effective Immediately</label>
                        </span>
                    </div>
                </div>
                <div class="uk-grid uk-margin-large-small">
                    <div class="uk-width-1-1">
                        <div class="uk-form-row" id="row_effectivity_date">
                            <label for="dp_effectivity_date">Effectivity Date</label>
                            <input class="md-input" type="text" name="effectivity_date" value="" id="dp_effectivity_date" data-uk-datepicker="{format:'YYYY-MM-DD'}">
                        </div>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-medium-top">
                    <div class="uk-form-row">
                        <label>Reason *</label>
                        <textarea cols="30" name="reason" rows="2" class="md-input"></textarea>
                    </div>
                </div>
                <div class="uk-width-1-1 uk-margin-medium-top">
                    <div class="uk-form-row">
                        <label>Remarks</label>
                        <textarea cols="30" name="remarks" rows="2" class="md-input"></textarea>
                    </div>
                </div>
                <div class="uk-modal-footer uk-text-right">
                    <button type="button" class="md-btn md-btn-flat uk-modal-close">Close</button>
                    <button type="submit" class="md-btn md-btn-flat md-btn-flat-primary">Submit</button>
                </div>
            </form>
        </div>
    </div>
@endsection

@section('scripts')
    <script src="/bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="/assets/js/custom/datatables/datatables.uikit.min.js"></script>
    <script>
        $(function() {
            var check_effective_immediately = $('#check_effective_immediately');
            var row_effectivity_date = $('#row_effectivity_date');
            var effectivity_date = $('#dp_effectivity_date');

            check_effective_immediately.on('ifChecked', function (event) {
                effectivity_date.hide();
                row_effectivity_date.hide();
            });

            check_effective_immediately.on('ifUnchecked', function (event) {
                effectivity_date.show();
                row_effectivity_date.show();
            });

            var $dt_scroll = $('#dt_scroll');
            if($dt_scroll.length) {
                $dt_scroll.DataTable({
                    "bLengthChange": false,
                    "paging": true
                });
            }
        });
    </script>
@endsection
