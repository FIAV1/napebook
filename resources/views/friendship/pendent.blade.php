<form id="friendship-cancel-form" method="POST" action="{{ route('friendship-delete') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input id="friendship-cancel" type="hidden" name="friend_id">
</form>
