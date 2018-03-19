@php /**@var \App\Models\Db\Comment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator $comments*/ @endphp

<ul class="list-group">
    @foreach($comments as $comment)
        <li class="list-group-item">{{ $comment->author }} at {{ $comment->created_at }}: {{ $comment->content }} </li>
    @endforeach
</ul>