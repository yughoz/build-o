
<div class="row" wire:init="get_data">
   <div class="panel">
      <div class="panel-body">
        <div class="col-md-12" style="padding-left: 0px;">
            <div class="col-md-12">
               <h4 class="modal-title- mb-2">{{ auth()->user()->customers()->first()->full_name }}</h4>
               
            </div>
         </div>
         <div class="col-md-12">
                <div class="row">
                    <div class="col-md-6">
                        <p class="mb-0">Nomor Telepon</p>
                        <label class="control-label" for="phone" > {{$phone}} </label>
                        <!-- <input class="field form-control" id="phone" name="phone" placeholder="08123456789" readonly type="number" value="" wire:model="phone"  /> -->
                           
                    </div>
                </div>
                <div><p></p></div>
                <div class="row">
                    <div class="col-md-6">     
                        <p class="mb-0">Email</p>
                        <label class="control-label" for="phone" > {{$email}} </label>
                    </div>
                </div>
                <div><p></p></div>
                <div><p></p></div>
                <div class="row">
                    <div class="col-md-6">     
                        <p class="mb-0">History Proyek</p>
                    </div>
                </div>
                <div><p></p></div>
                <div><p></p></div>
         </div>
         <div class="col-md-12">
    

            <table class="table">
            <thead class="thead-dark">
                <tr>
                <th scope="col">#</th>
                <th scope="col">Nama proyek</th>
                <th scope="col">Jenis proyek</th>
                <th scope="col">Alamat proyek</th>
                <th scope="col">Tanggal pengerjaan</th>
                <th scope="col">Status pengerjaan</th>
                </tr>
            </thead>
            <tbody>
                @foreach($transaction as $key => $t)
                    <tr>
                    <th scope="row">{{$key+1}}</th>
                    <td>{{$t['name']}}</td>
                    <td>{{$t['name']}}</td>
                    <td>{{$t['address']}}</td>
                    <td>{{$t['build_start']}} - {{$t['build_end']}} </td>
                    <td>{{$t['status']}}</td>
                    </tr>
                @endforeach
  
            </tbody>
            </table>


         </div>
         

         <div class="col-md-12">&nbsp;</div>
        
         <div class="col-md-12">&nbsp;</div>
      </div>
   </div>
</div>
