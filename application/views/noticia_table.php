<?php 
    if ($total_rows > 0) : ?>
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
                    </tr>
                <?php endforeach; ?>

            </tbody>
        </table>
        <?php echo $this->pagination->create_links();
    else :
        echo 'Nenhum resultado';
    endif;
?>

