<!DOCTYPE html>
<html lang="en">
<head>
  <title>Wellness Tourism</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<style type="text/css">
body{
    font-size:12px;
    font-family:Tahoma, Geneva, sans-serif;
}
.iVote,.iVote li{
    display:block;
    margin:0px;
    padding:0px;
    list-style:none;
    float:left;
}
.iVote{
    clear:both;
    float:left;
}
.iVote li,.iVote li.VoteD{
    display:block;
    width:16px;
    height:15px;
    position:relative;
    background: url(images/jquery.ui.stars.gif) no-repeat 0 0;
    background-position: 0 -32px;
    margin-right:2px;
    cursor:pointer;
}
.iVote li.VoteD{
    background-position: 0 -64px;
}
.iVote li.VoteD2{
  background-position: 0 -48px;
}
span.showVoteText{
    padding-left:5px;
    font-style:italic;
}
</style>
<form id="form1" name="form1" method="post" action="">
  <table width="500" border="0" cellspacing="0" cellpadding="0">
    <tr>
      <td width="155">ความพอใจด้านบริการ</td>
      <td width="345">
  <ul class="iVote">
  <li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
<input name="hScore1" type="hidden" id="hScore1" value="0" />
<span class="showVoteText"></span>
      </td>
    </tr>
    <tr>
      <td>ความคุ้มค่า</td>
      <td><ul class="iVote">
  <li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
<input name="hScore2" type="hidden" id="hScore2" value="0" />
<span class="showVoteText"></span></td>
    </tr>
    <tr>
      <td>ความพอใจในตัวสินค้า</td>
      <td>
<ul class="iVote">
  <li></li>
<li></li>
<li></li>
<li></li>
<li></li>
</ul>
<input name="hScore3" type="hidden" id="hScore3" value="0" />
<span class="showVoteText"></span>
      </td>
    </tr>
  </table>


<br style="clear:both;" />
<input type="submit" name="button" id="button" value="Submit" />
</form>
<script language="javascript" src="js/jquery-1.4.1.min.js"></script>
<script type="text/javascript">
$(function(){
    var arrTextVote=new Array("Not so great","Quite good","Good","Great!","Excellent!");
    $("ul.iVote li").mouseover(function(){
            var prObj=$(this).parent("ul");;
            var Clto=prObj.children("li").index($(this));
            var Clto2=Clto;
            Clto+=1;
            prObj.children("li:gt("+Clto2+")").removeClass("VoteD");
            prObj.children("li:lt("+Clto+")").addClass("VoteD");
            prObj.nextAll("span.showVoteText:eq(0)").html(arrTextVote[Clto2]);
            var oldScore=prObj.next("input").val();
            prObj.mouseout(function(){
                    prObj.children("li").removeClass("VoteD");
                    prObj.nextAll("span.showVoteText:eq(0)").html("");
            });

    });
    $("ul.iVote li").click(function(){
            var prObj=$(this).parent("ul");;
            if(prObj.children("li").hasClass("VoteD2")==false){
            var Clto=prObj.children("li").index(this);
            var Clto2=Clto;
            Clto+=1;
            prObj.next("input").val(Clto);
            prObj.children("li:lt("+Clto+")").addClass("VoteD2");
            prObj.children("li:gt("+Clto+")").removeClass("VoteD");
            prObj.children("li").unbind("mouseover");
            prObj.unbind("mouseout");
            prObj.nextAll("span.showVoteText:eq(0)")
            .html(arrTextVote[Clto2]);
            }
    });

});
</script>
