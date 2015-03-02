<blockquote>
  <p>Posted By: {{display_name_of($post->user->username) == "" ? $post->user->username : display_name_of($post->user->username)}}</p>
  <footer>About <cite title="Source Title">{{$post->created_at->diffForHumans()}}</cite></footer>
</blockquote>
<hr>