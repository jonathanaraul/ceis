<?php

/**
 * Created by PhpStorm.
 * User: jonathan.araul
 * Date: 21/10/14
 * Time: 22:32
 */
class ajax extends CI_Controller

{
    function __construct()

    {

        parent::__construct();

        $this->load->database();

    }

    function obtenDocumento()

    {
        $documento = $this->input->post('documento');

        $cadena = '<input type="text" name="nlibmilitar" value="' . $documento. '">';

        echo $cadena;

    }
    function obtenMunicipios()

    {
        $departamento = $this->input->post('departamento');

        $elements = $this->db->get_where('municipio', array('departamento' => $departamento))->result_array();

        $cadena = '<option>--</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['id'] . '">' . $element['nombre'] . '</option>';

        }
        echo $cadena;

    }

    function obtenMaterias()

    {
        $curso = $this->input->post('curso');

        $this->db->select('*');
        $this->db->where('curso' , $curso);
        $this->db->order_by('nombre', 'asc');
        $this->db->from('hs_materias');
        $query= $this->db->get();
        $elements = $query->result_array();

        $cadena = '<option value="0">Seleccionar materia</option>';

        foreach ($elements as $element) {
            if($this->session->userdata('rol') == 1){

                $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['nombre']).' --- Profesor(a): '.$this->crud_model->get_teacher_name($element['profesor']) . '</option>';
            }else{
                if($this->session->userdata('rol') == 2 && $this->session->userdata('user_id') == $element['profesor']){
                    $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['nombre']) . '</option>';
                }
            }
        }
        echo $cadena;

    }

    function obtenCursosMaterias()

    {
        $curso = $this->input->post('curso');

        $cursos= $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();

        $elements = $this->db->get_where('curso_materia', array('curso' => $cursos[0]['curso']))->result_array();

        $cadena = '<option value="0">Seleccionar materia</option>';

        foreach ($elements as $element) {
            $existe= true;
            $materias= $this->db->get_where('hs_materias', array('curso' => $curso))->result_array();
            foreach ($materias as $materia) {
                if($materia['nombre']==$element['materia']){
                    $existe= false;
                }
            }
            if($existe){
                $cadena .= '<option value="' . $element['materia'] . '">' . $this->crud_model->get_nombre_materia_by_id($element['materia']) . '</option>';
            }

        }
        echo $cadena;

    }

    function obtenCursos()

    {
        $estudiante = $this->input->post('estudiante');

        $elements = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante))->result_array();

        $cadena = '<option value="0" selected>Seleccionar Curso</option>';

        foreach ($elements as $element) {
            $curso= $this->db->get_where('hs_cursos', array('id' => $element['curso']))->result_array();
            $cadena .= '<option value="' . $element['curso'] . '">' . $this->crud_model->get_hs_cursos_nombre($curso[0]['curso']).' -- Sección: '.$this->crud_model->get_hs_cursos_seccion($element['curso']) . '</option>';

        }
        echo $cadena;

    }


    function obtenCursosFacturaEstudiantes()

    {
        $estudiante = $this->input->post('estudiante');

        $elements = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante))->result_array();

        $cadena = '<option value="0" selected>Seleccionar Curso</option>';

        foreach ($elements as $element) {
            $existe= true;
            $cursos= $this->db->get('hs_facturacion_empresas')->result_array();
            foreach ($cursos as $curso) {
                if($curso['curso']==$element['curso']){
                    $existe= false;
                }
            }
            if($existe){
                $course= $this->db->get_where('hs_cursos', array('id' => $element['curso']))->result_array();
                $cadena .= '<option value="' . $element['curso'] . '">' . $this->crud_model->get_hs_cursos_nombre($course[0]['curso']).' - Sección '.$this->crud_model->get_hs_cursos_seccion($element['curso']) . '</option>';
            }

        }
        echo $cadena;

    }


    function obtenProfesores()

    {
        $materia = $this->input->post('materia');

        $elements = $this->db->get_where('hs_materias', array('nombre' => $materia))->result_array();

        $cadena = '<option value="0">Seleccionar profesor</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['id'] . '">' . $this->crud_model->get_teacher_name($element['id']) . '</option>';

        }
        echo $cadena;

    }

    function obtenEstudiantes()

    {
        $curso = $this->input->post('curso');

        $elements = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $cadena = '<option value="0">Visualizar Todos</option>';

        foreach ($elements as $element) {
            $cadena .= '<option value="' . $element['estudiante'] . '">' . $this->crud_model->get_hs_student_nombre_by_id($element['estudiante']) .' '. $this->crud_model->get_hs_student_apellido_by_id($element['estudiante']) .'</option>';

        }
        echo $cadena;

    }

    function recuperarDocumentos()

    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiante');
        $documento= $this->input->post('documento');
        $verificar=0;
        $dato['curso']= $curso;
        $inscritos = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1 ));
        $i=$inscritos->num_rows();
        if($estudiante == 0){

            $countStudent=0;
            $list="";
            foreach($inscritos->result_array() as $inscrito):


                $dato['documento_nombre']= $inscrito['estudiante'];
                $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
                $suma= 0;
                foreach($query as $sum):
                    $suma+=$sum['def'];
                endforeach;
                $cursos = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();
                $this->db->where('curso', $cursos[0]['curso']);
                $this->db->from('curso_materia');
                $nro_materias= $this->db->count_all_results();
                $media= $suma/$nro_materias;
                $dato['elements']= $query;
                $verificar=1;
                if($documento == 1){

                    if ( $inscrito['empresa'] == 0 ){
                      $verificarFactura=$this->db->get_where('hs_facturacion', [ 'estudiante' => $inscrito['estudiante'], 'curso' => $curso ])->num_rows();
                    }else{
                      $verificarFactura=$this->db->get_where('hs_facturacion_empresas', [ 'empresa' => $inscrito['empresa'], 'curso' => $curso ])->num_rows();
                    }



                    if( $verificarFactura  == 0)
                    {
                      $countStudent++;
                      $student=$this->db->get_where('hs_estudiantes', [ 'id' => $inscrito['estudiante'] ])->result_array();
                      $list.='<tr><td>'.$countStudent.'</td><td>'.$student[0]["nombre"].'</td><td>'.$student[0]["papellido"].'</td></tr>';
                      continue;
                    }

                    $dato['media']= $media;
                    $dato['verificar'] = $verificar;
                    $this->load->view('site/visualizar_diploma',$dato);


                }


            endforeach;
            if( $countStudent > 0 )
              {
                 echo '<br><div id="borrar">

                        <table cellpadding="0" cellspacing="0" border="0" class="table table-normal box" style="width: 80%;font-size : 14px;">
                           <caption>Listado de Estudiantes por Cancelar Factura del Curso: </caption>
                           <thead>
                                   <tr>
                                       <td>#</td>
                                       <td>Nombre</td>
                                       <td>Apellido</td>
                                   </tr>
                           </thead>
                           <tbody>';
                 echo $list;
                 echo '   </tbody>
                       </table><br><br>';
                       echo '<input type="button" class="btn btn-normal btn-gray" value="Imprimir Todos Diplomas" onclick="print_all()"> <br><br></div>';
              }else{
                    if( $i > 0){
                    echo '<br><div id="borrar">';
                    echo '<input type="button" class="btn btn-normal btn-gray" value="Imprimir Todos Diplomas" onclick="print_all()"> <br><br></div>';
                  }else{
                    echo '<br><div id="borrar">';
                    echo '<h3>No Hay Estudiantes Inscriptos Actualmente</h3></div>';
                  }
              }


        }else{

          $inscritos = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1, 'estudiante' => $estudiante ));
            foreach($inscritos->result_array() as $inscrito):

                $dato['documento_nombre']= $estudiante;
                $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
                $suma= 0;
                foreach($query as $sum):
                    $suma+=$sum['def'];
                endforeach;
                $cursos = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();
                $this->db->where('curso', $cursos[0]['curso']);
                $this->db->from('curso_materia');
                $nro_materias= $this->db->count_all_results();
                $media= $suma/$nro_materias;
                $dato['elements']= $query;

                if($documento == 1){

                  if ( $inscrito['empresa'] == 0 ){
                    $verificarFactura=$this->db->get_where('hs_facturacion', [ 'estudiante' => $inscrito['estudiante'], 'curso' => $curso ])->num_rows();
                  }else{
                    $verificarFactura=$this->db->get_where('hs_facturacion_empresas', [ 'empresa' => $inscrito['empresa'], 'curso' => $curso ])->num_rows();
                  }


                    if( $verificarFactura  == 0)
                    {
                      echo "<h3> El Estudiante no Tiene Factura de este curso!. </h3>";
                      exit();
                    }

                    if($inscrito['estudiante'] == $estudiante){

                        $dato['media']= $media;
                        $this->load->view('site/visualizar_diploma', $dato);
                    }
                }

            endforeach;

        }//Fin else del if $estudiante == 0
    }

    function buscar()

    {
        $cedula = $this->input->post('cedula');


        $this->db->where('cedula',$cedula);
        $this->db->where('no_egresado', 0);
        $this->db->where('activo', 0);
        $this->db->from('hs_estudiantes');
        $egre= $this->db->count_all_results();

        $this->db->where('cedula',$cedula);
        $this->db->where('no_egresado', 1);
        $this->db->where('activo', 0);
        $this->db->from('hs_estudiantes');
        $noegre= $this->db->count_all_results();


        if($egre >= 1){
            $egresa['egresado']= $this->db->get_where('hs_estudiantes', array('cedula' => $cedula, 'activo' => 0, 'no_egresado' => 0))->result_array();

            $this->load->view('site/ver_egresados', $egresa);
        }

        if($noegre >= 1){
            $noegresa['noegresado'] = $this->db->get_where('hs_estudiantes', array('cedula' => $cedula, 'activo' => 0, 'no_egresado' => 1))->result_array();
            $this->load->view('site/ver_noegresados', $noegresa);
        }

        if($egre == 0 && $noegre == 0){
          $this->load->view('site/busqueda_vacia');
        }

    }

    function buscar_estudiante()

    {
        $cedula = $this->input->post('cedula');


        $this->db->where('cedula',$cedula);
        $this->db->where('activo', 1);
        $this->db->from('hs_estudiantes');
        $stud= $this->db->count_all_results();

        if($stud >= 1){
            $result['res_busquedas']= $this->db->get_where('hs_estudiantes', array('cedula' => $cedula, 'activo' => 1))->result_array();

            $this->load->view('site/est_res', $result);
        }

        if($stud == 0){
          $this->load->view('site/busqueda_vacia');
        }

    }

    function buscar_nro()

    {
        $nro = $this->input->post('nro');


        $this->db->where('nro',$nro);
        $this->db->from('hs_estudiantes');
        $studiante= $this->db->count_all_results();

        if($studiante >= 1){
            $resultado['res']= $this->db->get_where('hs_estudiantes', array('nro' => $nro))->result_array();

            $this->load->view('site/busqueda_nro', $resultado);
        }

        if($studiante == 0){
          $this->load->view('site/busqueda_vacia');
        }

    }

    function recuperarReporte()

    {

        $data['est_inscritos'] = $this->input->post('alum_insc');
        $data['est_insc_emp'] = $this->input->post('alum_insc_empresa');
        $data['est_insc_curso'] = $this->input->post('alum_por_curso');

        $this->load->view('site/mostrarReporte', $data);

    }

    function obtenEstudiantesE()

    {
        $curso = $this->input->post('curso');

        $elements = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $cadena = '<option value="0">Seleccione un Estudiante</option>';

        foreach ($elements as $element) {

            $cadena .= '<option value="' . $element['estudiante'] . '">' . $this->crud_model->get_hs_student_nombre_by_id($element['estudiante']) .' '. $this->crud_model->get_hs_student_apellido_by_id($element['estudiante']) .'</option>';

        }
        echo $cadena;

    }


    function egresados()

    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiante');

        $dato['curso']= $curso;
        $dato['estudiante']= $estudiante;

        $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $estudiante))->result_array();
        $suma= 0;

        foreach($query as $sum):
            $suma+=$sum['def'];
        endforeach;

        $cursos = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();

        $this->db->where('curso', $cursos[0]['curso']);
        $this->db->from('curso_materia');
        $nro_materias= $this->db->count_all_results();
        $media= $suma/$nro_materias;

        $dato['media']= $media;
        $this->load->view('site/procesar_egresado', $dato);
    }


    function listarEstudiantesNotas()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');

        $dato['curso']= $curso;
        $dato['materia']= $materia;

        $dato['elements'] = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $this->load->view('site/lista_notas', $dato);
    }

    function inscribir()

    {
        $inscripcion = $this->input->post('inscripcion');
        $curso = $this->input->post('curso');

        $dato['curso']= $curso;

        if($inscripcion == 1){

        $dato['estudiantes'] = $this->db->get_where('hs_estudiantes', array('activo'=> 1))->result_array();

        $this->load->view('site/inscribir_indiv', $dato);

        }else{

        $dato['estudiantes'] = $this->db->get_where('hs_estudiantes', array('activo'=> 1))->result_array();

        $this->load->view('site/inscribir_lotes', $dato);

        }


    }

    function guardarInscripcion()
    {
        $curso = $this->input->post('curso');
        $estudiante = $this->input->post('estudiante');
        $status = $this->input->post('status');

        $existe = $this->db->get_where('hs_inscripcion', array('curso' => $curso,'estudiante' => $estudiante))->result_array();


        if (count($existe) > 0) {
            //Actualizar inscripcion

            $data = array(
                'status' => $status,
            );
            $this->db->where('id', $existe[0]['id']);
            $this->db->update('hs_inscripcion', $data);
        } else {
            //Insertar inscripcion
            $est_empresa= $this->db->get_where('hs_estudiantes', array( 'id' => $estudiante))->result_array();
            $data = array(
                'estudiante' => $estudiante,
                'curso' => $curso,
                'status' => $status,
                'empresa' => $est_empresa[0]['empresa'],
            );

            $this->db->insert('hs_inscripcion', $data);
        }
    }

    function guardarInscripciones()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);



        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $status = intval($helper[1]);

                $existe = $this->db->get_where('hs_inscripcion', array('curso' => $curso,'estudiante' => $estudiante))->result_array();

                if (count($existe) > 0) {
                    //Actualizar status

                    $data = array(
                        'estudiante' => $estudiante,
                        'curso' => $curso,
                        'status' => $status,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_inscripcion', $data);
                } else {
                    //Insertar inscripcion
                    $data = array(
                        'estudiante' => $estudiante,
                        'curso' => $curso,
                        'status' => $status,
                    );

                    $this->db->insert('hs_inscripcion', $data);
                }
            }
        }
    }

    function guardarNotas()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);



        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $evaluacion = explode('=', $variables[$i]);
                $evaluacion = $evaluacion[1];
            } else if ($i == 1) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];

            } else if ($i == 2) {
                $materia = explode('=', $variables[$i]);
                $materia = $materia[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $puntuacion = intval($helper[1]);

                $existe = $this->db->get_where('hs_notas', array('evaluacion' => $evaluacion,'estudiante' => $estudiante, 'materia' => $materia, 'curso' => $curso))->result_array();

                if (count($existe) > 0) {
                    //Actualizar asistencia

                    $data = array(
                        'puntuacion' => $puntuacion,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_notas', $data);
                } else {
                    //Insertar asistencia
                    $data = array(
                        'curso' => $curso,
                        'materia' => $materia,
                        'estudiante' => $estudiante,
                        'puntuacion' => $puntuacion,
                        'evaluacion' => $evaluacion,
                    );

                    $this->db->insert('hs_notas', $data);
                }
            }
        }
    }

    function listarAsistencias()

    {
        $curso = $this->input->post('curso');
        $materia = $this->input->post('materia');

        $dato['curso']= $curso;
        $dato['materia']= $materia;

        $dato['elements'] = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1))->result_array();

        $this->load->view('site/lista_asistencias', $dato);
    }

    function guardarAsistencias()
    {
        $variables = $this->input->post();
        $variables = explode('&', $variables["data"]);

        for ($i = 0; $i < count($variables); $i++) {

            if ($i == 0) {
                $fecha = explode('=', $variables[$i]);
                $fecha = explode('/', $fecha[1]);
                $fecha = $fecha[2] . '-' . $fecha[0] . '-' . $fecha[1];
            } else if ($i == 1) {
                $curso = explode('=', $variables[$i]);
                $curso = $curso[1];

            } else if ($i == 2) {
                $materia = explode('=', $variables[$i]);
                $materia = $materia[1];
            } else {

                $helper = explode('_', $variables[$i]);
                $helper = $helper[1];
                $helper = explode('=', $helper);

                $estudiante = $helper[0];
                $presente = $helper[1];
                if ($presente == 'true') $presente = 1;
                else $presente = 0;

                $existe = $this->db->get_where('hs_asistencias', array('fecha' => $fecha, 'estudiante' => $estudiante, 'materia' => $materia, 'curso' => $curso))->result_array();

                if (count($existe) > 0) {
                    //Actualizar asistencia

                    $data = array(
                        'presente' => $presente,
                    );
                    $this->db->where('id', $existe[0]['id']);
                    $this->db->update('hs_asistencias', $data);
                } else {
                    //Insertar asistencia
                    $data = array(
                        'curso' => $curso,
                        'materia' => $materia,
                        'estudiante' => $estudiante,
                        'presente' => $presente,
                        'fecha' => $fecha,
                    );

                    $this->db->insert('hs_asistencias', $data);
                }
            }
        }
    }

    function get_curso()
    {
        $idCurso = $this->uri->segment(3);

        $curso = $this->db->get_where('hs_cursos', array('id' => $idCurso) )->result_object();
        if ($curso) {

            $fecha_ini= date_create($curso[0]->fecha_ini);
            $fecha_ini = date_format($fecha_ini, 'd/m/Y');
            $fecha_cul= date_create($curso[0]->fecha_cul);
            $fecha_cul = date_format($fecha_cul, 'd/m/Y');
            $data=[
                'fecha_ini' => $fecha_ini,
                'fecha_cul' => $fecha_cul
                ];
            echo  json_encode( $data );
        }

    }

    function obtenCursosFacturaEmpresas()
    {
            $id_empresa = $this->input->post('id_empresa');

            $this->db->select('cl.nombre as nombre_curso, em.id , c.id as curso, c.seccion as seccion ');
            $this->db->from('hs_empresas as em');

            $this->db->join('hs_estudiantes as es',  'em.id = es.empresa', 'INNER');

            $this->db->join('hs_inscripcion as i', 'i.estudiante = es.id', 'INNER');

            $this->db->join('hs_cursos as c', 'c.id = i.curso', 'INNER');

            $this->db->join('class_name as cl', 'cl.id = c.curso', 'INNER');

            $this->db->where('i.empresa',$id_empresa);

            $result = $this->db->get();
            $cadena = '<option value="0" selected> Seleccionar Curso</option>';
            $count=0;
            foreach ( $result->result_array() as  $value) {

                        $cadena .= '<option value="' . $value['curso'] . '">' . $value['nombre_curso'].' - Sección '.$value['seccion']. '</option>';
                        $count++;
            }

            if ( $count <= 0) {
                $cadena = '<option value="0" selected>La Empresa No Tiene Cursos Actualmente </option>';
            }

             echo $cadena;

    }

    function obtenListaEstudiantes()
    {
        $idEmpresa = $this->input->post("id_empresa");
        $idCurso = $this->input->post("id_curso");

        $this->db->select('es.nombre,es.snombre,es.papellido,es.sapellido,es.cedula');
        $this->db->from('hs_inscripcion as i');

        $this->db->join('hs_estudiantes as es',  'es.id = i.estudiante', 'INNER');

        $this->db->join('hs_empresas as em', 'i.empresa = em.id', 'INNER');

        $this->db->join('hs_cursos as c', 'c.id = i.curso', 'INNER');

        $this->db->where('i.empresa',$idEmpresa);
        $this->db->where('i.curso',$idCurso);

        $result = $this->db->get();


        $cadena="";
        $i=1;
        foreach ($result->result_array() as $value){


                $cadena.="<tr><td>".$i++."</td><td>".$value["papellido"]." ".$value["sapellido"]." ".$value["nombre"]." ".$value["snombre"]."</td><td>".$value["cedula"]."</td></tr>";
        }

        echo $cadena;
    }

    function cursos()
    {
      //$cadena='<option value="0" selected> Seleccionar Curso</option>';
      $classes = $this->db->get('hs_cursos')->result_array();
      foreach ($classes as $row) {
          $cadena .= '<option value="' . $row['id'] . '">' . $this->crud_model->get_hs_cursos_nombre($row['curso']).' - Sección: '. $row['seccion'] . '</option>';
      }
      echo $cadena;
    }


    function imprimirDiplomasAll(){

      $curso = $this->input->post('curso');
      $inscritos = $this->db->get_where('hs_inscripcion', array('curso' => $curso, 'status' => 1 ))->result_array();
      foreach($inscritos as $inscrito):


          $dato['documento_nombre']= $inscrito['estudiante'];
          $query = $this->db->get_where('hs_notas', array('curso' => $curso, 'estudiante' => $inscrito['estudiante']))->result_array();
          $suma= 0;
          foreach($query as $sum):
              $suma+=$sum['def'];
          endforeach;
          $cursos = $this->db->get_where('hs_cursos', array('id' => $curso))->result_array();
          $this->db->where('curso', $cursos[0]['curso']);
          $this->db->from('curso_materia');
          $nro_materias= $this->db->count_all_results();
          $media= $suma/$nro_materias;
          $dato['elements']= $query;

              $verificarFactura=$this->db->get_where('hs_facturacion', [ 'estudiante' => $inscrito['estudiante'], 'curso' => $curso ])->num_rows();


              if( $verificarFactura  == 0)
              {
                continue;
              }

              $dato['media']= $media;
              $dato['verificar'] = 1;
              $this->load->view('site/visualizar_diploma',$dato);




      endforeach;

    }

    function listCertificadoEstudio(){


            $cedula = $this->input->post('cedula');
            $estudiante = $this->db->get_where('hs_estudiantes', array('cedula' => $cedula) )->row();
            $documento = $this->input->post('documento');

           if( !$estudiante ) {
              echo "No Hay Resgistro Con la Cédula: ".$cedula;
              exit();
            }else{
                      $incripciones = $this->db->get_where('hs_inscripcion', array('estudiante' => $estudiante->id) );
                      if(   $incripciones->num_rows() == 0 ){

                        echo "El Estudiante No Tiene Cursos Realizados ";


                      }else{
                        $i=1;

                                      echo '<table cellpadding="0" cellspacing="0" border="0" class="table table-normal box" style="width: 80%;font-size : 14px;">
                                                <caption>Listado de Curso(s) Realizado(S) por el Estudiantes: </caption>
                                                <thead>
                                                        <tr>
                                                            <td>#</td>
                                                            <td>Curso</td>
                                                            <td>Ver</td>
                                                        </tr>
                                                </thead>
                                                <tbody>';
                                      foreach ($incripciones->result_array() as $inscripcion) {

                                        $this->db->select('*');
                                        $this->db->from('hs_cursos as c');

                                        $this->db->join('class_name as cl', 'cl.id = c.curso', 'INNER');

                                        $this->db->where('c.id',$inscripcion['curso']);

                                        $result = $this->db->get()->row();
                                        echo '<tr><td>'.$i++.'</td><td>'.$result->nombre.'</td><td>  <input type="button" id="ver_docemento" class="btn btn-normal btn-gray" value="Visualizar Documento" onclick="certificado('.$inscripcion['id'].','.$documento.')"></td></tr>';

                                      }

                          echo '</tbody></table><br><br>';

                      }//FIN del else del if(   $incripciones->num_rows() == 0 )
            }//FIN del else del   if($estudiante)

    }//FIN function listCertificadoEstudio()


    function generarCertificadoEstudio(){

      $documento = $this->input->post('documento');
      $inscripcion = $this->db->get_where('hs_inscripcion', array('id' => $this->input->post('inscripcion_id') ) )->row();

      $dato['curso']= $inscripcion->curso;
      $dato['documento_nombre']= $inscripcion->estudiante;
      $query = $this->db->get_where('hs_notas', array('curso' => $inscripcion->curso, 'estudiante' => $inscripcion->estudiante) )->result_array();
      $suma= 0;
      foreach($query as $sum):
                    $suma+=$sum['def'];
      endforeach;
      $cursos = $this->db->get_where('hs_cursos', array( 'id' => $inscripcion->curso ) )->result_array();
      $this->db->where('curso', $cursos[0]['curso']);
      $this->db->from('curso_materia');
      $nro_materias= $this->db->count_all_results();
      $media= $suma/$nro_materias;
      $dato['elements']= $query;
      $dato['media']= $media;
      if( $documento == 2 ){ 
            $this->load->view('site/visualizar_certificado', $dato);
       }

      if ( $documento == 3 ) {
          $this->load->view('site/visualizar_acta', $dato);
      }

    }//FIN function generarCertificadoEstudio()

}
