<script type="text/javascript">
	$(document).ready(function(){


		$(".tanggal").datepicker().on('changeDate', function(ev){                 
             $('.tanggal').datepicker('hide');
        });


			$("#btn_submit1").click(function(){
 			$.ajax({

            url : '<?php echo site_url("regis_kec/update") ?>',
            data : $('#regis_kec').serialize(),
            type : 'post', 
            dataType : 'json',
            success : function(obj){

            console.log(obj.error);

            if(obj.error == false) { // berhasil 

                // alert('hooooo.. error false');
                     BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_PRIMARY,
                            title: 'Informasi',
                            message: obj.message
                             
                        });   

                    
                    // $('#form_update').data('bootstrapValidator').resetForm(true);
                    $("#proses").html(obj.nama_status);
                    $("#proses").attr('data-target',obj.status);

            }
            else {
                 BootstrapDialog.alert({
                            type: BootstrapDialog.TYPE_DANGER,
                            title: 'Error',
                            message: obj.message 
                             
                        }); 
            }
        }


      });
 			$('.modal').modal('hide');
	});
	});
</script>