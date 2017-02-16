<div class="mdl-grid">
<div class="demo-card-wide mdl-card mdl-shadow--2dp home-login">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text ">Bienvenido</h2>
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
                        <input name="email" class="mdl-textfield__input" type="email" id="email">
                        <label class="mdl-textfield__label" for="email">Email...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="password" minlength="{6,}" class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña...</label>
                    </div>
                    <div align="center">
                        <button  class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit">Iniciar Sesion</button>
                    </div>
                </form>
            </div>
            <div class="mdl-tabs__panel" id="lannisters-panel">
                <form id="form" align="center" method="post" role="form" action="<?=base_url('user/register');?>">
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="name" class="mdl-textfield__input" type="text" id="name">
                        <label class="mdl-textfield__label" for="name">Nombre...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="email" class="mdl-textfield__input" type="email" id="email">
                        <label class="mdl-textfield__label" for="email">Email...</label>
                    </div>
                    <div class="mdl-textfield mdl-js-textfield mdl-textfield--floating-label">
                        <input name="password" minlength="{3,}" class="mdl-textfield__input" type="password" id="password">
                        <label class="mdl-textfield__label" for="password">Contraseña...</label>
                    </div>

                    <div align="center">

                        <button class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect" type="submit">Registrarse</button>
                    </div>
                </form>
            </div>
            <div  class="mdl-textfield mdl-textfield--floating-label">
                <label  id="error-block" class="mdl-textfield__label"></label>
            </div>
        </div>
    </div>
</div>
