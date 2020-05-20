<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width" />
    <meta name="author" content="Rachita Cosmin-Zahariea Robert " />
    <meta name="keywords" content="proiect TW" />   
    <title>Proiect TW | Weight Calculator</title>
    <link rel=" stylesheet" href="./css/stilu_calculator.css" >
</head>

<body>
    <header>
        <div class="container">
            <div id="branding">
                <h1>
                    <span class="highlight">
                        Obis Project
                    </span>
                </h1>
            </div>
            <nav>
                <ul>
                    <li><a href="./index.html">Home</a></li>
                    <li><a href="services.html">Table</a></li>
                    <li><a href="./calculator.html">Weight Calculator</a></li>
                </ul>
            </nav>
        </div>
    </header>
    <h2>Weight Calculator!</h2>
    <!-- Ideal Weight Calculator -->
    <form>
        <!-- /*inputs: Age, gender, height*/ -->
        <input id="age_box" type="number" name="age" placeholder="Age">
        <select name="gender">
            <option>Male</option>
            <option>Female</option>
        </select>
        <input id="height_box" type="number" name="height" placeholder="Height(cm)">
        <button type="submit" name="submit" value="submit">Calculate</button>
    </form>
    

    <?php
        echo "Hello World";
    ?>

    <div class="result">
        <h2>Result:</h2>
        <h3>The ideal weight based on popular formulas:</h3>
        
        <table class="result_info_table" align="center">
            <tr>
                <td class="td_left">Formula</td>
                <td class="td_right">Ideal Weight</td>
            </tr>
            <tr>
                <td>Robinson (1983)</td>
                <td align="center">
                    <font color="green">
                        <b>result1</b>
                    </font>
                </td>
            </tr>
            <tr>
                <td>Miller (1983)</td>
                <td align="center">
                    <font color="green">
                        <b>result2</b>
                    </font>
                </td>
            </tr>
            <tr>
                <td>Devine (1974)</td>
                <td align="center">
                    <font color="green">
                        <b align="center">result3</b>
                    </font>
                </td>
            </tr>
            <tr>
                <td>Hamwi (1964)</td>
                <td align="center">
                    <font color="green">
                        <b>result4</b>
                    </font>
                </td>
            </tr>
            <tr>
                <td>Healthy BMI Range</td>
                <td align="center">
                    <font color="green">
                        <b>result5</b>
                    </font>
                </td>
            </tr>
        </table>
    </div>
</body>

<footer>
    <ul>
        <li><p>About</p></li>
        <li><p>Mail</p></li>
        <li><p>Phone</p></li>
    </ul>
</footer>
</html>