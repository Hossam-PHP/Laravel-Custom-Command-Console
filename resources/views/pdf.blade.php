<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Report</title>

        <!-- Fonts -->

        <!-- Styles -->

        <!-- scripts -->
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/pdfmake.min.js" integrity="sha512-HLbtvcctT6uyv5bExN/qekjQvFIl46bwjEq6PBvFogNfZ0YGVE+N3w6L+hGaJsGPWnMcAQ2qK8Itt43mGzGy8Q==" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.70/vfs_fonts.js" integrity="sha512-vv3EN6dNaQeEWDcxrKPFYSFba/kgm//IUnvLPMPadaUf5+ylZyx4cKxuc4HdBf0PPAlM7560DV63ZcolRJFPqA==" crossorigin="anonymous"></script>

    </head>
    <body>
    </body>

    <script>
        var docDefinition = {
            content:[
                "Hello World"
            ]
        };
        pdfMake.createPdf(docDefinition).download();
    </script>
</html>
