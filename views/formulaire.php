<title> Formulaire pour un hébergement sous SIP</title>
  

    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.4.1/css/all.css" integrity="sha384-5sAR7xN1Nv6T6+dT2mhtzEpVJvfS3NScPQTrOxhwjIuvcA67KV2R5Jz6kr4abQsz" crossorigin="anonymous">

    <link rel="stylesheet" type="text/css" href="assets/style/style.css">
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

<div class="form-style-10">
<h1>Créez votre site!<span>Inscrivez vous et créez puis gérer votre site SPIP!</span></h1>
<form method="POST" action="trt_creaSite.php">
    <div class="section"><span></span>Information Website</div>
    <div class="inner-wrap">

         <div class="champ">
                <label for="pays">Langue du site</label>
                <select id="pays" name="pays">

<option value='ar' style="display:none;">[ar] &#1593;&#1585;&#1576;&#1610;</option>
<option value='ast' style="display:none;">[ast] asturianu</option> �
<option value='ay' style="display:none;">[ay] Aymara</option>
<option value='bg' style="display:none;">[bg] &#1073;&#1098;&#1083;&#1075;&#1072;&#1088;&#1089;&#1082;&#1080;</option>
<option value='br' style="display:none;">[br] brezhoneg</option>
<option value='bs' style="display:none;">[bs] bosanski</option>
<option value='ca' style="display:none;">[ca] catal&#224;</option>
<option value='co' style="display:none;">[co] corsu</option>
<option value='cpf' style="display:none;">[cpf] Kr&#233;ol r&#233;yon&#233;</option>
<option value='cpf_hat' style="display:none;">[cpf_hat] Krey&#242;l (Peyi Dayiti)</option>
<option value='cs' style="display:none;">[cs] &#269;e&#353;tina</option>
<option value='da' style="display:none;">[da] dansk</option>
<option value='de' style="display:none;">[de] Deutsch</option>
<option value='en' style="display:none;">[en] English</option>
<option value='eo' style="display:none;">[eo] Esperanto</option>
<option value='es' style="display:none;">[es] Espa&#241;ol</option>
<option value='eu' style="display:none;">[eu] euskara</option>
<option value='fa' style="display:none;">[fa] &#1601;&#1575;&#1585;&#1587;&#1609;</option>
<option value='fon' style="display:none;">[fon] fongb&#232;</option>
<option value='fr' selected='selected'>[fr] fran&#231;ais</option>
                </select>
              </div>
            </fieldset>
    </div>

        <div class="section"><span></span>A propos de vous</div>
        <div class="inner-wrap">
        <label>Nom de votre organisation<input type="text" name="organisation" required /></label>
        <label>Descriptif <textarea name="descriptif" placeholder="Facultatif"></textarea></label>


<div class="section"><span></span>Adresse de la base</div>
        <div class="inner-wrap">
        <label>Login Connexion BBD <input type="text" name="loginConnexion" required /></label>
        <label>Password BDD <input type="password" name="pwdConnexion" required /></label>



    <div class="section"><span></span>Login & Connexion à SPIP</div>
    <div class="inner-wrap">
        <label>Login SPIP<input type="text" name="loginSPIP" required /></label>
        <label>Mot de passe  <input type="password" minlength="8" name="pwdSPIP" id="pwdSPIP" required /></label>
        <label>Confirmation du Mot de passe  <input type="password" name="confirmpwdSPIP" id="confirmpwdSPIP" required /></label>
    </div>

    <div class="section"><span></span> Votre identitée publique</div>
        <div class="inner-wrap">
        <label>Signature (Nom ou pseudo) <input type="text" name="signature" required /></label>
        <label>Adresse Mail <input type="email" name="mail" required /></label>
                   
            </fieldset>
    </div>

     

    <div class="button-section">
     <input type="submit" name="Sign Up" id="register" disabled="disabled" />
    </div>
</form>
</div>


<script>

var password = $('#pwdSPIP');
var passwordConfirm = $('#confirmpwdSPIP');
var register = $('#register');



password.on('input',function(e){
	      if (passwordConfirm.val() === password.val()) {
		                   register.prop("disabled", false);
				        } else {
							     register.prop("disabled", true);
							          }
})

	passwordConfirm.on('input',function(e){
			if (passwordConfirm.val() === password.val()) {
						passwordConfirm.removeClass("error_regex");
								register.prop("disabled", false);
							} else {
										passwordConfirm.addClass("error_regex");
												register.prop("disabled", true);
											}
					
	})
	</script>
