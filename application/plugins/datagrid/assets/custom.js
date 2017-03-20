$(function () {
    // Initialize appendGrid
    $('#tblAppendGrid').appendGrid({
        caption: 'Language Editor',
        initRows: 1,
        columns: [
            { name: 'Key', display: 'Language Items', type: 'text', ctrlCss: { width: '100%'} }
        ],
        useSubPanel: true, // Required
        subPanelBuilder: function (cell, uniqueIndex) {
          // Create a label
          //$('<span></span>').text('Description: ').appendTo(cell);
          // Create a textarea element and append to the cell
          $('<textarea></textarea>').css('width', '100%').attr({
                id: 'tblAppendGrid_AdtDescription_' + uniqueIndex,
                name: 'tblAppendGrid_AdtDescription_' + uniqueIndex,
                rows: 4, cols: 60
          }).appendTo(cell);
        },
        subPanelGetter: function (uniqueIndex) {
            // Return the element value inside sub panel for `getAllValue` and `getRowValue` methods
            return { 'Description': $('#tblAppendGrid_AdtDescription_' + uniqueIndex).val() };
        },
        rowDataLoaded: function (caller, record, rowIndex, uniqueIndex) {
            // Check the record contains `Comment`
            if (record.Description) {
                // Get the control in sub panel
                var elem = document.getElementById('tblAppendGrid_AdtDescription_' + uniqueIndex);
                // Fill the comment values in the sub panel
                elem.value = record.Description;
            }
        }

    });

    //populate automatically
    if(lang_data.length) {
      $('#tblAppendGrid').appendGrid('load',lang_data);
    }

});
