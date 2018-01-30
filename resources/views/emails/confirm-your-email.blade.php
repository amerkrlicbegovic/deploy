@component('mail::message')
# One more step before joining Bahdcasts !

Potrebno je da potvrdite mail.

@component('mail::button', ['url' => route('confirm-email') . '?token=' . $user->confirm_token])
Confirm Email
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
