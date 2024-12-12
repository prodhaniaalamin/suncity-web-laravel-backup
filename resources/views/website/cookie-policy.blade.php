@extends('layouts.website', ['title' => 'Cookie Policy'])

@section('content')
    @include('includes.frontend.common-slider', [
        'title' => 'Cookie Policy',
        'subTitle' => 'Cookie Policy',
    ])


    <div class="container">
        <div class="row">
            <div class="col-md-12 p-5">
                <h1>Cookie Policy</h1>
                <p><strong>Last Updated:</strong> 05-11-2024</p>

                <h2>1. Introduction</h2>
                <p>Suncity Polyclinic ("we," "us," or "our") uses cookies and similar tracking technologies on our website
                    to
                    enhance your experience, improve site performance, and gather information about website usage. This
                    Cookie
                    Policy explains what cookies are, how we use them, and how you can manage them.</p>

                <h2>2. What Are Cookies?</h2>
                <p>Cookies are small text files placed on your device (computer, smartphone, tablet) when you visit a
                    website.
                    Cookies help us understand how our website is being used and allow us to remember your preferences.</p>

                <h2>3. Types of Cookies We Use</h2>
                <p>We use the following types of cookies:</p>
                <ul>
                    <li><strong>Strictly Necessary Cookies:</strong> These cookies are essential for the operation of our
                        website
                        and cannot be turned off in our systems. They are usually only set in response to actions you take,
                        like
                        setting your privacy preferences or logging in.</li>
                    <li><strong>Performance Cookies:</strong> These cookies help us understand how visitors interact with
                        our
                        website by collecting information anonymously. This helps us improve the site’s performance and user
                        experience.</li>
                    <li><strong>Functional Cookies:</strong> These cookies enable the website to provide enhanced
                        functionality
                        and personalization. They may be set by us or by third-party providers whose services we have added
                        to our
                        pages.</li>
                    <li><strong>Targeting Cookies:</strong> These cookies may be set through our website by our advertising
                        partners to build a profile of your interests and show you relevant ads on other websites.</li>
                </ul>

                <h2>4. Third-Party Cookies</h2>
                <p>We may allow third-party service providers to place cookies on our website for purposes such as
                    advertising,
                    analytics, and social media sharing. These third parties have their own cookie policies, and we
                    encourage you
                    to review them.</p>

                <h2>5. Managing Your Cookie Preferences</h2>
                <p>You can manage your cookie preferences at any time:</p>
                <ul>
                    <li><strong>Browser Settings:</strong> Most web browsers allow you to control cookies through the
                        browser
                        settings. You can choose to block or delete cookies. However, please note that if you disable
                        cookies, some
                        parts of our website may not function properly.</li>
                    <li><strong>Cookie Consent Banner:</strong> When you first visit our website, you will see a banner
                        allowing
                        you to accept or customize your cookie settings.</li>
                </ul>

                <h2>6. Updates to This Cookie Policy</h2>
                <p>We may update this Cookie Policy from time to time. Any changes will be posted on this page with an
                    updated
                    “Last Updated” date.</p>

                <h2>7. Contact Us</h2>
                <p>If you have any questions or concerns about our Cookie Policy, please contact us at:</p>
                @include('includes.frontend.policy-address')
            </div>
        </div>
    </div>

    <!-- include Achievements info and paralax same to index page Section -->
    @include('includes.frontend.achievements-info')
@endsection
