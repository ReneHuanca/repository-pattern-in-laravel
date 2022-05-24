<a href="{{ route('users.create') }}">
    <button>Create a new user</button>
</a>

<h3>List of users</h3>
@foreach($users as $user)
<div>{{ $user->id }}: {{ $user->name }} - {{ $user->email }}</div>
@endforeach