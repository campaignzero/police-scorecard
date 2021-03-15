@extends('layouts.app')

@section('title', 'About')

@section('content')
    <x-partial.menu />

    <div class="section findings">
        <div class="content">

            <h1 class="title">
                POLICE SCORECARD PROJECT METHODOLOGY
            </h1>

            <h2 class="subtitle">
                ABOUT THE POLICE SCORECARD
            </h2>

            <p>
                <strong>The Police Scorecard is the first nationwide public evaluation of policing in the United States.</strong> The Scorecard calculates levels of police violence, accountability, racial bias and other policing outcomes for over 16,000 municipal and county law enforcement agencies, covering nearly 100% of the US population. The indicators included in this scorecard were selected based on a review of the research literature, input from activists and experts in the field, and a review of publicly available datasets on policing from federal, state, and local agencies. This project is designed to help communities, researchers, police leaders and policy-makers take data-informed action to reduce police use of force, increase accountability and reimagine public safety in their jurisdictions.
            </p>

            <h2 class="subtitle">
                PROJECT DEVELOPMENT, REVIEW, AND REFINEMENT
            </h2>

            <p>
                The Police Scorecard project was built by Samuel Sinyangwe and a team of data scientists, designers, developers, organizers, and students from across the country who believe in the power of data as a tool for justice, accountability and measurable change. This project and its methodological framework will continue to be updated over time in response to feedback and as more data are made available by local, state, and federal agencies. This includes incorporating additional indicators such as police stops and searches, police militarization, policies and procedures, and disciplinary outcomes. The full database, including source documentation, can be accessed <a href="https://drive.google.com/drive/folders/1iivJXgHgyXF9RR-wKYLnpXwXRCGVXlpE?usp=sharing" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Full Database') !!}>here</a>. We've also built an API for the Police Scorecard that can be accessed <a href="https://staywoke.docs.apiary.io/#reference/api-basics" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'API Docs') !!}>here</a>. If you have data to add to this project, analysis or visualizations using the data, or general inquiries, contact us.
            </p>

            <p>
                <strong>Data Team</strong><br/>
                Allie Monck<br/>
                Olivia Orta<br/>
                Ritesh Ramchandani<br/>
                Peter Schmalfeldt<br/>
                Ariel Matos<br/>
                Kirby Phares<br/>
                Emily Biondo<br/>
                Mary Hammond<br/>
                Frankie Wunschel
            </p>

            <p>
                <strong>Partners</strong><br/>
                MuckRock<br/>
                Tableau<br/>
                Microsoft
            </p>

            <p>
                <strong>Research Advisors</strong><br/>
                MapBox<br/>
                Abdul Rad, Independent Researcher, PhD Candidate, University of Oxford<br/>
                Bocar Ba, Assistant Professor of Economics, UC Irvine<br/>
                Jeffrey Fagan, Professor of Law, Columbia University
            </p>


            <h2 class="subtitle">
                HOW WE COLLECTED THE DATA
            </h2>

            <p>
                The Police Scorecard integrates data on police arrests, personnel, funding, incarceration rates and homicide clearance rates from official federal and state databases such as the FBI Uniform Crime Report (UCR), the Bureau of Justice Statistics' Annual Survey of Jails, the US Census Bureau's Survey of State and Local Government Finances and the California Department of Justice's OpenJustice database. Where agencies did not report data to one of these programs, data were sourced from local agency publications and media reports. Data on killings by police were obtained via the Mapping Police Violence database, which documents each case in which police directly caused the death of another person through the use of a firearm or any other type of force. Finally, data on non-fatal police use of force incidents and police misconduct complaints were obtained directly from police agencies via public records requests, annual reports and departments' open data sites. The full list and descriptions of each data source used in this project can be found in Appendix A below.
            </p>

            <h2 class="subtitle">
                HOW AGENCY SCORES ARE CALCULATED:
            </h2>

            <p>
                There are substantially different perspectives about what police should or should not do - and whether the institution of policing should continue to exist at all. These differences cannot all be resolved at once, but we believe there are a set of common principles that can provide an initial framework for evaluating <em>any</em> agency that responds to issues of public safety:
            </p>

            <ol>
                <li>
                    The agency should prioritize addressing serious threats to public safety, <strong>not arresting or incarcerating people for low level offenses</strong>
                </li>
                <li>
                    The agency should <strong>avoid the use of force</strong>, especially deadly force, to the greatest extent possible
                </li>
                <li>
                    When people come forward to report misconduct by employees of the agency, it should result in some form of <strong>accountability</strong>
                </li>
                <li>
                    When people call on the agency to solve the <strong>most serious crimes</strong> - those resulting in death - they should be able to trust that agency to find the person responsible
                </li>
                <li>
                    The agency should accomplish these goals in ways that are <strong>not biased or discriminatory</strong>
                </li>
                <lli>
                    The agency should accomplish these goals at the <strong>lowest cost possible</strong>, minimizing the financial burden on communities
                </lli>
            </ol>

            <p>
                Based on these principles, we obtained data from federal, state and local databases to evaluate over 13,200 municipal police departments and 2,800 county sheriff's departments, represented by a "score" from 0-100 with a score of 0 representing the worst outcomes and 100 representing outcomes most consistent with the principles stated above. The scores attributed to police agencies in our analysis should be interpreted as relative scores, showing how each agency compares to other agencies across four areas of policing: police violence, police accountability, police funding, and an evaluation of each agency's approach to law enforcement (for example, the extent to which an agency focuses on arresting people for low-level offenses or addressing serious crimes).
            </p>

            <p>
                Using this methodology, a police department received a higher grade if it made <em>fewer arrests</em> for low level offenses, <em>used less force</em> during arrest, left em in arrests and use of force, <em>spent less money</em> on policing, and <em>upheld civilian complaints of police misconduct more often</em> than other agencies. In order to ensure appropriate comparisons among agencies with different roles and jurisdictions, municipal police departments are evaluated in comparison to other municipal police departments of similar sized jurisdictions and county sheriff's departments are evaluated in comparison to other county sheriff's departments of similar sized jurisdictions (jurisdictions with over 250,000 population are compared to one another, as are jurisdictions with 100,000-249,999 population, jurisdictions with 50,000-99,999 population, and those with < 50,000 population).
            </p>


            <h2 class="subtitle">
                HERE ARE THE FACTORS THAT WERE USED TO CALCULATE EACH AGENCY'S SCORE:
            </h2>

            <h2 class="subtitle">
                POLICE FUNDING SCORE
            </h2>

            <p>
                The police funding score renders the amount of resources cities and counties spend on policing compared to other issues such as public health and housing/homelessness. This includes indicators measuring the total amount of budgetary expenditures on police and sheriff's departments, the average amount of money spent on police misconduct settlements (which usually are not paid from police budgets) and the amount of money taken from communities by law enforcement through fines and asset forfeiture. The police funding score also includes a measure tracking the total number of officers per population in each jurisdiction, since the size of the police force structures the police budget and evaluates the level of overall policing/police presence in communities (for example, <a href="https://www.policeforum.org/assets/docs/Free_Online_Documents/Budgeting/police%20department%20budgeting%20-%20a%20guide%20for%20law%20enforcement%20chief%20executives%202002.pdf" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Surveys of Law Enforcement') !!}>surveys</a> of law enforcement agencies find personnel costs such as officer salaries and benefits comprise an average of 85% of police budgets). Under the Police Scorecard's methodological framework, cities and counties that invest more resources per capita in policing communities and/or that impose more financial burden on communities through the use of fines and property seizures receive a lower score. The following formula was used to calculate this score:
            </p>

            <p>
