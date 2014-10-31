    <div  style="width: 612px; height: 792px; margin-left: 220px; background-color: white; border: 5px solid #400000;">
        <div class="icono" style="float: left; max-width: 180px; margin-top: 20px;margin-left: 20px;"><img src="<?= base_url(); ?>uploads/logo_ceis.png"></div>
        <div class="titulo" style="float: right; margin-right: 8px; margin-top: 35px; color: #EAEBEF; background-color: #400000;border: 
    3px solid #400000; border-radius: 10px; width: 380px; font-size: 17px; text-align: center;">
        CENTRO EDUCATIVO INTEGRAL DE SEGURIDAD
        </div>
        <div class="titulo" style=" width:300px; height: 50px; font-size: 20px; margin-left: 165px; margin-top: 170px;">ACTA DE BUENA CONDUCTA</div>
        <div style="width:510px; font-size: 12px; color:#000; margin-left: 50px; margin-top: 30px; text-align:justify;">Por medio de la presente se hace constar que el(la) 
        ciudadano(a):<span style="font-size:15px; font-weight:bold;"> <?= $this->crud_model->get_hs_student_nombre_by_id($documento_nombre).' '.$this->crud_model->get_hs_student_apellido_by_id($documento_nombre); ?></span>, 
        cursó estudios en esta institucion durante el periodo , culminando con exito el curso <span style="font-size:15px; font-weight:bold;"><?= $this->crud_model->get_hs_cursos_nombre($elements[0]['curso'])?></span>, y 
        durante su permanencia se observó <span style="font-size:15px; font-weight:bold;">BUENA CONDUCTA</span>.
        </div>
        <div style=" width: 510px; color: black; margin-left: 50px; margin-top: 60px; text-align: jutify; font-size:12px;">
            Constancia que se expide a peticion de la parte interesada a los <?= date("d");?> días del mes <?= date("m");?> de <?= date("Y");?>.
        </div>
        <div style=" width: 200px; color: black; margin-left: 200px; margin-top: 150px; text-align: center; font-size:12px;">
            Director CEIS <br><br> __________________________<br><br>Firma
        </div> 
    </div>

    <div>
        <p style="text-align:center" ><button type="button" id="imprimir" class="btn btn-normal btn-gray" style="width: 59.4%;
        margin-left: 7px; margin-top: 20px;"  onclick="actualizarNotas()">Imprimir Acta de Buena Conducta</button></p></td>
    </div>