@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE REGISTRATION
@component('mail::panel')
We Have { $details['admission'] }} Unadmitted Students.<br>
We Have {{ $details['rtoday'] }} Registrations Today.<br>
We Have {{ $details['unverified'] }} Unverified Payments.<br>
We Have {{ $details['notenrolled'] }} Not Yet Enrolled Students.<br>
@endcomponent
Best regards,<br>
Colegio de Dagupan
@endcomponent