<?php $__env->startSection('title'); ?>
    Tables users
<?php $__env->stopSection(); ?>

<?php $__env->startSection('top_nav'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.TopNav', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('page_title'); ?>
    <?php echo app('translator')->get( 'Table Users'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('menu'); ?>
    <?php echo $__env->make('ManageOrganiser.Partials.Sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
<?php $__env->stopSection(); ?>
<head>
<script lang="javascript" src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.4/xlsx.full.min.js"></script>
<script src="https://cdn.jsdelivr.net/g/filesaver.js"></script>
</head>
<?php $__env->startSection('content'); ?>

    <div>
      <div >
        <p id="btnsList">
          <button id="Expo" class="btn btn-success ">Export data table to excel</button>
          <button type="button" id="first-btn" class="btn btn-success " style="display: none">Send invitation</button>
          <button type="button" id="second-btn" class="btn btn-success " style="display: none">Send invitation</button>
          <button type="button" id="third-btn" class="btn btn-success " style="display: none">Send invitation</button>
        </p>
        <p class="choice">Mode payment: &nbsp;<select id="selectEvent">
          <option value="select" selected>All</option>
          <option value="transfer">Bank Transfer</option>
          <option value="card">Credit Card</option>
          <option value="onsite">Onsite payment</option>
        </select></p>
      </div>

      <div id="block-1" class="block" >
        <table id="dtBasicExample-1" style="width:100%; height: 80vh; overflow:auto; display:block;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">URN</th>
              <th class="th-sm">First name</th>
              <th class="th-sm">Last name</th>
              <th class="th-sm">type registration</th>
              <th class="th-sm">Membership number</th>
              <th class="th-sm">Number of delegates</th>
              <th class="th-sm">Email</th>
              <th class="th-sm">events</th>
              <th class="th-sm">Postal address</th>
              <th class="th-sm">Job title</th>
              <th class="th-sm">Organization</th>
              <th class="th-sm">Country</th>
              <th class="th-sm">dietary</th>
              <th class="th-sm">experience</th>
              <th class="th-sm">language translation</th>
              <th class="th-sm">languages</th>
              <th class="th-sm">Share your information</th>
              <th class="th-sm">Added to the recipients</th>
              <th class="th-sm">Guests</th>
              <th class="th-sm" style="display: none">Lead representative</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Payment method</th>
              <th class="th-sm">Payment status</th>
              

            </tr>
          </thead>
          <tbody>

            <?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <tr>
                  <td> <?php echo e($user->id); ?></td>
                  <td> <?php echo e($user->first_name); ?> </td>
                  <td> <?php echo e($user->last_name); ?> </td>
                  <td> <?php echo e($user->registration_as); ?> </td>
                  <td> <?php echo e($user->membership_number); ?> </td>
                  <td>
                    <?php if($user->membership != null): ?>
                    <button onclick="listDelegate(<?php echo e($user->id); ?>)" class="popup" id="<?php echo e($user->id); ?>"> <?php echo e($user->membership); ?> </button> 
                    <?php endif; ?>
                  </td>
                  <td> <?php echo e($user->email_address); ?></td>
                  <td> <?php echo e($user->eventS); ?> <?php echo e($user->eventP); ?> <?php echo e($user->eventG); ?> <?php echo e($user->eventW); ?></td>
                  <td> <?php echo e($user->postal_address); ?></td>
                  <td> <?php echo e($user->job_title); ?></td>
                  <td> <?php echo e($user->organization); ?></td>
                  <td> <?php echo e($user->country); ?></td>
                  <td> <?php echo e($user->dietary); ?></td>
                  <td> <?php echo e($user->experience); ?></td>
                  <td> <?php echo e($user->language_translation); ?></td>
                  <td> <?php echo e($user->languages); ?></td>
                  <td> <?php echo e($user->first_check); ?></td>
                  <td> <?php echo e($user->second_check); ?></td>
                  <td> <?php echo e($user->guests); ?></td>
                  <td style="display: none"> <?php echo e($user->lead); ?></td>
                  <td> <?php echo e($user->price); ?></td>
                  <td> <?php echo e($user->mode_payment); ?></td>
                  <td>
                    <select onchange="paymentStatus(this.value,<?php echo e($user->id); ?>)" class="MP">
                      <?php if($user->payment_status == 'Pending'): ?>
                      <option selected value="Pending">Pending</option>
                      <?php else: ?>
                      <option  value="Pending">Pending</option>
                      <?php endif; ?>
                      <?php if($user->payment_status == 'Successful'): ?>
                      <option selected  value="Successful">Successful</option>
                      <?php else: ?>
                      <option   value="Successful">Successful</option>
                      <?php endif; ?>
                    </select>
                  </td>
                  
                </tr>
              <?php $__currentLoopData = $DLS; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dd): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php if($user->id == $dd->register_id ): ?>
                <tr >
                  <td style="display: none" > <?php echo e($dd->register_id); ?></td>
                  <td style="display: none"> <?php echo e($dd->first_name); ?> </td>
                  <td style="display: none"> <?php echo e($dd->last_name); ?> </td>
                  <td style="display: none"> <?php echo e($user->registration_as); ?> </td>
                  <td style="display: none"> <?php echo e($user->membership_number); ?> </td>
                  <td style="display: none"> <?php echo e($user->membership); ?></td>
                  <td style="display: none"> <?php echo e($dd->email_address); ?></td>
                  <td style="display: none"> <?php echo e($user->eventS); ?> <?php echo e($user->eventP); ?> <?php echo e($user->eventG); ?> <?php echo e($user->eventW); ?></td>
                  <td style="display: none"> <?php echo e($user->postal_address); ?></td>
                  <td style="display: none"> <?php echo e($dd->job_title); ?></td>
                  <td style="display: none"> <?php echo e($dd->organization); ?></td>
                  <td style="display: none"> <?php echo e($user->country); ?></td>
                  <td style="display: none"> <?php echo e($dd->dietary); ?></td>
                  <td style="display: none"> <?php echo e($dd->experience); ?></td>
                  <td style="display: none"> <?php echo e($dd->language_translation); ?></td>
                  <td style="display: none"> <?php echo e($dd->languages); ?></td>
                  <td style="display: none"> <?php echo e($dd->first_check); ?></td>
                  <td style="display: none"> <?php echo e($dd->second_check); ?></td>
                  <td style="display: none"> <?php echo e($dd->guests); ?></td>
                  <td style="display: none"> <?php echo e($dd->lead); ?></td>
                  <td style="display: none"> <?php echo e($user->price); ?></td>
                  <td style="display: none"> <?php echo e($user->mode_payment); ?></td>
                  <td style="display: none"> <?php echo e($user->payment_status); ?></td>

                </tr>
                <?php endif; ?>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div id="block-2" class="block">
        <table id="dtBasicExample-2" style="width:100%;overflow:auto; display:block;"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">First name</th>
              <th class="th-sm">Last name</th>
              <th class="th-sm">type registration</th>
              <th class="th-sm">Membership number</th>
              <th class="th-sm">Number of delegates</th>
              <th class="th-sm">Email</th>
              
              <th class="th-sm">events</th>
              <th class="th-sm">Postal address</th>
              <th class="th-sm">Job title</th>
              <th class="th-sm">Organization</th>
              <th class="th-sm">Country</th>
              <th class="th-sm">dietary</th>
              <th class="th-sm">experience</th>
              <th class="th-sm">language translation</th>
              <th class="th-sm">languages</th>
              <th class="th-sm">Share your information</th>
              <th class="th-sm">Added to the recipients</th>
              <th class="th-sm">Guests</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Payment method</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $BT; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <?php echo e($user->first_name); ?></td>
              <td> <?php echo e($user->last_name); ?> </td>
              <td> <?php echo e($user->registration_as); ?> </td>
              <td> <?php echo e($user->membership_number); ?> </td>
              <td>
                <?php if($user->membership != null): ?>
                 <button onclick="listDelegate(<?php echo e($user->id); ?>)" class="popup" id="<?php echo e($user->id); ?>"> <?php echo e($user->membership); ?> </button> 
                <?php endif; ?>
              </td>
              <td> <?php echo e($user->email_address); ?></td>
              
              <?php if(($user->eventP != null)||($user->eventS != null)||($user->eventG != null)||($user->eventW != null)): ?>
                <td> 
                  <?php echo e($user->eventS); ?> 
                  <?php echo e($user->eventP); ?> 
                  <?php echo e($user->eventG); ?> 
                  <?php echo e($user->eventW); ?>

                </td>
              <?php endif; ?>
              <td> <?php echo e($user->postal_address); ?></td>
              <td> <?php echo e($user->job_title); ?></td>
              <td> <?php echo e($user->organization); ?></td>
              <td> <?php echo e($user->country); ?></td>
              <td> <?php echo e($user->dietary); ?></td>
              <td> <?php echo e($user->experience); ?></td>
              <td> <?php echo e($user->language_translation); ?></td>
              <td> <?php echo e($user->languages); ?></td>
              <td> <?php echo e($user->first_check); ?></td>
              <td> <?php echo e($user->second_check); ?></td>
              <td> <?php echo e($user->guests); ?></td>
              <td> <?php echo e($user->price); ?></td>
              <td> <?php echo e($user->mode_payment); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div id="block-3" class="block">
        <table id="dtBasicExample-3" style="width:100%;overflow:auto; display:block;"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">First name</th>
              <th class="th-sm">Last name</th>
              <th class="th-sm">type registration</th>
              <th class="th-sm">Membership number</th>
              <th class="th-sm">Number of delegates</th>
              <th class="th-sm">Email</th>
              <th class="th-sm">events</th>
              <th class="th-sm">Postal address</th>
              <th class="th-sm">Job title</th>
              <th class="th-sm">Organization</th>
              <th class="th-sm">Country</th>
              <th class="th-sm">dietary</th>
              <th class="th-sm">experience</th>
              <th class="th-sm">language translation</th>
              <th class="th-sm">languages</th>
              <th class="th-sm">Share your information</th>
              <th class="th-sm">Added to the recipients</th>
              <th class="th-sm">Guests</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Payment method</th>
            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $CC; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <?php echo e($user->first_name); ?> </td>
              <td> <?php echo e($user->last_name); ?> </td>
              <td> <?php echo e($user->registration_as); ?> </td>
              <td> <?php echo e($user->membership_number); ?> </td>
              <td>
                <?php if($user->membership != null): ?>
                 <button onclick="listDelegate(<?php echo e($user->id); ?>)" class="popup" id="<?php echo e($user->id); ?>"> <?php echo e($user->membership); ?> </button> 
                <?php endif; ?>
              </td>
              <td> <?php echo e($user->email_address); ?></td>
              <?php if(($user->eventP != null)||($user->eventS != null)||($user->eventG != null)||($user->eventW != null)): ?>
                <td> 
                  <?php echo e($user->eventS); ?> 
                  <?php echo e($user->eventP); ?> 
                  <?php echo e($user->eventG); ?> 
                  <?php echo e($user->eventW); ?>

                </td>
              <?php endif; ?>
              <td> <?php echo e($user->postal_address); ?></td>
              <td> <?php echo e($user->job_title); ?></td>
              <td> <?php echo e($user->organization); ?></td>
              <td> <?php echo e($user->country); ?></td>
              <td> <?php echo e($user->dietary); ?></td>
              <td> <?php echo e($user->experience); ?></td>
              <td> <?php echo e($user->language_translation); ?></td>
              <td> <?php echo e($user->languages); ?></td>
              <td> <?php echo e($user->first_check); ?></td>
              <td> <?php echo e($user->second_check); ?></td>
              <td> <?php echo e($user->guests); ?></td>
              <td> <?php echo e($user->price); ?></td>
              <td> <?php echo e($user->mode_payment); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div id="block-4" class="block">
        <table id="dtBasicExample-4" style="width:100%;overflow:auto; display:block;"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
          <thead>
            <tr>
              <th class="th-sm">First name</th>
              <th class="th-sm">Last name</th>
              <th class="th-sm">type registration</th>
              <th class="th-sm">Membership number</th>
              <th class="th-sm">Number of delegates</th>
              <th class="th-sm">Email</th>
              <th class="th-sm">events</th>
              <th class="th-sm">Postal address</th>
              <th class="th-sm">Job title</th>
              <th class="th-sm">Organization</th>
              <th class="th-sm">Country</th>
              <th class="th-sm">dietary</th>
              <th class="th-sm">experience</th>
              <th class="th-sm">language translation</th>
              <th class="th-sm">languages</th>
              <th class="th-sm">Share your information</th>
              <th class="th-sm">Added to the recipients</th>
              <th class="th-sm">Guests</th>
              <th class="th-sm">Price</th>
              <th class="th-sm">Payment method</th>

            </tr>
          </thead>
          <tbody>
            <?php $__currentLoopData = $OP; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <tr>
              <td> <?php echo e($user->first_name); ?> </td>
              <td> <?php echo e($user->last_name); ?> </td>
              <td> <?php echo e($user->registration_as); ?> </td>
              <td> <?php echo e($user->membership_number); ?> </td>
              <td>
                <?php if($user->membership != null): ?>
                 <button onclick="listDelegate(<?php echo e($user->id); ?>)" class="popup" id="<?php echo e($user->id); ?>"> <?php echo e($user->membership); ?> </button> 
                <?php endif; ?>
              </td>
              <td> <?php echo e($user->email_address); ?></td>
              <?php if(($user->eventP != null)||($user->eventS != null)||($user->eventG != null)||($user->eventW != null)): ?>
                <td> 
                  <?php echo e($user->eventS); ?> 
                  <?php echo e($user->eventP); ?> 
                  <?php echo e($user->eventG); ?> 
                  <?php echo e($user->eventW); ?>

                </td>
              <?php endif; ?>
              <td> <?php echo e($user->postal_address); ?></td>
              <td> <?php echo e($user->job_title); ?></td>
              <td> <?php echo e($user->organization); ?></td>
              <td> <?php echo e($user->country); ?></td>
              <td> <?php echo e($user->dietary); ?></td>
              <td> <?php echo e($user->experience); ?></td>
              <td> <?php echo e($user->language_translation); ?></td>
              <td> <?php echo e($user->languages); ?></td>
              <td> <?php echo e($user->first_check); ?></td>
              <td> <?php echo e($user->second_check); ?></td>
              <td> <?php echo e($user->guests); ?></td>
              <td> <?php echo e($user->price); ?></td>
              <td> <?php echo e($user->mode_payment); ?></td>

            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
    </div>
<style>
 .table>thead:first-child>tr:first-child>th{
    border: 0 !important;
  }
  td, th{
    text-align: center;
    color: #000;
  }
  /*test */
  table.dataTable thead .sorting:after,
  table.dataTable thead .sorting:before,
  table.dataTable thead .sorting_asc:after,
  table.dataTable thead .sorting_asc:before,
  table.dataTable thead .sorting_asc_disabled:after,
  table.dataTable thead .sorting_asc_disabled:before,
  table.dataTable thead .sorting_desc:after,
  table.dataTable thead .sorting_desc:before,
  table.dataTable thead .sorting_desc_disabled:after,
  table.dataTable thead .sorting_desc_disabled:before {
    bottom: .5em;
    
  }
  .dataTables_wrapper .dataTables_filter input {
    margin-left: 0.5em;
    border: 1px solid #e0e0e0;
    padding: 5px;
}
  #dtBasicExample_length select {
    border: 1px solid #e0e0e0;
    padding: 5px;
    
}

select {
    padding: 5px;
    border: 1px solid #e0e0e0;
    
}
.choice {
    float: right;
     
}
table.dataTable.no-footer {
    border-bottom: 1px solid #ddd;
}
.swal2-popup {
  width: 85vw;
}
#table{
  width: 100%;
}
.popup{
  background: none;
  border: 0;
  padding: 9px 35px;
  outline: none;
  text-decoration: underline;
}
select.MP, select.payment {
    border: 0 !important;
    background: transparent;
}
</style>


