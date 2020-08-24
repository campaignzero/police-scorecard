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
                    <li><a href="/findings" class="{{ (request()->is('findings')) ? 'active' : '' }}" {!! trackData('Nav', 'Header', 'Key Findings') !!}>Key Findings</a></li>
                    <li><a href="/sandiego" class="{{ (request()->is('sandiego')) ? 'active' : '' }}" {!! trackData('Nav', 'Header', 'Reports') !!}>Reports</a></li>
                </ul>
            </div>
        </div>
    </nav>
</header>
