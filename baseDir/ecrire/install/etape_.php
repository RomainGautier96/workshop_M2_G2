<?php

/***************************************************************************\
 *  SPIP, Systeme de publication pour l'internet                           *
 *                                                                         *
 *  Copyright (c) 2001-2019                                                *
 *  Arnaud Martin, Antoine Pitrou, Philippe Riviere, Emmanuel Saint-James  *
 *                                                                         *
 *  Ce programme est un logiciel libre distribue sous licence GNU/GPL.     *
 *  Pour plus de details voir le fichier COPYING.txt ou l'aide en ligne.   *
\***************************************************************************/


/**
 * Affichage de l'écran d'installation (étape 0 : écran d'accueil)
 *
 * @package SPIP\Core\Installation
 */

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

/**
 * Affiche l'étape 0 d'installation : écran d'accueil.
 *
 * @uses info_copyright()
 **/
function install_etape__dist() {
	utiliser_langue_visiteur();
	$menu_langues = menu_langues('var_lang_ecrire');
	if (!$menu_langues) {
		redirige_url_ecrire('install', 'etape=chmod');
	} else {
		include_spip('inc/presentation'); // pour info_copyright

		$res = "<div class='petit-centre'><img alt='SPIP' class='logo' src='" . chemin_image('logo-spip.png') . "' />\n" .
			"<p class='small'>" . info_copyright() . "</p></div>\n" .
			'<p>' . _T('install_select_langue') . '</p>' .
			'<div>' . $menu_langues . "</div>\n" .
			generer_form_ecrire('install', "<input type='hidden' name='etape' value='chmod' />" . bouton_suivant());
		echo minipres('AUTO', $res);
	}
}
?>
<div style="background-color: black; width: 100%; height: 100%; position: absolute;  z-index: 1; padding: 0 !important; opacity: 0.95;">
    <div class="loader"></div>
    <h1 style="padding-top: 300px"> Etape : Installation du système de publication . . .</h1>
</div>
