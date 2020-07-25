<?php
 $alert=$message=$status=null;
?>
@if(session()->has('status'))
    @switch(session('status'))

        @case('areaDeleted')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#modal').modal('show');
            });
        </script>
        <?php $message = 'تم حذف المنطقة'; $alert ='alert-success'; $status='نجحت العملية'?>
        @break(true)

        @case('areaInsert success')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#modal').modal('show');
            });
        </script>
        <?php $message = 'تم اضافة منطقة'; $alert ='alert-success'; $status='نجحت العملية'?>
        @break(true)

        @case('hqmcm_id')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#modal').modal('show');
            });
        </script>
        <?php $message = 'غير مسموح بتكرار رقم المنطقة'; $alert ='alert-danger'; $status='فشل التعديل'?>
        @break(true)


        @case('areaInsert Failure')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#modal').modal('show');
            });
        </script>
        <?php $message = 'المنطقة موجودة مسبقا!'; $alert ='alert-danger'; $status='فشلت العملية'?>
        @break(true)

        @case('areaUpdate success')
        <script type="text/javascript">
            $(window).on('load', function () {
                $('#modal').modal('show');
            });
        </script>
        <?php $message = 'تم تحديث بيانات المنطقة'; $alert ='alert-success'; $status='نجح التعديل'?>
        @break(true)



    @endswitch

@endif

<!-- Modal status-->
<div id="modal" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{ $status }}</h4>
            </div>
            <div class="modal-body">
                <div class="alert {{$alert}}  text-right">
                    {{ $message }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
