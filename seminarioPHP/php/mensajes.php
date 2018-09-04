<!DOCTYPE html>
<html lang="es">
<head>
	<meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <link rel="stylesheet" type="text/css" href="../css/estilos.css">
</head>
<body>
    <?php
    if (isset($_session['error'])) {
        ?>
        <div class="error">
            <?php
            echo $_session['error'];
            unset($_session['error']);
            ?>
        </div>
        <?php
    }
    ?>   
</body>
</html>