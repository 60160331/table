<!--
* v_complain_type
* @Display Show type and status of compalin
* @input    $tp_id,$tp_compalin,$tp_active
* @output   type complain, type status 
* @author   Kittiya Yangso
* @create Date  2563-04-18
-->
<style>
    input[type=text]:disabled {
        background: #dddddd;
    }

    td {
        margin-top: 100px;
    }

    .switch {
        position: relative;
        display: inline-block;
        width: 60px;
        height: 30;
    }

    .switch input {
        opacity: 0;
        width: 0;
        height: 0;
    }

    .slider {
        position: absolute;
        cursor: pointer;
        top: 0;
        left: 0;
        right: 0;
        bottom: 0;
        background-color: #ccc;
        -webkit-transition: .4s;
        transition: .4s;
    }

    .slider:before {
        position: absolute;
        content: "";
        height: 26px;
        width: 30px;
        left: 4px;
        bottom: 0px;
        background-color: white;
        -webkit-transition: .4s;
        transition: .4s;
    }

    input:checked+.slider {
        background-color: green;

    }

    input:focus+.slider {
        box-shadow: 0 0 1px green;
    }

    input:checked+.slider:before {
        -webkit-transform: translateX(26px);
        -ms-transform: translateX(26px);
        transform: translateX(26px);
    }

    .slider.round {
        border-radius: 30px;
    }

    .slider.round:before {
        border-radius: 50%;
    }

    .nav-item {
        cursor: pointer;
    }
</style>

<script>
    $(document).ready(function() {
        $('.del-config').click(function() {
            Swal.fire({
                title: 'ลบประเภทความคิดเห็นหรือไม่',
                type: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#4caf50',
                cancelButtonColor: '#f44336',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'ลบประเภทความคิดเห็นเสร็จสิ้น',
                        type: 'success',
                        confirmButtonColor: '#999999',
                        confirmButtonText: 'ปิด'
                    }).then((result) => {
                        type_complain_delete($(this).val());
                    });
                }
                
            });
        });
        $('.edit').click(function() {
            let id = $(this).val();
            Swal.fire({
                title: 'แก้ไขประเภทความคิดเห็น',
                input: 'text',  
                id: 'type',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonColor: '#4caf50',
                cancelButtonColor: '#f44336',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'                 
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'แก้ไขประเภทความคิดเห็นแล้ว',
                        text:result.value,
                        type: 'success',
                        confirmButtonColor: '#999999',
                        confirmButtonText: 'ปิด'
                    }).then((result) => {
                        
                    });
                    edit_type_complain(id, result.value);
                }
                
            });
        });
  $('.insert').click(function() {
            let id = $(this).val();
            Swal.fire({
                title: 'เพิ่มประเภทความคิดเห็น',
                text : 'โปรดกรอกประเภทความคิดเห็น',
                input: 'text',  
                id: 'cp',
                inputAttributes: {
                    autocapitalize: 'off'
                },
                showCancelButton: true,
                confirmButtonColor: '#4caf50',
                cancelButtonColor: '#f44336',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'                 
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'แก้ไขประเภทความคิดเห็นแล้ว',
                        text:result.value,
                        type: 'success',
                        confirmButtonColor: '#999999',
                        confirmButtonText: 'ปิด'
                    }).then((result) => {
                        
                    });
                    type_complain_insert(result.value);
                }
                
            });
        });
    });



    function type_complain_delete(tp_id) {
        $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/ffm/backend/Type_complain/type_complain_delete_ajax"); ?>",
                data: {
                    tp_id: tp_id
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
        })
    }
    function edit_type_complain(tp_id, val) {
        $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/ffm/backend/Type_complain/edit_type_complain_ajax"); ?>",
                data: {
                    tp_id: tp_id,
                    tp_complain: val
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
        })
    }
    function type_complain_insert(val){
        $.ajax({
                type: "POST",
                url: "<?php echo base_url("index.php/ffm/backend/Type_complain/type_complain_insert_ajax"); ?>",
                data: {
                    tp_complain:val
                },
                dataType: "json",
                success: function(response) {
                    location.reload();
                }
        })
    }

    $('.change').click(function() {
            let id = $(this).val();
            var checkStatus = this.checked ? 'Y' : 'N';

            Swal.fire({
                title: 'เปิดการใช้งานประเภทความคิดเห็นหรือไม่?',
                input: 'text',  
                id: 'type',
                showCancelButton: true,
                confirmButtonColor: '#4caf50',
                cancelButtonColor: '#f44336',
                confirmButtonText: 'ตกลง',
                cancelButtonText: 'ยกเลิก'                 
            }).then((result) => {
                if (result.value) {
                    Swal.fire({
                        title: 'เปิดการใช้งานประเภทความคิดเห็นเสร็จสิ้น',
                        text:result.value,
                        type: 'success',
                        confirmButtonColor: '#999999',
                        confirmButtonText: 'ปิด'
                    }).then((result) => {
                        
                    });
                    type_compalin_change_status(id, checkStatus);
                }
                
            });
        });
    function type_compalin_change_status(tp_id,val) {
        $.ajax({
            type: "POST",
            url: "<?php echo base_url("index.php/ffm/backend/Type_complain/type_complain_change_status_ajax"); ?>",
            data: {

                    tp_id:tp_id,
                    tp_active:val              
                },
            dataType: "json",
            success: function(result) {}
        });
    }
