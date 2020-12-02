<!-- Main Menu -->
<header>
    <nav class="section bg-gray header" role="navigation">
        <div class="content">
            <a href="/" class="logo" {!! trackData('Nav', 'Header', 'Logo') !!}>
                Police Scorecard
            </a>

            <a href="#" id="mobile-toggle" {!! trackData('Nav', 'Header', 'Toggle Menu') !!}>
                <span class="sr-only">Toggle Menu</span>
            </a>

            <div id="menu">
                <ul>
                    <li><a href="https://docs.google.com/document/d/11lWNmN-5RmVWpgvFMQXjB_MsQ47QgSU6xoqbVA1hwW8/edit" rel="noopener" target="_blank" {!! trackData('External Nav', 'Header', 'About the Data') !!}>About the Data</a></li>
                    <li><a href="https://docs.google.com/document/d/1RzyI28Vt9l1fXH7-hAfPLknRRUagTCIngW1LjXwGPrw/edit" rel="noopener" target="_blank" {!! trackData('External Nav', 'Header', 'Key Findings') !!}>Key Findings</a></li>
                    <li><a href="/sandiego" class="{{ (request()->is('sandiego')) ? 'active' : '' }}" {!! trackData('Nav', 'Header', 'Reports') !!}>Reports</a></li>
                    <li><a href="https://forms.gle/WPC2Z6A92tBqxGWZ8" rel="noopener" target="_blank" {!! trackData('External Nav', 'Header', 'Contribute Data') !!}>Contribute Data</a></li>
                    <li class="menu-divider visible-lg">&nbsp;</li>
                    <li class="search-wrapper">
                        <a href="#search" aria-label="Toggle Search" class="toggle-search" {!! trackData('Nav', 'Header', 'Search') !!}>
                            <i class="fa fa-search fa-lg"></i>
                        </a>
                        <form method="post" id="search-form" class="search-form animated fadeIn" autocomplete="off" onsubmit="return false;">
                            <button type="button" title="Search" class="search-button" {!! trackData('Nav', 'Header', 'Search') !!}>
                                <i class="fa fa-search fa-lg" id="search-icon"></i>
                            </button>
                            <input type="text" id="search" placeholder="SEARCH" class="form-control search-field" autocomplete="off" {!! trackData('Form', 'Search') !!}>
                            <div id="search-results-container"></div>
                        </form>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
</header>