<pre>(
    Percentile Police Funding per Population +
    Percentile Number of Officers per Population +
    Percentile Average Funds Spent on Misconduct Settlements +
    Percentile Funds Taken From Communities in Fines and Forfeitures per Population
) / 4</pre>
            </p>

            <h2 class="subtitle">
                POLICE VIOLENCE SCORE:
            </h2>

            <p>
                The police violence score takes into account how often police used higher levels of force against people including any time police discharged a firearm or used a taser, baton, OC spray, impact projectile or stranglehold against a civilian. Since the vast majority of use of force incidents occurred during an arrest, consistent with previous <a href="https://policingequity.org/images/pdfs-doc/CPE_SoJ_Race-Arrests-UoF_2016-07-08-1130.pdf" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Previous Police Violence Research') !!}>research</a> we benchmarked use of force incidents against the total number of arrests made and then factored in the severity of force used and whether the people force was used against were unarmed into each police department's police violence score.
            </p>

            <p>
                Racial disparities in deadly force were also factored into each department's police violence score. To calculate a racial disparity score for killings by police, we calculated the disparity in rates of killings by police per population between Black and white populations and between Latinx and white populations, taking the most extreme of the disparities between the two and then converting this to a percentile score relative to other departments. In summary, the following formula was used to calculate each department's police violence score:
            </p>

            <p>
