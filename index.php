<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="">
        <input type="text" placeholder="Номер" name="number">
        <input type="text" placeholder="Название" name="name">
        <input type="text" placeholder="Автор" name="author">
        <input type="text" placeholder="Жанр" name="genre">
        <button>Сохранить</button>
    </form>
    <?php 
    // write
      $bookInfo = [$_GET['number'],$_GET['name'],$_GET['author'],$_GET['genre']];
      $searilazed = serialize($bookInfo);
      
      $books = fopen('books.txt', 'a+');
      fwrite($books,$searilazed . PHP_EOL);
      fclose($books);
    //read
    ?>
    <table>
        <tbody>
            <tr>
                <th>
                    Номер
                </th>
                <th>
                    Название
                </th>
                <th>
                    Автор
                </th>
                <th>
                    Жанр
                </th>
            </tr>
            <?php 
              $books = fopen('books.txt', 'r');
              if ($books) {
                  while (($line = fgets($books)) == true) {
                      $bookInfo = unserialize(($line));
            ?>
 
                <tr>
                    <td><?= $bookInfo[0] ?></td>
                    <td><?= $bookInfo[1] ?></td>
                    <td><?= $bookInfo[2] ?></td>
                    <td><?= $bookInfo[3] ?></td>
                </tr>
              <?php 
                  }
                }
                fclose($books);
              ?>
        </tbody>
    </table>
    <?php
    ?>
</body>
</html>