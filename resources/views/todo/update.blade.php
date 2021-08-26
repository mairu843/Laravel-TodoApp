<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Todoリスト</title>
    <style>
        html, body, div, span, object, iframe,
        h1, h2, h3, h4, h5, h6, p, blockquote, pre,
        abbr, address, cite, code,
        del, dfn, em, img, ins, kbd, q, samp,
        small, strong, sub, sup, var,
        b, i,
        dl, dt, dd, ol, ul, li,
        fieldset, form, label, legend,
        table, caption, tbody, tfoot, thead, tr, th, td,
        article, aside, canvas, details, figcaption, figure,
        footer, header, hgroup, menu, nav, section, summary,
        time, mark, audio, video {
            margin:0;
            padding:0;
            border:0;
            outline:0;
            font-size:100%;
            vertical-align:baseline;
            background:transparent;
        }
        body {
            line-height:1;
        }
        article,aside,details,figcaption,figure,
        footer,header,hgroup,menu,nav,section {
            display:block;
        }
        nav ul {
            list-style:none;
        }
        blockquote, q {
            quotes:none;
        }
        blockquote:before, blockquote:after,
        q:before, q:after {
            content:'';
            content:none;
        }
        a {
            margin:0;
            padding:0;
            font-size:100%;
            vertical-align:baseline;
            background:transparent;
        }
        /* change colours to suit your needs */
        ins {
            background-color:#ff9;
            color:#000;
            text-decoration:none;
        }
        /* change colours to suit your needs */
        mark {
            background-color:#ff9;
            color:#000;
            font-style:italic;
            font-weight:bold;
        }
        del {
            text-decoration: line-through;
        }
        abbr[title], dfn[title] {
            border-bottom:1px dotted;
            cursor:help;
        }
        table {
            border-collapse:collapse;
            border-spacing:0;
        }
        /* change border colour to suit your needs */
        hr {
            display:block;
            height:1px;
            border:0;
            border-top:1px solid #cccccc;
            margin:1em 0;
            padding:0;
        }
        input, select {
            vertical-align:middle;
        }

        .container {
            background-color: #2d197c;
            width: 100vw;
            height: 100vh;
            position: relative;
        }
        .card {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 50vw;
            background-color: #fff;
            padding: 30px;
            border-radius: 10px;
        }
        h2 {
            font-weight: bold;
            font-size: 25px;
            margin-bottom: 15px;
        }
        .flex {
            display: flex;
            justify-content: space-between;
            margin-bottom: 30px;
        }
        .text-add {
            width: 80%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            appearance: none;
            font-size: 14px;
            outline: none;
        }
        .submit-add {
            text-align: left;
            border: 2px solid #dc70fa;
            font-size: 12px;
            color: #dc70fa;
            background-color: #fff;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.4s;
            outline: none;
        }
        .submit-add:hover {
            background-color: #dc70fa;
            border-color: #dc70fa;
            color: #fff;
        }
        .text-update {
            width: 90%;
            padding: 5px;
            border-radius: 5px;
            border: 1px solid #ccc;
            appearance: none;
            font-size: 14px;
            outline: none;
        }
        .submit-update {
            text-align: left;
            border: 2px solid #fa9770;
            font-size: 12px;
            color: #fa9770;
            background-color: #fff;
            font-weight: bold;
            padding: 8px 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: 0.4s;
            outline: none;
        }
        .submit-update:hover {
            background-color: #fa9770;
            border-color: #fa9770;
            color: #fff;
        }
        .submit-delete {
        text-align: left;
        border: 2px solid #71fadc;
        font-size: 12px;
        color: #71fadc;
        background-color: #fff;
        font-weight: bold;
        padding: 8px 16px;
        border-radius: 5px;
        cursor: pointer;
        transition: 0.4s;
        outline: none;
        }
        .submit-delete:hover {
            background-color: #71fadc;
            border-color: #71fadc;
            color: #fff;
        }
        table {
            width: 100%;
            text-align: center;
        }
        tr {
            height: 60px;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="card">
            <h2>Todo List</h2>
            <div class="todo">
                @if (count($errors) > 0)
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>
                                {{$error}}
                            </li>
                        @endforeach
                    </ul>
                @endif
                <form action="/todo/create" method="POST" class="flex">
                    @csrf
                    <input type="hidden">
                    <input type="text" name="content" class="text-add">
                    <input type="submit" value="追加" class="submit-add">
                </form>
                <table>
                    <tr>
                        <th>作成日</th>
                        <th>タスク名</th>
                        <th>更新</th>
                        <th>削除</th>
                    </tr>
                    @foreach ($items as $item)
                        <tr>
                            <td>
                                {{$item->getCreatedAt()}}
                                <form action="/todo/update" method="POST">@csrf
                                <input type="hidden">
                            </td>
                            <td>
                                <input type="text" name="text-update" class="text-update" value="{{$item->getData()}}">
                            </td>
                            <td><button class="submit-update">更新</button></form></td>
                            <td>
                                <form action="/todo/delete" method="POST">
                                    @csrf
                                    <input type="hidden">
                                    <button class="submit-delete">削除</button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </table>
            </div>
        </div>
    </div>
</body>
</html>