

<div class="wrapper-login-holcim">
	<div class="container-fluid" id="wrapper">
		<div class="row">
			<div class="col-md-12">
				<div class="main-content">
					<section id="content" class="vp-fadeinup visible animated fadeInUp full-visible">
					<div class="form-login">
						<div class="columns-1" id="main-content" role="main">
							<div class="portlet-layout row">
								<div class="col-md-12 portlet-column portlet-column-only" id="column-1">
									<div class="portlet-dropzone portlet-column-content portlet-column-content-only" id="layout-column_column-1">
										<div class="portlet-boundary portlet-boundary portlet-static portlet-static-end portlet-decorate " id="p_p_id">
											<span id="p_SB_Registration_Portlet"></span><section class="portlet" id="portlet_SB_Registration_Portlet">
											<div class="portlet-content">
												<h2 class="portlet-title-text">Build O Registration Portlet</h2>
												<div class=" portlet-content-container">
													<div class="portlet-body">
														<div class="modal-body p-box">
															<button type="button" class="close" aria-label="Close" onclick="goBack()"><span aria-hidden="true"><i class="fal fa-times"></i></span></button>
															<h4 class="modal-title- mb-2">Buat akun untuk melanjutkan</h4>
															<p class="mb-0">Silahkan isi informasi kamu dibawah ini</p>
															<small class="text-gray-400"> Sudah memiliki akun. <a href="{{ url ('login') }}" class="font-weight-bold text-primary" aria-label="Close">Login</a></small>
															<form action="#"  class="form" wire:submit.prevent="submit">
																<input class="field form-control" id="formDate" name="formDate" type="hidden" value="1605717244044"/><input class="field form-control" id="authToken" name="authToken" type="hidden" value="VimAlLS3"/><input class="field form-control" id="currentLoginUrl" name="currentLoginUrl" type="hidden" value="registrationwww.sobatbangun.html"/><input class="field form-control" id="architectProjectId" name="architectProjectId" type="hidden" value="0"/><input class="field form-control" id="floorPlanDetailId" name="floorPlanDetailId" type="hidden" value="0"/>
																<div class="row">

																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="email" >  Nama Lengkap </label>
                                                                                <input class="field form-control" id="fullName" name="fullName" placeholder="Nama sesuai KTP" type="text" value="" wire:model="fullName"/>
																			</div>
                                                                            @error('fullName') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-select-wrapper">
																				<label class="control-label" for="maritalStatus">Status Pernikahan</label>
																				<select class="form-control" id="maritalStatus" name="maritalStatus" wire:model="maritalStatus">
																					<option class="" value="0">Belum Menikah</option>
																					<option class="" value="1">Menikah</option>
																				</select>
																			</div>
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-select-wrapper">
																				<label class="control-label" for="occupation">Pekerjaan</label>
																				<select class="form-control" id="occupation" name="occupation" wire:model="occupation">
																					<option class="" value="Pegawai Swasta">Pegawai Swasta</option>
																					<option class="" value="Pegawai Negeri">Pegawai Negeri</option>
																					<option class="" value="Tidak Bekerja">Tidak Bekerja</option>
																					<option class="" value="Mahasiswa/i">Mahasiswa/i</option>
																					<option class="" value="Pengusaha">Pengusaha</option>
																				</select>
																			</div>
																		</div>
																	</div>
                                                                    @if($maritalStatus == '1')
                                                                        <div class="col-6" id="spouse">
                                                                            <div class="form-group">
                                                                                <div class="form-group input-select-wrapper">
                                                                                    <label class="control-label" for="spouseOccupation">Pekerjaan Pasangan </label>
                                                                                    <select class="form-control" id="spouseOccupation" name="spouseOccupation" wire:model="spouseOccupation">
                                                                                        <option class="" value="NGW">Pegawai Swasta</option>
                                                                                        <option class="" value="GW">Pegawai Negeri</option>
                                                                                        <option class="" value="UEM">Tidak Bekerja</option>
                                                                                        <option class="" value="STD">Mahasiswa/i</option>
                                                                                        <option class="" value="ETP">Pengusaha</option>
                                                                                    </select>
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    @endif
																	<!--<div class="col-6"> <div class="form-group"> <div class="form-group input-text-wrapper"> <label class="control-label" for="ktpNumber"> Nomor KTP <span class="text-warning" id="jbfs__column1__0"><svg class="lexicon-icon lexicon-icon-asterisk" focusable="false" role="img" title="" ><use data-href="https://www.sobatbangun.com/o/sobatbangun-login-theme/images/lexicon/icons.svg#asterisk"></use><title>asterisk</title></svg></span> <span class="hide-accessible">Required</span> </label> <input  class="field form-control"  id="ktpNumber"    name="ktpNumber"     type="text" value=""   /> </div> </div> </div>-->
																	<div class="col-6">
																		<div class="form-group">
																			<label class="control-label">Tanggal Lahir</label>
                                                                            <input class="field form-control" id="dob" name="dob" placeholder="mm/dd/yyyy" type="date" value="03&#x2f;21&#x2f;1996" required wire:model="dob"/>
																		</div>
                                                                        @error('dob') <span class="text-danger">{{ $message }}</span> @enderror																
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="email" required> Alamat Email </label><input class="field form-control" id="email" name="email" placeholder="Alamat Email Anda" type="email" value="" wire:model="email" />
																			</div>
                                                                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="mobilePhoneNo" > Nomor Telepon Whatsapp </label><input class="field form-control" id="mobilePhoneNo" name="mobilePhoneNo" placeholder="08123456789" type="number" value="" wire:model="mobilePhoneNo"  />
																			</div>
                                                                            @error('mobilePhoneNo') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="altPhoneNo" required>Nomor Telepon Alternatif</label><input class="field form-control" id="altPhoneNo" name="altPhoneNo" placeholder="0823456789" type="number" value="" required wire:model="altPhoneNo" />
																			</div>
                                                                            @error('mobilePhoneNo') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="password" required> Buat Sandi </label>
                                                                                <input class="field form-control" id="password" name="password" placeholder="****" type="password" value="" required  wire:model="password"/>
																			</div>
                                                                            @error('password') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-6">
																		<div class="form-group">
																			<div class="form-group input-text-wrapper">
																				<label class="control-label" for="password_confirmation" required> Ketik Ulang Sandi </label>
                                                                                <input class="field form-control" id="password_confirmation" name="password_confirmation" placeholder="****" type="password" value="" required wire:model="password_confirmation"/>
																			</div>
                                                                            @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror																
																		</div>
																	</div>
																	<div class="col-12">
																		<div class="form-group">
																			<div class="custom-control custom-checkbox">
																				<input id="agreement" type="checkbox" class="custom-control-input" required>
                                                                                <label class="custom-control-label" for="agreement"> Saya telah membaca dan menyetujui <a href="terms-condition.html" class="font-weight-bold text-primary" target="_blank">Syarat dan Ketentuan</a> serta <a href="kebijakan-privasi.html" class="font-weight-bold text-primary" target="_blank">kebijakan privasi</a></label>
																			</div>
																		</div>
																	</div>
																	<div class="col-12">
																		<input type="submit" value="Register" class="btn btn-primary btn-w-200 btn-default">
																		<!-- <button class="btn btn-primary btn-w-200 btn-default" type="submit"><span class="lfr-btn-label">Submit</span></button> -->
																	</div>
																</div>
															</form>
														</div>
													</div>
												</div>
											</div>
											</section>
										</div>
									</div>
								</div>
							</div>
						</div>
					</div>
					</section>
				</div>
			</div>
		</div>
	</div>
</div>