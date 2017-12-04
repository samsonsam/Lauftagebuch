<?php
namespace ueb05\web\views;
use function ueb05\web\addRunData;
use ueb05\web\Run;

$doc_root = $_SERVER['DOCUMENT_ROOT'];
require_once("$doc_root/model.php");

if ($_POST) {
    try {
        addRunData(new Run($_POST["date"], $_POST["distance"], $_POST["time"]));
    } catch (\UnexpectedValueException $exception) {
        //echo $exception;
        echo "<b style='color: red'>Leck mich im Arsch. Bist du Kacke im Kopf oder was?</b>";
    }
}
?>
<div class="col-sm-4 col-md-4 col-xs-4">
    <h2>Neuer Lauf Eintrag</h2>
    <form method="post" action="<?php $doc_root ?>/index.php?page=input">
        <div class="form-group">
            <label class="control-label">Datum:</label>
            <input id="datePicker" name="date" class="form-control" type="date">
        </div>
        <div class="form-group">
            <label class="control-label">Strecke:</label>
            <input name="distance" class="form-control" type="text" data-format="nn.n" placeholder="Strecke in km">
        </div>
        <div class="form-group">
            <label class="control-label">Zeit:</label>
            <input name="time" class="form-control" type="text" data-format="hh:mm:ss" placeholder="HH:MM:SS">
        </div>
        <button class="btn btn-primary" type="submit">Speichern</button>
    </form>
</div>

<script type="text/javascript">
    Date.prototype.toDateInputValue = (function () {
        var local = new Date(this);
        local.setMinutes(this.getMinutes() - this.getTimezoneOffset());
        return local.toJSON().slice(0, 10);
    });
    document.getElementById('datePicker').value = new Date().toDateInputValue();

</script>
