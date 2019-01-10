<div name="droite" style="float:left;width:80%;">
	<div name="bas" style="margin : 10 2 2 2;clear:left;background-color:77AADD;color:white;height:88%;">
		<?php echo header('Pharmacopee',1); //<h1> Pharmacopee </h1> ?> 
		<form name="formMEDICAMENT" method="post" action="formMEDICAMENT.php">
		<?php 
			if($medicaments != null) {
				echo var_dump($medicaments);
				$attributesDepot = array(
					'class' => 'titre'
				);
				$attributesInputDepot = array(
					'type' => 'text',
					'size' => '10',
					'name' => 'MED_DEPOTLEGAL',
					'class' => 'zone',
					'value' => $medicaments['MED_DEPOTLEGAL']
				);
				$attributesInput = array(
					'type'=>'text',
					'size'=>'25',
					'name'=>'MED_NOMCOMMERCIAL',
					'class'=>'zone'
				);
				echo form_label('DEPOT LEGAL :',$attributesDepot).form_input($attributesInputDepot).br();
				echo form_label('NOM COMMERCIAL :',$attributesDepot).form_input($attributesInput).br();
				echo form_label('FAMILLE :',$attributesDepot).form_input(array('type'=>'text','size'=>'3',
						'name'=>'FAM_CODE','class'=>'zone')).br();
				echo form_label('COMPOSITION',$attributesDepot).form_textarea(array('rows'=>'5','cols'=>'50',
						'name'=>'MED_COMPOSITION','class'=>'zone')).br();
				echo form_label('EFFETS :',$attributesDepot).form_textarea(array('rows'=>'5','cols'=>'50',
						'name'=>'MED_EFFETS','class'=>'zone')).br();
				echo form_label('CONTRE INDIC. :',$attributesDepot).form_textarea(array('rows'=>'5','cols'=>'50',
						'name'=>'MED_CONTREINDIC','class'=>'zone')).br();
				echo form_label('PRIX ECHANTILLON :',$attributesDepot).form_input(array('type'=>'text','size'=>'7',
						'name'=>'MED_PRIXECHANTILLON','class'=>'zone')).br();
				echo form_label('&nbsp;',$attributesDepot).br();
				echo form_submit('sens','&lt;',array('class'=>'zone')).form_submit('sens','&gt;',array('class'=>'zone'));
			}
		?>
	</form>
	</div>
</div>