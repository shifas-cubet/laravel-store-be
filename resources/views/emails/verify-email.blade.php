<x-mail::message>
# Introduction

    Hi {{ $user->email }}

{{--<a href="{{ route('/verify-email', $user->email_verified_token) }}">Verify Email</a>--}}

<x-mail::button :url="$verifyEmailURL">
    Verify Email
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
