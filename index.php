<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
    $genre = [
        0 => "Литература",
        1 =>"Фантастика",
        2 =>"Документация",
        3 =>"Научная фантастика"
    ];
    ?>
    <form action="">
        <input type="text" placeholder="Номер" name="number">
        <input type="text" placeholder="Название" name="name">
        <input type="text" placeholder="Автор" name="author">
        <select name="genre"> 
            <option disabled selected >Жанр</option>
            <?php 
            foreach($genre as $key => $item) {
                
                echo '<option value=' . "$key" . '>' . "$genre[$key]" . '</option>';
            }
            ?>
        </select>
        <button>Сохранить</button>
    </form>
    <?php 
    // write
      var_dump($_GET['genre']);  
      if (isset($_GET['genre'])) {
        $bookInfo = [$_GET['number'],$_GET['name'],$_GET['author'],$_GET['genre']];
        $searilazed = serialize($bookInfo);
        $id = $_GET['genre'];
      }
      $data = fopen('data.txt', 'a+');
      fwrite($data,$searilazed . PHP_EOL);
      fclose($data);
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
              $data = fopen('data.txt', 'r');
              if ($data) {
                  while (($line = fgets($data)) == true) {
                      $bookInfo = unserialize(trim($line));
            ?>
 
                <tr>
                    <td><?= $bookInfo[0] ?></td>
                    <td><?= $bookInfo[1] ?></td>
                    <td><?= $bookInfo[2] ?></td>
                    <td><?= $genre[$bookInfo[3]] ?></td>
                </tr>
              <?php 
                  }
                }
                fclose($data);
              ?>
        </tbody>
    </table>
    <?php
    ?>
</body>
</html>