//------------------------------------
    $(document).ready(function() {
    $('#complain-type-table').DataTable();
} );

</script>

<button class="btn btn-primary insert" rel="tooltip" data-placement="top" title="" data-original-title="คลิกเพื่อเพิ่มข้อมูล" aria-describedby="tooltip391052">
    <span class="btn-label"><i class="material-icons">add</i></span> เพิ่มประเภทความคิดเห็น
</button>
     

<div class="col-md-12">
    <div class="card">
        <div class="card-header card-header-info card-header-icon">
            <div class="card-icon">
                <i class="material-icons">assignment</i>
            </div>
            <h4 class="card-title">ความคิดเห็น</h4>
        </div>
        <div class="card-body">
            <div class="panel panel-info">
                <div class="material-datatables">
                    <table id='complain-type-table' class="table table-striped table-color-header table-hover table-border datatables" cellspacing="0" width="100%" style="width:100%">
                        <thead class="text-primary">
                            <tr>
                                <th class="sorting" tabindex="0" aria-controls="datatables" rowspan="1" colspan="1" style="width: 120px;" aria-label="Date: activate to sort column ascending">ลำดับ</th>
                                <th>ประเภทความคิดเห็น</th>
                                <th>สถานะ</th>
                                <th class="disabled-sorting">ดำเนินการ</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <?php $index = 0;
                                foreach ($rs_complain as $key) {
                                    $index++
                                ?>
                                    <td class='text-center'><?php echo $index; ?></td>
                                    <td class='text-center'><?php echo $key->tp_complain; ?></td>
                                    <td class="text-center" rowspan="<?php echo count($key); ?>">
                                        <div class="togglebutton " >
                                            <label class="switch">
                                                <input  type="checkbox" value="<?php echo $key->tp_id; ?>" <?php echo ($key->tp_active == 'Y') ? 'checked' : ''; ?>>
                                                <span class="toggle"></span>
                                            </label>
                                            <input id="cm_status" type="hidden" class="cm_use">
                                        </div>
                                    </td>
                                    <!-- <td class='text-center'><?php echo $key->tp_active ?><span class ="togglebutton label"></td> -->
                                    <td rowspan="<?php echo count($key); ?>" class="td-actions text-center">
                                        <?php if ($key->tp_active == 'Y') { ?>
                                            <button disabled type="button" rel="tooltip" class="btn btn-warning edit" data-placement="top" data-original-title="คลิกเพื่อแก้ไขข้อมูล" value="<?php echo $key->tp_id?>">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button disabled type="button" rel="tooltip" class="btn btn-danger " data-placement="top" value="<?php echo $key->tp_id; ?>" data-original-title="คลิกเพื่อลบข้อมูล">
                                                <i class="material-icons">close</i>
                                            </button>
                                        <?php } else { ?>
                                            <button type="button" value="<?php echo $key->tp_id; ?>"rel="tooltip" class="btn btn-warning edit" data-placement="top" data-original-title="คลิกเพื่อแก้ไขข้อมูล" value="<?php echo $key->tp_id?>">
                                                <i class="material-icons">edit</i>
                                            </button>
                                            <button type="button" value="<?php echo $key->tp_id; ?>" rel="tooltip" class="btn btn-danger del-config" data-placement="top" data-original-title="คลิกเพื่อลบข้อมูล">
                                                <i class="material-icons">close</i>
                                            </button>
                                        <?php } ?>
                                    </td>
                            </tr>
                        <?php
                                }
                        ?>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="d-flex justify-content-start col-md-6">
                <a href="<?php echo base_url() . 'index.php/ffm/backend/Home'; ?>" class="btn btn-inverse">
                    ย้อนกลับ
                </a>
            </div>
        </div>
    </div>
</div>



</span>