<pre>(
    Percentile Less Lethal Force Used per Arrest +
    Percentile Deadly Force Used per Arrest +
    Percentile Unarmed Civilians Killed +
    Percentile Racial Disparities in Deadly Force
) / 4</pre>
            </p>

            <h2 class="subtitle">
                POLICE ACCOUNTABILITY SCORE
            </h2>

            <p>
                The police accountability score evaluates the extent to which investigations into civilian complaints of police misconduct result in a sustained finding of misconduct against the officers involved, which is usually the first step to imposing disciplinary consequences. The score accounts for both how police departments compare with one another in terms of their overall civilian complaint sustain rate and the severity of the misconduct allegations that were sustained against officers. For example, complaints alleging police committed a criminal offense and complaints alleging police used excessive force or discriminated against people received additional consideration compared to other allegations. The following formula was used to calculate this score:
            </p>

            <p>
<pre>1/2 ( Percentile Civilian Complaints Sustained ) +
1/2 ( Percent Discrimination, Excessive Force and Criminal Complaints Sustained )</pre>
            </p>

            <h2 class="subtitle">
                APPROACH TO LAW ENFORCEMENT SCORE
            </h2>

            <p>
                The approach to policing score evaluates the extent to which police departments focus on arresting people for low-level offenses or focusing on solving serious crimes. The score accounts for the proportion of the most serious crimes - homicide - that an agency solves as well as how each agency compares in terms of its approach to the lowest level offenses. We defined low level offenses as the combination of all arrests for drug offenses, public drunkenness and other alcohol-related offenses; vagrancy, loitering, gambling, disorderly conduct, prostitution, vandalism, and other minor non-violent offenses. These types of offenses are usually classified as misdemeanors and are often associated with issues of substance abuse, homelessness and sex work. This definition excludes all arrests for violent crimes, assaults, crimes against families and children, weapons offenses, sex offenses and all arrests for property crimes except for vandalism.<sup>[1]</sup> Higher rates of low level arrests per population suggest a department is engaging in aggressive "public order" or "broken-windows" policing practices that have not been proven to improve public safety and instead expose communities, especially marginalized communities, to increased policing, arrest and incarceration (for additional reading, see here, here and here). Racial disparities in drug possession arrests were also factored into a department’s approach to policing score. Since there are similar rates of drug use among most racial and ethnic groups, disparities in which groups police arrest for drug possession suggest a biased approach to law enforcement. As such, we used data on racial disparities in drug possession arrests from the Uniform Crime Report as a proxy for estimating racial bias. Since departments in Florida do not report drug arrest data distinguishing possession and sales arrests, all drug arrests were used to calculate disparities in Florida. We calculated racial disparities both between Black and white populations and between Latinx and white populations, converting the most extreme of these two disparities to a percentile score for racial disparities in law enforcement.
            </p>

            <p>
