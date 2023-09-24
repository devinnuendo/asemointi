<form autocomplete="on" method="post" class="reset">
    <legend class="scr"><?= $traCommon['language_change'][$lang]; ?></legend>
    <button type="submit" id="toggle_language_en" name="toggle_language" value="en" class="language en <?= $lang == 'en' ? 'active' : '' ?>">
        English
    </button>
    <button type="submit" id="toggle_language_fi" name="toggle_language" value="fi" class="language fi <?= $lang == 'fi' ? 'active' : '' ?>">
        Suomi
    </button>
    <button type="submit" id="toggle_language_sv" name="toggle_language" value="sv" class="language sv  <?= $lang == 'sv' ? 'active' : '' ?>">
        Svenska
    </button>
</form>