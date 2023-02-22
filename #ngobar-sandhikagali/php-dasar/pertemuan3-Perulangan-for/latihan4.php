<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Latihan for dan if</title>
  <style>
  .warna {
    background-color: blue;
  }
  </style>
</head>

<body>
  <table border="1" cellspadding="10" cellspacing="0">
    <?php for ($i = 1; $i <= 10; $i++) : ?>
    <?php if ($i % 2 == 0) : ?>
    <tr class="warna">
      <?php else : ?>
    </tr>
    <?php endif; ?>
    <?php for ($j = 1; $j <= 20; $j++) : ?>
    <td><?php echo "$i, $j" ?></td>
    <?php endfor; ?>
    </tr>
    <?php endfor ?>
  </table>
</body>

</html>