/**
 * Created by lerm on 17/07/2017.
 */
jQuery(document).ready(function($) {
    $("#submitDataList").click(function()
    {
        validateListData();
    });

    $(".addFormation").click(function(){

        var url = baseUrl+"/list/addFormation";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="list_id" value="' + $("#addFormation").attr("data-listId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
    });

    $(".addSquad").click(function () {


        var url = baseUrl+"/list/addSquad";
        var form = $('<form action="' + url + '" method="post">' +
            '<input type="number" name="list_id" value="' + $(this).attr("data-listId") + '" />' +
            '<input type="number" name="formation_id" value="' + $(this).attr("data-formationId") + '" />' +
            '</form>');
        $('body').append(form);
        form.submit();
        /*
        $.ajax({
            url: baseUrl+"/list/addFormation",
            type:"POST",
            data: [$(this).attr("data-")]
        }).done(function( arg ) {
            alert( "Données : " + arg );
        });*/
    })

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