
<!----CREATION FORM STARTS---->

<div class="tab-pane box" id="add" style="padding: 5px">

    <div class="box-content">

        <?php echo form_open('site/gestion_egresados/create', array('class' => 'form-horizontal validatable', 'target' => '_top')); ?>

        <div class="padded">
            <div class="control-group">
                <label class="control-label"><?= 'Primer Nombre' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="pnombre" value="<?= $this->crud_model->get_hs_student_pnombre_by_id($estudiante); ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Segundo Nombre' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="snombre" value="<?= $this->crud_model->get_hs_student_snombre_by_id($estudiante); ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Primer Apellido' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="papellido" value="<?= $this->crud_model->get_hs_student_papellido_by_id($estudiante); ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Segundo Apellido' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="sapellido" value="<?= $this->crud_model->get_hs_student_sapellido_by_id($estudiante); ?>"/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Cedula' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="cedula" value="<?= $this->crud_model->get_hs_student_cedula_by_id($estudiante); ?>" disabled/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Curso' ?></label>
                <div class="controls">
                    <?php $course = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array(); ?>
                    <input type="text" class="egre" name="curso" value="<?= $this->crud_model->get_hs_cursos_nombre($course[0]['curso']); ?>" disabled/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Seccion' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="seccion" value="<?= $course[0]['seccion']; ?>" disabled/>
                </div>
            </div>
            <div class="control-group">
                <label class="control-label"><?= 'Seccion' ?></label>
                <div class="controls">
                    <input type="text" class="uniform" name="empresa" />
                </div>
            </div>
            <div class="control-group">
            <label class="control-label"><?= 'Fecha de Egreso' ?></label>
                <div class="controls">
                <input type="date" required name="fecha_egreso" placeholder="Fecha en formato: dd/mm/aaaa"/>
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
            <!--aqui no ha guardado nada -->
        </div>
        <div class="form-actions">
            <button type="submit" class="btn btn-gray"><?php echo get_phrase('procesar_estudiante'); ?></button>
        </div>
        </form>
    </div>
</div>
<!----CREATION FORM ENDS--->