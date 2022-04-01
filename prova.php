<?php
    session_start();

if (isset($_SESSION['result'])) {
    session_unset();
}

if (isset($_POST['limpar'])) {
    session_unset();
}

if (isset($_POST['valor'])) {
    if (!isset($_SESSION['valor1'])) {
        $_SESSION['valor1'] = $_POST['valor'];
        $_SESSION['visor'] = strval($_SESSION['valor1']);
    } else if (isset($_SESSION['valor1']) && isset($_SESSION['operator'])) {
        $_SESSION['valor2'] = $_POST['valor'];
        $_SESSION['visor'] = strval($_SESSION['visor']) . ' ' . strval($_SESSION['valor2']);
    }

    if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
        $_SESSION['valores'] = strval($_SESSION['valor1']) . ' ' .  strval($_SESSION['valor2']);
    }
}

if (isset($_POST['operator'])) {
    $_SESSION['operator'] = $_POST['operator'];
    $_SESSION['visor'] = strval($_SESSION['visor']) . ' ' . strval($_SESSION['operator']);
}

if (isset($_POST['finalizar'])) {
    switch ($_SESSION['operator']) {
        case 'x':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['result'] = $_SESSION['valor1'] * $_SESSION['valor2'];
            }
            break;
        case '+':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['result'] = $_SESSION['valor1'] + $_SESSION['valor2'];
            }
            break;
        case '-':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['result'] = $_SESSION['valor1'] - $_SESSION['valor2'];
            }
            break;
        case '/':
            if (isset($_SESSION['valor1']) && isset($_SESSION['valor2'])) {
                $_SESSION['result'] = $_SESSION['valor1'] / $_SESSION['valor2'];
            }
            break;
        default:
            echo 'clique um operador valido';
            break;
    }
    $_SESSION['visor'] = strval($_SESSION['result']);
}

?>

<form method="post">

    <table style="border: 1px solid black">
        <link rel="stylesheet" type="text/css" href="calculadora.css" media="screen"/>
        <tr>
            <td colspan="4" ><label>
                    <input style="width: 109px;" type="text" name="valores" readonly value="<?php
                            echo $_SESSION['visor'];
                        ?>"
                </label></td>
        </tr>
        <tr>
            <td><input type="submit" name="valor" value="7"></td>
            <td><input type="submit" name="valor" value="8"></td>
            <td><input type="submit" name="valor" value="9"></td>
            <td><input type="submit" name="operator" value="x"></td>
        </tr>
        <tr>
            <td><input type="submit" name="valor" value="4"></td>
            <td><input type="submit" name="valor" value="5"></td>
            <td><input type="submit" name="valor" value="6"></td>
            <td><input type="submit" name="operator" value="+"></td>
        </tr>
        <tr>
            <td><input type="submit" name="valor" value="1"></td>
            <td><input type="submit" name="valor" value="2"></td>
            <td><input type="submit" name="valor" value="3"></td>
            <td><input style="width: 25px;" type="submit" name="operator" value="-"></td>
        </tr>
        <tr>
            <td><input type="submit" name="limpar" value="c"></td>
            <td><input type="submit" name="valor" value="0"></td>
            <td><input type="submit" name="finalizar" value="="></td>
            <td><input style="width: 100px;" type="submit" name="operator" value="/"></td>
        </tr>

    </table>

</form>