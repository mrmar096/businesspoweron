



<table class="mdl-data-table mdl-js-data-table mdl-shadow--2dp">
    <thead>
    <tr>
        <th class="mdl-data-table__cell--non-numeric">ID</th>
        <th>Nombre</th>
        <th>Email</th>
        <th>Tipo</th>
    </tr>
    </thead>
    <tbody>
    <?php for ($i = 0; $i < count($data); $i++) { ?>

    <tr>
        <td class="mdl-data-table__cell--non-numeric"><?= $data[$i]->uid?></td>
        <td><?= $data[$i]->name; ?></td>
        <td><?= $data[$i]->email;?></td>
        <td><?php echo $data[$i]->type ==ADMIN_USER?'Administrador':'Usuario' ;?></td>
    </tr>
   <?php }?>
    </tbody>
</table>