<script type="text/javascript">
var direction=""

function listDelegate(val){ 

  jQuery.ajax({
        type: "GET",
        url: "http://bo-ica/api/checkuser/" + val,
        success: function(data) {
            infoUser = data.data_user;
            infoDelegate = data.data_delegate;
                   swal({html: `
                   	<strang style="float: left; padding: 20px; font-size: 18px;">Delegates</strang>
                          <table  style="width:95%;overflow:auto; display:block;" class="table table-bordered dataTable" border=1>
                            <thead>
                              <tr>
                                <th>First name</th>
                                <th>Last name</th>
                                <th>Job title</th>
                                <th>Organization</th>
                                <th>Email</th>
                                <th>Experience</th>
                                <th>Dietary</th>
                                <th>Language translation</th>
                                <th>Languages</th>
                                <th>Share your information</th>
                                <th>Added to the recipients</th>
                                <th>Guests</th>
                                <th>Lead representative</th>
                                <th style="display: none;">Register_id</th>
                              </tr>
                            </thead>
                          <tbody id='tabDLS'>
                                
                          </tbody>
                        </table>`
                        });
                        infoDelegate.forEach(el => {
                            jQuery("#tabDLS").append(`  
                              <tr>
                                <td> ${el.first_name} </td>
                                <td> ${el.last_name} </td>
                                <td> ${el.job_title} </td>
                                <td> ${el.organization} </td>
                                <td> ${el.email_address} </td>
                                <td> ${el.experience} </td>
                                <td> ${el.dietary} </td>
                                <td> ${el.language_translation} </td>
                                <td> ${el.languages} </td>
                                <td> ${el.first_check} </td>
                                <td> ${el.second_check} </td>
                                <td> ${el.guests} </td>
                                <td> ${el.lead} </td>
                                <td style="display: none;" > ${el.register_id} </td>
                               
                              </tr>
                              `);
                         });
                        infoUser.forEach(el => {
                            jQuery("#tabDLS").append(`  
                              <tr>
                                <td> ${el.first_name} </td>
                                <td> ${el.last_name} </td>
                                <td> ${el.job_title} </td>
                                <td> ${el.organization} </td>
                                <td> ${el.email_address} </td>
                                <td> ${el.experience} </td>
                                <td> ${el.dietary} </td>
                                <td> ${el.language_translation} </td>
                                <td> ${el.languages} </td>
                                <td> ${el.first_check} </td>
                                <td> ${el.second_check} </td>
                                <td> ${el.guests} </td>
                                <td> ${el.lead} </td>
                                <td style="display: none;" > ${el.register_id} </td>
                               
                              </tr>
                              `);
                         });
         } 
  });
}


