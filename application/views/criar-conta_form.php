<div class="criar-conta">
    <?php echo form_open('login/criar_usuario', '');?>
    <h2 class="form-signin-heading">Criar conta</h2>
    <?php
        
        if (isset($erros)) { 
            echo '<div class="alert alert-danger">'.$erros.'</div>';
        }
        if (isset($message)) {
            echo '<div class="alert alert-success">'.$message.anchor('login', 'Login now').'</div>';
        }
    ?>
    <input type="text" class="form-control" name="nome" placeholder="Nome" required autofocus />
    <input type="email" class="form-control" name="email" placeholder="Email" required />
    <input type="password" name="senha" class="form-control" placeholder="Senha">
    <input type="password" name="senha2" class="form-control" placeholder="Confirmar Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Criar</button>
    <?php echo form_close(); ?>
</div>