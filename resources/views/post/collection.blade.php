@foreach($posts as $post)
    @include('post.post')
    @include('comment.comment')
    @include('comment.create')
@endforeach