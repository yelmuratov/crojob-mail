<x-mail::message>
# Verify Your Account

Thank you for registering on {{ config('app.name') }}!

Your verification code is: **{{ $data['code'] }}**

Please enter this code on the verification page to complete your registration.

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>