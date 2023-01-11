<?php
$id = intval($_GET['id']);
$chi_tiet_don_hang = mysqli_query($con, "SELECT * FROM tbl_giaodich where don_hang_id = $id");
?>
<!-- top Products -->
<div class="ads-grid py-sm-5 py-4">
    <div class="container py-xl-4 py-lg-2">
        <!-- tittle heading -->
        <h3 class="tittle-w3l text-center mb-lg-5 mb-sm-4 mb-3">Xem đơn hàng</h3>
        <!-- //tittle heading -->
        <div class="row">
            <!-- product left -->
            <div class="agileinfo-ads-display col-lg-9">
                <div class="wrapper">
                    <!-- first section -->
                    <table class="table table-border">
                        <thead>
                            <th>1</th>
                            <th>1</th>
                            <th>1</th>
                            <th>1</th>
                            <th>1</th>
                        </thead>
                        <tbody>
                            <?php while ($giao_dich = mysqli_fetch_array($chi_tiet_don_hang)) { ?>
                                <tr>
                                    <td><?= $giao_dich['don_hang_id'] ?></td>
                                    <td><?= $giao_dich['san_pham_id'] ?></td>
                                    <td><?= $giao_dich['so_luong'] ?></td>
                                    <td><?= $giao_dich['gia'] ?></td>
                                </tr>
                            <?php } ?>
                        </tbody>
                    </table>
                    <!-- //first section -->
                </div>
            </div>
            <!-- //product left -->
            <!-- product right -->
        </div>
    </div>
</div>
<!-- //top products -->