

    <?php if($_GET['p'] == "beranda"){ ?>
        <li style="border-top: 3px solid #f2bc28" class="active"><a href="?p=beranda"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li><a href="?p=user"><i class="fa fa-user-o"></i> <span>Users</span></a></li>
        <li><a href="?p=whatsapp"><i class="fa fa-whatsapp"></i> <span>Whatsapp</span></a></li> 
        <li><a href="?p=sms"><i class="fa fa-envelope"></i> <span>SMS</span></a></li> 
  
    <?php } else if($_GET['p'] == "user") { ?>
        <li style="border-top: 3px solid #f2bc28"><a href="?p=beranda"><i class="fa fa-home"></i> <span>Home</span></a></li>
        <li class="active"><a href="?p=user"><i class="fa fa-user"></i> <span>Users</span></a></li> 
        <li><a href="?p=whatsapp"><i class="fa fa-whatsapp"></i> <span>Whatsapp</span></a></li> 
        <li><a href="?p=sms"><i class="fa fa-envelope"></i> <span>SMS</span></a></li> 

    <?php } ?>
        
             