<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <title>Document</title>
</head>

<body>
    <a href="/index">
        <div class="swal2-container swal2-center swal2-backdrop-show" style="overflow-y: auto;">
            <div aria-labelledby="swal2-title" aria-describedby="swal2-html-container"
                class="swal2-popup swal2-modal swal2-icon-error swal2-show" tabindex="-1" role="dialog"
                aria-live="assertive" aria-modal="true" style="display: grid;">
                <button type="button" class="swal2-close" aria-label="Close this dialog"
                    style="display: none;">×</button>
                <ul class="swal2-progress-steps" style="display: none;"></ul>
                <div class="swal2-icon swal2-error swal2-icon-show" style="display: flex;">
                    <span class="swal2-x-mark">
                        <span class="swal2-x-mark-line-left"></span>
                        <span class="swal2-x-mark-line-right"></span>
                    </span>
                </div>
                <img class="swal2-image" style="display: none;">
                <h2 class="swal2-title" id="swal2-title" style="display: block;">Error!</h2>
                <div class="swal2-html-container" id="swal2-html-container" style="display: block;">
                    You must have 25$ in your wallet.
                </div>
                <input class="swal2-input" style="display: none;">
                <input type="file" class="swal2-file" style="display: none;">
                <div class="swal2-range" style="display: none;"><input type="range"><output></output></div>
                <select class="swal2-select" style="display: none;"></select>
                <div class="swal2-radio" style="display: none;"></div>
                <label for="swal2-checkbox" class="swal2-checkbox" style="display: none;">
                    <input type="checkbox"><span class="swal2-label"></span>
                </label>
                <textarea class="swal2-textarea" style="display: none;"></textarea>
                <div class="swal2-validation-message" id="swal2-validation-message" style="display: none;"></div>
                <div class="swal2-actions" style="display: flex;">
                    <div class="swal2-loader"></div>
                    <button type="button" class="swal2-confirm swal2-styled" aria-label=""
                        style="display: inline-block;">
                        Try again
                    </button>
                </div>
                <div class="swal2-footer" style="display: none;"></div>
                <div class="swal2-timer-progress-bar-container">
                    <div class="swal2-timer-progress-bar" style="display: none;"></div>
                </div>
            </div>
        </div>
    </a>

</body>

</html>
