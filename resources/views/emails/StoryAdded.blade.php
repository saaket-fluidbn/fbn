@component('mail::message')
# Hi {{ucfirst($user->fname)}}

{{$message}}

@component('mail::button', ['url' => $url])
Take a look
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
