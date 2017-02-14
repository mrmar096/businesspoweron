<?php echo $data ?>
<h3>HELLO WORLD</h3>



<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-float dialog-button"><i
        class="material-icons">add</i></button>


<dialog id="dialog" class="mdl-dialog">
    <h3>Añadir Empresa</h3>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__content">
        <form id="form" method="post" role="form" action="<?= base_url('business/login'); ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="name" class="mdl-textfield__input" type="name" id="name">
                <label class="mdl-textfield__label" for="name">Nombre...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="cif" class="mdl-textfield__input" type="text" id="cif">
                <label class="mdl-textfield__label" for="cif">Cif...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="ip" class="mdl-textfield__input" type="text" id="ip">
                <label class="mdl-textfield__label" for="cif">Ip...</label>
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

(function () {
    'use strict';
    var dialogButton = document.querySelector('.dialog-button');
    var dialog = document.querySelector('#dialog');
    if (!dialog.showModal) {
        dialogPolyfill.registerDialog(dialog);
    }
    dialogButton.addEventListener('click', function () {
        dialog.showModal();
    });
    dialog.querySelector('.close')
    .addEventListener('click', function () {
        dialog.close();
    });
}());

</script>