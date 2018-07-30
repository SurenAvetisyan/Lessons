<html>
<head>
    <title></title>
</head>
<body>
<div id="messages">
    <?php foreach ($data as $m): ?>
        <div>
            <?= $m["user"] ?> --
            <?= $m["message"] ?>--
            <?= date('d.m.Y G:s', $m['date']) ?>--
            <?= $m['seen'] == 0 ? '' : date('d.m.Y G:s', $m['seen']) ?>
        </div>
    <?php endforeach; ?>
</div>

<form action="?message&user=<?= $to ?>" method="post">
    <input type="hidden" name="user" value="<?= $to ?>">
    <input type="hidden" name="send" value="1">
    <textarea name="text"></textarea>
    <input type="submit" value="Send">
</form>
<script src="<?= ROOT_URI ?>/assets/scripts/jquery-3.3.1.min.js"></script>
<script>
    jQuery(document).ready(function ($) {
        $('form').submit(function (ev) {
            var $this = $(this);
            ev.preventDefault();
            $.ajax({
                'url': $this.attr('action'),
                'type': $this.attr('method'),
                'data': $this.serialize(),
                'dataType': 'json'
            }).done(function (res) {

                if (res.status == 'ok') {
                    $('#messages').append('<div>' + res.data.name +
                        '--' + $this.find('[name="text"]').val() +
                        '--' + res.data.date +
                        '--' +
                        '</div>'
                    )
                }
                $this.find('[name="text"]').val('');
            })

        })
        setInterval(function () {
            $.ajax({
                'url': '?message',
                'type': 'post',
                'data': {
                    'user': $('[name="user"]').val(),
                    'get_message': 1
                },

                'dataType': 'json'
            }).done(function (data) {
                for(var i in data){
                    $('#messages').append('<div>' + data[i].user +
                        '--' + data[i].message +
                        '--' + data[i].date +
                        '--' +
                        '</div>'
                    )
                }
            })
        }, 3000)
    })


</script>
</body>
</html>