@section('title', 'Select Pixel')
@include('template/header')
<div class="main bg">
    <div class="container">
        <h1 class="text-center">Buy Pixel</h1>
        <p><strong>Upload your GIF</strong></p>
        <p>- Click 'Browse' to find your file on your computer, then click 'Upload'.</p>
        <p>- Once uploaded, you will be able to position your file over the grid.</p>
        <p><strong>Upload your pixels:</strong></p>
        <form action="{{ route('resizeImagePost') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <label for="tiktok_url" class="form-label">Write your TikTok username</label>
            <div class="form-group mb-3">
                <input type="text" class="form-control" name="url" id="url" placeholder="Example: @bellapoarch" aria-describedby="tiktok_url">
                <small id="emailHelp" class="form-text text-muted">People will automatically go to your profile</small>
            </div>
            <label for="url" class="form-label">Pixels</label>
            
            <div class="row mb-3">
                <div class="btn-group" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" id="pixel-100" name="pixels" value="100" />
                    <label class="btn btn-outline-primary" for="pixel-100">100px</label>

                    <input type="radio" class="btn-check" id="pixel-400" name="pixels" value="400" />
                    <label class="btn btn-outline-primary" for="pixel-400">400px</label>

                    <input type="radio" class="btn-check" id="pixel-900" name="pixels" value="900" />
                    <label class="btn btn-outline-primary" for="pixel-900">900px</label>

                    <input type="radio" class="btn-check" id="pixel-1600" name="pixels" value="1600" />
                    <label class="btn btn-outline-primary" for="pixel-1600">1600px</label>

                    <input type="radio" class="btn-check" id="pixel-2500" name="pixels" value="2500" />
                    <label class="btn btn-outline-primary" for="pixel-2500">250px</label>
                </div>
                <div class="btn-group mt-3" role="group" aria-label="Basic radio toggle button group">
                    <input type="radio" class="btn-check" id="pixel-3600" name="pixels" value="3600" />
                    <label class="btn btn-outline-primary" for="pixel-3600">3600px</label>

                    <input type="radio" class="btn-check" id="pixel-4900" name="pixels" value="4900" />
                    <label class="btn btn-outline-primary" for="pixel-4900">4900px</label>

                    <input type="radio" class="btn-check" id="pixel-8100" name="pixels" value="8100" />
                    <label class="btn btn-outline-primary" for="pixel-8100">8100px</label>

                    <input type="radio" class="btn-check" id="pixel-10000" name="pixels" value="10000" />
                    <label class="btn btn-outline-primary" for="pixel-10000">10000px</label>
                </div>
            </div>
            <div class="input-group mb-3 row">
                <div class="col"></div>
                <div class="col"></div>
                <div class="col"></div>
                <input hidden type="number" name="width_order" class="pixels__value" value="1">
                <input hidden type="number" name="width" class="pixels__value_size_grid" value="1">
                <input type="number" class="pixels__value form-control" placeholder="Height" aria-label="Height" value="1" hidden disabled>
                <input hidden name="height_order" type="number" class="pixels__value" value="1">
                <input hidden name="height" type="number" class="pixels__value_size_grid" value="1">
            </div>
            <div class="mb-3 mt-3">
                <label for="gif">GIF</label>
            </div>
            <div class="mb-3">
                <label for="gif" class="gif-upload form-label btn btn-success">Choose file <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 640 512"><!--! Font Awesome Pro 6.1.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. --><path fill="#fff" d="M144 480C64.47 480 0 415.5 0 336C0 273.2 40.17 219.8 96.2 200.1C96.07 197.4 96 194.7 96 192C96 103.6 167.6 32 256 32C315.3 32 367 64.25 394.7 112.2C409.9 101.1 428.3 96 448 96C501 96 544 138.1 544 192C544 204.2 541.7 215.8 537.6 226.6C596 238.4 640 290.1 640 352C640 422.7 582.7 480 512 480H144zM223 263C213.7 272.4 213.7 287.6 223 296.1C232.4 306.3 247.6 306.3 256.1 296.1L296 257.9V392C296 405.3 306.7 416 320 416C333.3 416 344 405.3 344 392V257.9L383 296.1C392.4 306.3 407.6 306.3 416.1 296.1C426.3 287.6 426.3 272.4 416.1 263L336.1 183C327.6 173.7 312.4 173.7 303 183L223 263z"/></svg>
                    <input name="gif" class="form-control form-control-sm filestyle1" id="gif" type="file" accept=".gif" required>
                </label>
                <span class="name-file-upload">

                </span>
                <script>
                    $(document).ready(function(){
                        $('input[type="file"]').change(function(e){
                            var fileName = e.target.files[0].name;
                            $('.name-file-upload').text(fileName);
                        });
                    });
                </script>
            </div>
            <style>
                .filestyle1 {
                    display: none;
                }
                .gif-upload svg {
                    width: 20px;
                    height: 20px;
                }
            </style>
            <input type="hidden" name="BID" value="1">
            <input class="mds_upload_image btn btn-primary" type="submit" value="Upload">
        </form>
        <script>
            $(document).ready(function(){
                $('form').submit(function(){
                    $(this).find('input[type=submit], button[type=submit]').prop('disabled', true);
                });


                $('#gif').bind('change', function() {

                var size = this.files[0].size; // размер в байтах
                var name = this.files[0].name;
                
                if (size > 5120000){

                    alert('File cannot be larger than 5 megabyte');

                }

                var fileExtension = ['gif']; // допустимые типы файлов
                if ($.inArray(name.split('.').pop().toLowerCase(), fileExtension) == -1) {

                // у файла неверный тип
                alert('Valid File Format – GIF');

                }

                });


            });
        </script>
    </div>
</div>
@include('template/footer')