
<!-- Start menu Area -->
<section class="menu_home" id="coffee">
	<div class="container">
		<div class="row">
			<div class="col-lg-12 col-md-12 col-xs-12">
				<h2 class="menu_home_title line_after_heading section_heading">Menu</h2>
				<div class="viewmore_menu_home"><a class="animate_btn" href="<?php echo "./menu.php";?>" >xem thêm tất cả sản phẩm</a></div>
			</div>
			<div class="clearfix"></div>
			<div class="menu_list_home flex_wrap display_flex" id="pagination_show">
	
			</div>
	</div>
</div>
</section>
<div id="PRODUCT_DETAILS" class="modal"  tabindex="-1" role="dialog" >
        <div class="modal-dialog modal-lg modal-dialog-centered " role="document">   	                
            <div class="modal-content">
				<div class="col-md-12">
					<button type="button" class="close" data-dismiss="modal" style="width:40px; height:40px;">&times;</button>
				</div>
                <div class="modal-header">
                    <h4 class="modal-title" style=" font-weight:bold" id="nameTitle"></h4>
					
                </div>
                <div class="modal-body">
                    <div class="col-md-5 modal_body_left popup_img">
                        <span id="images"></span>
                    </div>
                    <div class="col-md-7 modal_body_right popup_info ">
                        <h3 id="names"></h3>
                        <p id="info"></p>
                        <p class="popup_price" id="prices"></i></p>                            
                    <span id="hide"></span>                      
                    </div> 
					<div class="col-md-7 modal_body_right" style="text-align:center;">   
							<span id="button"></span>                  
					</div>                  
                    <div class="clearfix"> </div>                   
                </div>
            </div>
        </div>
</div>
<script>
function number_format( number, decimals, dec_point, thousands_sep ) {                         
    var n = number, c = isNaN(decimals = Math.abs(decimals)) ? 2 : decimals;
    var d = dec_point == undefined ? "," : dec_point;
    var t = thousands_sep == undefined ? "." : thousands_sep, s = n < 0 ? "-" : "";
    var i = parseInt(n = Math.abs(+n || 0).toFixed(c)) + "", j = (j = i.length) > 3 ? j % 3 : 0;
                              
    return s + (j ? i.substr(0, j) + t : "") + i.substr(j).replace(/(\d{3})(?=\d)/g, "$1" + t) + (c ? d + Math.abs(n - i).toFixed(c).slice(2) : "");
}
pagination_show(1);
function pagination_show(page)
{
	
	$.ajax({
		url:"include/pagination_show.php",
		method:"POST",
		data:{page:page},
		success:function(data)
		{

			$("#pagination_show").html(data);
			if(page!=1){
					$(".page_first").removeClass("active");
					$("#"+page+"").addClass("active");
				}
				else
				{
					$(".page_first").addClass("active");
				}
		}
	});
}
function showDetails(a)
{
	var productID = a.id;
	$.ajax({
		url:"fetchProductDetails.php",
		method:"GET",
		data: {"productID":productID},
		success: function(reponse)
		{
			var product = JSON.parse(reponse);
			$("#nameTitle").text(product.name);
			$("#names").text(product.name);
			$("#info").text(product.info);
			$("#prices").text(number_format(product.price,0,".",",")+" Đ");
			$("#images").html("<img src='img/product/"+product.image+"' witdh='50%' height='50%'/>");
			$("#hide").html("<input type='hidden'  id='name"+product.id_pro+"' value='"+product.name+"'/><input type='hidden' id='price"+product.id_pro+"' value='"+product.price+"'/>");
			$("#button").html("<button class='btn btn-warning them' style='width:60%; margin-top:40px' id='"+product.id_pro+"'>Mua ngay</button>");
		}
	});
}
$(document).ready(function(){
	$(document).on('click','.pagination_link',function(){
		var page = $(this).attr('id');
		pagination_show(page);	
	});
	
});
</script>