
<!----CREATION FORM STARTS---->

<div class="tab-pane box" id="add" style="padding: 5px">

    <div class="box-content">

        <?php echo form_open('site/gestion_egresados/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">
            <div class="control-group">
                <label class="control-label"><?= 'Curso' ?></label>
                <div class="controls">
                    <?php $course = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array(); ?>
                    <input type="hidden" name="id_curso" value="<?php echo $curso; ?>"> 
                    <input type="text" class="egre" name="curso" value="<?= $this->crud_model->get_hs_cursos_nombre($course[0]['curso']); ?>" readonly/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Seccion' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="seccion" value="<?= $course[0]['seccion']; ?>" readonly/>
                </div>
            </div>       
            <div class="control-group">
            <label class="control-label">Fecha de Egreso</label>
                <div class="controls">
                <input type="date" required name="fecha_egreso" placeholder="dd/mm/aaaa"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Estado' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="estado" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Observación' ?></label>
                <div class="controls">
                    <input type="text" class="egre" name="observacion" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Número de Factura' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="nro_factura" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Recibo de Caja' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="nro_recibo" />
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?php if($media < 7){ echo 'NOTA: El estudiante ha sido reprobado, por lo tanto será registrado en el sistema como no-egresado.'; }else{ echo 'Estudiante Aprobado con promedio de '.$media.' puntos.'; } ?></label>
            </div>
             <input type="hidden" name="tipo" value="<?php if($media < 7){echo "noegresa";}else{echo "egresa";}?>">
             <input type="hidden" name="id_estudiante" value="<?php echo $estudiante; ?>"> 
            <!--aqui no ha guardado nada -->
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-gray"><?php echo get_phrase('procesar_estudiante'); ?></button>
        </div>
        </form>
    </div>
</div>
<!----CREATION FORM ENDS--->