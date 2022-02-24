@component('mail::message')
# Welcome to Our Website

Thank You For Registring<br>
Thank You For Intresting<br>
Here You Check the 5 Latest<br>
Post In Our Site I hope You <br>
are Very Happay to See that..... Right!
@foreach($posts as $post)
## <a href="{{route('posts.show',$post->id)}}">{{$post->title}}</a>
@endforeach

@component('mail::button', ['url' => route('posts.index')])
View All Posts
@endcomponent

Thanks,<br>
{{ config('app.name') }}
@endcomponent
