<form method="post" class="reset">
    <legend><?= $tra['language_change'][$lang]; ?></legend>
    <button type="submit" id="toggle_language_en" name="toggle_language" value="en" class="language en">
        English
    </button>
    <button type="submit" id="toggle_language_fi" name="toggle_language" value="fi" class="language fi">
        Suomi
    </button>
    <button type="submit" id="toggle_language_sv" name="toggle_language" value="sv" class="language sv">
        Svenska
    </button>
</form>