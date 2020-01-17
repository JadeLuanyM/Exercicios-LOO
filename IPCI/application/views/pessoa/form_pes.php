
<div class="container my-5">
    <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    
    <div class="row ">
        <div class="col-md-6 mx-auto my-5">
            <form class="text-center border border-light p-5" method="POST">
                <p class="h4 mb-4">Cadastre-se</p>
                <input value = "<?= isset($user) ? $user['nome'] : '' ?>" type="text" id="nome" name="nome" class="form-control mb-4" placeholder="Nome do usuário"> 
                <input value = "<?= isset($user) ? $user['snome'] :'' ?>" type="text" id="snome"  name="snome" class="form-control mb-4" placeholder="Sobrenome">               
                <input value = "<?= isset($user) ? $user['idade'] : '' ?>" type="number" id="idade"  name="idade" class="form-control mb-4" placeholder="Sua idade">               
                <input value = "<?= isset($user) ? $user['email'] : '' ?>" type="text" id="email" name="email"  class="form-control mb-4" placeholder="Seu email">               
                <button class="btn btn-info btn-block my-4" type="submit">Cadastrar</button>
            </form>
        </div>
    </div>
</div>

