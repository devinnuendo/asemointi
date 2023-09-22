<?php

if (isset($_POST["toggle_language"])) {

    if ($userLanguage === "en") {
        $_SESSION["user_language"] = "fi"; // Switch to Finnish
    } elseif ($userLanguage === "fi") {
        $_SESSION["user_language"] = "en"; // Switch to English
    }
}

?>

<form method="post" class="reset">
    <div class="language en">
        <label for="toggle_language_en"><?= $tra['language_change']; ?> &#x1F81A; </label>
        <button type="submit" id="toggle_language_en" name="toggle_language" value="en">
            English
        </button>
    </div>
    <div class="language fi">
        <label for="toggle_language_fi"><?= $tra['language_change']; ?> &#x1F81A; </label>
        <button type="submit" id="toggle_language_fi" name="toggle_language" value="fi">
            Suomi
        </button>
    </div>
</form>