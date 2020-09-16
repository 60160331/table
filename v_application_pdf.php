<!--
* v_application_pdf
* @Description	Show PDF
* @Input		Form info
* @Output	PDF Form
* @author	Chonlada Thongyoy
* @Create Date	2562-08-30
* @Update	Weerapong Sooksangacharoen	
* @Update Date	2562-09-26
-->

<style type="text/css">
    .tg {
        border: 0;
        border-spacing: 0;
    }

    .tg td {
        font-family: Arial, sans-serif;
        font-size: 14px;
        padding: 10px 5px;
    }

    .tg th {
        font-family: Arial, sans-serif;
        font-size: 14px;
        font-weight: normal;
        padding: 10px 5px;
    }

    .tg .tg-0lax {
        text-align: left;
        vertical-align: top;
    }

    .header-text {
        text-align: center !important;
        font-size: 25px;
    }

    li {
        padding-bottom: 10px !important;
    }
</style>
<table class="tg" width="100%">
    <tr heigth="300">
        <td class="tg-0lax" colspan="2" style="text-align: center;">
            <h4>ใบสมัครสมาชิกศูนย์นันทนาการเพื่อประชาชน</h4>
        </td>
    </tr>
    <tr>
        <td></td>
        <td>
            <!-- <img src=""> -->
        </td>
    </tr>
    <tr style="height: 0px">
        <td colspan="2">
            <hr>
        </td>
    </tr>
    <tr>
        <td>            
            &emsp;&emsp;&emsp;&emsp;&emsp;รหัสสมาชิก<br><br>
            <?php echo str_pad((isset($qu_data_person->su_code) ? $qu_data_person->su_code : $su_code), 50, ".", STR_PAD_BOTH); ?>
        </td>
        <td colspan="2" class="tg-0lax" style="text-align: right;">
            วันที่ <?php echo fullDateTH3(Date('Y/m/d')); ?>
        </td>
    </tr>
    <tr>
        <td class="tg-0lax text-box" colspan="2" style="line-height: 1.5">
            ชื่อ <?php echo $qu_data_person->full_name; ?> &emsp;&emsp; เกิดวันที่ <?php echo fullDateTH3($qu_data_person->psd_birthdate); ?>
            <br><br>
            อายุ <?php echo calAge3($qu_data_person->psd_birthdate); ?>&nbsp; ปี &emsp;อาชีพ <span id="application_su_work"><?php echo $post_data['app_su_work']; ?></span>
            <br><br>
            สถานที่ทำงาน/สถานศึกษา <span id="application_su_workplace"><?php echo $post_data['app_su_workplace']; ?></span>
            <br><br>
            ที่อยู่ปัจจุบัน <?php echo $qu_data_person->psd_addcur_no; ?>&nbsp;ตำบล<?php echo $qu_data_person->dist_name ?><br><br>
            อำเภอ<?php echo $qu_data_person->amph_name; ?>
            &nbsp;จังหวัด<?php echo $qu_data_person->pv_name; ?>
            &emsp;โทร <?php echo $qu_data_person->psd_cellphone; ?>
            <br><br>
            ผู้ปกครองหรือบุคคลอ้างอิงที่สามารถติดต่อได้
            <br><br>
            ชื่อ <span id="application_su_contact_fname"><?php echo $post_data['app_su_contact_fname']; ?></span>
            &nbsp;<span id="application_su_contact_lname"><?php echo $post_data['app_su_contact_lname']; ?></span> &emsp;
            โทร <span id="application_su_tel_contact"><?php echo $post_data['app_su_tel_contact']; ?></span>
            <br><br>
            <p>
                &emsp;&emsp;&emsp;&emsp;มีความประสงค์จะสมัครสมาชิก เพือเข้าใช้ศูนย์นันทนาการเพื่อประชาชน
                <br><br>
                &emsp;&emsp;&emsp;&emsp;ข้าพเจ้าได้ทราบระเบียบการปฎิบัติเกี่ยวกับการใช้ศูนย์กีฬาและอุปกรณ์อำนวยความสะดวกประจำสนามกีฬาของเทศบาลฯ&nbsp;เป็นที่เข้าใจดีแล้ว&emsp;ทั้งนี้ในการใช้สนามกีฬาต่างๆ&nbsp;ให้อยู่ในความรับผิดชอบของข้าพเจ้าเองและจะไม่ก่อให้เกิดความผูกพันหรือความผูกพันหรือความรับผิดชอบแก่เทศบาลตำบลบางปลาในทางกฎหมายไม่ว่าในกรณีใดๆ&emsp;และข้าพเจ้าจะไม่เรียกร้องสิทธิ์ใดๆ&nbsp;ทั้งสิ้น
                <br><br>
                &emsp;&emsp;&emsp;&emsp;ข้าพเจ้ารับรอง ข้อความข้างต้นนี้เป็นความจริงทุกประการเเละจะถือตามระเบียบโดยเคร่งครัด
            </p>
        </td>
    </tr>
    <tr>
        <td style="height: 10px;"></td>
    </tr>

    <tr>
        <td class="tg-0lax" rowspan="1" style="width:50%;text-align: center;border-top: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
            <span><b>หลักฐานการสมัคร</b></span>
        </td>
        <td class="tg-0lax" style="text-align: center;">
            ลงชื่อ&nbsp;(<?php echo str_pad('_', 28, "_", STR_PAD_BOTH); ?>)&nbsp;ผู้สมัคร<br><br>
            (<?php echo str_pad('_', 30, "_", STR_PAD_BOTH); ?>)
        </td>
    </tr>

    <tr>
        <td class="tg-0lax" rowspan="1" style="width:50%;text-align: left;border-bottom: 1px solid black;border-left: 1px solid black;border-right: 1px solid black;">
            <ol style="text-align: left !important;">
                <li>ใบสมัครที่กรอกข้อมูลครบถ้วนแล้ว</li>
                <li>รูปถ่ายหน้าตรงไม่สวมหมวก 1 นิ้ว 2 รูป</li>
                <li>สำเนาบัตรประชาชน</li>
                <li>เงินค่าสมัคร</li>
            </ol>
        </td>
        <td class="tg-0lax" style="text-align: center;vertical-align: bottom;">สำหรับเจ้าหน้าที่<br>
            ได้ตรวจสอบหลักฐานถูกต้องแล้ว<br><br>
            ลงชื่อ&nbsp;(<?php echo str_pad('_', 25, "_", STR_PAD_BOTH); ?>)&nbsp;ผู้ตรวจสอบ<br><br>
            <span style="line-height: 50px;">(<?php echo str_pad('_', 30, "_", STR_PAD_BOTH); ?>)</span>
        </td>
    </tr>
</table>