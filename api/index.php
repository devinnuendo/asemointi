<?php
$title = 'API Fetch';
include "sivunosat/header.php";
?>

<main class="etusivu">
    <section>
        <form>
            <legend>Currency converter</legend>

            <label for="amount">From amount</label>
            <input type="number" id="amount" name="amount" value=1 />

            <label for="currency1" class="scr">From currency</label>
            <select id="currency1" name="currency1">
            </select>

            <span> to </span>

            <label for="currency2" class="scr">To currency</label>
            <select id="currency2" name="currency2">
            </select>

            <button type="submit">Calculate</button>
        </form>
        <strong>
            <label for="result">Result: </label>
            <span id="result" role="alert"></span>
        </strong>
    </section>
</main>

<?php include "sivunosat/footer.php"; ?>