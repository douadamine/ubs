<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="css/home.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
    <link rel="stylesheet" type='text/css' href="css/manage.css">
    <title>Resultat d'examen Simple</title>
</head>
<body>
        
    <div class="title">
        <a href="dashboard.php"><img src="./images/logo1.png" alt="" class="logo"></a>
        <span class="heading">Class Section</span>
        <a href="logout.php" style="color: white; text-decoration:none;"><span class="fa fa-sign-out"></span> Déconnexion</a>
    </div>

    <div class="nav">
        <ul>
            <li>
                <a href="dashboard.php">Tableau de bord</a>
            </li>

            <li class="dropdown" onclick="toggleDisplay('1')">
                <a href="" class="dropbtn">Classes &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="1">
                    <a href="add_classes.php">Ajouter Class</a>
                    <a href="manage_classes.php">Gerer class</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('2')">
                <a href="#" class="dropbtn">Etudiants &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="2">
                    <a href="add_students.php">Ajouter Etudiant</a>
                    <a href="manage_students.php">Gerer Etudiants</a>
                </div>
            </li>
            <li class="dropdown" onclick="toggleDisplay('3')">
                <a href="#" class="dropbtn">Resultats &nbsp
                    <span class="fa fa-angle-down"></span>
                </a>
                <div class="dropdown-content" id="3">
                    <a href="add_results.php">Ajouter Resultat</a>
                    <a href="manage_results.php">Gerer Resultats</a>
                </div>
            </li>
        </ul>
    </div>

    <div class="main">
        <?php
            include('init.php');
            include('session.php');
            $db = mysqli_select_db($conn,'simplestresult');

            $sql = "SELECT `name`, `id` FROM `class`";
            $result = mysqli_query($conn, $sql);

            if (mysqli_num_rows($result) > 0) {
               echo "<table>
                <caption>Manage Classes</caption>
                <tr>
                <th>#</th>
                <th>NAME</th>
                <th>ACTION</th>
                </tr>";

                $cnt=1;
                while($row = mysqli_fetch_array($result))

                  {
                  echo "<tr>";
                  echo "<td>$cnt</td>";
                  echo "<td>" . $row['name'] . "</td>";
                  echo "<td><a href='delete-class.php?id=".$row['id']."' style='color:#F66; text-decoration:none;'><span class='fa fa-trash'></span> Remove</a></td>";
    
                  echo "</tr>";

                 $cnt++; }

                echo "</table>";
            } else {
                echo "0 results";
            }
        ?>
        
    </div>

</body>
</html>

