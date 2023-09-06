<?php
$title = 'API Fetch';
include "sivunosat/header.php";
?>

<main class="etusivu">
    <section>
        <form>
            <legend>Currency converter</legend>

            <label for="amount">From </label>
            <input type="number" id="amount" name="amount" value=1 />

            <span> EUR to </span>

            <label for="currency" class="scr">to currency</label>
            <select id="currency" name="currency">
            </select>

        </form>
        <strong>
            <label for="result">Result: </label>
            <span id="result" role="alert"></span>
        </strong>
    </section>
</main>

<?php include "sivunosat/footer.php"; ?>