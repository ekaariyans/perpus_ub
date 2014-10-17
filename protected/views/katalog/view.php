					<?php 	foreach(Yii::app()->user->getFlashes() as $key => $message) {
								if($key == 'success'){
								echo '<div class="alert alert-success" role="alert' . $key . '"> 
									<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message ."</div>\n";
								}
								elseif($key == 'error'){
								echo '<div class="alert alert-danger" role="alert' . $key . '"> 
									<button type="button" class="close" data-dismiss="alert">
									<span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>' . $message . "\n".
									$form->errorSummary($model)."</div>\n";
								}
							}
					?>

                        
                        <div class="col-md-10">
                        <div class="panel panel-default">
                        <div class="panel-heading">
                            Detail Buku
                        </div>
                        <div class="panel-body">
                            <div class="table-responsive">
                                <?php foreach ($data as $model): 
								 if($model['REGISTER'] == $register){?>
                                 <table class="table">
                                 <tr>
                                 	<th width="25%">REGISTER</th>
                                    <td width="75%"><?php echo $model['REGISTER']; ?></td>
                                 </tr>
                                 <tr>
                                 	<th>ISBN</th>
                                    <td><?php echo $model['ISBN']; ?></td>
								</tr>
                                <tr>
                                	<th>Judul</th>
                                	<td><?php echo $model['TITLE']; ?></td>
                                </tr>
                                <tr>
                                    <th>Volume</th>
                                    <td><?php echo $model['VOLUME']; ?></td>
								</tr>
                                <tr>
                                	<th>Printing</th>
                                    <td><?php echo $model['PRINTING']; ?></td>
                                </tr>
                                <tr>
                                	<th>Edisi</th>
                                    <td><?php echo $model['EDITION']; ?></td>
                                </tr>
                                <tr>
                                	<th>Bahasa</th>
                                    <td><?php echo $model['LANGUAGE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Copy</th>
                                    <td><?php echo $model['COPIES']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Media</th> 
                                    <td><?php echo $model['MEDIA_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Tipe</th>
                                    <td><?php echo $model['TYPE_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>DEWEY NO </th>
                                    <td><?php echo $model['DEWEY_NO']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Pengarang</th>
                                    <td><?php echo $model['AUTHOR_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Judul</th>
                                    <td><?php echo $model['TITLE_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Tahun Terbit</th>
                                    <td><?php echo $model['YEAR_PUB']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kota Terbit</th>
                                    <td><?php echo $model['CITY_PUB']; ?></td>
                                </tr>
                                <tr>
                                	<th>Penerbit</th> 
                                    <td><?php echo $model['PUB_NAME']; ?></td>
                                </tr>
                                <tr>
                                	<th>Deskripsi Buku</th>
                                    <td><?php echo $model['PHYS_DESCRIPTION']; ?></td>
                                </tr>
                                <tr>
                                	<th>Index</th>
                                    <td><?php echo $model['INDEX_']; ?></td>
                                </tr>
                                <tr>
                                	<th>Bibliography</th>
                                    <td><?php echo $model['BIBLIOGRAPHY']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Lokasi</th>
                                    <td><?php echo $model['LOCATION_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Lokasi</th>
                                    <td><?php echo $model['SPEC_LOCATION']; ?></td>
                                </tr>
                                 <tr>
                                	<th>Harga</th>
                                    <td><?php echo $model['PRICE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Fund Code</th>
                                    <td><?php echo $model['FUND_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Fund Note</th>
                                    <td><?php echo $model['FUND_NOTE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Waktu Terima</th>
                                    <td><?php echo $model['ACCEPT_DATE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Data Masuk</th>
                                    <td><?php echo $model['DATA_ENTRY']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Operator</th>
                                    <td><?php echo $model['OPERATOR_CODE']; ?></td>
                                </tr>
                                        <?php } ?>
										
								</table>
                                <?php endforeach; ?>
                           
                        </div>
                        <?php echo CHtml::link('Kembali', $this->createUrl('katalog/f_katalog'), array('class'=>"btn btn-primary"));?>
                        </div>
                        
                        </div>
                        
                        </div>
