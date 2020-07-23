@if(session()->has('errors'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#error').modal('show');
        });
    </script>
@endif
@if(session()->has('success'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#success').modal('show');
        });
    </script>
@endif
@if(session()->has('status'))
    <script type="text/javascript">
        $(window).on('load',function(){
            $('#delete').modal('show');
        });
    </script>
@endif

<!-- Modal error-->
<div id="error" class="modal fade" role="dialog">
    <div class="modal-dialog ">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{ 'فشلت العملية' }}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-danger text-right">
                    {{session('message')}}
                    {{ 'المنطقة موجودة مسبقا!' }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal success-->
<div id="success" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{ 'نجحت العملية' }}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-right">
                    {{ 'تم اضافة المنطقة' }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>

<!-- Modal delete-->
<div id="delete" class="modal fade" role="dialog">
    <div class="modal-dialog">
        <!-- Modal content-->
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"> {{ 'نجحت العملية' }}</h4>
            </div>
            <div class="modal-body">
                <div class="alert alert-success text-right">
                    {{ 'تم حذف المنطقة' }}
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">اغلاق</button>
            </div>
        </div>
    </div>
</div>
