<script>
$("#kecamatan").change(function(){
	var nilai = $("#kecamatan").val();
alert(nilai);
	$.ajax({
		type:"POST",
		data:"kecamatan="+nilai,
		url:"<?php echo base_url() ?>index.php/ajax/getkabupaten",
		success:function(dt){
			console.log(dt);
		}
	})

})
</script>