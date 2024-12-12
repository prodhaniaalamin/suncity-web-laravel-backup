@include('includes.frontend.meta', ['title' => $title ?? 'Home'])

	<link rel="icon" type="image/x-icon" href="{{ image(dynamicData('logoFavicon')->getSetting('favicon')) }}">
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

	<!-- For Google -->
    <meta name="description" content="Suncity’s Polyclinic is a Modern Medical Center it is located in the Batha, Riyadh.">
    <meta name="keyword" content="hospital">
    <meta name="author" content="Alamin Prodhania Suncity Polyclinic">
    <meta name="copyright" content="copyright C All rights reserved 2025 Suncity Polyclinic">

	<!-- For Facebook -->
	<meta property="og:site_name" content="Suncity Polyclinic">
	<meta property="og:url" content="www.suncitypolyclinicsa.com">
	<meta property="og:type" content="hospital medical">
	<meta property="og:title" content="Suncity Polyclinic Riyadh, Saudi Arabia">
	<meta property="og:description" content="Suncity’s Polyclinic is a Modern Medical Center it is located in the Batha, Riyadh.">
	<meta property="og:image" content="images/sunlogo.png">

	<!-- For Twitter -->
	<meta name="og:type" content="hospital medical">
	<meta name="og:description" content="Suncity’s Polyclinic is a Modern Medical Center it is located in the Batha, Riyadh.">
	<meta name="og:image" content="images/sunlogo.png">

		<!-- gllgoe font CDN -->
    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,400,500,600,700" rel="stylesheet">

    <link rel="stylesheet" href="{{ assets('assets/frontend/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/animate.css') }}">

    <link rel="stylesheet" href="{{ assets('assets/frontend/css/owl.carousel.min.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/owl.theme.default.min.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/magnific-popup.css') }}">

    <link rel="stylesheet" href="{{ assets('assets/frontend/css/aos.css') }}">

    <link rel="stylesheet" href="{{ assets('assets/frontend/css/ionicons.min.css') }}">

    <link rel="stylesheet" href="{{ assets('assets/frontend/css/bootstrap-datepicker.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/jquery.timepicker.css') }}">


    <link rel="stylesheet" href="{{ assets('assets/frontend/css/flaticon.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/icomoon.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/style.css') }}">
    <link rel="stylesheet" href="{{ assets('assets/frontend/css/css-suncity-custom.css') }}">

	<!-- Font Awesome CDN -->
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <script src="{{ assets('assets/frontend/js/jquery.min.js') }}"></script>
    <script src="{{ assets('assets/frontend/js/sweetalert.min.js') }}"></script>
@php
	$alerts = [];

	$errorExistsData = $errors->any() ? array_map(fn($er) => is_array($er) ? implode(' ', $er):$er, $errors->toArray()):null;
	$alertTypes = ['error', 'warning', 'info', 'success',];
	foreach($alertTypes as $type) {
		if ($messages = $errorExistsData ?: Session::get($type)) {
			$alerts[$type] = $messages ? []: null;

			if(is_string($messages)) {
				$alerts[$type][] = $messages;
			}elseif(is_array($messages) || is_object($messages)) {
				foreach($messages as $key => $message) {
                    $key = trim(preg_replace('/(?<=[a-z])[A-Z]|[A-Z](?=[a-z])/', ' $0', ucfirst($key)));
					$alerts[$type][$key] = $message;
				}
			}
		}
		if($errorExistsData) {
			$errorExistsData = null;
		}
	}
@endphp
<script>
    let alertTypes = ['error', 'warning', 'info', 'success'], alerts = @json($alerts);

    let alertTimer = 3000, alertOutput = '', alertType = 'error';
    for (let type of alertTypes) {
        let alertMessages = alerts[type] ?? null;
        if (alertMessages) {
            alertType = type;
            if (Array.isArray(alertMessages)) {
                for (let message of alertMessages) {
                    alertOutput += haveTag(message, 1) ? message : `<li>${message}</li>`;
                }
                alertTimer = alertTimer ? 5000 : alertTimer;
            } else if (typeof alertMessages === 'object') {
                for (let messageKey in alertMessages) {
                    alertTimer += 2000;
                    let message = alertMessages[messageKey];
                    messageKey = isNaN(messageKey) ? `<b>${messageKey}: </b> ` : '';
                    alertOutput += `<li>${messageKey}${message}</li>`;
                    // alertOutput += haveTag(message, 1) ? message : `<li>${messageKey}${message}</li>`;
                }
            } else {
                alertOutput = haveTag(alertMessages, 1) ? alertMessages : `<li>${alertMessages}</li>`;
            }
        }
    }
    let message = alertMessageSolidString ? `<ul class="sw-alert sw-${alertType}">${alertOutput}</ul>` : `<div class="sw-alert sw-${alertType}">${alertOutput}</div>`;

    alertOutput.length && alertMessage(message, alertType, 'Ok', false, alertTimer);
    function alertMessage(message, type = 'success', confirmText = 'Ok, got it!', cancelText = 'No, Cancel', timer = false) {
        let data = {}
        if (typeof message === 'object') {
            data = message;
            message = data.text;
        }
        let firstAlert = {
            html: typeof message === 'string' ? message : data.text,
            icon: type,
            buttonsStyling: false,
            showCancelButton: 'showCancelBtn' in data,
            confirmButtonText: confirmText,
            cancelButtonText: cancelText,
            customClass: {
                confirmButton: "btn fw-bold btn-primary",
                cancelButton: "btn btn-active-light"
            },
            // timer
            timer:1000
        };
        swal(firstAlert);
    }

function haveTag(string, forAlertMessage) {
    let result = /^/.test(string);
    if (forAlertMessage && result) {
        alertMessageSolidString = false;
    }
    return result;
}
</script>
