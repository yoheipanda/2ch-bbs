<form class="formWrapper" method="POST">
    <div>
        <input type="submit" name="submitButton" value="書き込む">
        <label>:名前</label>
        <input type="text" name="username" class="username">
        <input type="hidden" name="threadID" value="<?php echo $thread["id"]; ?>">
    </div>
    <div>
        <textarea class="commentTextArea" name="body"></textarea>
    </div>
</form>