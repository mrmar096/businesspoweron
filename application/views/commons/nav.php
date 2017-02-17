<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">
    <header class="mdl-layout__header">
        <div class="mdl-layout__header-row">
            <!-- Title -->
            <span class="mdl-layout-title">Bienvenido <?=$this->session->userdata("user")->name;?></span>
            <!-- Add spacer, to align navigation to the right -->
            <div class="mdl-layout-spacer"></div>
            <!-- Navigation. We hide it in small screens. -->
            <nav class="mdl-navigation mdl-layout--large-screen-only">
                <?php if($this->session->userdata("user")->type == ADMIN_USER) { ?>
                    <a class="mdl-navigation__link" href="">
                        <div id="admin" class="icon material-icons">insert_emoticon</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="admin">
                            ERES ADMIN!
                        </div>
                    </a>

                    <a class="mdl-navigation__link" href="<?=base_url('user/show_users');?>">
                        <div id="user" class="icon material-icons">supervisor_account</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="user">
                            Usuario
                        </div>
                    </a>
                <?php }?>


                <?php if($this->session->userdata("user")->type == ADMIN_USER) { ?>
                    <a class="mdl-navigation__link" href="<?= base_url('business/all_business');?>">
                        <div id="em" class="icon material-icons">business</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="em">
                            Empresas
                        </div>
                    </a>
                <?php } else { ?>


                    <a class="mdl-navigation__link" href="<?= base_url('business');?>">
                        <div id="em" class="icon material-icons">business</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="em">
                            Empresas
                        </div>
                    </a>
                <?php } ?>

                <a class="mdl-navigation__link" href="<?=base_url('user/logout');?>">
                    <div id="exit" class="icon material-icons">exit_to_app</div>
                    <div class="mdl-tooltip mdl-tooltip--large" for="exit">
                        Salir
                    </div>
                </a>
            </nav>
        </div>
    </header>
    <div class="mdl-layout__drawer">
        <span class="mdl-layout-title"><?=$this->session->userdata("user")->name;?></span>
        <nav class="mdl-navigation">
            <?php if($this->session->userdata("user")->type == ADMIN_USER) { ?>
                <a class="mdl-navigation__link">
                    <div id="admin" class="icon material-icons">insert_emoticon</div>
                    Modo ADMIN
                </a>

                <a class="mdl-navigation__link" href="<?=base_url('user/show_users');?>">
                    <div id="user" class="icon material-icons">supervisor_account</div>
                    Usuarios
                </a>
            <?php }?>


            <?php if($this->session->userdata("user")->type == ADMIN_USER) { ?>
                <a class="mdl-navigation__link" href="<?= base_url('business/all_business');?>">
                    <div id="em" class="icon material-icons">business</div>
                    Empresas
                </a>
            <?php } else { ?>


                <a class="mdl-navigation__link" href="<?= base_url('business');?>">
                    <div id="em" class="icon material-icons">business</div>
                    Empresas
                </a>
            <?php } ?>

            <a class="mdl-navigation__link" href="<?=base_url('user/logout');?>">
                <div id="exit" class="icon material-icons">exit_to_app</div>
                Salir
            </a>
        </nav>
    </div>

