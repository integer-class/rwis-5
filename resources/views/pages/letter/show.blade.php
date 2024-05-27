<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Preview PDF</title>
</head>
<body>
    <h1>Preview PDF</h1>
    <!-- Tampilkan preview PDF -->
    <embed src="{{ asset($pdfUrl) }}" type="application/pdf" width="100%" height="600px">
</body>
</html>
