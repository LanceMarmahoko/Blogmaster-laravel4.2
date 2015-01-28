{{'<?xml version="1.0" encoding="UTF-8"?>'}}

<feed xmlns="http://www.w3.org/2005/Atom">
    <title>Blog Feed</title>
    <subtitle>This is a feed from Blogmaster v.1</subtitle>
    <link href="http://blogmaster.app/feed"/><!--Make helper for links as such-->
    <updated>{{ Carbon\Carbon::now()->toATOMString() }}</updated>
    <author>
        <name>Eish Feed</name>
    </author>
    <id>...</id>

@foreach($posts as $post)
<entry>
    <title>{{$post->title}}</title>
    <link>{{URL::route('showpost', $post->id)}}</link>
    <id>...</id>
    <updated>...</updated>
    <summary>
        {{$post->excerpt}}...
    </summary>
</entry>
@endforeach
</feed>