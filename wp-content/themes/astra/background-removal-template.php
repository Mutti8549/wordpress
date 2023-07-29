<?php
/*
Template Name: Background Removal Template
*/

get_header();
?>

<h1>Background Removal Tool</h1>
<input type="file" id="imageInput" accept="image/*">
<button onclick="removeBackground()">Remove Background</button>
<div id="resultContainer">
    <h2>Result:</h2>
    <img id="resultImage" src="" alt="Background Removed Image">
    <a id="downloadLink" style="display: none;">Download Image</a>
</div>

<script>
        function removeBackground() {
            const imageInput = document.getElementById('imageInput');
            const resultImage = document.getElementById('resultImage');
            const downloadLink = document.getElementById('downloadLink');

            const file = imageInput.files[0];
            const formData = new FormData();
            formData.append('image_file', file);

            fetch('https://api.remove.bg/v1.0/removebg', {
                method: 'POST',
                headers: {
                    'X-API-Key': 'cHnaY379piL3Gd7W8LihjXwu',
                },
                body: formData,
            })
            .then(response => response.json())
            .then(result => {
                resultImage.src = result.data.result_url;
                downloadLink.href = result.data.result_url;
                downloadLink.style.display = 'block';
            })
            .catch(error => console.error('Error:', error));
        }
    </script>

<?php
get_footer();
?>
