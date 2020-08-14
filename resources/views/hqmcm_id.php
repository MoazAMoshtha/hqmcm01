<script type="text/javascript">
    $(window).on('load', function () {
        $('#modal').modal('show');
    });
</script>
<!-- Modal status-->
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{ رقم المستخدم الخاص بتسجيل الدخول }}</h4>
            </div>
            <div class="modal-body">
                <div class="alert-success  text-right">
                    {{ $hqmcm_id }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
