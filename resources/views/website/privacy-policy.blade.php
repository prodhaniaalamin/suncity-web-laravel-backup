@extends('layouts.website', ['title' => 'Privacy Policy'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Privacy Policy',
        'subTitle' => 'Privacy Policy',
    ])

    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1>Privacy Policy</h1>
                <p><strong>Last Updated:</strong> 17-11-2024</p>

                <h2>1. Introduction</h2>
                <p>At Suncity Polyclinic, we are committed to protecting the privacy and confidentiality of our patients and
                    website visitors. This Privacy Policy explains how we collect, use, disclose, and safeguard your
                    information
                    when you visit our website or use our services.</p>

                <h2>2. Information We Collect</h2>
                <p>We may collect the following types of information:</p>
                <ul>
                    <li><strong>Personal Information:</strong> This may include your name, contact details, identification
                        number,
                        date of birth, and medical history provided during consultations or through forms on our website.
                    </li>
                    <li><strong>Non-Personal Information:</strong> Information that does not identify you personally, such
                        as
                        anonymous usage data, general demographic information, and information collected through cookies and
                        other
                        tracking technologies.</li>
                </ul>

                <h2>3. How We Use Your Information</h2>
                <p>We may use the information we collect from you to:</p>
                <ul>
                    <li>Provide medical and healthcare services to you</li>
                    <li>Improve our website and services</li>
                    <li>Send you important updates and announcements related to our services</li>
                    <li>Respond to your inquiries and support needs</li>
                    <li>Comply with legal and regulatory requirements</li>
                </ul>

                <h2>4. Sharing Your Information</h2>
                <p>We may share your information with:</p>
                <ul>
                    <li><strong>Authorized Personnel:</strong> Our medical and administrative staff who require access to
                        your
                        information to provide healthcare services.</li>
                    <li><strong>Third-Party Service Providers:</strong> We may engage third-party providers to assist us in
                        delivering services, such as IT support or data storage, who are required to maintain
                        confidentiality and
                        use data only as instructed by us.</li>
                    <li><strong>Legal Authorities:</strong> We may disclose information if required by law, court order, or
                        to
                        protect our rights and the safety of our patients and staff.</li>
                </ul>

                <h2>5. Data Security</h2>
                <p>We implement security measures designed to protect your personal information from unauthorized access,
                    disclosure, alteration, or destruction. However, no data transmission over the internet or electronic
                    storage
                    method can be guaranteed to be 100% secure.</p>

                <h2>6. Your Rights</h2>
                <p>You have the right to access, update, or delete your personal information, subject to legal and
                    professional
                    obligations. If you would like to exercise these rights, please contact us using the details below.</p>

                <h2>7. Cookies</h2>
                <p>Our website uses cookies to enhance your browsing experience. For more information, please refer to our
                    <a href="cookie-policy.html">Cookie Policy</a>.</p>

                <h2>8. Changes to This Privacy Policy</h2>
                <p>We may update this Privacy Policy from time to time. Any changes will be posted on this page with an
                    updated
                    “Last Updated” date.</p>

                <h2>9. Contact Us</h2>
                <p>If you have any questions or concerns about our Privacy Policy, please contact us at:</p>
                @include('includes.frontend.policy-address')
            </div>
        </div>
    </div>

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
