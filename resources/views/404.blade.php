<style>
@import url(https://fonts.googleapis.com/css?family=Nunito);
body{
    margin: 0;
}
.notfound-page{
    height: 100%;
    width: 100%;
    position: relative;
    display: flex;
    align-items: center;
    justify-content: center;
}

.notfound-page::before, .notfound-page::after{
    content: '';
    position: absolute;
    right: auto;
    left: -100px;
    top: 30px;
    background-image: url(images/top-left-spot.png);
    width: 208px;
    height: 335px;
    z-index: -20;
}

.notfound-page::after{
    background-image: url(images/bottom-right-spot.png);
    right: 0;
    width: 266px;
    height: 535px;
    left: auto;
    top: auto;
    bottom: 30px;
    z-index: -25;
}

.notfound-page .text{
    text-align: center;
}
.notfound-page .text h2{
    font-size: 145px;
    line-height: 150px;
    margin: 0;
    margin-bottom: 10px;
    font-family: 'Poppins', sans-serif;
    color: #c79288;
}
.notfound-page .text p{
    font-size: 30px;
    line-height: 30px;
    margin: 0;
    margin-bottom: 20px;
    font-family: 'Poppins', sans-serif;
    color: #666666;
    margin: 0;
    z-index: 1;
}
</style>


<div class="notfound-page">
    <div class="text">
        <h2>404</h2>
        <p>OOPS! NOTHING WAS FOUND</p>
    </div>
</div>
