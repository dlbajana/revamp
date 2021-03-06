<!doctype html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="initial-scale=1.0,maximum-scale=1.0,user-scalable=no">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Remove Tap Highlight on Windows Phone IE -->
    <meta name="msapplication-tap-highlight" content="no"/>

    <link rel="icon" type="image/png" href="/img/favicon-16x16.png" sizes="16x16">
    <link rel="icon" type="image/png" href="/img/favicon-32x32.png" sizes="32x32">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- uikit -->
    <link rel="stylesheet" href="/bower_components/uikit/css/uikit.almost-flat.min.css" media="all">

    <!-- flag icons -->
    <link rel="stylesheet" href="/icons/flags/flags.min.css" media="all">

    <!-- style switcher -->
    <link rel="stylesheet" href="/css/style_switcher.min.css" media="all">

    <!-- altair admin -->
    <link rel="stylesheet" href="/css/main.min.css" media="all">

    <!-- themes -->
    <link rel="stylesheet" href="/css/themes/themes_combined.min.css" media="all">

    @yield('styles')

</head>
<body class=" sidebar_main_open sidebar_main_swipe header_full">
    <!-- main header -->
    <header id="header_main">
        <div class="header_main_content">
            <nav class="uk-navbar">
                <div class="main_logo_top">

                    <a href="index.html"><span class="uk-text-contrast uk-text-large">AMAPHIL</span></a>
                </div>

                <!-- main sidebar switch -->
                <a href="#" id="sidebar_main_toggle" class="sSwitch sSwitch_left">
                    <span class="sSwitchIcon"></span>
                </a>

                <!-- secondary sidebar switch -->
                <a href="#" id="sidebar_secondary_toggle" class="sSwitch sSwitch_right sidebar_secondary_check">
                    <span class="sSwitchIcon"></span>
                </a>

                <div id="menu_top_dropdown" class="uk-float-left uk-hidden-small">
                    <div class="uk-button-dropdown" data-uk-dropdown="{mode:'click'}">
                        <a href="#" class="top_menu_toggle"><i class="material-icons md-24">&#xE8F0;</i></a>
                        <div class="uk-dropdown uk-dropdown-width-3">
                            <div class="uk-grid uk-dropdown-grid">
                                <div class="uk-width-2-3">
                                    <div class="uk-grid uk-grid-width-medium-1-3 uk-margin-bottom uk-text-center">
                                        <a href="page_mailbox.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-light-green-600">&#xE158;</i>
                                            <span class="uk-text-muted uk-display-block">Mailbox</span>
                                        </a>
                                        <a href="page_invoices.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-purple-600">&#xE53E;</i>
                                            <span class="uk-text-muted uk-display-block">Invoices</span>
                                        </a>
                                        <a href="page_chat.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-cyan-600">&#xE0B9;</i>
                                            <span class="uk-text-muted uk-display-block">Chat</span>
                                        </a>
                                        <a href="page_scrum_board.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-red-600">&#xE85C;</i>
                                            <span class="uk-text-muted uk-display-block">Scrum Board</span>
                                        </a>
                                        <a href="page_snippets.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-blue-600">&#xE86F;</i>
                                            <span class="uk-text-muted uk-display-block">Snippets</span>
                                        </a>
                                        <a href="page_user_profile.html" class="uk-margin-top">
                                            <i class="material-icons md-36 md-color-orange-600">&#xE87C;</i>
                                            <span class="uk-text-muted uk-display-block">User profile</span>
                                        </a>
                                    </div>
                                </div>
                                <div class="uk-width-1-3">
                                    <ul class="uk-nav uk-nav-dropdown uk-panel">
                                        <li class="uk-nav-header">Components</li>
                                        <li><a href="components_accordion.html">Accordions</a></li>
                                        <li><a href="components_buttons.html">Buttons</a></li>
                                        <li><a href="components_notifications.html">Notifications</a></li>
                                        <li><a href="components_sortable.html">Sortable</a></li>
                                        <li><a href="components_tabs.html">Tabs</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="uk-navbar-flip">
                    <ul class="uk-navbar-nav user_actions">
                        <li><a href="#" id="full_screen_toggle" class="user_action_icon uk-visible-large"><i class="material-icons md-24 md-light">&#xE5D0;</i></a></li>

                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_icon"><i class="material-icons md-24 md-light">&#xE7F4;</i><span class="uk-badge">16</span></a>
                            <div class="uk-dropdown uk-dropdown-xlarge">
                                <div class="md-card-content">
                                    <ul class="uk-tab uk-tab-grid" data-uk-tab="{connect:'#header_alerts',animation:'slide-horizontal'}">
                                        <li class="uk-width-1-2 uk-active"><a href="#" class="js-uk-prevent uk-text-small">Messages (12)</a></li>
                                        <li class="uk-width-1-2"><a href="#" class="js-uk-prevent uk-text-small">Alerts (4)</a></li>
                                    </ul>
                                    <ul id="header_alerts" class="uk-switcher uk-margin">
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-cyan">uq</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Natus omnis.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Autem quia optio blanditiis provident maxime non eum perspiciatis fuga.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="/img/avatars/avatar_07_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Omnis et.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Illo voluptates iusto est ipsa quia est velit non delectus placeat.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <span class="md-user-letters md-bg-light-green">xh</span>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Sed suscipit ut.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Perferendis voluptatem eaque maiores voluptas quia est id nulla explicabo.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="/img/avatars/avatar_02_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Aut aliquid.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Optio hic enim omnis quis debitis magnam voluptatem ex voluptates soluta.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <img class="md-user-image md-list-addon-avatar" src="/img/avatars/avatar_09_tn.png" alt=""/>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading"><a href="pages_mailbox.html">Porro praesentium.</a></span>
                                                        <span class="uk-text-small uk-text-muted">Corporis minus ullam rerum quia aut aliquam omnis quo cum.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                            <div class="uk-text-center uk-margin-top uk-margin-small-bottom">
                                                <a href="page_mailbox.html" class="md-btn md-btn-flat md-btn-flat-primary js-uk-prevent">Show All</a>
                                            </div>
                                        </li>
                                        <li>
                                            <ul class="md-list md-list-addon">
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-warning">&#xE8B2;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Dolorum mollitia.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Laboriosam est fuga quo laboriosam ut numquam ut ut.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-success">&#xE88F;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Voluptate ipsum eum.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Est omnis aliquid labore eligendi eum ut incidunt.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-danger">&#xE001;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Quia officiis.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Voluptatem autem eos qui totam fuga consequatur commodi.</span>
                                                    </div>
                                                </li>
                                                <li>
                                                    <div class="md-list-addon-element">
                                                        <i class="md-list-addon-icon material-icons uk-text-primary">&#xE8FD;</i>
                                                    </div>
                                                    <div class="md-list-content">
                                                        <span class="md-list-heading">Nihil blanditiis.</span>
                                                        <span class="uk-text-small uk-text-muted uk-text-truncate">Voluptas quasi excepturi vel deserunt iure.</span>
                                                    </div>
                                                </li>
                                            </ul>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </li>
                        <li data-uk-dropdown="{mode:'click',pos:'bottom-right'}">
                            <a href="#" class="user_action_image"><img class="md-user-image" src="/img/avatars/avatar_11_tn.png" alt=""/></a>
                            <div class="uk-dropdown uk-dropdown-small">
                                <ul class="uk-nav js-uk-prevent">
                                    <li><a href="page_user_profile.html">My profile</a></li>
                                    <li><a href="{{ route('logout') }}" onclick="event.preventDefault(); document.getElementById('logout-form').submit();">Logout</a></li>
                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                        {{ csrf_field() }}
                                    </form>
                                </ul>
                            </div>
                        </li>
                    </ul>
                </div>
            </nav>
        </div>
        <div class="header_main_search_form">
            <i class="md-icon header_main_search_close material-icons">&#xE5CD;</i>
            <form class="uk-form uk-autocomplete" data-uk-autocomplete="{source:'data/search_data.json'}">
                <input type="text" class="header_main_search_input" />
                <button class="header_main_search_btn uk-button-link"><i class="md-icon material-icons">&#xE8B6;</i></button>
                <script type="text/autocomplete">
                    <ul class="uk-nav uk-nav-autocomplete uk-autocomplete-results">
                    </ul>
                </script>
            </form>
        </div>
    </header><!-- main header end -->
    <!-- main sidebar -->
    <aside id="sidebar_main">

        <div class="menu_section">
            <ul>
                <li class="@yield('nav_dashboard')" title="Dashboard">
                    <a href="{{ route('dashboard') }}">
                        <span class="menu_icon"><i class="material-icons">&#xE871;</i></span>
                        <span class="menu_title">Dashboard</span>
                    </a>
                </li>
                <li @yield('nav_medical') title="Medical">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE548;</i></span>
                        <span class="menu_title">Medical</span>
                    </a>
                    <ul>
                        <li class="@yield('nav_providers')" title="Providers">
                            <a href="{{ route('providers.index') }}">
                                <span class="menu_title">Providers</span>
                            </a>
                        </li>
                        <li class="@yield('nav_physicians')" title="Physicians">
                            <a href="{{ route('physicians.index') }}">
                                <span class="menu_title">Physicians</span>
                            </a>
                        </li>
                        <li class="@yield('nav_cpt')" title="CPT">
                            <a href="#">
                                <span class="menu_title">CPT</span>
                            </a>
                        </li>
                        <li class="@yield('nav_icd')" title="ICD">
                            <a href="{{ route('icd.index') }}">
                                <span class="menu_title">ICD</span>
                            </a>
                        </li>
                        <li class="@yield('nav_rvu')" title="RVU">
                            <a href="{{ route('rvu.index') }}">
                                <span class="menu_title">RVU</span>
                            </a>
                        </li>
                    </ul>
                </li>

                <li class="@yield('nav_corporate')" title="Corporate">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE0AF;</i></span>
                        <span class="menu_title">Corporate</span>
                    </a>
                    <ul>
                        <li class="@yield('nav_corporate_corporate_accounts')"><a href="{{ route('corporates.index') }}">Corporate Accounts</a></li>
                        <li class="@yield('nav_corporate_members')"><a href="#">Members</a></li>
                        <li class="@yield('nav_corporate_plans')"><a href="{{ route('plans.index') }}">Plans & Coverage</a></li>
                    </ul>
                </li>
                <li class="@yield('nav_ape_scheduler')" title="APE Scheduler">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE878;</i></span>
                        <span class="menu_title">APE Scheduler</span>
                    </a>
                </li>
                <li class="@yield('nav_transactions')" title="Transactions">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE913;</i></span>
                        <span class="menu_title">Transactions</span>
                    </a>
                </li>
                <li class="@yield('nav_claims')" title="Claims">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE850;</i></span>
                        <span class="menu_title">Claims</span>
                    </a>
                </li>
                <li class="@yield('nav_users_management')" title="User Management">
                    <a href="{{ route('users.index') }}">
                        <span class="menu_icon"><i class="material-icons">&#xE87C;</i></span>
                        <span class="menu_title">Users Management</span>
                    </a>
                </li>
                <li class="@yield('nav_system_settings')" title="SystemSettings">
                    <a href="#">
                        <span class="menu_icon"><i class="material-icons">&#xE8B8;</i></span>
                        <span class="menu_title">System Settings</span>
                    </a>
                </li>
            </ul>
        </div>

    </aside><!-- main sidebar end -->

    <div id="page_content">

        @yield('breadcrumbs')

        <div id="page_content_inner">

            @yield('page-content')

        </div>
    </div>

    <!-- common functions -->
    <script src="/js/common.min.js"></script>
    <!-- uikit functions -->
    <script src="/js/uikit_custom.min.js"></script>
    <!-- altair common functions/helpers -->
    <script src="/js/altair_admin_common.min.js"></script>

    @yield('scripts')

</body>
</html>
