<?php
// version information
define('RAIDER_BASE_PATH', dirname(__FILE__).DIRECTORY_SEPARATOR);
include_once(RAIDER_BASE_PATH.'version.php');

// get sql count
$count = $db_raid->num_queries;

// get page generation time (Mordon)
$endtime = explode(' ', microtime() );
$endtime = $endtime[1] + $endtime[0];
$totaltime = round($endtime - $pStart_time, 2);

// for Custom - javascript Bootstrap
$scripts = '';
//$scripts .= '<script type="text/javascript" src="//code.jquery.com/jquery-2.1.3.js"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.14.0/jquery.validate.js"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/boostrap/js/jquery.min.js" language="javascript"></script>'."\n";
$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/jquery/jquery-3.2.1.min.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/boostrap/js/tether.min.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/boostrap/js/bootstrap.min.js" language="javascript"></script>'."\n";
$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/materialize/js/materialize.min.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/jquery-ui/jquery-ui.min.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/pickadate/lib/compressed/picker.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/framework/pickadate/lib/compressed/picker.date.js" language="javascript"></script>'."\n";
//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/js/custom-boostrapFunction.min.js" language="javascript"></script>'."\n";
$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/templates/'.$pConfig['template'].'/js/custom-materialize.js" language="javascript"></script>'."\n";

//$scripts .= '<script type="text/javascript" src="'.$pConfig['site_url'].'/includes/scripts/phpraider/phpraider.js" language="javascript"></script>'."\n";

$p->assign(
	array(
		// for custom
		'javascript'=>$scripts,
		// 
		'sql_count'=>$count,
		'version'=>$version,
		'totaltime'=>$totaltime
	)
);

$p->display(RAIDER_TEMPLATE_PATH.'footer.tpl');

if($pConfig['debug_mode']) {
	echo '<div class="container" id="containerDebugMode">';
		echo '<div class="row">';
			echo '<div class="panel">';
				echo '<div class="panel-header center-align color-bg-header color-theme">Debug mode enabled</div>';
				echo '<div class="panel-content color-bg-warning color-br-panel color-warning">';

					// session information
					echo '<div class="content-header">Dumping $_SESSION ...</div>';
					echo '<div class="content-text">';
						echo dump_array($_SESSION);
					echo '</div>';

					// permission information
					echo '<div class="content-header">Dumping user permissions ...</div>';
					echo '<div class="content-description">';
						echo dump_array($pMain->getPerm());
					echo '</div>';

					// post information
					echo '<div class="content-header">Dumping $_POST ...</div>';
					echo '<div class="content-description">';
						echo dump_array($_POST);
					echo '</div>';

					// Dumping SQL queries
					echo '<div class="content-header">Dumping generated queries ... </div>';
					echo '<div class="content-description">';
						echo dump_query_history();
					echo '</div>';
				
				echo '</div>';
			echo '</div>';
		echo '</div>';
	echo '</div>';
}
?>