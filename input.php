<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>開催予定の個展登録フォーム｜そうだ、個展に行こう</title>
    <link rel="stylesheet" href="/gs_kadai_php3/style.css">
</head>

<body>
    <div class="menu">
        <h2>開催予定の個展登録フォーム</h2>
        <p>宣伝したい個展や出展情報を登録してみてください。</p>
    </div>

    <form id="formlist" action="insert.php" method="post">
        作家名: <input type="text" name="name" class="feedback-input">
        主な活動ジャンル:<select name="category" class="feedback-input">
            <option value="絵画">絵画</option>
            <option value="写真">写真</option>
            <option value="版画">版画</option>
            <option value="立体">立体</option>
        </select>
        SNSのURL: <input type="text" name="sns" placeholder="https://…" class="feedback-input">
        メールアドレス: <input type="text" name="email" class="feedback-input">
        <!-- 出展日: <input type="date" name="eventdate" class="feedback-input"> -->
        出展場所: <input type="text" name="place" class="feedback-input">
        出展予定の作品および点数: <textarea name="description" class="feedback-input"></textarea> <!-- おおきく -->
        パスワード: <input type="password" name="pass" placeholder="パスワードを入力" class="feedback-input">
        <input type="submit" value="送信する">
    </form>
</body>

</html>