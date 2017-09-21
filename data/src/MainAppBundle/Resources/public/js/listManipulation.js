/**
 * Created by lerm on 17/07/2017.
 */
jQuery(document).ready(function($) {
    $("#submitDataList").click(function()
    {
        validateListData();
    });

    $(".addFormation").click(function(){
        $.ajax({
            url: baseUrl+"/list/addFormation",
            type:"POST",
            data: [$(this).attr("data-")]
        }).done(function( arg ) {
            alert( "Données : " + arg );
        });
    });

    $(".collapse-focus").click(function(){
        $focusRow = $(this).attr("data-focus");
        $row =$("#collapseF"+$focusRow);
        if($row.is(":Visible"))
        {
            $row.hide();
        }
        else
        {
            $row.show();
        }
        console.log($focusRow);
    });
});

function validateListData()
{
}