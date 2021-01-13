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
        





        <table id="tableAllUsers" style="width:100%; height: 80vh; overflow:auto; display:block;" class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
              <th class="th-sm">Price</th>
              <th class="th-sm">Payment method</th>
              <th class="th-sm">Payment status</th>
             
            </tr>
          </thead>
          <tbody>
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
              <th class="th-sm">Payment status</th>
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
              
              <td> 
                <?php if(($user->eventP != null)||($user->eventS != null)||($user->eventG != null)||($user->eventW != null)): ?>
                <?php echo e($user->eventS); ?> 
                <?php echo e($user->eventP); ?> 
                <?php echo e($user->eventG); ?> 
                <?php echo e($user->eventW); ?>

                <?php endif; ?>
              </td>
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
              <td> <?php echo e($user->payment_status); ?></td>
            </tr>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
          </tbody>
        </table>
      </div>
      <div id="block-3" class="block">
        <table id="tableUsersCC" style="width:100%;overflow:auto; display:block;"  class="table table-striped table-bordered table-sm" cellspacing="0" width="100%">
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
              <th class="th-sm">Payment status</th>
            </tr>
          </thead>
          <tbody>
            
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
              <th class="th-sm">Payment status</th>

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
              
                <td> 
                  <?php if(($user->eventP != null)||($user->eventS != null)||($user->eventG != null)||($user->eventW != null)): ?>
                  <?php echo e($user->eventS); ?> 
                  <?php echo e($user->eventP); ?> 
                  <?php echo e($user->eventG); ?> 
                  <?php echo e($user->eventW); ?>

                  <?php endif; ?>
                </td>
                
              
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
              <td> <?php echo e($user->payment_status); ?></td>
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
var direction = 'http://127.0.0.1:8000';



function listDelegate(val){ 

  jQuery.ajax({
        type: "GET",
        url: direction + "/api/checkuser/" + val,
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
                                <td> 
                                  
                                  ${el.lead} 
                                  
                                </td>
                                <td style="display: none;" > ${el.register_id} </td>
                               
                              </tr>
                              `);
                         });
         } 
  });
}


$(document).ready(function() {
var valSelect;
// var dtu = [];
// var dtD = [];
var dataDLS = <?php echo json_encode($DLS); ?>;
var dataBT = <?php echo json_encode($BT); ?>;
var dataCC = <?php echo json_encode($CC); ?>;
var dataOP = <?php echo json_encode($OP); ?>;
var dataUsers = <?php echo json_encode($users); ?>;


for (let i=1; i<=4; i++){
  $(`#dtBasicExample-${i}`).DataTable();
}


paymentLogin(dataCC, dataUsers,0);


/*        Send Email         */


jQuery("#first-btn").click(function(){
  if(dataBT.length == 0){
    swal("", "No data available in table", "error");
  }else{
    sendMail(dataBT, dataDLS);
  }
});

jQuery("#second-btn").click(function(){
  if(dataCC.length == 0){
    swal("", "No data available in table", "error");
  }else{
  sendMail(dataCC, dataDLS);
  }
});

jQuery("#third-btn").click(function(){
  if(dataOP.length == 0){
    swal("", "No data available in table", "error");
  }else{
  sendMail(dataOP, dataDLS);
  }
});


/*        Export xl         */

// jQuery("#Expo").click(function(){
//   dataUsers.forEach(element => dtu.push(element));
//   dataDLS.forEach(element => dtD.push(element));
//   dtBasicExample=trietab(dtu,dtD);
//   exportXL(dtBasicExample);
// });

});



function initUsers(){
  var tab = [];
  var tabDEL = [];
  jQuery.ajax({
  type: "GET",
  url: direction + "/api/allusers",
    success:  function(data) {
      tab = data.data_user;
      tabDEL = data.data_delegate;
      var el;
      var Spay;
      var Mpay;
      var t = $('#tableAllUsers').DataTable();
      var tbCC = $('#tableUsersCC').DataTable();
        for (let i=0; i < tab.length; i++){
          if(tab[i].membership != null){
            el = `<button onclick="listDelegate(${tab[i].id})" class="popup" id="${ tab[i].id }"> ${ tab[i].membership } </button> `
          }else{
            el = tab[i].membership;
          }
          if(tab[i].mode_payment != 'Credit Card'){
            if(tab[i].payment_status == 'Pending'){
            Spay =  `<select onchange="paymentStatus(this.value,${ tab[i].id })" class="MP">
                      <option selected> Pending</option>
                      <option> Successful</option>
                    </select>`
            }else{
              Spay =  `<select onchange="paymentStatus(this.value,${ tab[i].id })" class="MP">
                      <option> Pending</option>
                      <option selected> Successful</option>
                    </select>`
            }
          }else{
            Spay = tab[i].payment_status;
            tbCC.row.add([
              tab[i].first_name,
              tab[i].last_name,
              tab[i].registration_as,
              tab[i].membership_number,
              el,
              tab[i].email_address,
              tab[i].eventS,
              tab[i].postal_address,
              tab[i].job_title,
              tab[i].organization,
              tab[i].country,
              tab[i].dietary,
              tab[i].experience,
              tab[i].language_translation,
              tab[i].languages,
              tab[i].first_check,
              tab[i].second_check,
              tab[i].guests,
              tab[i].price,
              tab[i].mode_payment,
              tab[i].payment_status
            ]).draw( false );
          }
          if(tab[i].mode_payment == 'edit'){
            Mpay =  "Free";
          }else{
            Mpay =  tab[i].mode_payment;
          }
          t.row.add([
              tab[i].id,
              tab[i].first_name,
              tab[i].last_name,
              tab[i].registration_as,
              tab[i].membership_number,
              el,
              tab[i].email_address,
              tab[i].eventS,
              tab[i].postal_address,
              tab[i].job_title,
              tab[i].organization,
              tab[i].country,
              tab[i].dietary,
              tab[i].experience,
              tab[i].language_translation,
              tab[i].languages,
              tab[i].first_check,
              tab[i].second_check,
              tab[i].guests,
              tab[i].price,
              Mpay,
              Spay
            ]).draw( false );
        }
    }
  });
  /*        Export xl         */

jQuery("#Expo").click( async function(){
  var dtu = [];
  var dtD = [];
  tab.forEach(element => dtu.push(element));
  tabDEL.forEach(element => dtD.push(element));
  dtBasicExample = await trietab(dtu,dtD);
  exportXL(dtBasicExample);

});
}

