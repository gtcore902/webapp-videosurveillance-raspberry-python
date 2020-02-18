<!DOCTYPE html>
<html lang="fr-FR">

<body>

  <?php
      // EXECUTION DU SCRIPT PYTHON ENVOI MAIL
      system('python /var/www/html/mail_raspicam_acces_admin.py');
  ?>

  <script type="text/JavaScript">
      window.history.back();
  </script>

</body>
</html>
