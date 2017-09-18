<form>
    <?php
    $fonts=["Algerian", "Curlz MT", "Elephant", "Felix Titling", "Forte"]
    ?>
    <label>Pick a Color <input type="color" name="color" id="color" value="<?=$color?>"></label>
    <label>Choose a font
        <select name="font-family">
            <?php foreach($fonts as $font): ?>
            <option value="<?= $font ?>" <?php if($font === $fontFamily) echo "selected" ?>>
                <?=$font ?>
            </option>
            <?php endforeach ?>
            </select>
    </label>
    <input type="submit">
</form>