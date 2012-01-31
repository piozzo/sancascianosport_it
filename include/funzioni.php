<?php

function carica_home_page($baseurl, $template) {
	?>
    <div id="fotoEnews">
            <div id="foto">
                <jdoc:include type="modules" name="home_page_images" />
            </div>
            <div id="newsHomePageFather">
                <div class="titoloRiquadro">News</div>
                <div>
                	<jdoc:include type="modules" name="home_page_news" />
                </div>
            </div>
        </div>
        <div id="colonnaInfo">
            <div id="sarannoFamosi">
                <div class="titoloRiquadro">Saranno Famosi!</div>
                <div id="giocatoreSarannoFamosiHP">
                	
                     <?php
                        inserisciSarannoFamosi($baseurl, $template);
                    ?>
                    <div class="linkPiccoloHP">
                        <a href="index.php?target=squadre">Vai a "Le Squadre" &raquo;</a>
                    </div>
                </div>
            </div>
            <div id="loginHomePage">
                <div class="titoloRiquadro">Login</div>
                <jdoc:include type="modules" name="home_page_login" />
            </div>
            <div id="classificheHomePage">
                <div class="titoloRiquadro">Classifica</div>
                <div id="classificaHP">
                <!--<jdoc:include type="modules" name="home_page_classifica" />
                    <div class="linkPiccoloHP">
                        <a href="index.php?target=campionati">Vai a "Campionati" &raquo;</a>
                    </div> -->
                <div>&rightarrow;In allestimento&leftarrow;</div>
                </div>
            </div>
            <!-- <div id="ultimiCommenti">
                <div class="titoloRiquadro">Ultimi Commenti</div>
                <div id="ultimiCommentiHP">
                    <?php
                        //inserisciUltimiCommentiHP();
                    ?>
                    <!--<div class="linkPiccoloHP">
                        <a href="index.php?target=commentiGare">Vai a "Commenti gare" &raquo;</a>
                    </div>
                    <div>&rightarrow;In allestimento&leftarrow;</div>
                </div> 
            </div>-->
            <div id="ottimizzazione_firefox" align="center">
                <font size="1" face="Verdana">
                    Sito ottimizzato per la navigazione con Mozilla Firefox.
                </font>
                <div>
                    <a href='http://www.mozilla.org/firefox?WT.mc_id=aff_en05&WT.mc_ev=click'><img src='http://www.mozilla.org/contribute/buttons/110x32bubble_g.png' alt='Firefox Download Button' border='0' /></a>
                </div>
            </div>
            <div id="statistiche_sito" align="center">
                <jdoc:include type="modules" name="statistiche_sito" />
            </div>
        </div>
        <div style="clear:both">&nbsp;</div>
    </div>
    <?php
}

function inserisciSarannoFamosi($baseurl, $template) {
	$db = JFactory::getDBO();
        
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__sm_persone');
            
        $db->setQuery((string)$query);
        $result = $db->loadObjectList();
        
//	$query = "SELECT a.id, a.nome AS nome, a.cognome AS cognome, a.data_di_nascita AS data_di_nascita, b.descrizione AS ruolo, a.def_img AS id_foto FROM jos_sm_persone AS a JOIN jos_sm_ruoli AS b ON a.id_ruolo = b.id";
//	$db->setQuery($query);
//	$result = $db->query();
	
	$numPersone = count($result);
        
        //echo('le persone selezionate sono '.$numPersone.' e l array vale '.print_r($result, true));
	
	$numPersonaScelta = rand(0,$numPersone-1);
	
//	while ($numPersonaScelta > 0) {
//		$array_result = mysqli_fetch_assoc($result);
//		$numPersonaScelta--;
//	}
	?>
    <div class="divSarannoFamosi">
    	<div class="immagineSF">
        <?php 
        if (trim($result[$numPersonaScelta]->def_img) == '') 
                echo('<img src="'.$baseurl.'/templates/'.$template.'/images/sagomaUnknown.jpg" width="100" />');
        else 
    	{
    		echo('<img src="'.$baseurl.'/components/com_sancamanager/images/persone/def_imgs/'.$result[$numPersonaScelta]->id.'.jpg" width="100"  />');
    	} 
        ?>
        </div>
        <div class="infoSF">
        	<div class="elementoSF"><strong>Nome</strong></div>
        <?php
			echo('<div>'.htmlentities(ucfirst(strtolower($result[$numPersonaScelta]->nome)),ENT_COMPAT).' '.htmlentities(ucfirst(strtolower($result[$numPersonaScelta]->cognome)),ENT_COMPAT).'</div>');
		?>
        <div class="elementoSF"><strong>Data di Nascita</strong></div>
        <?php
        if ($result[$numPersonaScelta]->data_di_nascita == '' || $result[$numPersonaScelta]->data_di_nascita == null)
                echo('<div>n.d.</div>');
        else
		echo('<div>'.htmlentities($result[$numPersonaScelta]->data_di_nascita,ENT_COMPAT).'</div>');
		?>
        <div class="elementoSF"><strong>Ruolo</strong></div>
        <?php
        $ruolo_sf = $result[$numPersonaScelta]->id_ruolo;
        $query = $db->getQuery(true);
        $query->select('*');
        $query->from('#__sm_ruoli');
        $query->where('id = '.$ruolo_sf);
        
        $db->setQuery((string)$query);
        $result_ruolo = $db->loadObjectList();
        
        if ($result_ruolo[0]->descrizione == '')
            echo('<div>n.d.</div>');
        else
            echo('<div>'.htmlentities($result_ruolo[0]->descrizione,ENT_COMPAT).'</div>');
		?>
        </div>
        <div style="clear:both;"></div>
    </div>
<?php
}

?>