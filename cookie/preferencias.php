<?php
$animals = [
  'fish' => ['nemo', 'dorada', 'vieja', 'abade', 'cherne', 'medregal'],
  'insect' => ['beatle', 'ant', 'butterfly', 'fly', 'mosquito'],
  'reptil' => ['snake', 'serpiente']
];




?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>

<body>



  <ul>
    <a href="preferencias.php?specie=todo">
      <li>TODOS</li>
    </a>
    <?php
    foreach ($animals as $key => $value) {
      printf('<a href="preferencias.php?specie=%s"><li>clase: %s</li></a>', $value, $value);
    }
    ?>
  </ul>
  <ul>
    <?php
    if (isset($_GET['specie'])) {
      if ($_GET['specie'] == 'todo') {
        setcookie('specie', 'a', time() - 10);
        foreach ($animals as $value1) {
          foreach ($value1 as $value) {
            printf(' <li>%s</li>', $value);
          }
        }
      } else {
        setcookie('specie', $_GET['specie'], time() + 120);
        foreach ($animals as $key => $value1) {
          if ($key == $_GET['specie']) {
            foreach ($value1 as $value) {
              printf(' <li>%s</li>', $value);
            }
          }
        }
      }
    } else {
      if (!empty($_COOKIE['specie'])) {
        foreach ($animals as $key => $value1) {
          if ($key == $_COOKIE['specie']) {
            foreach ($value1 as $value) {
              printf(' <li>%s</li>', $value);
            }
          }
        }
        $listofAnimals = $animals[$_COOKIE['specie']];
      } else {
        foreach ($animals as $value1) {
          foreach ($value1 as $value) {
            printf(' <li>%s</li>', $value);
          }
        }
      }
    }


    ?>
  </ul>
</body>

</html>