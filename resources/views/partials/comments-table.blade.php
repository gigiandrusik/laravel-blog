@php /**@var \App\Models\Db\Comment[]|\Illuminate\Database\Eloquent\Collection|\Illuminate\Pagination\Paginator $comments*/ @endphp

<h3>Comments</h3>

<table class="table table-bordered">
    <tr>
        <th>Author</th>

        <th>Content</th>

        <th>Created</th>
    </tr>

    @foreach ($comments as $comment)

        <tr>
            <td>
                {{ $comment->author }}
            </td>

            <td>
                {{ $comment->content }}
            </td>

            <td>
                {{ $comment->created_at }}
            </td>
        </tr>

    @endforeach

</table>