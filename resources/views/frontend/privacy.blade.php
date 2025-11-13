@extends('user.user_dashboard')

@section('user')

     @php
    $settings = App\Models\setting::first();
@endphp

<div class="privacy-wrapper">
   <aside class="sidebar">
        <div class="card shadow-sm">
            <div class="card-body">
                <h5 class="fw-bold mb-4">Table of contents</h5>
                <nav class="nav flex-column toc-nav">
                    <a class="nav-link ps-0 py-2 text-dark" href="#children">Note about children</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#collect">How We Collect Information</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#use">Use of Your Personal Data</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#disclosure">Disclosure of Your Personal Data</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#third-party">Third Party Data Collection</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#rights">Privacy Rights and Choices</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#california">California Users</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#security">Security of Your Personal Data</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#international">Users Outside of the United States</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#contact">Contact Information</a>
                    <a class="nav-link ps-0 py-2 text-dark" href="#changes">Changes to This Privacy Policy</a>
                </nav>
            </div>
        </div>
    </aside>

    <!-- Main Content -->
    <div class="main-content">
        <h1 class="display-5 fw-bold mb-4" style="color: #2c5f6f;">Privacy Policy</h1>

        <div class="privacy-content">
            <p class="lead mb-5">NuviaCare (comprised of NuviaCare, Inc. and NuviaCare-CL, LLC) is committed to protecting your privacy. We have prepared this Privacy Policy to describe to you our practices regarding the Personal Data (as defined below) we collect from (i) users of our website ("Visitors"), located at www.NuviaCare.com ("Site") and (ii) Care Seekers, Care Providers and other third parties using our Services (collectively, "Members" and together with Visitors, "users," "you" or "your"). Capitalized terms not defined in this Privacy Policy have the meanings given in our Terms of Use located at www.NuviaCare.com/terms/.</p>

            <!-- Section 1 -->
            <section id="children" class="content-section">
                <h2 class="section-title h4 fw-bold mb-3">Note about children</h2>
                <p>We do not intentionally gather Personal Data from users who are under the age of 18. If a user under the age of 18 submits Personal Data to Company and we learn that the Personal Data is the information of a user under the age of 18, we will attempt to delete the information as soon as possible. If a parent or guardian becomes aware that his or her child has provided us with information without their consent, he or she should contact us. We will delete such information from our files as soon as reasonably possible.</p>
            </section>

            <!-- Section 2 -->
            <section id="collect" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">How We Collect Information</h2>
                <p>Personal Data means any information which, either alone or in combination with other information we hold about you, identifies you as an individual, including, for example, your name, address, telephone number, email address, as well as any other non-public information about you that is associated with or linked to any of the foregoing data. "Anonymous Data" means data that is not associated with or linked to your Personal Data; Anonymous Data does not, by itself, permit the identification of individual persons. We collect Personal Data and Anonymous Data, as described below.</p>

                <h5 class="fw-semibold mt-4 mb-3">Information You Provide to Us</h5>
                <p><strong>If you are a Care Provider:</strong> When you create an account to log in to our Site, we may collect Personal Data from you, such as your first and last name, birthdate, social security number, driver's license number, criminal history, ethnicity, gender, religion, email and mailing address, phone number, work experience, salary/income, professional license numbers, education, professional and personal references, profile picture, professional skills and abilities, schedule availability, and bank information to facilitate direct deposit of earnings.</p>

                <p class="mt-3"><strong>If you are a Care Seeker:</strong> When you create an account to log in to our Site, we may collect Personal Data from you, such as your first and last name, birth date, gender, religion, email and mailing address, phone number, care services needed, health conditions, activities, profile picture, and credit card information to facilitate payment processing.</p>

                <p class="mt-3"><strong>If you are a Member other than a Care Provider or Care Seeker:</strong> Such as a family member or healthcare provider or healthcare plan ("Plan"), when you create an account to log in to our Site, we may collect Personal Data from you, such as your first and last name, birthdate, social security number, driver's license number, criminal history, ethnicity, gender, religion, email and mailing address, phone number, work experience, salary/income, professional license numbers, education, professional and personal references, profile picture, professional skills and abilities, schedule availability, care services needed and health conditions.</p>

                <p class="mt-3">We retain information on your behalf, such as files and messages that you store using your account. If you provide us feedback or contact us via email, we will collect your name and email address, as well as any other content included in the email, in order to send you a reply.</p>

                <p class="mt-3">When you post messages or upload content within our Site (including in any NuviaCare forum), the information contained in your posting will be stored on our servers and other users to whom you provide access, will be able to see it.</p>

                <h5 class="fw-semibold mt-4 mb-3">Information Collected via Technology</h5>
                <p>To make our Site and Services more useful to you, our servers (which may be hosted by a third party service provider) collect information from you, including your browser type, operating system, Internet Protocol (IP) address (a number that is automatically assigned to your computer when you use the Internet, which may vary from session to session), domain name, and/or a date/time stamp for your visit.</p>

                <p class="mt-3">We also use cookies and URL information to gather information regarding the date and time of your visit and the information for which you searched and which you viewed. "Cookies" are small pieces of information that a website sends to your computer's hard drive while you are viewing a web site. We may use both session Cookies (which expire once you close your web browser) and persistent Cookies (which stay on your computer until you delete them) to provide you with a more personal and interactive experience on our Site.</p>

                <h5 class="fw-semibold mt-4 mb-3">Information Collected from You About Others</h5>
                <p>Users to our Site can invite other people to become NuviaCare members by sending invitation emails via our Site. We store the email addresses that are provided to us and, if they are provided by a NuviaCare Member, we will associate those email addresses with such Member's account.</p>

                <h5 class="fw-semibold mt-4 mb-3">Information Collected from Others About You</h5>
                <p>Other NuviaCare Members may provide us Personal and/or Anonymous Data about you through our Site or the Services. Examples include when a Care Seeker posts feedback regarding a Care Provider or when another NuviaCare Member (including a Care Seeker's healthcare provider) submits health information to any NuviaCare forum.</p>

                <h5 class="fw-semibold mt-4 mb-3">Information Collected from Third Party Companies</h5>
                <p>We may receive Personal and/or Anonymous Data about you from companies that assist NuviaCare in providing the Services, such as BackgroundsOnline, or companies that offer their products and/or services on our Site.</p>
            </section>

            <!-- Section 3 -->
            <section id="use" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Use of Your Personal Data</h2>
                <h5 class="fw-semibold mt-4 mb-3">General Use</h5>
                <p>In general, Personal Data collected by us is used either to respond to requests that you make, or to aid us in serving you better. We may use your Personal Data in the following ways:</p>
                <ul class="ms-4">
                    <li>To facilitate the creation of and secure your account on our network</li>
                    <li>Identify you as a user in our system</li>
                    <li>Run a background check and verify your credentials (if you are a Care Provider or Agency Care Provider)</li>
                    <li>Provide improved administration of our Site and Services</li>
                    <li>Provide the Services and customer support you request</li>
                    <li>Improve the quality of experience when you interact with our Site and Services</li>
                    <li>Send you administrative email notifications, such as security or support and maintenance advisories</li>
                    <li>Respond to your inquiries related to employment opportunities or other requests</li>
                    <li>To send newsletters, surveys, offers, and other promotional materials related to our Services</li>
                    <li>Verify your compliance with your obligations in our Terms of Use or other NuviaCare policies</li>
                </ul>

                <h5 class="fw-semibold mt-4 mb-3">Creation of Anonymous Data</h5>
                <p>We may create Anonymous Data records from Personal Data by excluding information (such as your name) that make the data personally identifiable to you. We use this Anonymous Data to analyze request and usage patterns so that we may enhance the content of our Services and improve Site navigation.</p>
            </section>

            <!-- Section 4 -->
            <section id="disclosure" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Disclosure of Your Personal Data</h2>
                <p>We disclose your Personal Data as described below and as described elsewhere in this Privacy Policy.</p>

                <h5 class="fw-semibold mt-4 mb-3">Other NuviaCare Members</h5>
                <p>We may share your Personal Data with third parties to whom you ask us to send Personal Data, including other Members. Unless you direct us to share to your Personal Data via your "Privacy Settings" or otherwise, we do not disclose the Personal Data of any Care Seeker or Care Provider to any another Member.</p>

                <h5 class="fw-semibold mt-4 mb-3">Third Party Service Providers</h5>
                <p>We may share your Personal Data with third party service providers to: provide you with the Services that we offer you through our Site; to conduct quality assurance testing; to facilitate creation of accounts; to provide technical support; and/or to provide other services to NuviaCare. These third-party service providers are required not to use your Personal Data other than to provide the services requested by NuviaCare.</p>

                <h5 class="fw-semibold mt-4 mb-3">Affiliates and Acquisitions</h5>
                <p>We may share some or all of your Personal Data with our parent company, subsidiaries, joint ventures, or other companies under common control with us ("Affiliates"), in which case we will require our Affiliates to honor this Privacy Policy.</p>

                <h5 class="fw-semibold mt-4 mb-3">Plans</h5>
                <p>If you become a Care Seeker through a Plan, we may share all or some of your Personal Data with such Plan. <span class="fw-bold">YOU ACKNOWLEDGE AND AGREE THAT THE PRIVACY POLICIES OF THE APPLICABLE PLAN WILL APPLY TO THE USE AND DISCLOSURE OF SUCH PERSONAL DATA BY THE PLAN.</span></p>

                <h5 class="fw-semibold mt-4 mb-3">Other Disclosures</h5>
                <p>Regardless of any choices you make regarding your Personal Data, NuviaCare may disclose Personal Data if it believes in good faith that such disclosure is necessary (a) in connection with any legal investigation; (b) to comply with relevant laws or to respond to subpoenas or warrants served on NuviaCare; (c) to protect or defend the rights or property of NuviaCare or users of the Services; and/or (d) to investigate or assist in preventing any violation or potential violation of the law.</p>
            </section>

            <!-- Section 5 -->
            <section id="third-party" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Third Party Data Collection</h2>
                <h5 class="fw-semibold mt-4 mb-3">Information Collected by Other Third Parties</h5>
                <p>This Privacy Policy addresses only our use and disclosure of information we collect from and/or about you. If you disclose information to others, including to other NuviaCare Members, the use and disclosure restrictions contained in this Privacy Policy will not apply to any third party. We do not control the privacy policies of third parties, and you are subject to the privacy policies of those third parties where applicable.</p>
                <p class="mt-3">Also, the Site may contain links to other websites that are not owned or controlled by us. We have no control over, do not review and are not responsible for the privacy policies of or content displayed on such other websites. Please be aware that the terms of this Privacy Policy do not apply to these outside websites.</p>
            </section>

            <!-- Section 6 -->
            <section id="rights" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Privacy Rights and Choices; Account Termination</h2>
                <p>Our goal is to be clear about what information we collect, so that you can make meaningful choices about how it is used. Subject to your specific use of the Services, your privacy rights include:</p>

                <h5 class="fw-semibold mt-4 mb-3">Transparency and the right to information</h5>
                <p>Through this policy we explain how we use and share your information. However, if you have questions or need additional information you can contact us any time at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a>.</p>

                <h5 class="fw-semibold mt-4 mb-3">Right of access, restriction of processing, erasure</h5>
                <p>You may contact us to request information about the Personal Information we have collected from you, or to request that your Personal Information be deleted. To make a request, please contact us via email at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a>.</p>

                <h5 class="fw-semibold mt-4 mb-3">Right to correct your information</h5>
                <p>We endeavor to ensure that Personal Information in our possession is accurate, current and complete. If you believe that the Personal Information about you is incorrect, incomplete or outdated, you may request the revision or correction of that information.</p>

                <h5 class="fw-semibold mt-4 mb-3">Right to withdraw your consent at any time</h5>
                <p>When we process your Personal Information based on your consent, you have the right to withdraw that consent at any time. You may withdraw your consent by contacting us at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a>.</p>

                <h5 class="fw-semibold mt-4 mb-3">Right to object or opt out at any time</h5>
                <p>You have the right to object at any time to receiving marketing or promotional materials from us by either following the opt-out instructions in commercial e-mails or by contacting us.</p>

                <h5 class="fw-semibold mt-4 mb-3">Right to data portability</h5>
                <p>You have the right to data portability of your own personal data by contacting us.</p>

                <h5 class="fw-semibold mt-4 mb-3">Account Termination</h5>
                <p>You may terminate your account with us at any time by contacting <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a> or emailing <a href="mailto:privacy@NuviaCare.com">privacy@NuviaCare.com</a>. Terminating your account will revoke any applicable consents or opt-ins but will not necessarily delete all of your data.</p>
            </section>

            <!-- Section 7 -->
            <section id="california" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">California Users</h2>
                <p>Residents of the State of California may have additional rights as set forth in the Privacy Notice for California Residents of our parent company, NuviaCare. NuviaCare does not sell your personal information or share your personal information for purposes of cross-context behavioral advertising.</p>
            </section>

            <!-- Section 8 -->
            <section id="security" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Security of Your Personal Data</h2>
                <p>NuviaCare is committed to protecting the security of your Personal Data. We use a variety of industry-standard security technologies and procedures to help protect your Personal Data from unauthorized access, use, or disclosure. We also require you to enter a password to access your account information. Please do not disclose your account password to unauthorized people. No method of transmission over the Internet, or method of electronic data storage, is 100% secure, however. Therefore, while NuviaCare uses reasonable efforts to protect your Personal Data, NuviaCare cannot guarantee its absolute security.</p>
            </section>

            <!-- Section 9 -->
            <section id="international" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Users Outside of the United States; Location of Processing</h2>
                <p>NuviaCare does not currently offer its services outside of the United States. If you interact with our websites or mobile application, whether within or outside of the United States, your Personal Data may be processed in the country in which it was collected and in other countries, including the United States, the Philippines, and Guatemala.</p>
            </section>

            <!-- Section 10 -->
            <section id="contact" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Contact Information</h2>
                <p>NuviaCare welcomes your comments or questions regarding this Privacy Policy. Please e-mail us at <a href="mailto:{{ $settings->company_email }}">{{ $settings->company_email ?? 'info@nuviacare.com' }}</a> or contact us at <a href="tel:{{ $settings->company_phone }}">{{ $settings->company_phone ?? '+234 123 456 7890' }}</a></p>.</p>
            </section>

            <!-- Section 11 -->
            <section id="changes" class="content-section mt-5 pt-3">
                <h2 class="section-title h4 fw-bold mb-3">Changes to This Privacy Policy</h2>
                <p>This Privacy Policy is subject to occasional revision, and if we make any material changes in the way we use your Personal Data, we will notify you by sending you an email to the last email address you provided to us and/or by prominently posting notice of the changes on our Site. Any changes to this Privacy Policy will be effective upon the earlier of thirty (30) calendar days following our dispatch of an email notice to you or thirty (30) calendar days following our posting of notice of the changes on our Site.</p>
                <p class="mt-3">Continued use of our Site or Service, following notice of such changes shall indicate your acknowledgement of such changes and agreement to be bound by the terms and conditions of such changes.</p>
            </section>
        </div>
    </div>
</div>

<style>
/* Wrapper Layout */
.privacy-wrapper {
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

/* Sidebar links */
.toc-nav {
    display: flex;
    flex-direction: column;
}

.toc-nav .nav-link {
    font-size: 0.95rem;
    color: #333;
    border-left: 3px solid transparent;
    padding: 0.4rem 0 0.4rem 0.5rem;
    transition: all 0.2s ease;
    text-decoration: none;
    display: block;
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
    .privacy-wrapper {
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
                    navLinks.forEach(l => l.classList.remove('active'));
                    this.classList.add('active');
                    
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
                    
                    navLinks.forEach(link => {
                        link.classList.remove('active');
                    });
                    
                    const activeLink = document.querySelector(`.toc-nav .nav-link[href="#${id}"]`);
                    if (activeLink) {
                        activeLink.classList.add('active');
                    }
                }
            });
        }, observerOptions);
        
        sections.forEach(section => {
            observer.observe(section);
        });
        
        if (navLinks.length > 0) {
            navLinks[0].classList.add('active');
        }
    });
</script>
@endsection