$(document).ready(function() {
var valSelect;
var dataDLS = <?php echo json_encode($DLS);?>;
var dataBT = <?php echo json_encode($BT); ?>;
var dataCC = <?php echo json_encode($CC); ?>;
var dataOP = <?php echo json_encode($OP); ?>;

for (let i=1; i<=4; i++){
  $(`#dtBasicExample-${i}`).DataTable();
}



/*        Send Email         */


jQuery("#first-btn").click(function(){
  sendMail(dataBT, dataDLS);
});

jQuery("#second-btn").click(function(){
  sendMail(dataCC, dataDLS);
});

jQuery("#third-btn").click(function(){
  sendMail(dataOP, dataDLS);
});


});




function sendMail(val, dl){

  val.forEach(element => {
    jQuery.ajax({
    type: "GET",
    url: "http://bo-ica/api/send_email/registrations/"+element.id,
    dataType: 'jsonp',
    });
  
  dl.forEach(el => {
    if (el.register_id == element.id)
    jQuery.ajax({
    type: "GET",
    url: "http://bo-ica/api/send_email/delegates/"+el.id,
    dataType: 'jsonp',
    });
  });
  });
 swal("", "Invitation Letter has been sent", "success");

}

function paymentStatus(event, id){

 var dataTab = {
        "id" : id,
        "payment" : event,
    };
    jQuery.ajax({
      type: "POST",
      data: dataTab,
      url: "http://bo-ica/api/payment",
   
    });
  location.reload();
}
 

