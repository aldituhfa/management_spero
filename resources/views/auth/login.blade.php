<form action="{{ route('login') }}" method="POST">
    @csrf
    <h2>Login</h2>

    <input type="email" name="email" placeholder="Email">
    <input type="password" name="password" placeholder="Password">

    <button type="submit">Login</button>
</form>
