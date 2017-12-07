 <section class="content">
      <div class="col-md-12">
        <div class="row">
        <div class="box box-success">
          <div class="box-header">
            <h3> Data Seluruh Mahasiswa Reguler dan Lulusanya</h3>
          </div>
          <div class="box-body">

            <table class="table table-striped table-bordered tabel-data">
            <thead>
              <tr>
                <th rowspan="2"> Tahun Akademik </th>
                <th rowspan="2"> Daya Tampung </th>
                <th colspan="2"> Jumlah Calon Mahasiswa Reguler </th>
                <th colspan="2"> Jumlah Mahasiswa Baru </th>
                <th colspan="2"> Jumlah Total Mahasiswa </th>
                <th colspan="2"> Jumlah Lulusan </th>
                <th colspan="3"> IPK Lulusan Reguler </th>
                <th colspan="3"> Persentase Lulusan Reguler dengan IPK </th>
              </tr>
              <tr>
                <th> Ikut Seleksi </th>
                <th> Lulus Seleksi </th>
                <th> Reguler Bukan Transfer </th>
                <th> Transfer </th>
                <th> Reguler Bukan Transfer </th>
                <th> Transfer </th>
                <th> Reguler Bukan Transfer </th>
                <th> Transfer </th>
                <th> Min </th>
                <th> Rat </th>
                <th> Mak </th>
                <th> < 2.75 </th>
                <th> 2.75 - 3.50 </th>
                <th> > 3.50 </th>
              </tr>
            </thead>
            <tbody>
              <tr>
                <?php for($x=1;$x<=16;$x++){ ?>
                <td> (<?php echo $x ?>) </td>
                <?php } ?>
              </tr>
              <?php for($x=4;$x>=1;$x--){ ?>
              <tr> 
              <td> TS-<?php echo $x ?> </td>
              <td> 90 </td>
              <td> 863 </td>
              <td> 90 </td>
              <td> 87 </td>
              <td> 0 </td>
              <td> 819 </td>
              <td> 0 </td>
              <td> 140 </td>
              <td> 0 </td>
              <td> 2.71 </td>
              <td> 3.21 </td>
              <td> 3.70 </td>
              <td> 0% </td>
              <td> 89 % </td>
              <td> 11 % </td>
            </tr>
            <?php } ?>
                  <tr> 
              <td> TS </td>
              <td> 90 </td>
              <td> 863 </td>
              <td> 90 </td>
              <td> 87 </td>
              <td> 0 </td>
              <td> 819 </td>
              <td> 0 </td>
              <td> 140 </td>
              <td> 0 </td>
              <td> 2.71 </td>
              <td> 3.21 </td>
              <td> 3.70 </td>
              <td> 0% </td>
              <td> 89 % </td>
              <td> 11 % </td>
            </tr>
              <tr>
                <td> Jumlah </td>
                <td> 480 </td>
                <td> 4435 </td>
                <td> 465 </td>
                <td> 445 </td>
                <td> 0 </td>
                <td> 3827 </td>
                <td> 0 </td>
                <td> 627 </td>
                <td> 0 </td>
                <td colspan="6" style="background: gray"> </td>
            </tr>

            </tbody>
            </table>

              TS = 2015-2016

          </div>
        </div>
        </div>
      </div>
    </section>  
