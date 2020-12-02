@extends('layouts.app')

@section('title', 'Findings')

@section('styles')
<style>sup a{font-size:10px;vertical-align:super;font-weight:700}p{margin-bottom:14px;line-height:28px}iframe{max-width:100%!important}.lst-kix_fckzbmam001m-6>li{counter-increment:lst-ctn-kix_fckzbmam001m-6}.lst-kix_uruhbdngh9zy-6>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-6}ol.lst-kix_fckzbmam001m-6.start{counter-reset:lst-ctn-kix_fckzbmam001m-6 0}.lst-kix_fckzbmam001m-7>li{counter-increment:lst-ctn-kix_fckzbmam001m-7}ol.lst-kix_fckzbmam001m-3.start{counter-reset:lst-ctn-kix_fckzbmam001m-3 0}.lst-kix_fckzbmam001m-7>li:before{content:""counter(lst-ctn-kix_fckzbmam001m-7, lower-latin) ". "}.lst-kix_fckzbmam001m-6>li:before{content:""counter(lst-ctn-kix_fckzbmam001m-6, decimal) ". "}ul.lst-kix_pr7wbpbcyk4v-8{list-style-type:none}ol.lst-kix_uruhbdngh9zy-7.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-7 0}.lst-kix_fckzbmam001m-8>li{counter-increment:lst-ctn-kix_fckzbmam001m-8}.lst-kix_uruhbdngh9zy-5>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-5}ul.lst-kix_pr7wbpbcyk4v-4{list-style-type:none}ul.lst-kix_pr7wbpbcyk4v-5{list-style-type:none}ul.lst-kix_pr7wbpbcyk4v-6{list-style-type:none}.lst-kix_fckzbmam001m-5>li{counter-increment:lst-ctn-kix_fckzbmam001m-5}ul.lst-kix_pr7wbpbcyk4v-7{list-style-type:none}ul.lst-kix_pr7wbpbcyk4v-0{list-style-type:none}ul.lst-kix_pr7wbpbcyk4v-1{list-style-type:none}.lst-kix_fckzbmam001m-1>li:before{content:""counter(lst-ctn-kix_fckzbmam001m-1, lower-latin) ". "}ul.lst-kix_pr7wbpbcyk4v-2{list-style-type:none}ul.lst-kix_pr7wbpbcyk4v-3{list-style-type:none}.lst-kix_fckzbmam001m-2>li:before{content:""counter(lst-ctn-kix_fckzbmam001m-2, lower-roman) ". "}ol.lst-kix_fckzbmam001m-0.start{counter-reset:lst-ctn-kix_fckzbmam001m-0 0}.lst-kix_uruhbdngh9zy-8>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-8}ol.lst-kix_fckzbmam001m-8{list-style-type:none}ol.lst-kix_uruhbdngh9zy-1.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-1 0}ol.lst-kix_fckzbmam001m-1.start{counter-reset:lst-ctn-kix_fckzbmam001m-1 0}.lst-kix_fckzbmam001m-4>li{counter-increment:lst-ctn-kix_fckzbmam001m-4}.lst-kix_uruhbdngh9zy-3>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-3}ol.lst-kix_fckzbmam001m-2.start{counter-reset:lst-ctn-kix_fckzbmam001m-2 0}ol.lst-kix_fckzbmam001m-8.start{counter-reset:lst-ctn-kix_fckzbmam001m-8 0}ol.lst-kix_uruhbdngh9zy-8.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-8 0}ol.lst-kix_uruhbdngh9zy-2.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-2 0}ol.lst-kix_fckzbmam001m-4{list-style-type:none}ol.lst-kix_fckzbmam001m-5{list-style-type:none}ol.lst-kix_fckzbmam001m-6{list-style-type:none}ol.lst-kix_fckzbmam001m-7{list-style-type:none}ol.lst-kix_fckzbmam001m-0{list-style-type:none}ol.lst-kix_fckzbmam001m-1{list-style-type:none}ol.lst-kix_fckzbmam001m-2{list-style-type:none}ol.lst-kix_fckzbmam001m-3{list-style-type:none}.lst-kix_fckzbmam001m-0>li{counter-increment:lst-ctn-kix_fckzbmam001m-0}.lst-kix_z6y9fbn9tl0s-4>li:before{content:"\0025cb  "}.lst-kix_z6y9fbn9tl0s-6>li:before{content:"\0025cf  "}.lst-kix_z6y9fbn9tl0s-1>li:before{content:"\0025cb  "}.lst-kix_z6y9fbn9tl0s-5>li:before{content:"\0025a0  "}.lst-kix_z6y9fbn9tl0s-0>li:before{content:"\0025cf  "}.lst-kix_z6y9fbn9tl0s-8>li:before{content:"\0025a0  "}.lst-kix_z6y9fbn9tl0s-7>li:before{content:"\0025cb  "}ul.lst-kix_z6y9fbn9tl0s-1{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-2{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-0{list-style-type:none}ol.lst-kix_uruhbdngh9zy-6.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-6 0}.lst-kix_fckzbmam001m-1>li{counter-increment:lst-ctn-kix_fckzbmam001m-1}.lst-kix_z6y9fbn9tl0s-2>li:before{content:"\0025a0  "}.lst-kix_uruhbdngh9zy-0>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-0}.lst-kix_z6y9fbn9tl0s-3>li:before{content:"\0025cf  "}.lst-kix_uruhbdngh9zy-2>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-2, lower-roman) ". "}.lst-kix_uruhbdngh9zy-1>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-1, lower-latin) ". "}.lst-kix_uruhbdngh9zy-5>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-5, lower-roman) ". "}.lst-kix_uruhbdngh9zy-6>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-6, decimal) ". "}.lst-kix_uruhbdngh9zy-0>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-0, decimal) ". "}.lst-kix_uruhbdngh9zy-8>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-8, lower-roman) ". "}ol.lst-kix_fckzbmam001m-7.start{counter-reset:lst-ctn-kix_fckzbmam001m-7 0}ol.lst-kix_uruhbdngh9zy-3.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-3 0}.lst-kix_uruhbdngh9zy-7>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-7, lower-latin) ". "}.lst-kix_uruhbdngh9zy-2>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-2}.lst-kix_fckzbmam001m-2>li{counter-increment:lst-ctn-kix_fckzbmam001m-2}ol.lst-kix_uruhbdngh9zy-0.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-0 0}.lst-kix_uruhbdngh9zy-4>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-4, lower-latin) ". "}.lst-kix_uruhbdngh9zy-3>li:before{content:""counter(lst-ctn-kix_uruhbdngh9zy-3, decimal) ". "}.lst-kix_pr7wbpbcyk4v-8>li:before{content:"\0025a0  "}.lst-kix_pr7wbpbcyk4v-7>li:before{content:"\0025cb  "}ol.lst-kix_uruhbdngh9zy-4.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-4 0}.lst-kix_pr7wbpbcyk4v-4>li:before{content:"\0025cb  "}.lst-kix_pr7wbpbcyk4v-5>li:before{content:"\0025a0  "}.lst-kix_pr7wbpbcyk4v-6>li:before{content:"\0025cf  "}.lst-kix_fckzbmam001m-3>li{counter-increment:lst-ctn-kix_fckzbmam001m-3}.lst-kix_pr7wbpbcyk4v-0>li:before{content:"\0025cf  "}.lst-kix_pr7wbpbcyk4v-1>li:before{content:"\0025cb  "}.lst-kix_pr7wbpbcyk4v-3>li:before{content:"\0025cf  "}ol.lst-kix_fckzbmam001m-4.start{counter-reset:lst-ctn-kix_fckzbmam001m-4 0}.lst-kix_pr7wbpbcyk4v-2>li:before{content:"\0025a0  "}ol.lst-kix_uruhbdngh9zy-8{list-style-type:none}ol.lst-kix_fckzbmam001m-5.start{counter-reset:lst-ctn-kix_fckzbmam001m-5 0}.lst-kix_uruhbdngh9zy-7>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-7}ol.lst-kix_uruhbdngh9zy-6{list-style-type:none}ol.lst-kix_uruhbdngh9zy-7{list-style-type:none}ol.lst-kix_uruhbdngh9zy-4{list-style-type:none}ol.lst-kix_uruhbdngh9zy-5{list-style-type:none}ol.lst-kix_uruhbdngh9zy-2{list-style-type:none}ol.lst-kix_uruhbdngh9zy-3{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-7{list-style-type:none}ol.lst-kix_uruhbdngh9zy-0{list-style-type:none}.lst-kix_uruhbdngh9zy-1>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-1}ul.lst-kix_z6y9fbn9tl0s-8{list-style-type:none}ol.lst-kix_uruhbdngh9zy-1{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-5{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-6{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-3{list-style-type:none}ul.lst-kix_z6y9fbn9tl0s-4{list-style-type:none}.lst-kix_uruhbdngh9zy-4>li{counter-increment:lst-ctn-kix_uruhbdngh9zy-4}ol.lst-kix_uruhbdngh9zy-5.start{counter-reset:lst-ctn-kix_uruhbdngh9zy-5 0}ol{margin:0;padding:0}table td,table th{padding:0}.c10{text-decoration-skip-ink:none;-webkit-text-decoration-skip:none;color:#15c;text-decoration:underline}.c5{padding-top:0;padding-bottom:0;line-height:1;text-align:left}.c13{background-color:#fff;max-width:468pt;padding:72pt 72pt 72pt 72pt}.c12{color:inherit;text-decoration:inherit}.c7{padding:0;margin:0}.c0{margin:5px 0}.c14{width:33%;height:1px}.c16{orphans:2;widows:2}.c19{font-size:10pt}.c2{font-size:10pt}.c15{font-style:italic}.c8{padding-left:0}.c9{height:5pt}.c6{margin-left:0;margin-bottom:8px}.c4{font-weight:700}.subtitle{color:#464648;padding:0;font-size:28px;line-height:32px;font-weight:300;text-transform:uppercase;margin:14px 0;font-family:'Barlow Condensed',sans-serif}.c3 img{max-width:70%}</style>
@endsection

@section('content')
    <x-partial.menu />

    <div class="section about">
        <div class="content">
            <h1 class="title">
                Key Findings
            </h1>
            <p class="c3"><span class="c4 subtitle">We built the first Scorecard to evaluate policing in California. Here&rsquo;s what we found.</span></p>
            <p class="c3 c9"><span class="c1"></span></p>
            <p class="c3"><span>Nationwide protests demanding an end to police violence have </span><span class="c10"><a class="c12" href="https://bit.ly/2vCY7j1">shifted public opinion</a></span><span>&nbsp;over the </span><span>past five years</span><span>. An estimated </span><span class="c10"><a class="c12" href="https://www.vox.com/2019/3/22/18259865/great-awokening-white-liberals-race-polling-trump-2020">45 million</a></span><span>&nbsp;Americans have adopted more progressive views on race and racism since the protests </span><span>began</span><span>&nbsp;in 2014. But while public opinion has changed, </span><span>policing</span><span> outcomes in most places have not. The police killed </span><span class="c10"><a class="c12" href="https://www.theroot.com/here-s-how-many-people-police-killed-in-2018-1831469528">more people</a></span><span>&nbsp;</span><span>last year than the year before</span><span>, </span><span>racial disparities in outcomes such as </span><span class="c10"><a class="c12" href="https://ucr.fbi.gov/crime-in-the-u.s/2017/crime-in-the-u.s.-2017/tables/table-43">arrests</a></span><span>&nbsp;and </span><span class="c10"><a class="c12" href="https://mappingpoliceviolence.org/">deadly force</a></span><span>&nbsp;persist</span><span>, and the criminal justice system is not more likely to hold police accountable. In a country with 18,000 law enforcement agencies, each with different issues and outcomes, changing these outcomes on a nationwide scale requires sustained organizing and advocacy efforts in </span><span class="c15">every jurisdiction</span><span>. To do this, </span><span class="c11 c4">communities need the tools to effectively evaluate each law enforcement agency and hold them accountable to measurable results. </span></p>
            <p class="c3 c9"><span class="c1"></span></p>
            <p class="c3"><span>But how do you evaluate the police?</span><span class="c4">&nbsp;</span><span>There are substantially different perspectives about what police should or should not do - and whether the institution of policing should continue to exist at all. These differences cannot all be resolved at once, but we believe there are a set of common principles that can provide an initial framework for evaluating </span><span>any </span><span class="c1">agency responsibility for protecting people from harm:</span></p>
            <p class="c3 c9"><span class="c1"></span></p>
            <div class="number-list">
                <p class="c3 number-list n1" style="min-height: 40px; display: flex; align-items: center;"><span>The agency should prioritize protecting people from violence, not arresting people for low level offenses</span></p>
                <p class="c3 number-list n2" style="min-height: 40px; display: flex; align-items: center;"><span>The agency should avoid the use of force, especially deadly force, to the greatest extent possible</span></p>
                <p class="c3 number-list n3" style="min-height: 40px; display: flex; align-items: center;"><span>When people come forward to report misconduct by employees of the agency, it should result in some form of accountability</p>
                <p class="c3 number-list n4" style="min-height: 40px; display: flex; align-items: center;"><span>When people call on the agency to help solve the most serious crimes - those resulting in death - they should be able to trust that agency to find the person responsible</span></p>
                <p class="c3 number-list n5" style="min-height: 40px; display: flex; align-items: center;"><span>The agency should accomplish these goals in ways that are not biased or discriminatory</span></p>
            </div>
            <p class="c3 c9"><span class="c1"></span></p>
            <p class="c3"><span>Based on these principles, </span><span class="c10"><a class="c12" href="http://joincampaignzero.org">Campaign Zero</a></span><span>&nbsp;obtained data from state and local agencies to evaluate California&rsquo;s 100 largest municipal police departments and converted each evaluation (represented by a &ldquo;score&rdquo; from 0-100) into an easy-to-understand letter grade. Using this methodology, a police department received a higher grade if it made </span><span class="c15">fewer arrests</span><span>&nbsp;for low level offenses, </span><span class="c15">used</span><span>&nbsp;</span><span class="c15">less force </span><span>during arrest, had </span><span class="c15">fewer homicides unsolved</span><span>, </span><span class="c15">did not have racial disparities</span><span>&nbsp;in arrests and use of force, and </span><span class="c15">upheld civilian complaints</span><span>&nbsp;of police misconduct more often than other police departments in the state. </span><span class="c4">See the grade each police department received, and the outcomes informing each grade, at </span><span class="c10 c4"><a class="c12" href="http://policescorecard.org">policescorecard.org. </a></span></p>
            <p class="c3 c9"><span class="c1"></span></p>

        </div>
    </div>

    <div class="section about bg-gray">
        <div class="content text-white" style="padding-bottom: 60px;">
            <p class="c3"><span class="c4 subtitle">The California Department of Justice recently made available data on policing in 2018.</span></p>
            <div class="number-list">

                <p class="c3"><span>We've updated the Police Scorecard to include this information, and expanded our analysis to also evaluate every Sheriff's Department in the state. Here are some of the findings from our analysis:</span></p>

                <p class="c3 number-list n1"><span class="c11 c4">California had Fewer Incidents of Police Violence in 2018:</span></p>

                <p class="c3"><span>Police departments in California reported reductions in police violence in 2018 - there were 9% fewer deadly force incidents statewide compared to 2017 and 8% fewer less lethal force incidents in 2018 among the 52 agencies that provided less lethal force data. These reductions in use of force happened despite arrest rates remaining constant at 1.1 million arrests per year.</span></p>

                <iframe title="California Policing Data Trends, 2016-2018" aria-label="Table" id="datawrapper-chart-lSQxg" src="https://datawrapper.dwcdn.net/lSQxg/1/" scrolling="no" frameborder="0"></iframe>
                <script type="text/javascript">! function() {"use strict";window.addEventListener("message", function(a) {if (void 0 !== a.data["datawrapper-height"])for (var e in a.data["datawrapper-height"]) {var t = document.getElementById("datawrapper-chart-" + e) || document.querySelector("iframe[src*='" + e + "']");t && (t.style.height = a.data["datawrapper-height"][e] + "px")}})}();</script>

                <p class="c3 c9"><span class="c1"></span></p>

                <p class="c3 number-list n2"><span class="c11 c4">Where Did Policing Outcomes Change Most?</span></p>

                <p class="c3"><span>Changes in policing outcomes varied by jurisdiction. Stockton Police Department's overall score increased by 20% in 2018 - more than any other department in our analysis. This change was due, in part, to substantial reductions in Stockton police shootings in 2018 compared to previous years. Among departments that had 8 or more police shootings from 2016-19, Stockton Police Department had the largest reduction in police shootings in 2018.</span></p>

                <iframe title="% Change in Police Shootings, 2018 vs 2016-2017 Average" aria-label="Arrow Plot" id="datawrapper-chart-wzGPf" src="https://datawrapper.dwcdn.net/wzGPf/2/" scrolling="no" frameborder="0"></iframe>
                <script type="text/javascript">! function() {"use strict";window.addEventListener("message", function(a) {if (void 0 !== a.data["datawrapper-height"])for (var e in a.data["datawrapper-height"]) {var t = document.getElementById("datawrapper-chart-" + e) || document.querySelector("iframe[src*='" + e + "']");t && (t.style.height = a.data["datawrapper-height"][e] + "px")}})}();</script>
                <p>&nbsp;</p>
                <p class="c3"><span>Among other large California cities, San Diego, Fresno and Oakland's scores improved moderately while policing outcomes in San Jose, Los Angeles and San Francisco remained relatively constant. Outcomes worsened in Bakersfield which, along with Riverside, continued to have some of the worst policing outcomes in the state among larger cities.</span></p>

                <iframe title="Changes in Police Department Scores from 2016-17 to 2018" aria-label="Column Chart" id="datawrapper-chart-eIG3V" src="https://datawrapper.dwcdn.net/eIG3V/1/" scrolling="no" frameborder="0"></iframe>
                <script type="text/javascript">! function() {"use strict";window.addEventListener("message", function(a) {if (void 0 !== a.data["datawrapper-height"])for (var e in a.data["datawrapper-height"]) {var t = document.getElementById("datawrapper-chart-" + e) || document.querySelector("iframe[src*='" + e + "']");t && (t.style.height = a.data["datawrapper-height"][e] + "px")}})}();</script>

                <p class="c3 c9"><span class="c1"></span></p>

                <p class="c3 number-list n3"><span class="c11 c4">Evaluating California Sheriff's Departments</span></p>

                <p class="c3"><span>To more effectively evaluate Sheriff's Departments, we added new indicators that reflect the role of sheriffs in running county jails. In addition to the existing framework used to evaluate city police departments, we examined the sheriffs' jail incarceration rates, jail deaths per jail population, and transfers of immigrants to ICE. Based on this comprehensive evaluation, we found that Los Angeles County Sheriff and San Diego County Sheriff - the state's largest Sheriff's Departments - had among the worst scores of the 58 CA Sheriff's Departments. Between 2016-19, Los Angeles County Sheriff's Department used more deadly force during arrest than 86% of departments and had the worst level of discriminatory policing of any other Sheriff's Department in the state, as determined by our racial bias scoring methodology. San Diego Sheriff used more force than 87% of Sheriff's Departments, used more deadly force than 84% of Sheriff's Departments and had more jail deaths than 81% of these departments. This indicates the need for urgent interventions to hold Los Angeles County and San Diego County Sheriff's Departments accountable for addressing these issues, which could improve policing outcomes in counties that are home to 1 in every 3 Californians.</span></p>

                <iframe title="CA County Sheriff's Scores" aria-label="Dot Plot" id="datawrapper-chart-IamVk" src="https://datawrapper.dwcdn.net/IamVk/1/" scrolling="no" frameborder="0"></iframe>
                <script type="text/javascript">! function() {"use strict";window.addEventListener("message", function(a) {if (void 0 !== a.data["datawrapper-height"])for (var e in a.data["datawrapper-height"]) {var t = document.getElementById("datawrapper-chart-" + e) || document.querySelector("iframe[src*='" + e + "']");t && (t.style.height = a.data["datawrapper-height"][e] + "px")}})}();</script>

                <p class="c3 c9"><span class="c1"></span></p>
            </div>
        </div>
    </div>

    <div class="section about bg-white" style="padding: 60px 20px;">
        <div class="content">
            <p class="c3"><span class="c4 subtitle">Key Findings from Analysis of 2016-2017 Policing Data:</span></p>

            <ol class="c7 lst-kix_fckzbmam001m-0 start" start="1" style="margin-top: 40px;">
                <li class="c3 c8 c6"><span>Most people arrested in California are arrested for low level offenses.</span><span class="c4">&nbsp;</span><span>Of 1,354,769 reported arrests made in 2016, 70% </span><span>were for misdemeanor offenses. Police made </span><span class="c4">1.8x </span><span>as many</span><span class="c4">&nbsp;</span><span>arrests for </span><span class="c4">drug possession</span><span>&nbsp;alone as they did for </span><span class="c4">all violent crimes combined.</span><sup class="c4"><a href="#ftnt1" id="ftnt_ref1">[1]</a></sup><span class="c11 c4">&nbsp;</span></li>
            </ol>
            <p class="c3 c6"><span><a href="{{ asset('/images/findings/image5.png') }}" target="_"><img alt="" src="{{ asset('/images/findings/image5.png') }}" title=""></a></span></p>
            <ol class="c7 lst-kix_fckzbmam001m-0" start="2">
                <li class="c3 c8 c6"><span>Police discharged their firearms or otherwise used force causing death or </span><span>serious bodily injury</span><sup><a href="#ftnt2" id="ftnt_ref2">[2]</a></sup><span>&nbsp;in </span><span class="c4">1,276 incidents</span><span>&nbsp;from 2016-2017, killing 328 people and seriously injuring an additional 824 people. 647 of these incidents were police shootings, while the other half were other forms of police use of force that caused death or serious injury. </span><span class="c4">Overall</span><span>, </span><span class="c11 c4">half of people killed or seriously injured by police (49%) were unarmed. </span>

                    <br />
                    <br />

                    <span>Police in San Bernardino, Riverside, Stockton, Long Beach, Fremont and Bakersfield used deadly force at </span><span class="c4">substantially higher rates </span><span>than other major cities in California. San Jose and Los Angeles police used deadly force at 3x the rate of police in </span><span>San Francisco and San Diego</span><span>. </span><span>And Oakland police had one of the lowest rates of deadly force, reflecting the substantial decline in use of force incidents that has followed </span><span class="c10"><a class="c12" href="http://www.oaklandmagazine.com/April-2017/The-Year-of-No-Shootings/">DOJ mandated reforms </a></span><span>to their use of force policies. </span></p>
                    <p class="c3 c6"><span><a href="{{ asset('/images/findings/image1.png') }}" target="_"><img alt="" src="{{ asset('/images/findings/image1.png') }}" title=""></a></span>
                 </li>
            </ol>
            <p class="c3 c9 c6"><span class="c1"></span></p>
            <ol class="c7 lst-kix_fckzbmam001m-0" start="3">
                <li class="c3 c6 c8"><span>In reviewing the policy manuals of 90 of the 100 California police departments, we find </span><span class="c4">California police have more permissive use of force standards than the national average.</span><span>&nbsp;Only 16 departments (18%) required officers to use de-escalation when possible prior to using force and only 7 departments (8%) required officers to use all available means of apprehension, including non-lethal force, prior to using </span><span>deadly</span><span class="c15">&nbsp;</span><span>force. This is significantly lower than the 42% and 43%, respectively, of the big city police departments nationwide that </span><span class="c10"><a class="c12" href="http://useofforceproject.org">have such policies in place</a></span><span>. In some places, that is beginning to change. We identified four departments that adopted new use of force policies requiring de-escalation during the 2016-2017 period - Stockton, Sacramento, San Francisco, and Los Angeles. </span><span class="c4">All four departments had </span><span class="c10 c4"><a class="c12" href="https://drive.google.com/file/d/1YNEIO19C4X-6tkU5ZhlXsj_MaVlkM7pp/view">fewer police shootings</a></span><span class="c4">&nbsp;in 2018, after these policies were enacted, than their average shootings rate during the years prior to this policy&rsquo;s enactment.</span></li>
            </ol>
            <p class="c3 c6"><span><a href="{{ asset('/images/findings/image6.png') }}" target="_"><img alt="" class="narrow" src="{{ asset('/images/findings/image6.png') }}" title=""></a></span></p>
            <p class="c3 c9 c6"><span class="c1"></span></p>
            <ol class="c7 lst-kix_fckzbmam001m-0" start="4">
                <li class="c3 c8 c6"><span class="c4">When people come forward to report police misconduct in California, it rarely leads to accountability</span><span>. Statewide, </span><span class="c4">only 1 in every 14 civilian complaints </span><span>of police misconduct was ruled in favor of civilians in 2016-2017. In 81% of jurisdictions, civilians reporting misconduct had less than a 1 in 5 chance of the complaint being ruled in their favor by police investigators. Complaints concerning police violence and racial/identity discrimination almost never resulted in accountability. Civilians reporting police </span><span class="c4">racial discrimination </span><span>had only a </span><span class="c4">1 in 64 chance of their complaint being upheld</span><span>&nbsp;and </span><span>civilians reporting </span><span class="c4">use of force complaints </span><span>had only a </span><span class="c4">1 in 78 chance of being upheld. This lack of administrative accountability for police violence mirrors the criminal justice system&rsquo;s approach towards police violence. </span><span>Of 647 police shootings statewide between 2016-2017</span><span class="c4">, </span><span>only </span><span class="c10"><a class="c12" href="http://mappingpoliceviolence.org">one</a></span><span>&nbsp;of these incidents has</span><span>&nbsp;resulted in an officer being prosecuted for breaking the law.</span></li>
            </ol>
            <p class="c3 c6"><span><a href="{{ asset('/images/findings/image2.png') }}" target="_"><img alt="" src="{{ asset('/images/findings/image2.png') }}" title=""></a></span></p>
            <ol class="c7 lst-kix_fckzbmam001m-0" start="5">
                <li class="c3 c8 c6"><span class="c4">There&rsquo;s evidence of police racial bias in California, especially against black people. </span><span>Statewide, black people were arrested for misdemeanor offenses at </span><span class="c4">2.2x higher rate</span><span>&nbsp;per population than white people. </span><span class="c4">89 of California&rsquo;s 100 largest city police departments arrested black people for drug possession at higher rates than whites</span><span>, despite research showing similar rates of drug use and selling between the groups. And while police were more likely to arrest black people for low-level offenses, they were less </span><span>likely to find someone responsible for the most serious offense - homicide - when the victim was black</span><span class="c1">. California police reported finding a suspect in 76% of homicides of white victims from 2016-2017 compared to only 48% of Latinx victims and 48% of black victims.</span>

                    <br />
                    <br />

                    <span class="c4">There was also evidence of racial bias in police use of force. </span><span class="c4">California police were 32% more likely to shoot when arresting a black person and 20% more likely to shoot when arresting a Latinx person compared to a white person.</span><span>&nbsp;Similarly, police were 23% more likely to kill or seriously injure a black person and 20% more likely to kill or seriously injure a Latinx person when making an arrest. And while </span><span class="c4">46% of white people</span><span class="c15 c4">&nbsp;killed or seriously injured </span><span class="c4">by police were unarmed, 52% of black people and 51% of Latinx people were. </span>

                    <br />
                    <br />

                    <span><a href="{{ asset('/images/findings/image4.png') }}" target="_"><img alt="" src="{{ asset('/images/findings/image4.png') }}" class="narrow" title=""></a></span>

                    <br />
                    <br />

                    <span>Finally, p</span><span class="c1">olice also appear to be more likely to shoot black and Latinx people as a first response rather than first attempting non-lethal force to resolve the situation. Police shot first, rather than first attempting a lower level of force, in 87% of police shootings of black people and 84% of Latinx people compared to 81% of police shootings of white people.</span>

                    <br />
                    <br />

                    <span><a href="{{ asset('/images/findings/image3.png') }}" target="_"><img alt="" src="{{ asset('/images/findings/image3.png') }}" title=""></a></span>

                </li>

            </ol>

            <p class="c3"><span>When these outcomes are evaluated together, it reveals a disturbing picture of policing within the state. </span><span class="c4">Most departments received a score lower than 60% - the equivalent of an F grade. </span><span>In some cases, these evaluations confirmed what has previously been reported. For example, Bakersfield Police Department, which has been </span><span class="c10"><a class="c12" href="https://www.theatlantic.com/politics/archive/2015/12/the-deadliest-county-for-police-killings-in-america/418359/">cited</a></span><span>&nbsp;as one of the deadliest departments in the nation, received the 4th lowest score among the 100 California departments. Other departments received scores that were more unexpected. For example, Carlsbad Police Department received the highest score. Further exploration of the organizational culture, leadership and practices of this department might produce valuable insights into how to improve outcomes in</span><span>&nbsp;other police departments.</span><span>&nbsp;By contrast, Beverly Hills Police Department received </span><span class="c10"><a class="c12" href="https://policescorecard.org/?city%3Dbeverly-hills">the lowest score</a></span><span class="c1">&nbsp;of all 100 departments, due to relatively high levels of police violence, severe racial inequities in law enforcement and a system that almost never holds officers accountable for misconduct. </span></p>
            <p class="c3 c9"><span class="c1"></span></p>
            <p class="c3"><span>These findings should prompt further investigations and interventions targeting low-performing police departments within the state, not only from local policymakers but also potentially from the California Attorney General, who has the power to initiate pattern and practice investigations into local police agencies.</span></p>
            <hr class="c14">
            <div>
                <p class="c5 c16"><a href="#ftnt_ref1" id="ftnt1">[1]</a><span class="c2">&nbsp;The number of arrests for drug possession has not declined significantly since marijuana legalization took effect on November 9, 2016. Of the 192k arrests for drug possession statewide in 2016, 6k of those arrests were for marijuana possession. There were also slightly </span><span class="c10 c2"><a class="c12" href="https://crime-data-explorer.fr.cloud.gov/explorer/state/california/arrest/2007/2017">more arrests</a></span><span class="c2">&nbsp;for drug possession overall in 2017 than in 2016. As such, the reported </span><span class="c10 c2"><a class="c12" href="https://www.mercurynews.com/2018/07/11/prop-64-didnt-legalize-every-cannabis-crime-but-arrests-are-falling-fast/">56% reduction</a></span><span class="c2 c18">&nbsp;in marijuana arrests in 2017 did not substantially change the total number of drug possession arrests in the state.</span></p>
            </div>
            <div>
                <p class="c5 c16"><a href="#ftnt_ref2" id="ftnt2">[2]</a><span class="c19">&nbsp;</span><span class="c2">&ldquo;Serious bodily injury&rdquo; as defined by California&rsquo;s use of force reporting system means a bodily injury that involves a substantial risk of death, unconsciousness, protracted and obvious disfigurement, or protracted loss or impairment of the function of a bodily member or organ.</span></p>
            </div>
        </div>
    </div>

    <x-partial.footer :states="$states" />
@endsection
