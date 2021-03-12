var externalDataRetrievedFromServer = [{"Username":"alhayahlab","Number_of_test":221},{"Username":"mohamed_fawzy","Number_of_test":1401},{"Username":"master_account","Number_of_test":1451},{"Username":"ehegazy","Number_of_test":1495}];


function buildTableBody(data, columns) {
            var body = [];
        
            body.push(columns);
        
            data.forEach(function(row) {
                var dataRow = [];
        
                columns.forEach(function(column) {
                    dataRow.push(row[column].toString());
                })
        
                body.push(dataRow);
            });
        
            return body;
        }
        
        function table(data, columns) {
            return {
                table: {
                    headerRows: 1,
                    body: buildTableBody(data, columns)
                }
            };
        }
        
        var dd = {
            content: [
                { text: 'Report File', style: 'header' },
                table(externalDataRetrievedFromServer, ['Username', 'Number_of_test'])
            ]
        }