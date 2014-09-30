						<div class="col-md-6">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Jurnal
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php foreach ($data as $model): 
								 if($model['ID_PERMINTAAN_JURNAL'] == $id_permintaan_jurnal){?>
                                 <table class="table">
                                 <tr>
                                 	<th>ID Anggota</th>
                                    <td><?php echo $model['ID_ANGGOTA']; ?></td>
                                 </tr>
                                 <tr>
                                 	<th>Tgl.Permintaan</th>
                                    <td><?php echo $model['TGL_PERMINTAAN']; ?></td>
								</tr>
                                <tr>
                                	<th>Nama Peminta</th>
                                	<td><?php echo $model['NAMA_PEMINTA']; ?></td>
                                </tr>
                                <tr>
                                    <th>Judul</th>
                                    <td><?php echo $model['JUDUL']; ?></td>
								</tr>
                                <tr>
                                	<th>Pengarang</th>
                                    <td><?php echo $model['PENGARANG']; ?></td>
                                </tr>
                                <tr>
                                	<th>Jenis</th>
                                    <td><?php echo $model['JENIS']; ?></td>
                                </tr>
                                <tr>
                                	<th>Bahasa</th>
                                    <td><?php echo $model['BAHASA']; ?></td>
                                </tr>
                                <tr>
                                	<th>Harga</th>
                                    <td><?php echo $model['HARGA']; ?></td>
                                </tr>
                                <tr>
                                	<th>Status</th>
                                    <td><?php echo $model['STATUS']; ?></td>
                                </tr>
                                <tr>
                                	<th>Link Website</th>
                                    <td><?php echo $model['LINK_WEBSITE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Prioritas</th>
                                    <td><?php echo $model['PRIORITAS']; ?></td>
                                </tr>
                                        <?php } ?>
										
								</table>
                                <?php endforeach; ?>
                           
                        </div>
                        <?php echo CHtml::link('Kembali', $this->createUrl('permintaan/f_laporan_p'), array('class'=>"btn btn-primary"));?>
                        </div>
                        
                        </div>
                        
                        </div>

