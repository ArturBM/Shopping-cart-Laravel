@if($errors->any())
    @foreach($errors->all() as $error)
        {{$error}} <br>
    @endforeach
@endif

<form action="{{route('users.store')}}" method="POST">
    @csrf
    <label for="firstName">Nome:</label>
    <input type="text" name="firstName">
    <label for="lastName">Sobrenome:</label>
    <input type="text" name="lastName">
    
    <label for="email">Email:</label>
    <input type="email" name="email">
    <label for="password">Senha:</label>
    <input type="password" name="password">

    <button type="submit">Cadastrar</button>
</form>