@component('mail::message')
# COLEGIO DE DAGUPAN - ONLINE REGISTRATION

Dear {{ $student->first_name}},

Congratulations for successfully finishing the enrollment process! 
@component('mail::panel')
Student Name: <b>{{ $student->full_name }}</b><br>
Student Number: <b>{{ $student->stud_no }}</b><br>
OR #: <b>{{ $student->or_no }}</b>
@endcomponent
Please take note of the following information:

1.	Notifications on your enrollment will be sent to your email address. Please check your email regularly or follow the official Facebook Page of Colegio de Dagupan to be updated.

2.	You may view your class schedule and assessment of fees by accessing the Student Portal. Follow the steps indicated in [HOW TO ACCESS THE STUDENT PORTAL]({{ url('/view-attach') }}).

3.	Colegio de Dagupan will be issuing an official Gmail account and Student-Teacher Education Portal (STEP) account to all enrolled students. These accounts will allow you to participate in all of your virtual classes. The issuance of the official Gmail and STEP accounts will be done, one week before the start of the classes.

4.	You may request for a printed copy of your Registration form and official receipt at the Enrolment Area in the school campus. Note: Please observe COVID-19 safety protocols when going to the school campus.

5.	Admission requirements for new students (Report Card/Form 138 and Certificate of Good Moral Character, Certificate of Honors) and transferees (Certificate of Grades/Transcript of Records, Transfer Credentials, Certificate of Good Moral Character) shall be submitted to the Registrar’s Office on or before September 6, 2021.

Should there be other questions regarding your enrolment, feel free to send an email to [info@cdd.edu.ph](info@cdd.edu.ph).

Once again, congratulations and thank you for choosing Colegio de Dagupan!

Best regards,<br>

Colegio de Dagupan
@endcomponent