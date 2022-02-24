@component('mail::message')
@if($details['ref']=='w_report')
<p>Dear Artist,</p>
<p>Your subscriber list has grown!</p>
<p>This week {{$details['count']}} people subscribed to your mailing list. That brings your total to {{$details['count']}}. Keep up the good work! </p>
<p>You can view your list <a href="https://www.brush.bio/me/user-mailable">here</a>.</p>

@else
<p>Dear Artist,</p>
<p>You have a new subscriber to your profile! <a href="https://www.brush.bio/me/user-mailable">Click here</a> to view.</p>
@endif


<!-- @component('mail::button', ['url' => ''])
Button Text
@endcomponent -->

Regards,<br>
{{ config('app.name') }}
@endcomponent
