{{display_name_of($post->user->username) == "" ? $post->user->username : display_name_of($post->user->username)}}<br>
{{$post->created_at->diffForHumans()}}<br>