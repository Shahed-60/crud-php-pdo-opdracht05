<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>BASIC-FIT Utrecht</title>
</head>

<body>
    <h2>BASIC-FIT Utrecht</h2>
    <form action="create.php" method="POST">
        <label for="homeclub">Kies je homeclub:</label><br>
        <select class="select">
            <option value="1">Moreelsehoek 2</option>
            <option value="2">HerculesPlein 375</option>
            <option value="3">Van Heuven Goedhartplein 13</option>
            <option value="4">Europaplein 705</option>
            <option value="5">Franciscusdreef 80</option>
            <option value="6">Middenwetering 21</option>
            <option value="7">Zonnebaan 22</option>
        </select><br>
        <label for="lidmaatschap">Selecteer een lidmaatschap</label><br>
        <input type="radio" name="lid" value="Comfort">Comfort
        <input type="radio" name="lid" value="Premium">Premium
        <input type="radio" name="lid" value="All in">All in <br>
        <label for="looptijd">Looptijd:</label><br>
        <input type="radio" name="tijd" id="jaar">Jaarlidmaatschap
        <input type="radio" name="tijd" id="flex">Flex optie <br>
        <label for="extra">Selecteer je extra's</label><br>
        <input type="checkbox" name="extra" id="water">Yanga sportwater €2,50 per 4 weken <br>
        <input type="checkbox" name="extra" id="online">Pesonal online coach €60,00 eenmalig <br>
        <input type="checkbox" name="extra" id="intro">Personal training intro €25,00 eenmalig <br>
        <label for="mail">E-mail</label><br>
        <input type="email" name="email"><br>
        <input type="submit" value="Sla Op">
        <input type="reset" value="Reset">
        <input type="hidden" name="timestamp" value="<?= time() ?>">

    </form>
    <script>
        document.querySelector('input[type="reset"]').addEventListener('click', function(event) {
            event.preventDefault();
            document.querySelectorAll('input:not([type="radio"], .exclude-from-reset)').forEach(function(input) {
                input.value = input.defaultValue;
                input.checked = input.defaultChecked;
            });
        });
    </script>




</body>

</html>