
<div class="mdl-layout mdl-js-layout mdl-layout--fixed-header">

    <div
        class="android-header mdl-layout__header mdl-layout__header--waterfall">
        <div class="mdl-layout__header-row">
				<span class="android-title mdl-layout-title title-font"> <img
                        class="android-logo-image" src="<?=base_url('resources/img/logo_blank.png');?>"> <span
                        class="title-font"></span>
				</span>
            <!-- Add spacer, to align navigation to the right in desktop -->
            <div class="android-header-spacer mdl-layout-spacer"></div>

            <!-- Navigation -->
            <div class="android-navigation-container">
                <nav class="mdl-navigation">
                    <a class="mdl-navigation__link" href="">
                        <div id="user" class="icon material-icons">supervisor_account</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="user">
                            Usuario
                        </div>
                    </a>

                    <a class="mdl-navigation__link" href="<?=base_url('business');?>">
                        <div id="em" class="icon material-icons">business</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="em">
                            Empresas
                        </div>
                    </a>
                    <a class="mdl-navigation__link" href="<?=base_url('user/logout');?>">
                        <div id="exit" class="icon material-icons">exit_to_app</div>
                        <div class="mdl-tooltip mdl-tooltip--large" for="exit">
                            Salir
                        </div>
                    </a>
                </nav>
            </div>
        </div>
    </div>

