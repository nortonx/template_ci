<div id="content" class="grid_16">

	<div id="form_login">
		<?php
			echo form_open('login/submit');
		?>

		<div class="errorMessage">
		<?php
			echo validation_errors('<p class="error">', '</p>');
		?>
		</div>

		<dir class="row">
			<label for="username">Usuário:</label>
			<input type="text" id="username" name="username" />
		</dir>

        <div class="row">
            <label for="email">E-mail:</label>
            <input type="text" id="email" name="email" />
        </div>

		<div class="row">
			<label for="password">Senha:</label>
			<input type="password" id="password" name="password" />
		</div>

		<div class="row">
			<input type="submit" name="submit" id="loginButton" value="Cadastrar" />
			<input type="reset" name="voltar" value="Limpar" />
		</div>

		<?php
			echo form_close();
		?>
	</div>
</div>
