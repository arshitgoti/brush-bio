<div id="loader">
    <div class="spinner-3"></div>
</div>
<style>
    div#loader {
        position: fixed;
        width: 100%;
        height: 100%;
        flex: 1;
        background-color: rgb(255 255 255 / 70%);
        top: 0;
        z-index: 1220;
    }

    .spinner-3 {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 50px;
        height: 50px;
        border-radius: 50%;
        background:radial-gradient(farthest-side, #5d5d5d 94%, #0000) top/8px 8px no-repeat,
            conic-gradient(#0000 30%, #464646);
        -webkit-mask: radial-gradient(farthest-side, #0000 calc(100% - 8px), #000 0);
        animation: s3 1s infinite linear;
    }

    @keyframes  s3 {
        100% {
            transform: rotate(1turn)
        }
    }

    @media  only screen and (max-width: 600px) {
        .spinner-3 {
            left: 45%;
        }
    }


</style>
<?php /**PATH D:\XAMPP\htdocs\brush_bio\resources\views/includes/loader.blade.php ENDPATH**/ ?>