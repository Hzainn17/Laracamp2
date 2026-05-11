<x-mail::message>
# Your Order Has Been Paid

Hi {{ $checkout->User->name }}, 
<br>
we're excited to inform you that your order for the {{ $checkout->Camp->title }} camp has been successfully paid. Thank you for your purchase!

<x-mail::button :url="route('user.dashboard')">
My Dashboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
