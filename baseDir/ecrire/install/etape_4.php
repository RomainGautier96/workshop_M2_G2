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

if (!defined('_ECRIRE_INC_VERSION')) {
	return;
}

include_spip('inc/headers');

// http://code.spip.net/@install_etape_4_dist
function install_etape_4_dist() {

	// creer le repertoire cache, qui sert partout !
	if (!@file_exists(_DIR_CACHE)) {
		$rep = preg_replace(',' . _DIR_TMP . ',', '', _DIR_CACHE);
		$rep = sous_repertoire(_DIR_TMP, $rep, true, true);
	}


	echo install_debut_html('AUTO', ' onload="document.getElementById(\'suivant\').focus();return false;"');
	echo info_progression_etape(4, 'etape_', 'install/');

	echo "<div class='success'><b>"
		. _T('info_derniere_etape')
		. '</b><p>'
		. _T('info_utilisation_spip')
		. '</p></div>';


	echo '<p>'
		. _T(
			'plugin_info_plugins_dist_1',
			array('plugins_dist' => '<tt>' . joli_repertoire(_DIR_PLUGINS_DIST) . '</tt>')
		)
		. '</p>';

	// installer les extensions
	include_spip('inc/plugin');
	$afficher = charger_fonction('afficher_liste', 'plugins');
	echo $afficher(self(), liste_plugin_files(_DIR_PLUGINS_DIST), array(), array(), _DIR_PLUGINS_DIST,
		'afficher_nom_plugin');

	// si la base de SPIP est up, on peut installer les plugins, sinon on passe cette etape
	// car les plugins supposent que la base de SPIP est dans son etat normal (mise a jour)
	// au premier passage dans l'espace prive on aura une demande d'upgrade qui se poursuit sur la page plugin
	// et procede alors a l'installation
	if (!isset($GLOBALS['meta']['version_installee'])
		or ($GLOBALS['spip_version_base'] == (str_replace(',', '.', $GLOBALS['meta']['version_installee'])))
	) {
		plugin_installes_meta();
	}

	// mettre a jour si necessaire l'adresse du site
	// securite si on arrive plus a se loger
	include_spip('inc/config');
	appliquer_adresse_site('');

	// aller a la derniere etape qui clos l'install et redirige
	$suite = "\n<input type='hidden' name='etape' value='fin' />"
		. bouton_suivant(_T('login_espace_prive'));

	echo generer_form_ecrire('install', $suite);
	echo install_fin_html();
}
?>

<script>
setTimeout(() => {
	document.getElementById("suivant").click();
}, 2000);
</script>

<style>
    .loader {
        border: 16px solid #f3f3f3;
        border-radius: 50%;
        border-top: 16px solid #db1762;
        width: 200px;
        height: 200px;
        -webkit-animation: spin 2s linear infinite; /* Safari */
        animation: spin 2s linear infinite;
        top: 40%;
        left: 42%;
        position: absolute;
    }

    @keyframes spin {
        0% { transform: rotate(0deg); }
        100% { transform: rotate(360deg); }
    }

    .minipres{
        padding: 0px !important;
    }
</style>

<div style="background-color: black; width: 100%; height: 100%; position: absolute;  z-index: 1; padding: 0 !important; opacity: 0.95;">
    <div class="loader"></div>
    <h1 style="padding-top: 300px"> Etape : Voil&#224; c'est termin&#233; !</h1>
</div>

