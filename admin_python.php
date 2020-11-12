<!DOCTYPE html>
<html lang="fr-FR">

<body>

  <?php
    // execution of the python script then send mail
    system('python /var/www/html/mail_raspicam_acces_admin.py');
  ?>

  <script type="text/JavaScript">
      window.history.back();
  </script>

</body>
</html>
