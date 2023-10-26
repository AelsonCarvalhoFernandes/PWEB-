<div>
    <form action="/publicarProduto" method="post">
        <div>
            <label for="name">Nome do produto</label>
            <input type="text" name="name">
        </div>
        <div>
            <label for="qtd">Quantidade</label>
            <input type="number" name="qtd">
        </div>
        <div>
            <label for="categoria">Categoria</label>
            <input type="text" name="categoria">
        </div>
        <div>
            <label for="preco">Preço</label>
            <input type="number" name="preco">
        </div>
        <div>
            <label for="descricao">Descrição</label>
            <input type="text" name="descricao">
        </div>

        <div>
            <input type="hidden" value="1" name="id_vendedor">
        </div>

        <div>
            <input type="submit" value="Publicar">
        </div>
    </form>
</div>