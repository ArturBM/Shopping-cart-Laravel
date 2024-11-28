@if($mensagem = Session::get('erro'))
    {{$mensagem}}
@endif

@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('login.auth')}}" method="POST">
    @csrf
    <label for="email">Email:</label>
    <input type="email" name="email">
    <label for="password">Senha:</label>
    <input type="password" name="password">
    <button type="submit">Entrar</button>
    <input type="checkbox" name="remember"> Lembrar-me

</form>