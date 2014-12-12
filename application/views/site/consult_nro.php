<div style="margin-left:auto; margin-right:auto; width:600px; height:250px;">
        <div style="margin-left:130px; margin-right:auto; padding-top:200px; width:214px; height:30px;float:left;">
            <input type="text" class="uniform" name="nro" id="nro" placeholder="Ingrese NRO a consultar"/>
        </div>
        <div style="margin-right:100px;margin-top:-31px; margin-left:50px; width:150px; height:30px; float:right;">    
            <input type="button" class="btn btn-gray" value="Consultar cedula" onclick="consultar_nro(this.value)"/>
        </div>
</div>
<div style="margin-left:auto; margin-right:auto; margin-top:10px; padding-top:80px; width:900px; height:200px; background-color:#ffffff;">
    <div id="resultado" style="background-color:  #eaebef; display:none; margin: auto; width: 900px;"></div>
</div>

<script>

    function consultar_nro(valor) {

        var nro = $('#nro').val();


        if (nro <= "") {
            alert('Debe llenar el campo');
            return false;
        }

        $('#resultado').empty();

        var data = 'nro=' + nro;


        $.post('<?php echo site_url()?>ajax/buscar_nro',
            data,
            function (data) {

                $('#resultado').html(data);
                $('#resultado').css('display','block');
            });
    }
</script>