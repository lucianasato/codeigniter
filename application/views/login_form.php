

<?php echo form_open('login/valida_usuario', 'class="form-signin" role="form"');?>
    <h2 class="form-signin-heading">Login</h2>
    <?php
        if ($this->input->get('erro') == 2) { 
            echo '<div class="alert alert-danger">E-mail/senha inválidos</div>';
        }
        
    ?>
    
    <input type="text" name="email" class="form-control" placeholder="Email" required autofocus>
    <input type="password" name="senha" class="form-control" placeholder="Senha" required>
    <button class="btn btn-lg btn-primary btn-block" type="submit">Entrar</button>
    <?php echo anchor('login/criar_conta', 'Criar Conta');?>
    
</form>