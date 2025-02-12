<?php
$url = $args[0];
$title = "Your browser is not supported or old.";
$plugin_path = YOURLS_PLUGINURL . '/' . yourls_plugin_basename( dirname(__FILE__) );
?>
<!DOCTYPE html>
<html>
<head>
    <title><?php echo $title; ?></title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <style>
        table {
            border-collapse: collapse;
            margin-bottom: 0.8em;
            clear: both;
        }
        .logos td {
            vertical-align: top;
            padding: 10px;
            border: none;
            background: none;
            width: 25%;
        }
        a.l {
            display: block;
            padding: 4px;
            padding-top: 4px;
            padding-top: 117px;
            background-repeat: no-repeat;
            background-size: 110px auto;
            background-position: center 4px;
            text-decoration: none;
            text-align: center;
            border: 2px solid transparent;
            position: relative;
            width: 110px;
            height: 110px;
        }
        a.l .bro {
            white-space: nowrap;
            text-decoration: underline;
            font-size: 19px;
        }
        a .vendor {
            color: #aaa;
            text-align: center;
            font-size: 10px;
            display: block;
        }
    </style>
</head>
<body>
    <div style="margin:auto; width:768px; margin-top: 20px;">
        <div style="margin-top:100px">
            <p>
                Your web browser is out of date.
            </p>
            <p>
                Please download one of these up-to-date, free and excellent browsers:
            </p>
            <table class="logos" id="browserlist">
                <tbody>
                    <tr>
                        <td class="b">
                            <a class="l" href="https://www.microsoft.com/edge" target="_blank" rel="noopener"
                                style="background-image: url(<?php echo $plugin_path; ?>/imgs/e.png)"
                                title="Download updated Edge web browser from official Microsoft website!">
                                <span class="bro">Edge </span>
                                <span class="vendor">Microsoft</span>
                            </a>
                        </td>
                        <td class="b">
                            <a class="l" href="https://www.mozilla.org/firefox/new" target="_blank" rel="noopener"
                                style="background-image: url(<?php echo $plugin_path; ?>/imgs/f.png)"
                                title="Download updated Firefox web browser from official Mozilla Foundation website!">
                                <span class="bro">Firefox </span>
                                <span class="vendor">Mozilla Foundation</span>
                            </a>
                        </td>
                        <td class="b">
                            <a class="l" href="https://www.google.com/chrome/browser/desktop/" target="_blank"
                                rel="noopener" style="background-image: url(<?php echo $plugin_path; ?>/imgs/c.png)"
                                title="Download updated Chrome web browser from official Google website!">
                                <span class="bro">Chrome </span>
                                <span class="vendor">Google</span>
                            </a>
                        </td>
                        <td class="b">
                            <a class="l" href="https://opera.com" target="_blank" rel="noopener"
                                style="background-image: url(<?php echo $plugin_path; ?>/imgs/o.png)"
                                title="Download updated Opera web browser from official Opera Software website!">
                                <span class="bro">Opera </span>
                                <span class="vendor">Opera Software</span>
                            </a>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</body>
</html>
