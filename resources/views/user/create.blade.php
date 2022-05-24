<h3>New User</h3>
<form action="{{ route('users.store') }}" method="POST">
    @csrf
    <input type="text" name="name" placeholder="Name"><br>
    <input type="text" name="email" placeholder="Email"> <br>
    <input type="password" name="password" placeholder="Password"> <br>
    <button type="submit">Save</button>
</form>
