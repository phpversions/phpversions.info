@component('mail::message')
# PhpVersions

There was a new message sent to the PhpVersions team.

Name: {{ $name }}

Email: {{ $email }}

Message: {{ $message }}

A copy of this message was stored in the database, and you can view this message in Admin as well.

@component('mail::button', ['url' => 'https://phpversions.org/admin/messages'])
View Message
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
