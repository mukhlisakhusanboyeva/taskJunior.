<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <title>testJunior</title>
  <link rel="stylesheet" type="text/css" href="index.css">
</head>
<body>
<div class="container">  
  <form class="formclass" id="contact" action="index.php" method="post">
    <fieldset>
      <input type="search" name="searchinput" placeholder="Номер телефона" required="" type="tel">
      <button name="search_btn" type="submit">Поиск</button>
    </fieldset>
  </form>
  <?php require_once 'process.php'; ?>
  <form class="formclass" id="contact" action="process.php" method="post">
    <fieldset>
      <input name="lastname" placeholder="Фамилия" type="text" required autofocus>
    </fieldset>
    <fieldset>
      <input name="firstname" placeholder="Имя" type="text" tabindex="2" required>
    </fieldset>
    <fieldset>
      <input name="birthdate" placeholder="День рождения" type="date" tabindex="3" required>
    </fieldset>
    <fieldset>
      <input name="phone" placeholder="Номер телефона" type="tel" tabindex="4" required>
    </fieldset>
    <fieldset>
      <button name="save" type="submit" id="contact-submit" data-submit="...Sending">Добавить</button>
    </fieldset>
  </form>


  <?php
    $result ='';
    $mysqli = new mysqli('localhost', 'root', '', 'testJunior') or die(mysqli_error($mysqli));
    $result = $mysqli->query("SELECT * FROM clients ORDER BY id DESC") or die(mysqli_error($mysqli));

    if(isset($_POST['search_btn'])){
      $search = $_POST['searchinput'];
      $result = mysqli_query($mysqli, "SELECT * FROM clients WHERE phone LIKE '%$search%'") or die(mysqli_error($mysqli));
    }
  ?>

  <section>
  <div class="tbl-header">
    <table cellpadding="0" cellspacing="0" border="0">
      <thead>
        <tr>
          <th>#</th>
          <th>Фамилия</th>
          <th>Имя</th>
          <th>День рождения</th>
          <th>Номер телефона</th>
        </tr>
      </thead>
    </table>
  </div>
  <div class="tbl-content">
    <table cellpadding="0" cellspacing="0" border="0">
      <tbody>
       <?php 

       while($row = $result->fetch_assoc()):?>
        <tr>
          <td><?php echo $row['id']; ?></td>
          <td><?php echo $row['lastname']; ?></td>
          <td><?php echo $row['firstname']; ?></td>
          <td><?php echo $row['birthdate']; ?></td>
          <td><?php echo $row['phone']; ?></td>
        </tr>
        <?php endwhile; ?>
      </tbody>
    </table>
  </div>
</section>

</div>
</body>
<script type="text/javascript">
$(window).on("load resize ", function() {
  var scrollWidth = $('.tbl-content').width() - $('.tbl-content table').width();
  $('.tbl-header').css({'padding-right':scrollWidth});
}).resize();
</script>
</html>