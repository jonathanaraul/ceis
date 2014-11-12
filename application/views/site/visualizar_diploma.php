    <div  style="width: 1050px; height: 600px; background-color: white;">
    
    <div  style="width: 1050px; border: 20px solid #400000;">
      </div>  
         
        
			<br>
			<br>
			<br>
			<center>
				<img src="uploads/logo_ceis.png">
			</center>
		
		<div style="float:left;margin-left:5%;width: 90px; height: 120px;border: 1px solid #000000; margin-top:-7%"></div>
		
		<div style="float:right; color:#400000;margin-top:-7%">
		
			<center>NUMERO DE ORDEN
			
			<div style="width: 130px; height: 30px;background-color: white; border: 2px solid #000000;border-radius:5px"></div>
		
		<br>
			<center>NUMERO DE REGISTRO OFICIAL
			
		
			<div style="width: 190px; height: 30px;background-color: white; border: 2px solid #000000;border-radius:5px"></div>
		</center>
		</div>
		
        
    
    <div style="color:#6A1010;">
       <div class="titulo" style="width:300px; height: 100px; font-size: 40px; margin-left: 400px; margin-top: 100px;">CERTIFICA QUE</div>
			<center>
				<h3 style="display: inline;"> 
					<?= $this->crud_model->get_hs_student_nombre_by_id($documento_nombre).' '.$this->crud_model->get_hs_student_apellido_by_id($documento_nombre); ?>
				</h3>
			</center>
			<br> 
			<h3 style="margin-left:5%">Con C.C. No._ _ _ _ _ _ _ _  _ _ _ _ _ _  _ _ _ _  _ _ _ _ _ _ _ _ _ _
												de_ _ _ _ _  _ _ _ _  _ _ _ _  _ _ _ _ _ _ _ _ _ _  _ _ _ _ _ </h3>
			<span style="font-size:15px; font-weight:bold;"><?= $this->crud_model->get_hs_cursos_nombre($elements[0]['curso'])?></span>.



  </div>
    </div>

    <div><p style="text-align:center" ><button type="button" id="imprimir" <?php if($media < 7){echo "disabled";}?> class="btn btn-normal btn-gray" style="width: 100%;
                margin-top: 20px;"  onclick="imprimirDiploma()"><?php if($media < 7){echo "Estudiante Reprobado";}else{echo "Imprimir Diploma";}?></button></p></td>
    </div>
