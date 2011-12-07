<?php
/**
* @copyright Copyright (C) 2005 - 2010 Barrie North.
* @license GPL
*/
defined('_JEXEC') or die;
JHTML::_('behavior.mootools');
$app = JFactory::getApplication();
if (strcmp(PHP_OS,'Linux') == 0) {
    setlocale(LC_ALL, 'it_IT.ISO8859-1');
}
else {
    setlocale(LC_ALL, 'ita');
}
date_default_timezone_set('Europe/Rome');

$is_home_page =  (JRequest::getVar('option')=='com_content' && (JRequest::getVar('view')=='featured'));

include('include/funzioni.php');
//include($this->baseurl.'/templates/sancascianosport_it/include/funzioni.php');
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $this->language; ?>" lang="<?php echo $this->language; ?>" >
<head>
	<jdoc:include type="head" />
        <link rel="icon" href="<?php echo $this->baseurl ?>/images/favicon.ico" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/system.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/system/css/general.css" type="text/css" />
	<link rel="stylesheet" href="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/css/template.css" type="text/css" />
        <script type="text/javascript">

  var _gaq = _gaq || [];
  _gaq.push(['_setAccount', 'UA-26210413-1']);
  _gaq.push(['_trackPageview']);

  (function() {
    var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
    ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
    var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
  })();

</script>
</head>
<body>
	<div id="header_menu">
		<div class="container_12">
			<div id="header_menu_data">
				<?php echo htmlentities(ucfirst(strftime("%A %d %B %Y"))); ?>
			</div>
			<div id="header_menu_menu">
            	<jdoc:include type="modules" name="header_menu" />
                
			</div>
		</div>
	</div>
    <?php
    if (JFactory::getUser()->id > 0) {
        ?>
        <div align="center">
            <div id="administrative_menu">
                <div class="titolo_sezione""><div align="center">MENU AMMINISTRATIVO</div></div>
                <jdoc:include type="modules" name="menu_amministrativo" />
            </div>
        </div>
    <?php
    }
    ?>
    
    <div style="clear: both"></div>
        
	<div id="page_container" align="center">
		<div id="logo_div">
	        <img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/logo.png" align="center" />
	    </div>
            <div align="right" style="width: 800px;">
                <a href="http://www.facebook.com/profile.php?id=100002272642783&sk=wall" target="_blank"><img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/facebook_icon.png" width="40" /></a>
            </div>
	    <div id="container">
	    	<div style="clear: both"></div>
	    	<div id="menu_container">
	    		<div id="main_menu" align="left">
					<jdoc:include type="modules" name="menu_principale" />
				</div>
	    	</div>
			<div style="clear: both"></div>
			<?php 
			if ($is_home_page) {
			?>
				
				<div id="content">
				<?php
				carica_home_page($this->baseurl, $this->template);	
				?>
				</div>
			<?php 
			}
			else {?>
            <div id="general_content">
            	<jdoc:include type="component" />
            </div>
			<?php 
			}
			?>
		</div>
		<div style="clear: both"></div>
<div id="divFooter">
	<div align="center">
        <div style="width: 800px;">
            <div id="footer_logo">
            	<img src="<?php echo $this->baseurl ?>/templates/<?php echo $this->template ?>/images/little_logo.png" width="100" style="margin-top: -40px; margin-left: 30px" />
            </div>
            <div id="footer_info">
                U.S. SANCASCIANESE A.S.D.<br />
                Viale Garibaldi, 30 - 50026 - San Casciano Val di Pesa (Firenze)<br />
                Telefono 055.820509 - Fax 055.8294184<br />
                <a href="mailto:info@sancascianese.it">info@sancascianese.it</a>
            </div>
            <div style="clear:both"></div>
         </div>
     </div>
</div>
</body>
</html>