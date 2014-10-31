    <div  style="width: 1050px; height: 600px; background-color: white; border: 10px solid #400000;">
        <div class="icono" style="float: left; max-width: 180px; margin-top: 20px;margin-left: 20px;"><img src="<?= base_url(); ?>uploads/logo_ceis.png"></div>
        <div class="titulo" style="float: right; margin-right: 20px; margin-top: 20px; color: #EAEBEF; background-color: #400000;border: 
    3px solid #400000; border-radius: 20px; width: 800px; font-size: 30px; text-align: center;">
        CENTRO EDUCATIVO INTEGRAL DE SEGURIDAD
        </div>
        <div class="titulo" style=" width:300px; height: 100px; font-size: 40px; margin-left: 400px; margin-top: 100px;">CERTIFICADO</div>
        <div style="width:850px; font-size: 15px; color:#000; margin-left: 130px; margin-top: 30px;">Certificado que es otorgado al ciudadano(a):<h3 style="display: inline;"> 
        <?= $this->crud_model->get_hs_student_nombre_by_id($diploma_nombre).' '.$this->crud_model->get_hs_student_apellido_by_id($diploma_nombre); ?></h2>, 
        por haber cumplido con todos los requisitos exigidos por esta institución, culminando con exito el curso 
        <?= $this->crud_model->get_hs_cursos_nombre($elements[0]['curso']).' '.$media;?>.
        </div>
        <div style=" width: 200px; color: black; float: left; margin-left: 180px; margin-top: 60px; text-align: center; font-size:15px;">
            Instructor <br><br> __________________________<br><br>Firma
        </div>
        <div style=" width: 200px; color: black; float: right; margin-right: 180px; margin-top: 60px; text-align: center; font-size:15px;">
            Director CEIS <br><br> __________________________<br><br>Firma
        </div>
        <div style="width: 410px; height: 80px; margin-top: 210px; margin-left: 20px; font-size: 15px;">
        <span style="float: left; padding-top:30px; color: black;">Con el respaldo de:</span>
        <div style="float: right; max-height: 70px; max-width: 70px; margin-right: 10px"><img src="<?= base_url(); ?>uploads/camarabaq.png"></div>
        <div style="float: right; max-height: 70px; max-width: 70px; margin-right: 10px"><img src="<?= base_url(); ?>uploads/fedeseguridad_logo.png"></div>
        <div style="float: right; max-height: 70px; max-width: 70px; margin-right: 10px"><img src="<?= base_url(); ?>uploads/logo_asosec.png"></div>
        </div>


  
    </div>
    <div><p style="text-align:center" ><button class="btn btn-normal btn-gray" style="width: 100%;
                margin-top: 20px;"  onclick="actualizarNotas()">Imprimir Diploma</button></p></td>
    </div>