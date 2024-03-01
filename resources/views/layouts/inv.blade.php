<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <title>Invoice Create</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
        <style>
            
            .control-label {
                font-weight: 700;
            }

            .form-control {
                border-radius: 4px;
                margin-bottom: 10px;
                padding-top: 3px;
                padding-bottom: 2px;
            }

            

            .table {
                margin-top: 10px;
            }

            .btn {
                border-radius: 2px;
            }

            .btn-secondary {
                background-color: teal;
                border-radius: 2px;
            }

            .table-secondary {
                --bs-table-bg: darkgray;
            }

            @media print
            {
                .btn {
                    display: none;
                }
                .NoPrint {
                    display: none;
                }
                .form-control
                {
                    border: 0px;
                }
            }
        </style>
        @yield('script')
        </head>
</html>