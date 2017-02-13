

<div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Bienvenido</h2>
    </div>
    <div class="mdl-card__supporting-text">

        <div class="mdl-tabs mdl-js-tabs mdl-js-ripple-effect">
            <div class="mdl-tabs__tab-bar">
                <a href="#starks-panel" class="mdl-tabs__tab is-active">Iniciar Sesion</a>
                <a href="#lannisters-panel" class="mdl-tabs__tab">Registrarse</a>
            </div>

            <div class="mdl-tabs__panel is-active" id="starks-panel">

                <form id="form" method="post" role="form" action="<?=base_url('user/login');?>">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="email" id="email">
                        <label class="mdl-textfield__label" for="email">Email...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña...</label>
                    </div>
            </div>
            <div class="mdl-tabs__panel" id="lannisters-panel">
                <form id="form" method="post" role="form" action="<?=base_url('user/login');?>">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="email" id="email">
                        <label class="mdl-textfield__label" for="email">Email...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Nombre...</label>
                    </div>
            </div>
        </div>



        <main class="mdl-layout__content">
            <section class="mdl-layout__tab-panel is-active" id="fixed-tab-1">
                <div class="page-content">

                </div>
            </section>
            <section class="mdl-layout__tab-panel" id="fixed-tab-2">
                <div class="page-content">

                </div>
            </section>

        </main>





    </div>
    <div class="mdl-card__actions mdl-card--border">
        <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit">Iniciar Sesion</button>
        <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">Registrarse</button>
    </div>
    </form>
</div>