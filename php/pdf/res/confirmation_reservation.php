<?php
$BASE = dirname(dirname(dirname(__FILE__)));
include_once($BASE.'/bdd_connexion.php');
?>
<style type="text/css">
table{  }
</style>
<page backcolor="#FFFFFF" backtop="0" backbottom="0" footer="page" style="">
    <page_footer>
		<table style="width: 100%;font-size: 9pt;">
			<tr>
				<td style="text-align: center;width: 100%;color:#c0c0c0;line-height:18px;">MyEcoCar - N° SIRET : 452 258 890 0022 - APE : 6312Z Portails internet<br>
				8, Impasse de la Chapelle, 67400 ILLKIRCH GRAFFENSTADEN<br>
				+33 3 88 12 34 56 - www.myecocar.fr - contact@myecocar.fr</td>
			</tr>
		</table>
    </page_footer>
    <table cellspacing="0" style="width: 100%; text-align: left; font-family:Helvetica,Arial,sans-serif;">
		<tr>
            <td style="height:16px;width: 100%;padding:10px 20px;background: #8BB600;text-align: left;font-size: 16px;"><img src="http://www.myecocar.fr/images/logo.png" style="height:20px;margin-right:10px;" alt="" /><span style="height:20px;font-size:18px;line-height:20px;color:#ffffff;">MyEcoCar</span></td>
        </tr>
		<tr>
            <td style="height:16px;width: 100%;padding:8px 20px;font-weight:bold;background: #eeeeee;color:#333333;text-align: left;font-size: 16px;"><?php echo $confirmation['titre']; ?></td>
        </tr>
		<tr>
			<td style="width: 100%;padding:20px 20px;color:#333333;text-align: left;font-size:13px;color:#333333;text-decoration:none;">
				<table style="width:100%;font-size:12px;">
					<tr><td colspan="2"><h3><?php echo traduction($LANG, "reservations-pdf-p1"); ?></h3></td></tr>
					<tr><td colspan="2" style="height:20px;"><?php echo traduction($LANG, "reservations-pdf-p2"); ?></td></tr>
					<tr><td colspan="2" style="height:20px;text-align:center;font-weight:bold;font-size:14px;"><?php echo $confirmation['code']; ?></td></tr>
					<tr><td colspan="2" style="height:20px;"></td></tr>
					<tr><td colspan="2"><h3><?php echo traduction($LANG, "proposition-p20"); ?></h3></td></tr>
					<tr><td style="height:20px;width:25%;"><b><?php echo traduction($LANG, "offre-p4"); ?></b> </td><td style="width:75%"><?php echo $confirmation['depart']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p6"); ?></b> </td><td><?php echo $confirmation['arrivee']; ?></td></tr>
					<tr><td colspan="2" style="height:20px;"><hr style="border:none;border-bottom:1px #ccc solid;"></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p7"); ?></b> </td><td><?php echo $confirmation['date']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p9"); ?></b> </td><td><?php echo $confirmation['duree']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p10"); ?></b> </td><td><?php echo $confirmation['distance']; ?></td></tr>
					<tr><td colspan="2" style="height:20px;"><hr style="border:none;border-bottom:1px #ccc solid;"></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p14"); ?></b> </td><td><?php echo $confirmation['bagages']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p11"); ?></b> </td><td><?php echo $confirmation['flexibilite']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "offre-p13"); ?></b> </td><td><?php echo $confirmation['detour']; ?></td></tr>
					<tr><td colspan="2" style="height:20px;"></td></tr>
					<tr><td colspan="2"><h3><?php echo traduction($LANG, "reservations-confirmation-p1"); ?></h3></td></tr>
					<tr><td colspan="2" style="height:20px;"><?php echo $confirmation['commentaire']; ?></td></tr>
					<tr><td colspan="2" style="height:20px;"></td></tr>
				</table>
				<table style="width:100%;font-size:12px;">
					<tr><td colspan="3"><h3><?php echo traduction($LANG, "reservations-pdf-p4"); ?></h3></td></tr>
					<tr>
						<td rowspan="5" style="width:25%;"><img src="http://myecocar.fr/images/profils/<?php echo $confirmation['avatar']; ?>" alt="" style="width:100%;padding:20px;" /> </td>
						<td style="height:20px;width:25%;"><b><?php echo traduction($LANG, "inscription-p2"); ?></b> </td><td style="width:50%"><?php echo $confirmation['prenom']; ?></td>
					</tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "reservations-pdf-p5"); ?></b> </td><td><?php echo $confirmation['age']; ?> <?php echo traduction($LANG, "membre-p3"); ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "reservations-pdf-p6"); ?></b> </td><td><?php echo $confirmation['fumer']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "reservations-pdf-p7"); ?></b> </td><td><?php echo $confirmation['musique']; ?></td></tr>
					<tr><td style="height:20px;"><b><?php echo traduction($LANG, "reservations-pdf-p8"); ?></b> </td><td><?php echo $confirmation['parler']; ?></td></tr>
					<tr><td></td><td style="height:20px;"><b><?php echo traduction($LANG, "compte-infos-p8"); ?></b> </td><td><?php echo $confirmation['telephone']; ?></td></tr>
					<tr><td></td><td style="height:20px;"><b><?php echo traduction($LANG, "compte-infos-p4"); ?></b> </td><td><?php echo $confirmation['email']; ?></td></tr>
				</table>
			</td>
        </tr>
    </table>
</page>