function trietab(tab, tt){
  
  datatab=[];
  for (let i = 0; i < tab.length; i++) {
    delete tab[i].password ;
    delete tab[i].created_at ;
    delete tab[i].updated_at ;
    datatab.push(tab[i]);
    for (let j = 0; j < tt.length; j++) {
      if(tab[i].id == tt[j].register_id){
        tt[j].id = tt[j].register_id;
        tt[j].country = tab[i].country;
        tt[j].postal_address = tab[i].postal_address;
        tt[j].price = tab[i].price;
        tt[j].mode_payment = tab[i].mode_payment;
        tt[j].payment_status = tab[i].payment_status;
        tt[j].registration_as = tab[i].registration_as;
        tt[j].membership_number = tab[i].membership_number;
        tt[j].membership = tab[i].membership;
        delete tt[j].register_id ;
        delete tt[j].created_at ;
        delete tt[j].updated_at ;
        datatab.push(tt[j]);
      }
    }
  }
  return datatab;
}


function sendMail(val, dl){

  val.forEach(element => {
    
    jQuery.ajax({
    type: "POST",
    data: {
      "id" : element.id,
      "table" : "registrations",
      "paiment" : element.mode_payment
    },
    url: direction + "/api/email",
    dataType: 'json',
    });
  
  dl.forEach(el => {
    if (el.register_id == element.id)
    jQuery.ajax({
    type: "POST",
    data: {
      "id" : el.id,
      "table" : "delegates",
      "paiment" : element.mode_payment
    },
    url: direction + "/api/email",
    dataType: 'json',
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
      url: direction + "/api/payment",
    });
 

}



/*     Export table to excel       */ 


function s2ab(s) {
  var buf = new ArrayBuffer(s.length);
  var view = new Uint8Array(buf);
  for (var i=0; i<s.length; i++) view[i] = s.charCodeAt(i) & 0xFF;
  return buf;
  }

function exportXL(data){
  $('.MP').remove();
  $('.payment').show();
  var wb = XLSX.utils.table_to_book(document.getElementById('tableAllUsers'), {sheet:"SheetJS"});
  var wb2 = XLSX.utils.json_to_sheet(data, {sheet:"Sheet JS"});
  wb.Sheets.SheetJS = wb2; 
  var wbout = XLSX.write(wb, {bookType:'xlsx', bookSST:true, type: 'binary'});
  saveAs(new Blob([s2ab(wbout)],{type:"application/octet-stream"}), 'tableUsers.xlsx');
  location.reload();
}


/*     login for payment      */ 
function paymentLogin(tab, dataAll,i=0) {
  let token;
  let id
  if(tab.length != 0){
    id = tab[i].id;
  }else{
    id = null;
  }
   jQuery.ajax({
        type: "POST",
        url: "https://uat.ntravel.ae/api/Login",
        data: JSON.stringify({
        'username': "inforapi",
        'password': "inforapiuat"
        }),
        contentType: "application/json",
        dataType: 'json',
        success: function(data) {
          token =  data.token;
          jQuery.ajax({
              type: "POST",
              url: "https://uat.ntravel.ae/api/GatewayPayment",
              data: JSON.stringify({
              'reference_number': id
              }),
              contentType: "application/json",
              dataType: 'json',
              headers: {
                "authorization_token": token,
                "authorization": "Basic aW5mb3JhcGk6aW5mb3JhcGl1YXQ=",
              },
              success: function(data) {
                if(data.gatewaypaymentresponse.length != 0){
                  jQuery.ajax({
                    type: "POST",
                    data: {"id" : id, "payment" : 'Successful'},
                    url: direction + "/api/payment",
                    success: function(data) {
                      if(i<tab.length-1){
                        paymentLogin(tab , dataAll, ++i)
                      }else{             
                        initUsers(dataAll);
                      }
                    }
                  });
                }else{
                  
                  if(i<tab.length-1){
                    paymentLogin(tab, dataAll, ++i)
                  }else{             
                    initUsers(dataAll);
                  }
                }
              }
          });
        }
    });
}



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