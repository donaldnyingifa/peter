@component('mail::message')
# Hello, {{ $user ->name }}

Welcome to Peter.

Feel free to report or help resove any bug.

@component('mail::button', ['url' => 'http://127.0.0.1:8000/home'])
Go to home page.
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
