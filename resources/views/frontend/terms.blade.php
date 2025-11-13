@extends('user.user_dashboard')

@section('user')

     @php
    $settings = App\Models\setting::first();
@endphp

<div class="terms-wrapper">
   <!-- FIXED SIDEBAR HTML - Remove the <br> tag after first link -->
<aside class="sidebar">
    <div class="card shadow-sm">
        <div class="card-body">
            <h5 class="fw-bold mb-4">Table of contents</h5>
            <nav class="nav flex-column toc-nav">
                <a class="nav-link ps-0 py-2 text-dark" href="#eligibility">1. Member Eligibility & Accounts</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#verification">2. Member Verification</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#venue">3. NuviaCare is a Venue</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#license">4. License</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#ownership">5. Ownership</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#content">6. Rules Regarding Information & Other Content</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#conduct">7. General Rules of User Conduct</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#payments">8. Payments</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#text-messages">9. Text Messages</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#forum">10. NuviaCare Forum</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#professional-advice">11. No Professional Advice</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#promotional">12. Promotional Offers</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#modifications">13. Modifications to the Site or Services</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#third-party">14. Third Party Content & Other Websites</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#suspension">15. Suspension/Termination</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#agency">16. Agency Caregivers</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#warranties">17. Disclaimer of Warranties</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#liability">18. Limitation of Liability</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#indemnification">19. Indemnification</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#copyright">20. Copyright Violations</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#electronic">21. Electronic Communications</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#beneficiaries">22. No Third Party Beneficiaries</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#affiliation">23. No Affiliation</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#arbitration">24. Arbitration</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#general">25. General Terms</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#survival">26. Survival</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#complaints">27. Consumer Complaints</a>
                <a class="nav-link ps-0 py-2 text-dark" href="#notice">28. Notice; Contact Information</a>
            </nav>
        </div>
    </div>
</aside>

<style>
/* UPDATED CSS */

/* Wrapper Layout */
.terms-wrapper {
    display: flex;
    height: 100vh;
    overflow: hidden;
}

/* Sidebar */
.sidebar {
    width: 25%;
    background: #f8f9fa;
    height: 100vh;
    overflow-y: auto;
    padding: 1rem;
    position: sticky;
    top: 0;
    border-right: 1px solid #e1e4e3;
}

.sidebar .card {
    border: none;
    background: transparent;
}

.sidebar h5 {
    color: #1a5c52;
}

/* Sidebar links - FIXED */
.toc-nav {
    display: flex;
    flex-direction: column; /* Force vertical layout */
}

.toc-nav .nav-link {
    font-size: 0.95rem;
    color: #333;
    border-left: 3px solid transparent;
    padding: 0.4rem 0 0.4rem 0.5rem;
    transition: all 0.2s ease;
    text-decoration: none;
    display: block; /* Changed from flex to block */
}

.toc-nav .nav-link:hover,
.toc-nav .nav-link.active {
    color: #1a5c52;
    border-left-color: #1a5c52;
    background: #eef5f3;
    padding-left: 0.8rem;
}

/* Main Content */
.main-content {
    width: 75%;
    overflow-y: auto;
    padding: 2rem;
    line-height: 1.7;
    color: #333;
}

.section-title {
    color: #2c5f6f;
    border-bottom: 2px solid #e9ecef;
    padding-bottom: 0.5rem;
    margin-bottom: 1.5rem;
}

/* Custom Scrollbar */
.sidebar::-webkit-scrollbar,
.main-content::-webkit-scrollbar {
    width: 6px;
}
.sidebar::-webkit-scrollbar-thumb,
.main-content::-webkit-scrollbar-thumb {
    background-color: #bbb;
    border-radius: 3px;
}

