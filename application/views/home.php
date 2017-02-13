<h1>HOME</h1>
<?php $this->load->view('login');?>


<form id="form-registro-user" method="post" role="form" action="<?=base_url('user/register');?>">7
    <label for="name"> Nombre</label><input name="name" type="text" value="asdfasdf">
    <label for="email"> Email</label><input name="email" type="email" value="asdfasdf@gmail.com">
    <label for="password"> Password</label><input name="password" type="password" value="lasfdjklasdjf">
    <button type="submit">Enviar</button>
</form>


