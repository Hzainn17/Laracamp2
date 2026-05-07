<x-mail::message>
# Welcome!

Hi {{ $user->name }}, thank you for registering at our website. We are excited to have you on board and look forward to providing you with the best experience possible.

<x-mail::button :url="route('login')">
Login to Your Account
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>