<pre>(
    Percentile Low Level Arrests per Population +
    Percentile Racial Disparities in Drug Possession Arrests +
    Percent Homicides Cleared
) / 3</pre>
            </p>

            <h2 class="subtitle">
                EVALUATING COUNTY SHERIFF'S DEPARTMENTS
            </h2>

            <p>
                The Police Scorecard currently includes 2,878 county law enforcement agencies, covering 92% of all US counties (the remaining counties are largely policed by state police). In addition to the indicators used to evaluate municipal police departments, we added a set of indicators to evaluate county Sheriff's Departments that reflect their role in operating County Jails. This data includes:
            </p>

            <p>
                <strong>1. Percentile of Jail Incarceration Rates per 1,000 Residents, 2018</strong>
            </p>

            <p>
                This indicator displays each County Sheriff's Department's Average Daily Jail Population in 2018 divided by the total population of the Sheriff's Jurisdiction. This data was obtained from the Bureau of Justice Statistics 2018 Annual Survey of Jails (the most recent survey we could find with data on this issue that has been made public). Importantly, since sheriff's departments have primary jurisdiction over unincorporated areas within counties and the cities that do not operate their own police departments (these cities contract with the sheriff's department for law enforcement services), we estimated the total population of each jurisdiction by subtracting from the total county population the populations of each city that has its own municipal police department.
            </p>

            <p>
                <strong>2. Percentile of Jail Deaths per 1,000 Avg Daily Jail Population, 2013-2019</strong>
            </p>

            <p>
                This indicator displays the rate of deaths within each county's jails per 1,000 jail population from 2013-2019, based on data <a href="https://www.reuters.com/investigates/special-report/usa-jails-graphic/#:~:text=7%2C571Reuters%20documented%207%2C571%20inmate,the%20decade%20ending%20in%202019." target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Reuters Investigation Data') !!}>compiled</a> by Reuters investigators. To calculate this indicator, we divided the total number of jail deaths within each county from 2013-2019 by the countywide Average Daily Jail Population. We also included information about the reported cause of death in these cases.
            </p>

            <p>
                <strong>3. Percent of Civilian Complaints in Detention Sustained from 2016-2019</strong>
            </p>

            <p>
                This indicator displays the percentage of reported complaints in detention that were sustained from 2016-2019, as determined by the California Department of Justice's CCOPA database and data obtained from county agencies via public records requests.
            </p>

            <p>
                <strong>4. Number of People Transferred to ICE in 2018</strong>
            </p>

            <p>
                This indicator displays the number of people transferred to Immigration Enforcement from local jails in 2018 (previous years of data were unavailable), as reported to the Annual Survey of Jails 2018. Additionally, more detailed information on ICE transfers, including the proportion of transfers by alleged offense type is displayed for departments in California based on data obtained from the California Department of Justice's Values Act Transfers database.
            </p>

            <p>
                <strong>5. Percent of People in Jail Without Being Convicted, 2018</strong>
            </p>

            <p>
                This indicator evaluates the use of pre-trial detention within each County Sheriff's Department's jail. It measures the total number of people in each jail who were not yet convicted of the crime associated with their incarceration divided by each agency's total jail population, as reported to the Bureau of Justice Statistics 2018 Annual Survey of Jails. Since this was a one-time snapshot of each jail population on June 29, 2018, we used the total jail populations reported to the survey rather than average daily jail populations to evaluate the percent of the total who were unconvicted.
            </p>


            <p>
                The first two of these indicators were included in each Sheriff's Department's initial Approach to Policing Score as such:
            </p>

            <p>
