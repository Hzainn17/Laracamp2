<x-mail::message>
# Registerasi Camp: {{ $checkout->camp->title }} Berhasil

Hi {{ $checkout->User->name }}, 
<br>
Terimakasih telah melakukan pendaftaran camp {{ $checkout->Camp->title }}.

<x-mail::button :url="route('dashboard.user')">
My Dahboard
</x-mail::button>

Thanks,<br>
{{ config('app.name') }}
</x-mail::message>