/*     Export table to excel       */ 

function s2ab(s) {
  var buf = new ArrayBuffer(s.length);
  var view = new Uint8Array(buf);
  for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
  return buf;
  }
$("#Expo").click(function(){
  $(".MP").remove();
  $('.payment').show();
  var wb = XLSX.utils.table_to_book(document.getElementById('dtBasicExample-1'), {sheet:"Sheet JS"});
  var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
  saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'tableUsers.xlsx');
  location.reload();
});

/*     on change select       */ 

$('#block-2, #block-3, #block-4, #first-btn, #second-btn, #third-btn').hide();
    $('#block-1, #Expo').show();
    $("#selectEvent").change(function() {
      valSelect = $('#selectEvent').children("option:selected").val();
    if(valSelect == 'transfer'){
      $('#block-1, #block-3, #block-4, #Expo, #second-btn, #third-btn').hide();
      $('#block-2, #first-btn').show();
    }
    else if(valSelect == 'card') {
      $('#block-1, #block-2, #block-4, #Expo, #first-btn, #third-btn').hide();
      $('#block-3, #second-btn').show();
    }
    else if(valSelect == 'onsite') {
      $('#block-1, #block-2, #block-3, #Expo, #first-btn, #second-btn').hide();
      $('#block-4, #third-btn').show();
    }
    else{
      $('#block-1, #Expo').show();
      $('#block-2, #block-3, #block-4, #first-btn, #second-btn, #third-btn').hide();
    }
    });

    $("table").removeClass("dataTable");
</script>
<?php $__env->stopSection(); ?>






<?php echo $__env->make('Shared.Layouts.Master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/ManageOrganiser/list.blade.php ENDPATH**/ ?>