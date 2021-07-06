<style>
.modal-3 a {
  margin-left: 3px;
  padding: 0;
  width: 30px;
  height: 30px;
  line-height: 30px;
  -moz-border-radius: 100%;
  -webkit-border-radius: 100%;
  border-radius: 100%;
}
.modal-3 li a:hover {
  background-color: #EA8025;
  color:#FFFFFF;
}
.modal-3 a.active, .modal-3 a:active {
  color:#FFFFFF;
  background-color: #EA8025;
}
</style>
<script type="text/javascript">
// get information pages
var pagenow=0;
var pagemax=<?php  echo $pagemax ?>;
$(document).ready(function(){ 
  $(".Pagechange").click(function(){
    $(".Pagechange:eq("+pagenow+")").removeClass("active");
    $(this).addClass("active");
    pagenow=parseInt($(this).text())-1;
  })
  $(".Pageprevious").click(function(){
    $(".Pagechange:eq("+pagenow+")").removeClass("active");
    if(pagenow>0) pagenow--;
    else pagenow =0
    $(".Pagechange:eq("+pagenow+")").addClass("active");   
  });
  $(".Pagenext").click(function(){
    $(".Pagechange:eq("+pagenow+")").removeClass("active");
    if(pagenow<pagemax) pagenow++;
    else pagenow =pagemax;
    $(".Pagechange:eq("+pagenow+")").addClass("active");   
  });
  $(".Pagefirst").click(function(){
    $(".Pagechange:eq("+pagenow+")").removeClass("active");
    pagenow=0;
    $(".Pagechange:eq("+pagenow+")").addClass("active");  
  });
  $(".Pagefinal").click(function(){
    $(".Pagechange:eq("+pagenow+")").removeClass("active");
    pagenow=pagemax;
    $(".Pagechange:eq("+pagenow+")").addClass("active");  
  });
});
</script>
<?php
//$self=$_SERVER['PHP_SELF'];
//$self="http://".$_SERVER['SERVER_NAME'].":".$_SERVER['SERVER_PORT'].$_SERVER['REQUEST_URI'];

// build url 
$self=$_SERVER['PHP_SELF']."?";
$searchGET = isset($_GET["search"])?"search=".$txsearch."&":"";
$priceminGET = isset($_GET["pricemin"])?"pricemin=".$txpricemin."&":"";
$pricemaxGET = isset($_GET["pricemax"])?"pricemax=".$txpricemax."&":"";
$typeGET = isset($_GET["type"])?"type=".$txtype."&":"";

$self = $self.$searchGET;
$self = $self.$priceminGET;
$self = $self.$pricemaxGET;
$finalURL = $self.$typeGET;

// build paging list
$pagination='<div style=" width: auto;" >
  <ul class="pagination modal-3">';
  if($pagenow>1){
    $pagination.='<li><a href="'.$finalURL.'page='."1".'" class="Pagefirst">&laquo</a></li>
    <li><a href="'.$finalURL.'page='.($pagenow-1).'" class="Pageprevious">&lt</a></li>';
  }
  for($i=1;$i<=$pagemax;$i++){
    if($i==$pagenow) $pagination.='<li><a href="'.$finalURL.'page='.$i.'" class="Pagechange active">'.$i.'</a></li>';
    else  $pagination.='<li><a href="'.$finalURL.'page='.$i.'" class="Pagechange">'.$i.'</a></li>';
  }
  if($pagenow<$pagemax){
    $pagination.='<li><a href="'.$finalURL.'page='.($pagenow+1).'" class="Pagenext">&gt</a></li>
    <li><a href="'.$finalURL.'page='.$pagemax.'" class="Pagefinal">&raquo</a></li>';
  }
 $pagination.='</ul></div>'; 
?>
