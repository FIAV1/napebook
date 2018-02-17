<form id="friendship-cancel-form" method="POST" action="{{ route('friendship-delete') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input id="friendship-cancel" type="hidden" name="friend_id">
</form>

<form id="friendship-accept-form" method="POST" action="{{ route('friendship-update') }}">
    {{ csrf_field() }}
    {{ method_field('PUT') }}
    <input id="friendship-accept" type="hidden" name="friend_id">
</form>

<form id="friendship-deny-form" method="POST" action="{{ route('friendship-delete') }}">
    {{ csrf_field() }}
    {{ method_field('DELETE') }}
    <input id="friendship-deny" type="hidden" name="friend_id">
</form>

<form id="friendship-add-form" method="POST" action="{{ route('friendship-store') }}">
    {{ csrf_field() }}
    
    <input id="friendship-add" type="hidden" name="friend_id">
</form>
