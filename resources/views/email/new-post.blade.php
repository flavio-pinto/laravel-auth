@component('mail::message')
# Nuovo post creato

Il post è stato inviato con successo sul blog!

{{$title}}

@component('mail::button', ['url' => config('app.url') . '/posts']) {{-- app url lo prende da .env, in questo caso è http://127.0.0.1:8000/ --}}
Visualizza archivio blog
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent

