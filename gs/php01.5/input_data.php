<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>AJAXでデータ取得</title>
</head>
<body>


<!-- JSONデータを表示 -->
<table id="data"></table>


<script src="https://code.jquery.com/jquery-3.2.1.min.js"></script> 
<script>
//JSON取得
$.getJSON("output_data.php",function(data) {
    //DATA数ループ処理
    for(val in data){
        //表示HTML作成
        var td = "<tr>";
            td += "<td>"+data[val][0]+"</td>";
            td += "<td>"+data[val][1]+"</td>";
            td += "<td>"+data[val][2]+"</td>";
            td += "</tr>";
        //文字作成後にid="data"に追加
        $("#data").append(td);
    }
});
</script>
</body>
</html>