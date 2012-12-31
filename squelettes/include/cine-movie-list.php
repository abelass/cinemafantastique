<dl>		
<?php 
	
	if(!empty($row->logo)){
	echo '<dt><a href="spip.php?page=critiques&amp;id_film='.$row->id_film.'"><img src="plugins/cinetic/upload_film/'.$row->logo.'" class="onglet2"  alt="Affiche du film '.utf8_encode ( $row->title).'" /></a></dt>';
	}
	echo '<dd><strong>'.$row->title.'</strong><br /><em>'.$row->title_VO.'</em><br />';
	$query="select count(*) from lien_film_article l,spip_articles a where l.id_film = ".$row->id_film." and l.id_article = a.id_article and a.statut like 'publie'";
	$resq=mysql_query($query);
	$result=mysql_fetch_row($resq);
	if($result[0]!=1){
		echo '<span class="critique"><a href="spip.php?page=critiques&amp;id_film='.$row->id_film.'">'.$result[0].' critiques</a></span>';
	}else{
		echo '<span class="critique"><a href="spip.php?page=critiques&amp;id_film='.$row->id_film.'">1 critique</a></span>';
	}
	echo '</dd>';
	?>
</dl>
 
		
