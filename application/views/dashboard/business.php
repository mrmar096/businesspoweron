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
                       <span class="mdl-chip__text"><strong>IP: </strong><?=$data[$i]->ip?></span>
                    </span>
                    <span class="mdl-chip">
                       <span class="mdl-chip__text"><strong>Dispositivos: </strong><?=$data[$i]->devices?></span>
                    </span>
                </div>
                <div class="mdl-card__actions mdl-card--border">
                    <a href="<?= base_url('devices/index/'.$data[$i]->cif); ?>" class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
                        Ver Dispositivos
                    </a>

                </div>
                <div class="mdl-card__menu">
                    <button id="<?= $i ?>" class="mdl-button mdl-js-button mdl-button--icon">
                        <i class="material-icons">more_vert</i>
                    </button>

                    <ul class="mdl-menu mdl-menu--bottom-right mdl-js-menu mdl-js-ripple-effect" for="<?=$i?>">
                        <?php if($this->session->userdata("user")->type != ADMIN_USER) { ?>
                        <a class="dialog-edit"> <li class="mdl-menu__item">Editar Empresa</li></a>
                        <?php }?>
                        <a href="<?= base_url('business/delete/'.$data[$i]->cif);?>" class="dialog-del"> <li class="mdl-menu__item">Eliminar Empresa</li></a>
                    </ul>
                </div>
            </div>
        <?php } ?>
    </div>
</main>

<?php  if((count($data) == 0)){?>
    <button class="mdl-button mdl-js-button mdl-button--fab mdl-js-ripple-effect btn-float dialog-button"><i
            class="material-icons">add</i></button>
<?php } ?>


<dialog id="dialog" class="mdl-dialog">
    <h3>Añadir Empresa</h3>
    <div class="mdl-card__actions mdl-card--border"></div>
    <div class="mdl-dialog__content">
        <form id="form" method="post" role="form" action="<?= base_url('business/register'); ?>">
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="name" class="mdl-textfield__input" type="name" id="name">
                <label class="mdl-textfield__label" for="name">Nombre...</label>
            </div>
            <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                <input name="cif" maxlength="9" minlength="9" class="mdl-textfield__input" type="text" id="cif">
                <label class="mdl-textfield__label" for="cif">Cif...</label>
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




 <dialog id="dialog-edit" class="mdl-dialog">
     <h3>Editar Empresa</h3>
     <div class="mdl-card__actions mdl-card--border"></div>
     <div class="mdl-dialog__content">
         <form id="form" method="post" role="form" action="<?= base_url('business/update'); ?>">
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input id="name-edit" name="name" class="mdl-textfield__input" type="name" id="name">
                 <label class="mdl-textfield__label" for="name">Nombre...</label>
             </div>
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input id="cif-edit" name="cif" maxlength="9" minlength="9" class="mdl-textfield__input" type="text" id="cif">
                 <label class="mdl-textfield__label" for="cif">Cif...</label>
             </div>
             <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                 <input id="ip-edit" name="ip" class="mdl-textfield__input ip_address" type="text" id="ip">
                 <label class="mdl-textfield__label" for="ip">Ip...</label>
             </div>
     </div>
     <div class="mdl-card__actions mdl-card--border"></div>

     <div class="mdl-dialog__actions">
         <button type="submit" class="mdl-button">Guardar</button>
         <button type="button" class="mdl-button close">Cerrar</button>
     </div>
     </form>
 </dialog>



