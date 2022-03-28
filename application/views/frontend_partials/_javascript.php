<script type="text/javascript" src="<?php echo base_url('assets/public/js/jquery-3.3.1.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/js/popper.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/bootstrap-4/js/bootstrap.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/fancybox/jquery.fancybox.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/tinymce/jquery.tinymce.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/tinymce/tinymce.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/select2/js/select2.min.js'); ?>"></script>
<script type="text/javascript" src="<?php echo base_url('assets/public/libs/jquery-ui/jquery-ui.min.js'); ?>"></script>

<script type="text/javascript" src="<?php echo base_url('assets/public/libs/DataTables/datatables.min.js'); ?>"></script>
<script type="text/javascript">
    function loadKelurahan()
    {
        var kecamatan = $("#kecamatan_id").val();
        $.ajax({
            type:'GET',
            url:"<?php echo base_url('perizinan/kelurahan'); ?>",
            data:"id=" + kecamatan,
            success: function(html)
            {
                $("#kelurahan_id").html(html);
            }
        });
    }
    jQuery(document).ready(function(){
        $('#pengajuan_tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#survei_tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#rekomendasi_tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#perbaikan_tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#telaah_tgl').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#tgl_mulai').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });
        $('#tgl_sampai').datepicker({
            changeMonth: true,
            changeYear: true,
            dateFormat: 'dd-mm-yy'
        });

        $('.selectFilter').select2();
        //Data Tables
        $('.data1').DataTable({
            'scrollX': true,
            'scrollCollapse': true,
            'scroller': {
                loadingIndicator: false
            }
        });
        $('.data2').DataTable({
            'paging'      : true,
            'lengthChange': false,
            'searching'   : false,
            'ordering'    : true,
            'info'        : true,
            'autoWidth'   : false
        });

        tinymce.init({
            selector: '#myeditor',
            menubar: false,
            theme: 'modern',
            height: 200,
            plugins: [
                'advlist autolink link image lists charmap print preview hr anchor pagebreak spellchecker',
                'searchreplace wordcount visualblocks visualchars code fullscreen insertdatetime media nonbreaking',
                'save table contextmenu directionality emoticons template paste textcolor responsivefilemanager code'
            ],
            toolbar1: "undo redo | bold italic underline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent | styleselect",
            toolbar2: "| responsivefilemanager | link unlink anchor | image media | forecolor backcolor  | print preview code ",
            image_advtab: true,
            external_filemanager_path:"<?php echo base_url('assets/public/libs/'); ?>filemanager/",
            filemanager_title:"Responsive Filemanager" ,
            external_plugins: { "filemanager" : "../filemanager/plugin.min.js"}
        });

        $('[data-fancybox]').fancybox({
            iframe : {
                preload : false,
                css : {
                    width : '900px',
                    height: '500px',
                    type		: 'iframe',
                    autoScale    	: false
                }
            }
        });
        function OnMessage(e){
            var event = e.originalEvent;
            // Make sure the sender of the event is trusted
            if(event.data.sender === 'responsivefilemanager'){
                if(event.data.field_id){
                    var fieldID=event.data.field_id;
                    var url=event.data.url;
                    $('#'+fieldID).val(url).trigger('change');
                    $.fancybox.close();

                    // Delete handler of the message from ResponsiveFilemanager
                    $(window).off('message', OnMessage);
                }
            }
        }

        // Handler for a message from ResponsiveFilemanager
        $('.opener-class').on('click',function(){
            $(window).on('message', OnMessage);
        });

        $(window).scroll(function() {
            if ($(this).scrollTop() >= 50) {
                $('#return-to-top').fadeIn(200);
            } else {
                $('#return-to-top').fadeOut(200);
            }
        });
        $('#uploadServer').click(function() {
            alert('Upload data to Server');
        });
        $('#downloadServer').click(function() {
            alert('Download data from Server');
        });
        $('#return-to-top').click(function() {
            $('body,html').animate({
                scrollTop : 0
            }, 500);
        });
    });

</script>