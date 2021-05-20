

<div class="row" >
   <div class="panel panel-primary">
      <div class="panel-body">
         <div class="col-md-12" style="padding-left: 0px;">
            <div class="col-md-12">
               <h4 class="modal-title- mb-2">Custom {{$service->title}}</h4>
               <p class="mb-0">Berikut informasi  "{{$service->title}}" ingin seperti apa</p>
            </div>
         </div>
         <div class="col-md-12">&nbsp;</div>
            <form action="#"  class="form" wire:submit.prevent="submit" wire:init="get_data">
                <div class="col-md-12">
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="email" > Title </label>
                                <input class="field form-control" id="title" name="title" placeholder="masukan judul atau label" type="text" value="" wire:model="title"/>
                            </div>
                            @error('title') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>

                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="email" > Address </label>
                                <textarea class="field form-control pac-target-input error-field" id="address" name="address"  row="5" autocomplete="off" aria-required="true" aria-invalid="true" aria-describedby="addressHelper" wire:model="address"></textarea>

                            </div>
                            @error('address') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <div class="form-group input-text-wrapper">
                                <label class="control-label" for="description"> Description </label>
                                <textarea class="field form-control pac-target-input error-field" id="description" name="description"  row="5" autocomplete="off" aria-required="true" aria-invalid="true" aria-describedby="descriptionHelper" wire:model="description"></textarea>

                            </div>
                            @error('description') <span class="text-danger">{{ $message }}</span> @enderror																
                        </div>
                    </div>
                    
                    <div class="col-md-12">
                        <input type="submit" value="Simpan" class="btn btn-primary btn-w-200 btn-default" 
>
                        <!-- <button class="btn btn-primary btn-w-200 btn-default" type="submit"><span class="lfr-btn-label">Submit</span></button> -->
                    </div>
                </div>
            </form>
         <div class="col-md-12">&nbsp;</div>
         
      </div>
   </div>
</div>
