@extends('layouts.website', ['title' => 'Terms & Conditions'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Terms & Conditions',
        'subTitle' => 'Terms & Conditions',
    ])


    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1>Terms and Conditions</h1>
                <p><strong>Last Updated:</strong> 05-11-2024</p>

                <h2>1. Introduction</h2>
                <p>Welcome to Suncity Polyclinic. By accessing or using our website, you agree to comply with and be bound
                    by
                    these Terms and Conditions ("Terms"). If you do not agree to these Terms, please refrain from using our
                    site
                    and services.</p>

                <h2>2. Use of Our Website</h2>
                <p>You agree to use our website solely for lawful purposes and in a manner that does not infringe the rights
                    of,
                    restrict, or inhibit anyone else’s use and enjoyment of the website. You may not use our site to conduct
                    any
                    activity that is illegal, harmful, or misleading.</p>

                <h2>3. Medical Information Disclaimer</h2>
                <p>The information provided on our website is for general informational purposes only and should not be
                    considered medical advice. For medical care or advice, please consult a qualified healthcare
                    professional.
                    Suncity Polyclinic is not liable for any actions taken based on the information provided on this
                    website.</p>

                <h2>4. Intellectual Property</h2>
                <p>All content on this website, including text, graphics, logos, images, and software, is the property of
                    Suncity Polyclinic or its content suppliers and is protected by intellectual property laws. You may not
                    reproduce, distribute, or otherwise use the content without our written consent.</p>

                <h2>5. Limitation of Liability</h2>
                <p>Suncity Polyclinic will not be liable for any damages or loss arising from your use of this website or
                    reliance on any information provided. This limitation applies to all types of losses, including direct,
                    indirect, incidental, or consequential damages.</p>

                <h2>6. Links to Third-Party Websites</h2>
                <p>Our website may contain links to third-party websites for convenience. We do not endorse or assume
                    responsibility for the content or practices of these external websites. Accessing these third-party
                    sites is
                    at your own risk.</p>

                <h2>7. Modifications to Terms and Conditions</h2>
                <p>We reserve the right to modify these Terms at any time. Any changes will be posted on this page with an
                    updated “Last Updated” date. Your continued use of our website constitutes acceptance of any revised
                    Terms.
                </p>

                <h2>8. Governing Law</h2>
                <p>These Terms are governed by and construed in accordance with the laws of [Your Jurisdiction]. You agree
                    to
                    submit to the exclusive jurisdiction of the courts located in [Your Jurisdiction] for any dispute
                    arising from
                    these Terms.</p>

                <h2>9. Contact Us</h2>
                <p>If you have any questions or concerns regarding these Terms, please contact us at:</p>
                @include('includes.frontend.policy-address')
            </div>
        </div>
    </div>

        <!-- include Achievements info and paralax same to index page Section -->
        @include('includes.frontend.achievements-info')
    @endsection
