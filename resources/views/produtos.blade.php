<form method="POST">
    @csrf
    <input name="nome" type="text"/>
    <input name="idade" type="text"/>
    <input value="enviar" type="submit"/>
</form>