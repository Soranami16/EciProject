<!-- Navbar -->
<nav class="main-header navbar navbar-expand-md  navbar-white navbar-light">
    <div class="container">
        <!-- Left navbar links -->
        <ul class="navbar-nav">
            <li class="nav-item">
                <a class="nav-link" data-widget="pushmenu" href="#" role="button"><i class="fas fa-bars"></i></a>
            </li>
        </ul>

        <!-- Right navbar links -->
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <i class="far fa-bell"></i>
                    <span class="badge badge-info navbar-badge" id="jumlah"></span>
                </a>
                <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">
                    <div class="dropdown-item">
                        <a href="<?php echo base_url() . 'notifikasi'; ?>" class="dropdown-item"> <!-- <i class="fas fa-envelope mr-2"></i> lahhh kemarin ada mana itu ada apa-->
                            Form
                            <span class="float-right text-muted text-sm" id="jumlahsubmit"></span>
                        </a>
                        <p class="dropdown-item" id="lastsubmit"></p>
                    </div>
                    <div class="dropdown-item">
                        <a href="<?php echo base_url() . 'approve'; ?>" class="dropdown-item">
                            <!-- <i class="fas fa-users mr-2"></i>  -->
                            Approve
                            <span class="float-right text-muted text-sm" id="jumlahapprove"></span>
                        </a>
                        <p class="dropdown-item" id="lastapprove"></p>
                    </div>
                    <div class="dropdown-item dropdown-footer">
                        <a href="<?php echo base_url() . 'all/notifikasi'; ?>" class="dropdown-item dropdown-footer">See All Notifications</a>
                    </div>
                </div>
            </li>
            <li>
                <a class="nav-link" data-toggle="dropdown" href="#">
                    <span class="d-inline-block"><?= $name ?></span>
                </a>
            </li>
        </ul>
    </div>
</nav>
<script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>
<script>
    function notif() {
        $.ajax({
            type: "GET",
            url: "/lonceng",
            dataType: "json",
            success: function(data) {
                $("#jumlah").text(data.jumlah);
                $("#jumlahsubmit").text(data.jumlahsubmit);
                $("#jumlahapprove").text(data.jumlahapprove);
                if (data.lastsubmit) {
                    $("#lastsubmit").html("<p class='float-left text-muted text-sm'>" + data.lastsubmit['deskripsi_tender'] + "</p>" + "<p class='float-right text-muted text-sm'>" + data.lastsubmit['CreatedAt'] + "</p>");
                } else {
                    $("#lastsubmit").html("<p>Data tidak tersedia</p>");
                }

                if (data.lastapprove) {
                    $("#lastapprove").html("<p class='float-left text-muted text-sm'>" + data.lastapprove['deskripsi_tender'] + "</p>" + "<p class='float-right text-muted text-sm'>" + data.lastapprove['ModifiedAt'] + "</p>");
                } else {
                    $("#lastapprove").html("<p>Data tidak tersedia</p>");
                }
            }
        })
    }

    $(document).ready(function() {
        notif();
        setInterval(notif, 5000)
    })
</script>
<!-- /.navbar -->