<pre>(
    Percentile Low Level Arrests per Population +
    Percentile Racial Disparities in Drug Possession Arrests +
    Percent Homicides Cleared +
    Percentile Jail Incarceration Rate +
    Percentile Jail Deaths per Jail Population
) / 5</pre>
            </p>

            <p>
                The Percent of Complaints in Detention Sustained are already incorporated into each department's overall complaint sustain rate which contributes to their Police Accountability Score. Additional indicators, including Transfers to ICE, will be factored into each department's score over time as we obtain more years of data to evaluate these issues. For example, we only have access to one year of data on ICE transfers: 2018.
            </p>

            <h1 class="title">APPENDIX A:</h1>

            <h2 class="subtitle">DATA SOURCES:</h2>

            <h2 class="subtitle">KILLINGS BY POLICE</h2>

            <p>
                DEFINITION: PEOPLE KILLED BY LAW ENFORCEMENT OFFICERS FROM 2013-2019.
            </p>

            <p>
                We used the Mapping Police Violence database, which combines information on people killed by police from 2013-2019 sourced from public records requests, local media reports and other crowdsourced databases such as the Fatal Encounters database. This database includes information on 7,641 people killed by police nationwide from 2013-2019, 91% of whom were killed by one of the law enforcement agencies currently represented in the Police Scorecard. Importantly, this database allows for a more comprehensive evaluation of killings by police than would be possible using official data, since only about <a href="https://www.marketplace.org/2020/06/01/fbi-police-use-of-force-database/" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', '40% Reported') !!}>40%</a> of the nation's law enforcement reports data to the federal government's Use of Force Data Collection program and that data still has not been released publicly. The Mapping Police Violence database is also more expansive than the Washington Post's police shootings database because it includes cases where people are killed by types of police use of force in addition to fatal police shootings (i.e. killings by tasers, batons, chokeholds and intentional vehicle strikes) as well as cases that occurred prior to 2015. The database also evaluates whether each person killed by police was armed with a gun, armed with another weapon or vehicle, or unarmed at the time of the incident. Using the coding schema in the Mapping Police Violence database, cases were coded as unarmed when the person killed by police did not possess an actual weapon - which includes both people who had no object in their hands and people who had common/household objects like cell phones, spoons or a toy that may have been perceived to be a weapon but ended up not constituting a real threat.
            </p>

            <h2 class="subtitle">POLICE SHOOTINGS (BOTH FATAL AND NON-FATAL)</h2>

            <p>
                DEFINITION: ANY INCIDENT WHERE A FIREARM WAS DISCHARGED AT A PERSON, REGARDLESS OF WHETHER IT CAUSED INJURY OR DEATH
            </p>

            <p>
                In the absence of comprehensive federal data on police shootings, we obtained data on the total number of police shootings incidents per year from individual law enforcement agencies across the country via public records requests, media databases and official databases in states that track police shootings systematically: California, Colorado, Illinois, Maryland and Minnesota. Since California's <a href="https://openjustice.doj.ca.gov/data" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'URSUS Collection Program') !!}>URSUS use of force data collection program</a> includes more detailed information about the circumstances of each police shooting incident - in particular which types of force were used in each incident - we were able to determine the proportion of each department's police shootings where officers discharged their firearms without attempting to use any less-lethal or non-lethal force option first or instead of escalating to deadly force. Similarly, the URSUS database requires agencies to report what objects, if any, officers perceived the person they used deadly force against to have and then what object they ended up being found to have as a result of the encounter. These data were used to calculate the proportion of police shootings incidents where police reportedly saw a gun but no gun was found.
            </p>


            <h2 class="subtitle">LESS LETHAL FORCE</h2>

            <p>
                DEFINITION: THE TOTAL NUMBER OF USES OF TASERS, BATONS, PROJECTILES, PEPPER SPRAY, OTHER WEAPONS AND STRANGLEHOLDS AGAINST CIVILIANS FROM 2016-2019
            </p>

            <p>
                To obtain information on serious police use of force that did not rise to the level of deadly force, we submitted public records requests to the 500 largest police and county sheriff's departments nationwide asking for the total number of uses of force, by type of force used, from 2013-2019. 209 agencies sent us their data or published this information online. Detailed data showing use of force by force type for each responsive department can be found here. Each department varied in how they categorized and reported the use of force. For example, some police departments require officers to report all weaponless strikes and control holds used against a civilian, while others only require these types of force to be reported when they cause injury. Similarly, some departments require officers to report whenever they display a firearm or taser, while others only require them to report when these weapons are discharged. Given these reporting inconsistencies, we limited our analysis to more serious forms of force since these were more consistently reported and categorized among the agencies we obtained data from. This included uses of "less lethal" force such as tasers, batons, impact projectiles, OC spray and a form of stranglehold called a carotid restraint.
            </p>

            <p>
                Police departments also differed in how they counted uses of force when more than one officer used force during a single encounter. For example, in cases where two officers both used a taser on the same person, some departments count this as two uses of force while others count it as one use of force. We evaluated how each department counted use of force by examining their use of force reporting policies, use of force data, and by following-up directly with departments for clarification. Based on this information, we determined that most departments that sent their use of force data counted cases where multiple officers used the same type of force as multiple uses of that type of force while counting it as one use of force when one officer uses the same type of force more than once in the same incident.
            </p>

            <p>
                Despite these efforts, we recognize there may still be differences that were unaccounted for within each department's internal system for compiling and reporting uses of less lethal force. Moreover, we could not account for the degree to which force may have been systematically underreported by some agencies. This is a living project: we will continue to update the information on our site in response to feedback from law enforcement agencies and the public.
            </p>

            <h2 class="subtitle">CIVILIAN COMPLAINTS</h2>

            <p>
                DEFINITION: THE TOTAL NUMBER OF COMPLAINTS, BY TYPE OF COMPLAINT, REPORTED BY CIVILIANS AGAINST LAW ENFORCEMENT PERSONNEL FROM 2016-2019
            </p>

            <p>
                The Police Scorecard includes the total number of complaints reported each year from 2016-2019, the number of those complaints that were sustained (i.e. upheld by investigators), with breakdowns for the total number of use of force complaints, complaints of police discrimination, and criminal complaints that were reported and the number of each that were sustained during that time period. To obtain these data, we submitted public records requests to local police and sheriff's departments and also requested data from state criminal justice agencies in the states that currently collect information on civilian complaints.
            </p>

            <p>
                The composition and quality of these state databases varied substantially - as well as the types of information on this subject that we could obtain under each state's open records laws. For example, in California, all law enforcement agencies are required to provide the California Department of Justice with Citizens' Complaints Against Peace Officers (CCAPO) data through an annual summary. The information includes the number of criminal and non-criminal complaints reported by citizens, racial and identity profiling complaints, complaints of misconduct in jail (for sheriff's departments) and the findings from investigations into those complaints. In Maryland, by contrast, only the total number of sustained complaints involving an alleged criminal offense or a use of force incident causing death or serious injury are required to be reported to the state (and in many cases, agencies have failed to report even this information). Altogether, we found statewide databases containing at least some information on civilian complaints in California (total complaints by type and outcome), Maryland (sustained criminal complaints and complaints involving the use of deadly force), Texas (racial profiling complaints), and Minnesota (criminal and administrative investigations by type of allegation).
            </p>

            <p>
                There are important limitations to consider regarding the current availability of data on police accountability within the United States. There are no national standards or systems for reporting complaints of police misconduct. There are differences in how each agency classifies and investigates these complaints. For example, some agencies only reported data on the number of investigations conducted into complaints rather than the total number of complaints received. Others reported data only on the number of allegations reported and sustained, but not the number of overall complaints reported or sustained (a single complaint can contain more than one allegation of misconduct, for example an officer who is alleged to engage in both discriminatory policing and excessive force in a single encounter). Where individualized data was made available by agencies, we used it to calculate data at the complaint (rather than allegation) level. Our database will continue to be updated in response to more detailed data obtained from agencies.
            </p>

            <h2 class="subtitle">ARRESTS</h2>

            <p>
                DEFINITION: THE TOTAL NUMBER OF ARRESTS REPORTED BY POLICE FROM 2013-2019.
            </p>

            <p>
                Data on the number of each agency's arrests from 2013-2019 were obtained from the FBI Uniform Crime Report. However, since this database classifies arrests by race separately than arrests by ethnicity, we used US Census population data to estimate the number of Black and white arrestees who were also classified as Hispanic.
                Since police agencies in Florida and Illinois generally did not report arrests data to the FBI UCR, we obtained their arrest data from the <a href="https://www.fdle.state.fl.us/FSAC/Data-Statistics/UCR-Arrest-Data.aspx" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Florida Department of Law Enforcement') !!}>Florida Department of Law Enforcement</a> and from reports published by individual agencies in Illinois.
            </p>

            <p>
                <em>Estimation of Arrests by Ethnicity (Hispanic and non-Hispanic):</em>
            </p>

            <p>
                In order to evaluate racial disparities across departments, we need to have estimates for the number of Hispanic arrests, non-Hispanic White arrests, and non-Hispanic Black arrests that each department made from 2013-2019. Since UCR data prior to 2017 does not include information specifying how many Hispanic arrests each agency made; we used the ethnicity data each agency reported from 2017-2019 to estimate the number of Hispanic arrests made from 2013 to 2019 as follows:
            </p>

            <ul>
                <li>
                    Hispanic Arrest Proportion = Hispanic arrests 2017-2019 / (Hispanic Arrests 2017-2019 + Non-Hispanic Arrests 2017-2019)
                </li>
                <li>
                    Hispanic Arrests 2013-2019<sup>[2]</sup> = Hispanic Arrest Proportion x (White Arrests + Black Arrests).
                </li>
            </ul>

            <p>
                Importantly, this methodology assumes that Hispanic arrests are either categorized as White or Black in the data reported to the UCR. In practice this may not always be how agencies code Hispanic arrests, but based on race and ethnicity data from larger agencies this appears to be a reasonable assumption. After estimating the Hispanic arrests from 2013-2019 as described above, we estimated the number of those Hispanic arrests who were racially White or Black using the Census proportions for the percentage of the population in that jurisdiction who identify as White and Hispanic, or Black and Hispanic. The proportions were calculated as follows:
            </p>

            <ul>
                <li>
                    Black-Hispanic Proportion = Census Percentage Black and Hispanic / (Census Percentage Black and Hispanic + Census Percentage White and Hispanic)
                </li>
                <li>
                    White-Hispanic Proportion = Census Percentage White and Hispanic / (Census Percentage Black and Hispanic + Census Percentage White and Hispanic)
                </li>
            </ul>

            <p>
                Then to estimate the number of Hispanic arrests that were racially Black or White, we computed:
            </p>

            <ul>
                <li>
                    Black-Hispanic Arrests = Black-Hispanic Proportion x Black Arrests
                </li>
                <li>
                    White-Hispanic Arrests = White-Hispanic Proportion x White Arrests
                </li>
                <li>
                    Non-Hispanic Black Arrests = Black Arrests – Black and Hispanic Arrests
                </li>
                <li>
                    Non-Hispanic White Arrests = White Arrests – White and Hispanic Arrests
                </li>
            </ul>

            <p>
                For some agencies, these computations resulted in negative values for Non-Hispanic Black Arrests or Non-Hispanic White Arrests, in which case we reallocated the number of Black-Hispanic Arrests or White-Hispanic Arrests to the other race category so that the negative arrests would equal 0. We also estimated confidence intervals for the number of Black-Hispanic Arrests and White-Hispanic Arrests by assuming these quantities were binomially-distributed with probability equal to Black-Hispanic proportion and White-Hispanic proportion. The same methodology above was used to estimate racial demographics of people arrested for drug possession in our racial disparity analysis.
            </p>

            <h2 class="subtitle">HOMICIDES REPORTED AND HOMICIDES SOLVED</h2>

            <p>
                DEFINITION: THE TOTAL NUMBER OF CRIMINAL HOMICIDES REPORTED AND THE TOTAL NUMBER CLEARED BY ARREST OR EXCEPTIONAL MEANS FROM 2013-2019
            </p>

            <p>
                We obtained data on the number of criminal homicides reported and those that were cleared from 2013-2019 from the FBI Uniform Crime Report and Supplementary Homicide Report databases. Consistent with the definitions used by these databases, criminal homicides are classified as murder and non-negligent manslaughter but exclude suicides, accidents, "justifiable homicides" and deaths caused by negligence. Homicides were classified as "cleared" when they resulted in either an arrest or were cleared through "exceptional means" (These are cases in which there is sufficient evidence but an arrest is reportedly not possible, for example, if the person suspected has died). We recognize that homicides cleared by arrest or exceptional means is an imperfect measure of murders "solved," for a variety of reasons (for example, not everyone arrested ends up being guilty of the offense). However, the Uniform Crime Report does not distinguish between these outcomes and, as such, we are limited by the data that are currently available.
            </p>

            <p>
                We also included in the scorecard statistics on proportion of homicides cleared by race of the victim. Since the Uniform Crime Report did not disaggregate agency-level homicide clearance rates by race of victim, we relied on the Supplementary Homicide Report (SHR) database with enhanced case-level data from the Murder Accountability Project (MAP) to determine the percent of homicides "solved" by race of the victim for each jurisdiction from 2013-2019. Importantly, since homicides tend to be reported to the SHR database an average of 5 months after each incident (depending on jurisdiction), fewer homicides are reported as solved in this dataset compared to the end-of-year Uniform Crime reports. According to MAP, 5-10% of homicides reported as unsolved at the time of reporting to the SHR were cleared later. As such, the SHR data should be interpreted as the proportion of homicides solved within a shorter time frame than the UCR, which is useful for evaluating police efficacy at solving homicides given the race of the victim.
            </p>

            <h2 class="subtitle">POLICE FUNDING</h2>

            <p>
                DEFINITION: THE TOTAL AMOUNT OF MONEY SPENT ON POLICING BY EACH CITY OR COUNTY FROM 2010-2020
            </p>

            <p>
                This includes data on the total amount of city budget expenditures spent on policing in each city or county from 2010-2018 as reported to the Census Bureau's <a href="https://www.census.gov/data/datasets/2017/econ/local/public-use-datasets.html" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Annual Survey of State and Local Government Finances') !!}>Annual Survey of State and Local Government Finances</a>. For many cities, we were also able to obtain more recent data (2019-2020) from budgetary documents on local governments' websites and the <a href="https://www.vera.org/publications/what-policing-costs-in-americas-biggest-cities" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Police Funding Data for 72 Large Cities') !!}>police funding data for 72 large cities</a> created by the Vera Institute. The Scorecard also includes data on each local government's expenditures on other issues that impact public safety - such as funding for Health and for Housing and Community Development. In some cases, we found discrepancies between the Census Bureau's data and the data included in a city or county's budget documents. Where such discrepancies were found, we used the data in the city or county budget documents in our analysis, given they often provide more detail.
            </p>

            <p>
                We used the <a href="https://www2.census.gov/programs-surveys/gov-finances/technical-documentation/questionnaires/historical-forms/2017/f28_2017_blank.pdf?#" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'US Census Bureau Definitions') !!}>definitions</a> established by the US Census Bureau to evaluate agency funding:
            </p>

            <p>
                <em>Police expenditures</em> include all expenditures on police agencies; law enforcement activities of sheriff and constable offices; coroners; medical examiners; vehicular inspection activities; traffic control and safety activities; lock-up operations. The Census <a href="https://www.census.gov/data/datasets/2017/econ/local/public-use-datasets.html" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Annual Survey of State and Local Government Finances') !!}>Annual Survey of State and Local Government Finances</a> did not, however, include contributions to police pension funds as expenditures. Similarly, the amount of police expenditures represented in the Scorecard does not include spending on local court activities and correctional expenditures, which are tracked separately by the Census. Note that there may be differences between the amount of spending a local government reported to the Census and the spending projections published in budgetary documents. In order to ensure consistency across agencies, we relied on the Census data where possible.
            </p>

            <p>
                <em>Health expenditures</em> includes expenditures for all public health activities, except the provision of hospital care which is tracked separately by the Census. Health expenditures include spending on all environmental health activities, health regulation and inspection, water and air pollution control, mosquito control, animal control warden, inspection of food handling establishments, ambulance and paramedic services not part of a fire department, public health nursing, vital statistics collection, and all other services performed directly by the public health department.
            </p>

            <p>
                <em>Housing and community development expenditures</em> include all gross expenditures for urban renewal housing projects and similar activities.
            </p>

            <h2 class="subtitle">FINES AND FORFEITURES</h2>

            <p>
                DEFINITION: THE TOTAL VALUE OF PROPERTY AND CASH CONFISCATED THROUGH ASSET FORFEITURE OR COLLECTED BY FINES, 2010-2018
            </p>

            <p>
                This includes data on the total amount of city budget revenues collected through fines or forfeitures in each city or county from 2010-2018 as reported to the Census Bureau's <a href="https://www.census.gov/data/datasets/2017/econ/local/public-use-datasets.html" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Annual Survey of State and Local Government Finances') !!}>Annual Survey of State and Local Government Finances</a>. This measure can be used to assess potential excessive use of ticketing, civil asset forfeiture and other policing practices that often supplement police budgets by imposing an additional economic burden on communities.
            </p>

            <h2 class="subtitle">TOTAL NUMBER OF OFFICERS</h2>

            <p>
                DEFINITION: THE NUMBER OF SWORN LAW ENFORCEMENT OFFICERS EMPLOYED AT EACH AGENCY, 2013-2019
            </p>

            <p>
                This includes data specifying the total number of sworn law enforcement officers employed by each agency as reported to the UCR LEOKA program. Sworn officers are defined as employees who "ordinarily carry a firearm and a badge, have full arrest powers, and are paid from governmental funds set aside specifically to pay sworn law enforcement."
            </p>

            <h2 class="subtitle">POLICE MISCONDUCT SETTLEMENTS</h2>

            <p>
                DEFINITION: THE AVERAGE AMOUNT SPENT ON POLICE MISCONDUCT SETTLEMENTS ANNUALLY FROM 2012-2014
            </p>

            <p>
                This includes data specifying the average amount of money per year from 2012-2014 in settlements and judgements related to lawsuits against the 65 of America's largest law enforcement agencies - the largest study on this issue to date. Researchers obtained the data used in their analysis using public records requests to each agency, publishing the settlement amounts for each agency in the <a href="https://pdfs.semanticscholar.org/8a28/9aa5b4eb738c08d6995414c7dd396d808fc7.pdf" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'UCLA Law Review') !!}>UCLA Law Review</a>.
                In some cases, more recent data on police misconduct settlements were able to be obtained from recent media <a href="https://fivethirtyeight.com/features/police-misconduct-costs-cities-millions-every-year-but-thats-where-the-accountability-ends/" target="_blank" rel="noopener" {!! trackData('External Nav', 'About', 'Media Analyses') !!}>analyses</a>.
            </p>

            <div class="divider"></div>

            <p class="footnote"><sup>[1]</sup> Since the FBI’s UCR arrests database does not distinguish between lower level property crimes such as petty theft or shoplifting and more serious forms of theft, we were not able to include any arrests for petty theft or shoplifting within the low level arrests category. Similarly, arrests for non-DUI related traffic offenses are not reported to the UCR program. This likely results in an undercount of the total number of low level arrests made by each agency.</p>

            <p class="footnote"><sup>[2]</sup> To avoid imprecise or unreliable estimates of this proportion, we excluded departments who had categorized fewer than 25% of their arrests by ethnicity or had fewer than 50 arrests categorized by ethnicity. Then to estimate the total number of Hispanic arrests between 2013-2018, we multiplied the Hispanic Arrest Proportion by the total number of arrests that were categorized by race as “White” or “Black”.</p>
        </div>
    </div>

    <x-partial.footer :states="$states" />
@endsection
