<?php echo form_open_multipart($action, 'class="" role="form"');?>
    <h2 class="form-signin-heading">Cadastrar Notícia</h2>
    <?php
        if ($this->input->get('erro') == 2) { 
            echo '<div class="alert alert-danger">E-mail/senha inválidos</div>';
        }
        
    echo form_hidden('id', isset($row['id']) ? $row['id'] : '');
    echo form_label('Título');
    $titulo = array(
                'name'        => 'titulo',
                'value'       => isset($row['titulo']) ? $row['titulo'] : '',
              );
    echo form_input($titulo, '', 'class="form-control"');
    
    
    echo form_label('Chamada');
    $chamada = array(
                'name'        => 'chamada',
                'value'       => isset($row['chamada']) ? $row['chamada'] : '',
              );
    echo form_input($chamada, '', 'class="form-control"');
    
    $conteudo = array(
                'name'        => 'conteudo',
                'value'       => isset($row['conteudo']) ? $row['conteudo'] : '',
              );
    echo form_label('Conteúdo');
    echo form_textarea($conteudo, '', 'class="form-control"');
    
    echo form_label('Foto');
    echo form_upload('foto');
    
    $data_publicacao = array(
                        'name'        => 'data_publicacao',
                        'value'       => isset($row['data_publicacao']) ? $row['data_publicacao'] : '',
                      );
    echo form_label('Data de publicação');
    echo form_input($data_publicacao, '', 'class="form-control"');
   
    echo form_label('Status');
    
    $options = array(
                  '1'  => 'Ativo',
                  '0'  => 'Desativado',
                );
    $selected = isset($row['status']) ? $row['status'] : '1';
    echo form_dropdown('status', $options, $selected);
    
    $data_btn = array(
        //'name' => 'button',
        //'id' => 'button',
        //'value' => 'true',
        'type' => 'submit',
        'content' => $label
    );

    echo form_button($data_btn, '',  'class="btn btn-lg btn-primary btn-block"');


    ?>
    
</form>