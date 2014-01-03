<?php echo form_open_multipart('admin/noticia/cadastrar', 'class="" role="form"');?>
    <h2 class="form-signin-heading">Cadastrar Notícia</h2>
    <?php
        if ($this->input->get('erro') == 2) { 
            echo '<div class="alert alert-danger">E-mail/senha inválidos</div>';
        }
        
    
    echo form_label('Título');
    echo form_input('titulo', '', 'class="form-control"');
    echo form_label('Chamada');
    echo form_input('chamada', '', 'class="form-control"');
    echo form_label('Conteúdo');
    echo form_textarea('conteudo', '', 'class="form-control"');
    echo form_label('Foto');
    echo form_upload('foto');
    echo form_label('Data de publicação');
    echo form_input('data_publicacao', '', 'class="form-control"');
    echo form_label('Status');
    
    $options = array(
                  '1'  => 'Ativo',
                  '0'    => 'Desativado',
                 
                );

    echo form_dropdown('status', $options, '1');
    
    $data_btn = array(
        //'name' => 'button',
        //'id' => 'button',
        //'value' => 'true',
        'type' => 'submit',
        'content' => 'Cadastrar'
    );

    echo form_button($data_btn, '',  'class="btn btn-lg btn-primary btn-block"');


    ?>
    
</form>