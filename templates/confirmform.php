<form method="POST" action="" class="login-form" id="confirmForm">

    <h2 id="confirmText">Are you sure</h2>

    <input type="hidden" name="item_id" id="confirmItemId">
    <input type="hidden" name="action_type" id="confirmAction">


    <?php displayError() ?>
    <label for="password">Password:</label>
    <input type="password" name="password" required>
    <div class="confirm-btn-flex">
        <button type="submit" id="confirmSubmit" class="confirm-buttons">Confirm</button>
        <button type="button" class="btn-cancel">Cancel</button>
    </div>

</form>