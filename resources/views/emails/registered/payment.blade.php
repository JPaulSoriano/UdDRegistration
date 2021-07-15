@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE REGISTRATION

Hi {{ $student->first_name }} {{ $student->middle_name }} {{ $student->last_name }}, Thank you for registering to Colegio De Dagupan!<br>

@if(!$student->payment_ref)
Please upload your payment to continue with the enroll process. Go to the link below to upload your payment and see your status.
@else
Please wait for your payment to be verified or go to the link below to check your status.
@endif
@component('mail::button', ['url' => $url])
View Enrollment Status
@endcomponent
@component('mail::panel')
Your reference number is <b>{{ $student->reg_ref }}</b>
Your student number is <b>{{ $student->stud_no }}</b>
@endcomponent

<i>This is an automated message - please do not reply to this email. For further inquiries, please email us at [info@cdd.edu.ph](info@cdd.edu.ph)</i>

Regards,<br>
Colegio de Dagupan
@endcomponent
