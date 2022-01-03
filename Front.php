<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Search</title>

<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>

<body>

    <div id="search-box" style="color:red">
        <input id="search" onkeyup="search()" name="search" type="text" autocomplete="off" placeholder="Search here" />
        <div id="result"> </div>
    </div>
<br></br><br></br>


<p id="topcompanies">Topcompanies

<div id="r"></div>

</p>

<p id="profit">Profitcompanies

<div id="s"></div>

</p>


<script>
var a = [];
function search()
    {
        var inputVal = $('#search').val();
    if (a[inputVal])
    {
        var values=a[inputVal];

        var fivearray = values.slice(0, 5);
        var res = '';
        for (var element of fivearray) 
        { 
            res += "<div>"+element+"</div>";
           
        }
         $('#result').html(res);
        
    }

    else 
    {
        $.ajax
        ({
          type:'post',
          url:'end.php',
          data:'val='+inputVal+'&action='+"companyname"+'&fetch='+"search",
          success:function(resp)
          {
                var data = JSON.parse(resp);
                a[inputVal]=data;
                var values=a[inputVal];
                var fivearray = values.slice(0, 5);
                var res = '';
                for (var element of fivearray) 
                { 
                    res += "<div>"+element+"</div>";
                }
                $('#result').html(res);

          }
        });
    }


    };

$(document).on("click", "#result div", function()
{
    $("#result div").parents("#search-box").find('#search').val($(this).text());
    $(this).parent("#result").empty();
});

function topcompanies()
{
       $.ajax
       ({
        type:'post',
        url:'end.php',
        data:{action:"companyname",fetch:"topcompanies"},
        success:function(resp)
        {
            var data = JSON.parse(resp);
            var resi = '';
            for (var e of data) 
            { 
             resi += "<div>"+e+"</div>";
            }
            $('#r').html(resi);

        }
       });
}


function profitcompanies()
{
       $.ajax
       ({
        type:'post',
        url:'end.php',
        data:{action:"companyname",fetch:"profitcompanies"},
        success:function(resp)
        {
            var data = JSON.parse(resp);
            var resi = '';
            for (var e of data) 
            { 
             resi += "<div>"+e+"</div>";
            }
            $('#s').html(resi);

        }
       });

}

$(document).ready(function() 
{
  topcompanies();
  profitcompanies();

});


</script>

</body>
</head>

</html>















