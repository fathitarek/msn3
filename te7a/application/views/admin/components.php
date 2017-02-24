<!-- ==================== MASTER ACTIONS ROW ==================== -->
<div class="row-fluid">
    <!-- ==================== MASTER ACTIONS LIST ==================== -->
    <ul class="masterActions">
        <?php if (in_array(1, $modules)) { ?>
            <li class="active">
                <a href="<?php echo base_url(); ?>accessories/accessories_management">
                    <i class="icon-envelope redText"></i>
                    <h1 class="redText">الاكسسوارات</h1>
                    <p>إدارة الإكسسوارات</p>
                    <div class="notifyCircle red">12</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(4, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>model/model_management">
                    <i class="icon-signal cyanText"></i>
                    <h1 class="cyanText">الموديلات</h1>
                    <p>إدارة الموديلات</p>
                    <div class="notifyCircle cyan">3</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(5, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>accounts/accounts_management">
                    <i class="icon-umbrella greenText"></i>
                    <h1 class="greenText">حسابات الدخول على النظام</h1>
                    <p><a href="<?php echo base_url(); ?>accounts/accounts_management/add">حساب جديد</a></p>
                    <!--                                <div class="notifyCircle green">254</div>-->
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(3, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>permissions/permissions_management">
                    <i class="icon-book orangeText"></i>
                    <h1 class="orangeText">الصلاحيات</h1>
                    <p>تحديد الصلاحيات لحسابات الدخول على النظام</p>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(2, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>cheques/cheques_management">
                    <i class="icon-cogs greyText"></i>
                    <h1 class="greyText">الشيكات البنكية</h1>
                    <p><a href="<?php echo base_url(); ?>cheques/cheques_management/add">اضافة شيك جديد</a></p>
                    <div class="notifyCircle grey">2</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(8, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>settings/settings_management">
                    <i class="icon-cog redText"></i>
                    <h1 class="redText">الإعدادات الرئيسية للموقع</h1>
                    <p>تعديل الاعدادات</p>
                    <div class="notifyCircle blue">2</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(6, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>client_supplier/cs_management">
                    <i class="icon-cog"></i>
                    <h1 class="greyText">العملاء والموردين</h1>
                    <p><a href="<?php echo base_url(); ?>client_supplier/cs_management/add">عميل  / مورد جديد</a></p>
                    <div class="notifyCircle grey"></div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(7, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>cloth/cloth_management">
                    <i class="icon-picture orangeText"></i>
                    <h1 class="orangeText">القماش</h1>
                    <p>إدارة القماش</p>
                    <div class="notifyCircle orange">2</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(9, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>expenses/expenses_management">
                    <i class="icon-cogs greyText"></i>
                    <h1 class="greyText">دفتر اليومية</h1>
                    <p><a href="<?php echo base_url(); ?>expenses/expenses_management/add">اضافة بيان جديد</a></p>
                    <div class="notifyCircle grey">1</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(10, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>factories/factories_management">
                    <i class="icon-cogs greyText"></i>
                    <h1 class="greyText">المصانع</h1>
                    <p><a href="<?php echo base_url(); ?>factories/factories_management/add">إضافة مصنع جديد</a></p>
                    <div class="notifyCircle grey">1</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(12, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>general_manager_pushes/general_manager_pushes_management">
                    <i class="icon-money blue"></i>
                    <h1 class="blue">دفعات المصنع الرئيسي</h1>
                    <p><a href="<?php echo base_url(); ?>general_manager_pushes/general_manager_pushes_management/add">إضافة دفعة جديدة</a></p>
                    <div class="notifyCircle blue">1</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(11, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>push/push_management">
                    <i class="icon-gear blue"></i>
                    <h1 class="blue">سلف المصانع</h1>
                    <p><a href="<?php echo base_url(); ?>push/push_management/add">إضافة سلفة جديدة</a></p>
                    <div class="notifyCircle blue">1</div>
                </a>
            </li>
        <?php } ?>

        <?php if (in_array(13, $modules)) { ?>
            <li>
                <a href="<?php echo base_url(); ?>employee/employee_management">
                    <i class="icon-signal cyanText"></i>
                    <h1 class="cyanText">الموظفين</h1>
                    <p>إدارة بيانات الموظفين</p>
                    <div class="notifyCircle cyan">3</div>
                </a>
            </li>
        <?php } ?>
    </ul>
    <!-- ==================== END OF MASTER ACTIONS LIST ==================== -->
</div>
<!-- ==================== END OF MASTER ACTIONS ROW ==================== -->