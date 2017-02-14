
<table class="mdl-data-table mdl-js-data-table mdl-data-table--selectable mdl-shadow--2dp tabla-size">
    <thead>

    <tr>
        <th class="mdl-data-table__cell--non-numeric">Nombre</th>
        <th>IP</th>
        <th>CIF</th>
        <th>Acciones</th>
    </tr>
    </thead>
    <tbody>
    <?php for($i=0;$i<count($data);$i++){?>
        <tr>
        <td><?=$data[$i]->name?></td>
            <td><?=$data[$i]->ip?></td>
            <td><?=$data[$i]->cif?></td>
            <td><i class="material-icons">visibility</i><i class="material-icons">settings</i><span/><i class="material-icons">delete</i></td>
        </tr>
    <?php }?>
    </tbody>


</table>


<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-float dialog-button"><i class="material-icons">add</i></button>



<dialog id="dialog" class="mdl-dialog">
    <h3>Añadir Empresa</h3>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__content">
        <form id="form" method="post" role="form" action="<?=base_url('business/login');?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="name" class="mdl-textfield__input" type="name" id="name">
                <label class="mdl-textfield__label" for="name">Nombre...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="cif" class="mdl-textfield__input" type="text" id="cif">
                <label class="mdl-textfield__label" for="cif">Cif...</label>
            </div>

    </div>
    <div class="mdl-card__actions mdl-card--border"></div>

    <div class="mdl-dialog__actions">
        <button type="submit" class="mdl-button">Registrar</button>
        <button type="button" class="mdl-button close">Cerrar</button>
    </div>
        </form>
</dialog>

<script>

    (function() {
        'use strict';
        var dialogButton = document.querySelector('.dialog-button');
        var dialog = document.querySelector('#dialog');
        if (! dialog.showModal) {
            dialogPolyfill.registerDialog(dialog);
        }
        dialogButton.addEventListener('click', function() {
            dialog.showModal();
        });
        dialog.querySelector('.close')
            .addEventListener('click', function() {
                dialog.close();
            });
    }());

</script>