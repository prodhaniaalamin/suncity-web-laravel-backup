@php
    $contactInfo = dynamicData('contactInfo')->options ?? [];
@endphp
<address>
    <strong>Suncity Polyclinic</strong><br>
    Batha, Riyadh, Saudi Arabia<br>
    Email: <a href="mailto:{{ $contactInfo['contactEmail'] }}"> {{ $contactInfo['contactEmail'] }}</a><br>
    Phone: <a href="tel:{{ $contactInfo['contactPhone'] }}"> {{ $contactInfo['contactPhone'] }}</a>
</address>
