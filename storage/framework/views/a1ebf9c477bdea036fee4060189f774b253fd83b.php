
<html>
<head>
    <title>NiceSnippets</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
       <meta http-equiv="Content-Type" content="text/html; charset=UTF-8"/>
       <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
       <style type="text/css">
           * { 
                font-family: DejaVu Sans, sans-serif;
                direction: rtl !important;
                }
       </style>
</head>
<body>
    <fieldset class="" id="viewFive" style=" width: 100%; margin-left: auto; margin-right: auto; display: block; left: 0%; opacity: 1;">
        <div>
            <div class="bg-txt boxStyle-2" style="width:100%">
                <div id="pdfBlock" style="width:100%">
                    <div style="text-align: center; padding: 20px 115px; background-color: #f0f0f2; box-shadow: 0px 8px 20px 3px #eee;">
                        <img src="https://front-ica.digitalresearch.ae/wp-content/uploads/2019/07/Groupe-10387.png" style="text-align: center;" class="rounded mx-auto d-block style-img">
                        <p class="pre-registration" data-translate="bold_parag" style="text-align: center;"> </p>
                        <p class="parag registered" data-translate="bold_parag-2" style="text-align: center; display: none;">شكل توضع الفقرات في الصفحة التي يقرأها </p>
                        <p class="parag Preregistered" data-translate="successfully" style="text-align: center; display: block;">لقد تم تسجيلك مسبقًا بنجاح</p>
                        <p class="pre-registration Preregistered" data-translate="pre-registration" id="txt-In-order" style="text-align: center; display: block;">لإكمال التسجيل ، يرجى إجراء التحويل المصرفي إلى تفاصيل الحساب في فاتورتك ، مع تحديد رقم الفاتورة في موضوع الطلب</p>
                        <p data-translate="below_parag" class="parag Preregistered" style="text-align: center; display: block;">يرجى الاطلاع على ملخص التسجيل المسبق الخاص بك</p>
                        <p data-translate="below_parag2" class="parag registered" style="text-align: center; display: none;"></p>
                        <div id="dataReq">
                          
                                
                                <?php echo $title ?>
                           
                        </div>
                        
                        

                        <p id="txtPayment">Please make sure to send your payment by bank transfer at the earliest opportunity to complete your registration payment at the rate you have pre-registered.</p>
                    </div>
                </div>
                <div>

                </div>
            </div>

    </fieldset>

</body>
<script>
    
    jQuery(document).ready(function(){
        console.log("test");
        // jQuery("#dataReq").empty();
        
    });
</script>
</html><?php /**PATH C:\wamp64\www\laravel\ica-backoffice\resources\views/pdf.blade.php ENDPATH**/ ?>