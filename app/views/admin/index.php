<?php include "../../core/utils/session.php"; ?>
<?php include_once "../../core/utils/alerts.php"; ?>

<!DOCTYPE html>
<html lang="en">

<?php include '../templates/metaHeader.php' ?>

<body>
    <div class="wrapper">
        <?php include "../templates/sidebarAdmin.php" ?>

        <div class="main">
            <div class="px-3 bg-white shadow-sm">
                <p class="fs-4 fw-light text-secondary p-2">Sistem Informasi Pengaduan Masyarakat</p>
            </div>

            <?php include "../../config/content.php" ?>


        </div>

        <!-- jQuery -->
        <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
        <!-- Bootstrap JS -->
        <script src="../../../public/assets/js/bootstrap.bundle.min.js"></script>
        <!-- DataTables -->
        <script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/1.13.6/js/dataTables.bootstrap5.min.js"></script>
        <!-- Custom JS -->
        <script src="../../../public/assets/js/script.js"></script>

        <!-- Tooltips -->
        <script src="../../../public/assets/js/tooltips.js"></script>

        <!-- DataTables JS -->
        <script>
            $(document).ready(function() {
                if ($('#dataPengaduanTable').length) {
                    $('#dataPengaduanTable').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                        },
                        "order": [
                            [0, "desc"]
                        ],
                    });
                }

                if ($('#dataPetugasTable').length) {
                    $('#dataPetugasTable').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                        },
                        "order": [
                            [0, "asc"]
                        ],
                        "paging": true,
                    });
                }

                if ($('#dataPendudukTable').length) {
                    $('#dataPendudukTable').DataTable({
                        "language": {
                            "url": "//cdn.datatables.net/plug-ins/1.13.6/i18n/id.json"
                        },
                        "paging": true,
                    });
                }
            });
        </script>
</body>

</html>