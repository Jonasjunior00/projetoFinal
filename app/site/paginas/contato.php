<H2 class="offset-1"> Contato</H2>

<div class="container mb-0">
    <div class="col-6 offset-3 mb-5">

        <form action="?pg=cad_mensagem" method="POST">

            <div class="form-group">
                <label for="inputEmail4"> Nome</label>
                <input type="text" name="nome" class="form-control" id="inputEmail4" placeholder="Nome">
            </div>
            <div class="form-group">
                <label for="inputAddress"> Email</label>
                <input type="text" name="email" class="form-control" id="inputAddress" placeholder="Exemplo@exemplo.com">
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cat" id="exampleRadios1" value="elogios" checked>
                <label class="form-check-label" for="exampleRadios1">
                    elogios
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cat" id="exampleRadios2" value="agendamentos">
                <label class="form-check-label" for="exampleRadios2">
                    agendamentos
                </label>
            </div>
            <div class="form-check">
                <input class="form-check-input" type="radio" name="cat" id="exampleRadios3" value="criticas">
                <label class="form-check-label" for="exampleRadios3">
                    criticas
                </label>
            </div>
            <div class="form-group">
                <label for="exampleFormControlTextarea1"> Mensagem</label>
                <textarea type="text" name="text" class="form-control" id="exampleFormControlTextarea1" rows="5" placeholder="Digite Sua Mensagem"></textarea>
            </div>

            <div class="form-group"><button type="submit" class="btn btn-dark btn-block">Enviar</button></div>
        </form>
    </div>
</div>