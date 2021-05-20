

<div class="row" >
   <div class="panel panel-primary">
      <div class="panel-body">
         <div class="col-md-12" style="padding-left: 0px;">
            <div class="col-md-12">
               <h4 class="modal-title- mb-2">Akun</h4>
               <p class="mb-0">Berikut informasi akun kamu</p>
            </div>
         </div>
         <div class="col-md-12">&nbsp;</div>
            <form action="#"  class="form" wire:submit.prevent="submit" wire:init="get_data">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="email" >  Nama Lengkap </label>
                                <input class="field form-control" id="full_name" name="full_name" placeholder="Nama sesuai KTP" type="text" value="" wire:model="full_name"/>
                            </div>
                            @error('full_name') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-select-wrapper">
                                <label class="control-label" for="marital_status">Status Pernikahan</label>
                                <select class="form-control" id="marital_status" name="marital_status" wire:model="marital_status">
                                    <option class="" value="0">Belum Menikah</option>
                                    <option class="" value="1">Menikah</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-select-wrapper">
                                <label class="control-label" for="job">Pekerjaan</label>
                                <select class="form-control" id="job" name="job" wire:model="job">
                                    <option class="" value="Pegawai Swasta">Pegawai Swasta</option>
                                    <option class="" value="Pegawai Negeri">Pegawai Negeri</option>
                                    <option class="" value="Tidak Bekerja">Tidak Bekerja</option>
                                    <option class="" value="Mahasiswa/i">Mahasiswa/i</option>
                                    <option class="" value="Pengusaha">Pengusaha</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    @if($marital_status == '1')
                        <div class="col-md-6" id="spouse">
                            <div class="form-group">
                                <div class="form-group input-select-wrapper">
                                    <label class="control-label" for="job_partner">Pekerjaan Pasangan </label>
                                    <select class="form-control" id="job_partner" name="job_partner" wire:model="job_partner">
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
                    <!--<div class="col-md-6"> <div class="form-group"> <div class="form-group input-text-wrapper"> <label class="control-label" for="ktpNumber"> Nomor KTP <span class="text-warning" id="jbfs__column1__0"><svg class="lexicon-icon lexicon-icon-asterisk" focusable="false" role="img" title="" ><use data-href="https://www.sobatbangun.com/o/sobatbangun-login-theme/images/lexicon/icons.svg#asterisk"></use><title>asterisk</title></svg></span> <span class="hide-accessible">Required</span> </label> <input  class="field form-control"  id="ktpNumber"    name="ktpNumber"     type="text" value=""   /> </div> </div> </div>-->
                    <div class="col-md-6">
                        <div class="form-group">
                            <label class="control-label">Tanggal Lahir</label>
                            <input class="field form-control" id="birthday" name="birthday" placeholder="mm/dd/yyyy" type="date" value="03&#x2f;21&#x2f;1996" wire:model="birthday"/>
                        </div>
                        @error('birthday') <span class="text-danger">{{ $message }}</span> @enderror																
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="email"> Alamat Email </label><input class="field form-control" id="email" name="email" placeholder="Alamat Email Anda" type="email" value="" wire:model="email" />
                            </div>
                            @error('email') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="phone" > Nomor Telepon Whatsapp </label><input class="field form-control" id="phone" name="phone" placeholder="08123456789" type="number" value="" wire:model="phone"  />
                            </div>
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="phone2">Nomor Telepon Alternatif</label><input class="field form-control" id="phone2" name="phone2" placeholder="0823456789" type="number" value="" wire:model="phone2" />
                            </div>
                            @error('phone') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <div class="form-group">
                            <div class="custom-control custom-checkbox">
                                <input id="agreement" type="checkbox" class="custom-control-input" value="1" wire:model="agreement">
                                <label class="custom-control-label" for="agreement"> Saya telah membaca dan menyetujui <a href="terms-condition.html" class="font-weight-bold text-primary" target="_blank">Syarat dan Ketentuan</a> serta <a href="kebijakan-privasi.html" class="font-weight-bold text-primary" target="_blank">kebijakan privasi</a></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12">
                        <input type="submit" value="Simpan Perubahan" class="btn btn-primary btn-w-200 btn-default" @if($agreement != '1') disabled @endif
>
                        <!-- <button class="btn btn-primary btn-w-200 btn-default" type="submit"><span class="lfr-btn-label">Submit</span></button> -->
                    </div>
                </div>
            </form>
         <div class="col-md-12">&nbsp;</div>
         <div class="col-md-12" style="padding-left: 0px;">
            <div class="col-md-12">
               <h4 class="modal-title- mb-2">Sandi</h4>
               <p class="mb-0">Isi data berikut untuk mengubah password kamu</p>
            </div>
         </div>
         <div class="col-md-12">&nbsp;</div>
         <form class="form"  wire:submit.prevent="change_pass">
            <!-- <input class="field form-control" id="_SB_My_Account_Portlet_formDate" name="_SB_My_Account_Portlet_formDate" type="hidden" value="1611721220127">  -->
            <div class="col-md-12" style="padding-left: 0px;">
                <div class="col-6">
                    <div class="form-group">
                        <div class="form-group input-text-wrapper">
                            <label class="control-label" for="email" > Password Sekarang</label>
                            <input class="field form-control" placeholder="****" type="password" value="" wire:model="old_password"/>
                        </div>
                        @error('old_password') <span class="text-danger">{{ $message }}</span> @enderror																
                    </div>
                </div>
            </div>
            <div class="col-md-12" style="padding-left: 0px;">
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group input-text-wrapper">
                            <label class="control-label" for="email" > Password Baru</label>
                            <input class="field form-control" placeholder="****" type="password" value="" wire:model="password"/>
                        </div>
                        @error('password') <span class="text-danger">{{ $message }}</span> @enderror																
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <div class="form-group input-text-wrapper">
                            <label class="control-label" for="email" > Ketik ulang password</label>
                            <input class="field form-control" placeholder="****" type="password" value="" wire:model="password_confirmation"/>
                        </div>
                        @error('password_confirmation') <span class="text-danger">{{ $message }}</span> @enderror																
                    </div>
                </div>
               <!-- <div class="col-md-12"> <small class="text-gray-400"> Kode verifikasi akan dikirim ke nomor Whatsapp </small> </div> -->
            </div>
            <div class="col-md-12">&nbsp;</div>
            <div class="col-md-12">
               <div class="btn-placeholder" align="left"> 
                    <input type="submit" value="Simpan Perubahan" class="btn btn-primary btn-default">
                    <!-- <button type="button" value="Simpan Perubahan" class="btn btn-primary btn-default"> -->
                    <!-- <button class="btn btn-primary btn-default" type="button"> Simpan Perubahan </button>  -->
               </div>
            </div>
         </form>
      </div>
   </div>
</div>
