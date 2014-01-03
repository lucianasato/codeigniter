<?php 
    if ($this->input->get('msg') == 1)  { ?>
        <div class="alert alert-success">Notícia cadastrada com sucesso</div>
    <?php } else if ($this->input->get('msg') == 2) { ?>
        <div class="alert alert-success">Notícia atualizada com sucesso</div>
    <?php } else if ($this->input->get('msg') == 3) { ?>
        <div class="alert alert-success">Notícia excluída com sucesso</div>
    <?php } ?>
        <a href="<?php echo base_url(); ?>admin/noticia/add" class="btn btn-primary btn-sm" role="button">Adicionar</a>
    <?php if ($total_rows > 0) : ?>
        <table class="table .table-hover">
            <thead>
                <tr>
                    <th>#</th>
                    <th>Título</th>
                    <th>Chamada</th>
                    <th>Foto</th>
                    <th>Data de Publicação</th>
                    <th>Status</th>
                </tr>
            </thead>
            <tbody>
                <?php

                foreach ($records->result() as $row) : ?>
                    <tr>
                        <td><?php echo $row->id; ?></td>
                        <td><?php echo $row->titulo; ?></td>
                        <td><?php echo $row->chamada; ?></td>
                        <td>
                            <img class="img-rounded" src="<?php echo base_url().'images/thumbs/'.$row->foto; ?>" />
                        </td>
                        <td><?php echo $row->data_publicacao; ?></td>
                        <td><?php echo $row->status; ?></td>
                        <td><a href="<?php echo base_url(); ?>admin/noticia/edit/<?php echo $row->id; ?>">Editar</a></td>
                        <td><a href="<?php echo base_url(); ?>admin/noticia/delete/<?php echo $row->id; ?>">Excluir</a></td>
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php echo $this->pagination->create_links();
    else :
        echo 'Nenhum resultado';
    endif;
?>

