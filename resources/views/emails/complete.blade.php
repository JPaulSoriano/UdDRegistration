@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE REGISTRATION

Congratulations for successfully finishing the enrollment process! 
@component('mail::panel')
Student Name: <b>{{ $student->full_name }}</b><br>
Student Number: <b>{{ $student->stud_no }}</b><br>
OR #: <b>{{ $student->or_no }}</b>
@endcomponent
Please take note of the following information:

1.	Notifications on your enrollment will be sent to your email address. Please check your email regularly or follow the official Facebook Page of Colegio de Dagupan to be updated.

2.	You may view your class schedule and assessment of fees by accessing the Student Portal. Follow the steps here: [How to access student portal]({{ url('/view-attach') }}).

3.	Colegio de Dagupan will be issuing an official Gmail account and Student-Teacher Education Portal (STEP) account to all enrolled students. These accounts will allow you to participate in all of your virtual classes. The issuance of the official Gmail and STEP accounts will be done, one week before the start of the classes.

4.	You may request for a printed copy of your Registration form and official receipt at the Enrolment Area in the school campus. Please observe COVID-19 safety protocols when going to the school campus.

<i>This is an automated message - please do not reply to this email. For further inquiries, please email us at [info@cdd.edu.ph](info@cdd.edu.ph)</i>

Regards,<br>
Colegio de Dagupan
@endcomponent
