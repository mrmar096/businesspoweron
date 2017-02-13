<?php
/**
 * Created by PhpStorm.
 * User: Toni Hernandez
 * Date: 13/02/2017
 * Time: 16:16
 */
?>


<div class="demo-card-wide mdl-card mdl-shadow--2dp">
    <div class="mdl-card__title">
        <h2 class="mdl-card__title-text">Welcome</h2>
    </div>
    <div class="mdl-card__supporting-text">

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
    <div class="mdl-card__actions mdl-card--border">
        <a class="mdl-button mdl-button--colored mdl-js-button mdl-js-ripple-effect">
            Get Started
        </a>
    </div>
    <div class="mdl-card__menu">
        <button class="mdl-button mdl-button--icon mdl-js-button mdl-js-ripple-effect">
            <i class="material-icons">share</i>
        </button>
    </div>
</div>



<form id="form" method="post" role="form" action="<?=base_url('user/register');?>">7
    <label for="name"> Nombre</label><input name="name" type="text" value="asdfasdf">
    <label for="email"> Email</label><input name="email" type="email" value="asdfasdf@gmail.com">
    <label for="password"> Password</label><input name="password" type="password" value="lasfdjklasdjf">
    <button type="submit">Enviar</button>
</form>


