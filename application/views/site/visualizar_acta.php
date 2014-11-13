    <div  id="print_area_<?= $documento_nombre; ?>" style="width: 816px; height: 1056px; margin-left: 120px; background-color: white;">
        <div style="height:80px; width:816px; padding-top: 60px; font-size: 70px; font-weight:bold; text-align: center; color:#400000;">
            <img style="width:240px; height:100px;" src="<?= base_url(); ?>uploads/logo.png">
        </div>
        <div style=" width:816px; color: #CFD1DA; height: 50px; text-align:center; font-size: 30px; margin-top: 250px;">ACTA DE BUENA CONDUCTA</div>
            <?php $cursos= $this->db->get_where('hs_cursos', array('id' => $elements[0]['curso']))->result_array(); ?>
        <div style="width:730px; font-size: 13px; color:#000; margin-left: 50px; margin-top: 30px; text-align:justify;">
            Por medio de la presente se hace constar que el(la) 
            ciudadano(a):<span style="font-size:20px; font-weight:bold;"> <?= $this->crud_model->get_hs_student_nombre_by_id($documento_nombre).' '.$this->crud_model->get_hs_student_apellido_by_id($documento_nombre); ?></span>, 
            cursó estudios en esta institucion, culminando con exito el curso: <span style="font-size:15px; font-weight:bold;"><?= $this->crud_model->get_hs_cursos_nombre($cursos[0]['curso'])?></span>, y 
            durante su permanencia se observó <span style="font-size:15px; font-weight:bold;">BUENA CONDUCTA</span>.
        </div>
        <div style=" width: 730px; color: black; margin-left: 50px; margin-top: 50px; text-align: jutify; font-size:13px;">
            <?php $mes=date("n");
                            if ($mes=="1") $mes="Enero";
                            if ($mes=="2") $mes="Febrero";
                            if ($mes=="3") $mes="Marzo";
                            if ($mes=="4") $mes="Abril";
                            if ($mes=="5") $mes="Mayo";
                            if ($mes=="6") $mes="Junio";
                            if ($mes=="7") $mes="Julio";
                            if ($mes=="8") $mes="Agosto";
                            if ($mes=="9") $mes="Setiembre";
                            if ($mes=="10") $mes="Octubre";
                            if ($mes=="11") $mes="Noviembre";
                            if ($mes=="12") $mes="Diciembre";
            ?>
            Constancia que se expide a peticion de la parte interesada a los <span style="font-size:15px; font-weight:bold;"><?= date("d");?></span> 
            días del mes de <span style="font-size:15px; font-weight:bold;"><?= $mes;?></span> de <span style="font-size:15px; font-weight:bold;"><?= date("Y");?></span>.
        </div>
        <div style=" width: 200px; color: black; margin-left: 310px; margin-top: 200px; text-align: center; font-size:13px;">
            Director <br><br> __________________________<br><br>Firma
        </div> 
    </div>

    <div>
        <p style="text-align:center" ><button type="button" id="imprimir" class="btn btn-normal btn-gray" style="width: 816px;
        "  onclick="imprimirDocumento('print_area_<?= $documento_nombre;?>')">Imprimir Certificación de Estudios</button></p></td>
    </div>