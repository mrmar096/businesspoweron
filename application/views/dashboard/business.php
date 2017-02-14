<main>

    <div class="mdl-grid">

        <?php for ($i = 0; $i < count($data); $i++) { ?>

            <div class="demo-card-square mdl-card mdl-shadow--2dp mdl-cell--4-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><?= $data[$i]->name ?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <span class="mdl-chip">
                        <span class="mdl-chip__text"><strong>CIF: </strong><?= $data[$i]->cif?></span>
                    </span>

                    <span class="mdl-chip">
                       <span class="mdl-chip__text"><strong>IP: </strong><?= $data[$i]->ip?></span>
                    </span>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?= base_url('devices'); ?>"
                       class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Ver Dispositivos
                    </a>
                </div>
                <div class="mdl-card__menu">
                    <button id="<?= $i ?>" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">more_vert</i>
                    </button>

                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        for="<?= $i ?>">
                        <li class="mdl-menu__item">Editar Empresa</li>
                        <li class="mdl-menu__item">Eliminar Empresa</li>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

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