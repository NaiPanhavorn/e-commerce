<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Purchase Success</title>
    <script>
        window.onload = function() {
            alert("Purchase Success!");
            window.location.href = "{{ url('/') }}";
        }
    </script>
</head>
<body>
</body>
</html>
