

    <section class="content">
      <div class="col-md-12">
       <?php
       $filename = "a.xls";
header('Content-type: application/ms-excel');
header('Content-Disposition: attachment; filename='.$filename); 
?>
<div class="row">
            <div class="box box-success">
                    <div class="box-header">

                    <h3 class="text-center"> Laporan Volume TPS Per Kecamatan </h3>
                       <a class="btn btn-primary"> Export Excel </a>


                    </div>
                    <div class="box-body">
                      <br />
                
                            <table class="table table-striped table-bordered display responsive nowrap" id="tabel-data">
                                    <thead>
                                            <tr class="text-center">
                                                <th> No </th>
                                                <th> Kecamatan </th>
                                                <th> Volume </th>
                                                <th> Tanggal Input </th>

                                            </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach($tps as $k => $val){ ?>
                                            <tr>
                                                <td> <?php echo $k + 1 ?> </td>
                                                <td> <?php echo $val['Kecamatan'] ?></td>
                                                <td> <?php echo $val['total_volume'] ?></td>
                                                <td> <?php echo tgl_indo($val['tanggal']) ?> </td>
                                        </tr>
                                        <?php } ?>
                                    </tbody>
                            </table>

                    </div>

            </div>
        </div>
      </div>
    </section>  
