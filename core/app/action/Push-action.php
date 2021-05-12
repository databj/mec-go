<?php

echo'<script src="assets/js/push.min.js" type="text/javascript"></script>  <script type="text/javascript">
  Push.create("correo enviado exitosamente ", {

    body: "MCI SERVICE",
    icon: "",
    timeout: 4000,
    onClick: function () {

        this.close();
    }
});

  
</script>';

print "<script>window.location='index.php?view=indexlamina';</script>";

?>