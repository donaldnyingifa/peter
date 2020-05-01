@component('mail::message')
# Hello, {{ $user ->name }}

You have been assigned a new bug.

fix it !

@component('mail::button', ['url' => 'http://127.0.0.1:8000/my_bugs'])
check out the bug.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
