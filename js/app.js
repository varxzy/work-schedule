jQuery(".nav-cnt").slide({
    titCell:".nav-item",
    targetCell:".nav-sub",
    returnDefault:true
});
$(".ant-radio-wrapper").click(function() {
    $(this).find(".ant-radio").addClass("ant-radio-checked");
    $(this).find(".ant-radio-input").attr("checked", true);
    $(this).siblings().find(".ant-radio").removeClass("ant-radio-checked");
    $(this).siblings().find(".ant-radio-input").attr("checked", false);
});
