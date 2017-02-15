<main>

    <div class="mdl-grid">

        <?php for ($i = 0; $i < count($data); $i++) { ?>

            <div class="devices-card mdl-card mdl-shadow--2dp mdl-cell--4-col">
                <div class="mdl-card__title mdl-card--expand">
                    <h2 class="mdl-card__title-text"><?= $data[$i]->name ?></h2>
                </div>
                <div class="mdl-card__supporting-text">
                    <span class="mdl-chip">
                       <span class="mdl-chip__text"><strong>Mac: </strong><?=$data[$i]->mac?></span>
                    </span>
                    <span class="mdl-chip">
                       <span class="mdl-chip__text"><strong>IP: </strong><?=$data[$i]->ip?></span>
                    </span>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <label class="mdl-switch mdl-js-switch mdl-js-ripple-effect" for="<?=$data[$i]->mac?>">
                        <?php if($data[$i]->status == 0){?>
                        <input type="checkbox" id="<?=$data[$i]->mac ?>" class="mdl-switch__input">
                        <?php } else { ?>
                            <input type="checkbox" id="<?=$data[$i]->mac?>" class="mdl-switch__input" checked>
                        <?php }?>
                        <span class="mdl-switch__label">Encendidio</span>
                    </label>
                </div>
                <div class="mdl-card__menu">
                    <button id="<?= $i ?>" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">more_vert</i>
                    </button>

                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect"
                        for="<?=$i?>">
                        <a href="<?= base_url('business/update'); ?>"> <li class="mdl-menu__item">Editar Dispositivo</li></a>
                        <a href="<?= base_url('devices/delete/'.$data[$i]->mac);?>" class="dialog-del"> <li class="mdl-menu__item">Eliminar Empresa</li></a>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</main>




<button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-float dialog-button"><i
        class="material-icons">add</i></button>


<dialog id="dialog" class="mdl-dialog">
    <h3>Añadir Dispositivo</h3>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__content">
        <form id="form" method="post" role="form" action="<?= base_url('devices/register'); ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="mac" class="mdl-textfield__input mask_address" type="name" id="mac">
                <label class="mdl-textfield__label" for="mac">Mac...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="name" class="mdl-textfield__input" type="text" id="name">
                <label class="mdl-textfield__label" for="name">Nombre...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="ip" class="mdl-textfield__input ip_address" type="text" id="ip">
                <label class="mdl-textfield__label" for="ip">Ip...</label>
            </div>
    </div>
    <div class="mdl-card__actions mdl-card--border"></div>

    <div class="mdl-dialog__actions">
        <button type="submit" class="mdl-button">Registrar</button>
        <button type="button" class="mdl-button close">Cerrar</button>
    </div>
    </form>
</dialog>

<dialog id="dialog-del" class="mdl-dialog">
    <h3>ATENCION</h3>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__content">
        ¿Estas seguro de eliminar?
    </div>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__actions">
        <a href="" class="confirm-delete mdl-button">Eliminar</a>
        <button type="button" class="close mdl-button">Cerrar</button>
    </div>
</dialog>