/* Mobile Responsive */
@media (max-width: 992px) {
    .terms-wrapper {
        flex-direction: column;
        height: auto;
    }

    .sidebar {
        width: 100%;
        height: auto;
        position: relative;
        border-right: none;
        border-bottom: 1px solid #e1e4e3;
    }

    .main-content {
        width: 100%;
        padding: 1.5rem;
    }
}
</style>
        <!-- Main Content -->
       
                <!-- Section 1 -->
                <div class="main-content">
        <h1 class="display-5 fw-bold mb-4" style="color: #2c5f6f;">Terms of Use</h1>

        <div class="terms-content">
            <section id="eligibility" class="content-section">
                    <h2 class="section-title h4 fw-bold mb-3">Member eligibility & accounts</h2>
                    <h5 class="fw-semibold mt-4 mb-3">Eligibility.</h5>
                    <p>By using the Site, You represent and warrant that:</p>
                    <ul class="ms-4">
                        <li>You are at least 18 years old;</li>
                        <li>You are and will continue to be a United States citizen and/or a person legally authorized to work in the United States;</li>
                        <li>You have the right, authority and capacity to enter into these Terms of Use;</li>
                        <li>You will abide by all the terms and conditions of these Terms of Use;</li>
                        <li>neither You, nor anyone in Your household (A) has been the subject of a complaint, restraining order or any other legal action, arrested for, charged with or convicted of any criminal offense or (B) has been and/or is currently required to register as a sex offender in any jurisdiction or with any governmental entity.</li>
                    </ul>

                    <h5 class="fw-semibold mt-4 mb-3">Member Accounts</h5>
                    <p>A Visitor may browse the Site in accordance with these Terms of Use, but will not have access to certain Services without first becoming a Member. In order to use the Services available to a Member, You are required to set up an Account with us. When You set up an Account, You are required to select a unique user ID and password (collectively "Account Credentials"). You promise that all information You provide to us is true, accurate, current and complete, and You agree to maintain and promptly update such information to keep it true, accurate, current and complete. You may not transfer or share Your Account Credentials with any third parties, and You are solely responsible for maintaining the confidentiality of Your Account Credentials.</p>
                </section>

                <!-- Section 2 -->
                <section id="verification" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Member Verification</h2>
                    <h5 class="fw-semibold mt-4 mb-3">Member Verification by Members</h5>
                    <p>You are responsible to make Your own decision regarding the other Members that You engage through the Site. NuviaCare may make a third-party verification service available to Members. Members may use this service to verify information of other Members such as, but not limited to, name, address, social security number, and criminal background. Use of a third-party verification service is voluntary.</p>
                    
                    <h5 class="fw-semibold mt-4 mb-3">Optional Member Verification by NuviaCare</h5>
                    <p>You understand and agree that NuviaCare has the right, but not the obligation, to independently verify any statement made by any Member on the Site or verify that any Member meets any of the eligibility criteria set forth above. In the event that NuviaCare chooses to verify the representations and warranties or any information provided by You through Your use of the Site, You hereby authorize NuviaCare, either directly or through our vendors or service providers, to attempt to verify such information, which verification may include, without limitation, conducting criminal background checks, sex offender registry checks, motor vehicle records checks, identification verifications, credential verification checks, credit checks and/or using available public records.</p>
                </section>

                <!-- Section 3 -->
                <section id="venue" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">NuviaCare is a Venue</h2>
                    <p>The Site is a venue designed to connect home care providers ("Care Providers") with care seekers and their families looking for home care services ("Care Seekers"). NuviaCare does not provide or arrange for home healthcare services. NuviaCare does not participate in the interaction between Care Providers and Care Seekers except to process payments on behalf of Care Providers and collect payments from Care Providers who use any of the NuviaCare Premium Services (defined below). NuviaCare does not provide any healthcare billing services. Any disputes related to the services received by Care Seeker or payment due to Care Provider must be resolved directly between Care Seeker and Care Provider.</p>
                    <p class="fw-bold mt-3">NuviaCare EXPRESSLY DISCLAIMS, AND YOU EXPRESSLY RELEASE NuviaCare FROM, ANY AND ALL LIABILITY WHATSOEVER FOR ANY DAMAGES, SUITS, CLAIMS AND/OR CONTROVERSIES THAT HAVE ARISEN OR MAY ARISE FROM AND/OR IN ANY WAY RELATE TO ANY ACTS OR OMISSIONS OF MEMBERS ON OR OFF THE SITE, INCLUDING WITHOUT LIMITATION THE PROVISION OF ANY CARE SERVICES BY ANY CARE PROVIDER.</p>
                </section>

                <!-- Section 4 -->
                <section id="license" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">License</h2>
                    <p>Subject to these Terms of Use, NuviaCare grants You a non-transferable, non-exclusive, revocable, limited license to (a) download, install and use a copy of the App on one or more mobile devices or computers or internet web browsers that You own or control, and (b) to use the other aspects of the Services, in each case solely for Your own personal or internal business purposes.</p>
                </section>

                <!-- Section 5 -->
                <section id="ownership" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Ownership</h2>
                    <p>You understand and acknowledge that the software, code, proprietary methods and systems used to provide the Site or Services ("Our Technology") are: (a) copyrighted by us and/or our licensors under United States and international copyright laws; (b) subject to other intellectual property and proprietary rights and laws; and (c) owned by us or our licensors. Our Technology may not be copied, modified, reproduced, republished, posted, transmitted, sold, offered for sale, or redistributed in any way without our prior written permission and the prior written permission of our applicable licensors.</p>
                </section>

                <!-- Section 6 -->
                <section id="content" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Rules Regarding Information & Other Content</h2>
                    <p>When You access the Site and/or Services, You obtain access to various kinds of information and materials, all of which we call "Content." Content includes information and materials posted to the Site or through the Services by You and other Members. You are entirely responsible for each individual item of Content that You post, email or otherwise make available on the Site or the Services. As between You and us, You retain ownership and any intellectual property rights in any copyrighted materials that are contained in Content that You post to the Site or through the Services.</p>
                </section>

                <!-- Section 7 -->
                <section id="conduct" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">General Rules of User Conduct</h2>
                    <p>It is our goal to make access to our Site and Services a good experience for Visitors and all of our Members. Correspondence between Members is for the sole purpose of connecting Care Seekers, Care Providers and other Members for purposes relating to a Care Seeker's home care. If You receive the personal information of any other Member through the use of the Services, You may use the information solely as necessary to conduct a transaction through the Site and Services.</p>
                </section>

                <!-- Section 8 -->
                <section id="payments" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Payments</h2>
                    <p>Access to the Site and basic Services of NuviaCare are free for Members. Premium services, including secure messaging, time management, invoicing and payment processing services (collectively, "Premium Services") are available to Care Seekers for a fee. By using our Premium Services, Care Seeker agrees to pay NuviaCare at the fees then in effect unless specifically notified otherwise.</p>
                </section>

                <!-- Section 9 -->
                <section id="text-messages" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Text Messages</h2>
                    <p>NuviaCare may send Members SMS text messages in connection with the Services or otherwise. Receipt of the SMS text messages from NuviaCare is voluntary. By deciding to receive SMS text messages from NuviaCare, You give NuviaCare express permission to send SMS text messages to Your cellular phone and/or mobile device. Carrier charges may apply for receiving SMS text messages. You are solely responsible for any costs You incur when receiving SMS text messages from NuviaCare.</p>
                </section>

                <!-- Section 10 -->
                <section id="forum" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">NuviaCare Forum</h2>
                    <p>NuviaCare Members may use the NuviaCare Forum Service designed to facilitate communication between Care Seekers and their families with Care Providers and other Members that the Care Seeker wishes to share information with, such as their healthcare providers. The NuviaCare Forum includes discussion forums, document sharing, posting announcements, scheduling events and related Services. Your use of the NuviaCare Forum is governed by this Agreement.</p>
                </section>

                <!-- Section 11 -->
                <section id="professional-advice" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">No Professional Advice</h2>
                    <p>All information, materials, content and/or advice on the Site or provided through the Services is for informational purposes only and is not intended to replace or substitute for any professional, financial, medical, legal or other advice. NuviaCare expressly disclaims, and You expressly release NuviaCare from, any and all liability concerning any treatment, action by, or effect on any person following the information offered or provided within or through the Site.</p>
                </section>

                <!-- Section 12 -->
                <section id="promotional" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Promotional Offers</h2>
                    <p>We may run promotional offers from time to time on the Site. The terms of any such promotion will be posted on the Site. Unless otherwise indicated, we may establish and modify, in our sole discretion, the terms of such offer and end such offer at any time.</p>
                </section>

                <!-- Section 13 -->
                <section id="modifications" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Modifications to the Site or Services</h2>
                    <p>We reserve the right to modify or discontinue the Site or Services with or without notice to You. We will not be liable to You or any third party should we exercise our right to modify or discontinue the Site and/or Services. If You object to any such changes, Your sole recourse will be to cease access to the Site or Services.</p>
                </section>

                <!-- Section 14 -->
                <section id="third-party" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Third Party Content & Other Websites</h2>
                    <p class="fw-bold">CONTENT FROM OTHER MEMBERS, ADVERTISERS, AND OTHER THIRD PARTIES MAY BE MADE AVAILABLE TO YOU THROUGH THE SITE AND/OR THE SERVICES. BECAUSE WE DO NOT CONTROL SUCH CONTENT, YOU AGREE THAT WE ARE NOT RESPONSIBLE FOR ANY SUCH CONTENT. WE DO NOT MAKE ANY GUARANTEES ABOUT THE ACCURACY, CURRENCY, SUITABILITY, OR QUALITY OF THE INFORMATION IN SUCH CONTENT.</p>
                </section>

                <!-- Section 15 -->
                <section id="suspension" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Suspension/Termination</h2>
                    <p>You agree that we, in our sole discretion, may immediately suspend or terminate Your access to the Site and Services at any time, for any reason, without notice or refund. YOU AGREE THAT NuviaCare INC. WILL NOT BE LIABLE TO YOU OR ANY OTHER PARTY FOR ANY SUSPENSION OR TERMINATION OF YOUR ACCESS TO THE SITE OR SERVICES OR DELETION OF YOUR ACCOUNT OR YOUR CONTENT.</p>
                </section>

                <!-- Section 16 -->
                <section id="agency" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Agency Caregivers</h2>
                    <p>If you are an Agency Caregiver, you acknowledge and agree that the agency Care Provider ("Agency Care Provider") through whom you use the Services may be able to control certain of your Account settings, such as permissions. You hereby grant such Agency Care Provider permission to access, use, download, export, disclose, share, restrict and/or remove Your Content.</p>
                </section>

                <!-- Section 17 -->
                <section id="warranties" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Disclaimer of Warranties</h2>
                    <p class="fw-bold">YOU EXPRESSLY AGREE THAT YOUR USE OF THE SITE AND/OR SERVICES IS AT YOUR SOLE RISK. BOTH THE SITE AND SERVICES ARE PROVIDED BY US ON AN "AS IS" AND "AS AVAILABLE" BASIS. WE EXPRESSLY DISCLAIM ALL WARRANTIES OF ANY KIND, WHETHER EXPRESS OR IMPLIED, INCLUDING, BUT NOT LIMITED TO, ANY WARRANTIES OF MERCHANTABILITY, FITNESS FOR A PARTICULAR USE OR PURPOSE, NON-INFRINGEMENT, TITLE, OPERABILITY, CONDITION, QUIET ENJOYMENT, VALUE, ACCURACY OF DATA AND SYSTEM INTEGRATION.</p>
                </section>

                <!-- Section 18 -->
                <section id="liability" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Limitation of Liability</h2>
                    <p class="fw-bold">YOU ACKNOWLEDGE AND AGREE THAT WE ARE ONLY WILLING TO PROVIDE ACCESS TO THE SITE AND TO PROVIDE THE SERVICES IF YOU AGREE TO CERTAIN LIMITATIONS OF OUR LIABILITY TO YOU AND TO THIRD PARTIES. YOU UNDERSTAND THAT TO THE EXTENT PERMITTED UNDER APPLICABLE LAW, IN NO EVENT WILL WE OR OUR OFFICERS, EMPLOYEES, DIRECTORS, PARENTS, SUBSIDIARIES, AFFILIATES, AGENTS OR LICENSORS BE LIABLE FOR ANY INDIRECT, INCIDENTAL, SPECIAL, OR CONSEQUENTIAL DAMAGES.</p>
                    <p class="mt-3">OUR TOTAL LIABILITY TO YOU FOR ALL CLAIMS ARISING FROM OR RELATED TO THE SITE OR THE SERVICES IS LIMITED, IN THE AGGREGATE, TO FIFTY DOLLARS (U.S. $50.00).</p>
                </section>

                <!-- Section 19 -->
                <section id="indemnification" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Indemnification</h2>
                    <p>You agree to indemnify, defend and hold harmless NuviaCare Inc., our parents, subsidiaries, affiliates, officers, directors, co-branders and other partners, employees, consultants and agents, from and against any and all third-party claims, liabilities, damages, losses, costs, expenses, fees (including reasonable attorneys' fees and court costs) that such parties may incur as a result of or arising from (a) any of Your Content and/or information that You submit, post or transmit through the Site or Services, (b) Your use of the Site or Services, (c) Your violation of these Terms of Use, (d) Your violation of any rights of any other person or entity or (e) any viruses, trojan horses, worms, time bombs, cancelbots or other similar harmful or deleterious programming routines input by You into the Site or Services.</p>
                </section>

                <!-- Section 20 -->
                <section id="copyright" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Copyright Violations</h2>
                    <p>We respect the intellectual property of others, and we ask You to do the same. If You believe that Your work has been copied in a way that constitutes copyright infringement, please provide our Copyright Agent the following information:</p>
                    <ul class="ms-4">
                        <li>An electronic or physical signature of the person authorized to act on behalf of the owner of the copyright interest;</li>
                        <li>A description of the copyrighted work that You claim has been infringed;</li>
                        <li>A description of where the material that You claim is infringing is located on the Site or Services;</li>
                        <li>Your address, telephone number, and email address;</li>
                        <li>A statement by You that You have a good faith belief that the disputed use is not authorized by the copyright owner, its agent, or the law; and</li>
                        <li>A statement by You, made under penalty of perjury, that the above information in Your notice is accurate and that You are the copyright owner or authorized to act on the copyright owner's behalf.</li>
                    </ul>
                    <p class="mt-3">Our Copyright Agent for notice of claims of copyright infringement on the Site or Services can be reached by directing an email to <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a>.</p>
                </section>

                <!-- Section 21 -->
                <section id="electronic" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Electronic Communications</h2>
                    <p>The communications between You and us use electronic means, whether You visit the Site or send us emails, or whether we post notices on the Service or communicate with You via email. We can only give You the benefits of our service by conducting business through the Internet, and therefore we need You to consent to our giving You Communications electronically. For contractual purposes, You (a) consent to receive communications from us in an electronic form; and (b) agree that all terms and conditions, agreements, notices, documents, disclosures, and other communications ("Communications") that we provide to You electronically satisfy any legal requirement that such Communications would satisfy if it were in a writing.</p>
                </section>

                <!-- Section 22 -->
                <section id="beneficiaries" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">No Third Party Beneficiaries</h2>
                    <p>You understand and agree that, except as otherwise expressly provided in these Terms of Use, there shall be no third party beneficiaries to these Terms of Use.</p>
                </section>

                <!-- Section 23 -->
                <section id="affiliation" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">No Affiliation</h2>
                    <p>You acknowledge that You are not legally affiliated with NuviaCare in any way, and no independent contractor, partnership, joint venture, employer-employee or franchiser-franchisee relationship is intended or created by Your use of the Site or Services or by these Terms of Use. NuviaCare is not an employment service or agency and does not secure employment for Members.</p>
                </section>

                <!-- Section 24 -->
                <section id="arbitration" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Arbitration</h2>
                    <p>Please read the following arbitration agreement in this Section ("Arbitration Agreement") carefully. It requires you to arbitrate disputes with NuviaCare and limits the manner in which you can seek relief from us.</p>
                    
                    <h5 class="fw-semibold mt-4 mb-3">Applicability of Arbitration Agreement</h5>
                    <p>You agree that any dispute or claim relating in any way to your access or use of the Site, App, or Services, or to any aspect of your relationship with NuviaCare, will be resolved by binding arbitration, rather than in court, except that (1) you may assert claims in small claims court if your claims qualify; and (2) you or NuviaCare may seek equitable relief in court for infringement or other misuse of intellectual property rights.</p>

                    <h5 class="fw-semibold mt-4 mb-3">Waiver of Jury Trial</h5>
                    <p class="fw-bold">YOU AND NuviaCare HEREBY WAIVE ANY CONSTITUTIONAL AND STATUTORY RIGHTS TO SUE IN COURT AND HAVE A TRIAL IN FRONT OF A JUDGE OR A JURY. You and NuviaCare are instead electing that all claims and disputes shall be resolved by arbitration under this Arbitration Agreement.</p>

                    <h5 class="fw-semibold mt-4 mb-3">Waiver of Class or Other Non-Individualized Relief</h5>
                    <p class="fw-bold">ALL CLAIMS AND DISPUTES WITHIN THE SCOPE OF THIS ARBITRATION AGREEMENT MUST BE ARBITRATED ON AN INDIVIDUAL BASIS AND NOT ON A CLASS OR COLLECTIVE BASIS, ONLY INDIVIDUAL RELIEF IS AVAILABLE, AND CLAIMS OF MORE THAN ONE CUSTOMER OR USER CANNOT BE ARBITRATED OR CONSOLIDATED WITH THOSE OF ANY OTHER CUSTOMER OR USER.</p>

                    <h5 class="fw-semibold mt-4 mb-3">30-Day Right to Opt Out</h5>
                    <p>You have the right to opt out of the provisions of this Arbitration Agreement by sending written notice of your decision to opt out to: <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a>, within thirty (30) days after first becoming subject to this Arbitration Agreement. Your notice must include your name and address, your NuviaCare username (if any), the email address you used to set up your NuviaCare account (if you have one), and an unequivocal statement that you want to opt out of this Arbitration Agreement.</p>
                </section>

                <!-- Section 25 -->
                <section id="general" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">General Terms</h2>
                    <p>You are responsible for compliance with all applicable laws. The Terms of Use and the relationship between You and NuviaCare will be governed by the laws of the State of California, consistent with the Federal Arbitration Act, without giving effect to any choice of laws principles that would require the application of the laws of a different country or state. Any legal action, suit or proceeding arising out of or relating to the Terms of Use, or Your use of the Site or Services must be instituted exclusively in the federal or state courts located in the San Francisco, California and in no other jurisdiction.</p>
                </section>

                <!-- Section 26 -->
                <section id="survival" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Survival</h2>
                    <p>All provisions that by their nature survive expiration or termination of these Terms of Use shall so survive, including without limitation, Section 2, Section 3, all limitations on liability explicitly set forth herein and our proprietary rights in and to the Site, Content provided by us, Our Technology and the Services.</p>
                </section>

                <!-- Section 27 -->
                <section id="complaints" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Consumer Complaints</h2>
                    <p>In accordance with California Civil Code §1789.3, you may report complaints to the Complaint Assistance Unit of the Division of Consumer Services of the California Department of Consumer Affairs by contacting them in writing at 400 R Street, Sacramento, CA 95814, or by telephone at (800) 952-5210.</p>
                </section>

                <!-- Section 28 -->
                <section id="notice" class="content-section mt-5 pt-3">
                    <h2 class="section-title h4 fw-bold mb-3">Notice; Contact Information</h2>
                    <p>We may give notice to You by email, a posting on the Site, or other reasonable means. You must give notice to us in writing via telephone at <a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a>, email to <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a> or as otherwise expressly provided.</p>
                    <p class="mt-3">Please report any violations of these Terms of Use to <a href="mailto:support@NuviaCare.com">support@NuviaCare.com</a></p>
                </section>

            </div>
        </div>
    </div>
</div>



<script>
    document.addEventListener('DOMContentLoaded', function() {
        const navLinks = document.querySelectorAll('.toc-nav .nav-link');
        const sections = document.querySelectorAll('.content-section');
        
        // Smooth scroll functionality
        navLinks.forEach(link => {
            link.addEventListener('click', function(e) {
                e.preventDefault();
                
                const targetId = this.getAttribute('href');
                const targetSection = document.querySelector(targetId);
                
                if (targetSection) {
                    // Remove active class from all links
                    navLinks.forEach(l => l.classList.remove('active'));
                    
                    // Add active class to clicked link
                    this.classList.add('active');
                    
                    // Smooth scroll to section
                    targetSection.scrollIntoView({
                        behavior: 'smooth',
                        block: 'start'
                    });
                }
            });
        });
        
        // Intersection Observer for highlighting active section
        const observerOptions = {
            root: null,
            rootMargin: '-100px 0px -66% 0px',
            threshold: 0
        };
        
        const observer = new IntersectionObserver(entries => {
            entries.forEach(entry => {
                if (entry.isIntersecting) {
                    const id = entry.target.getAttribute('id');
                    
                    // Remove active class from all links
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                    });
                    
                    // Add active class to corresponding link
                    const activeLink = document.querySelector(`.toc-nav .nav-link[href="#${id}"]`);
                    if (activeLink) {
                        activeLink.classList.add('active');
                    }
                }
            });
        }, observerOptions);
        
        // Observe all sections
        sections.forEach(section => {
            observer.observe(section);
        });
        
        // Set first link as active on page load
        if (navLinks.length > 0) {
            navLinks[0].classList.add('active');
        }
    });
</script>
@endsection