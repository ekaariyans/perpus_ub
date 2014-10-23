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
									$form->errorSummary($data)."</div>\n";
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
                                 <table class="table">
                                 <tr>
                                 	<th width="25%">REGISTER</th>
                                    <td width="75%"><?php echo $data['REGISTER']; ?></td>
                                 </tr>
                                 <tr>
                                 	<th>ISBN</th>
                                    <td><?php echo $data['ISBN']; ?></td>
								</tr>
                                <tr>
                                	<th>Judul</th>
                                	<td><?php echo $data['TITLE']; ?></td>
                                </tr>
                                <tr>
                                    <th>Volume</th>
                                    <td><?php echo $data['VOLUME']; ?></td>
								</tr>
                                <tr>
                                	<th>Printing</th>
                                    <td><?php echo $data['PRINTING']; ?></td>
                                </tr>
                                <tr>
                                	<th>Edisi</th>
                                    <td><?php echo $data['EDITION']; ?></td>
                                </tr>
                                <tr>
                                	<th>Bahasa</th>
                                    <td><?php echo $data['LANGUAGE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Copy</th>
                                    <td><?php echo $data['COPIES']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Media</th> 
                                    <td><?php echo $data['MEDIA_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Tipe</th>
                                    <td><?php echo $data['TYPE_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>DEWEY NO </th>
                                    <td><?php echo $data['DEWEY_NO']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Pengarang</th>
                                    <td><?php echo $data['AUTHOR_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Judul</th>
                                    <td><?php echo $data['TITLE_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Tahun Terbit</th>
                                    <td><?php echo $data['YEAR_PUB']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kota Terbit</th>
                                    <td><?php echo $data['CITY_PUB']; ?></td>
                                </tr>
                                <tr>
                                	<th>Penerbit</th> 
                                    <td><?php echo $data['PUB_NAME']; ?></td>
                                </tr>
                                <tr>
                                	<th>Deskripsi Buku</th>
                                    <td><?php echo $data['PHYS_DESCRIPTION']; ?></td>
                                </tr>
                                <tr>
                                	<th>Index</th>
                                    <td><?php echo $data['INDEX_']; ?></td>
                                </tr>
                                <tr>
                                	<th>Bibliography</th>
                                    <td><?php echo $data['BIBLIOGRAPHY']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Lokasi</th>
                                    <td><?php echo $data['LOCATION_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Lokasi</th>
                                    <td><?php echo $data['SPEC_LOCATION']; ?></td>
                                </tr>
                                 <tr>
                                	<th>Harga</th>
                                    <td><?php echo $data['PRICE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Fund Code</th>
                                    <td><?php echo $data['FUND_CODE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Fund Note</th>
                                    <td><?php echo $data['FUND_NOTE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Waktu Terima</th>
                                    <td><?php echo $data['ACCEPT_DATE']; ?></td>
                                </tr>
                                <tr>
                                	<th>Data Masuk</th>
                                    <td><?php echo $data['DATA_ENTRY']; ?></td>
                                </tr>
                                <tr>
                                	<th>Kode Operator</th>
                                    <td><?php echo $data['OPERATOR_CODE']; ?></td>
                                </tr>
                                       
										
								</table>
                           
                        </div>
                        <?php echo CHtml::link('Kembali', $this->createUrl('katalog/f_katalog'), array('class'=>"btn btn-primary"));?>
                        </div>
                        
                        </div>
                        
                        </div>
