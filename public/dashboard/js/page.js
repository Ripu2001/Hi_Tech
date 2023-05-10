$(document).ready( function () {
    $('#basicTable').DataTable();
} );
$(document).ready(function() {
    $('#exportTable').DataTable( {
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    } );
} );


document.getElementById("addField").addEventListener("click",function(){
    var html = '';
    html += '<div class="form-group row" id="inputFormField">';
    html += '<div class="col-8"><input type="text" class="form-control" name="features[]" placeholder="feature" required></div>';
    html += '<div class="col-4"><button id="removeField" type="button" class="btn btn-danger">Remove</button></div>';
    html += '</div>';

    $('#newField').append(html);
});
document.getElementById("removeField").addEventListener("click",function(){
    $(this).closest('#inputFormField').remove();
});
