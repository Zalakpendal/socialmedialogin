<form method="GET" action="{{ url('auth/google') }}">
    @csrf
    <button type="submit">Login with Google</button>
</form>

<form method="GET" action="{{ url('auth/github') }}">
    @csrf
    <button type="submit">Login with GitHub</button>
</form>

