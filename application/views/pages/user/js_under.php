<script>
$("#kota").on("change",function(){
	var nilai = $("#kota").val();

		$.ajax({
			type:"POST",
			url:"<?php echo base_url() ?>user/getkecamatan",
			data:"kota="+nilai,
			success:function(dt){
				$("#kecamatan").html(dt);
			}
		})

})

</script> 