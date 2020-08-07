<!DOCTYPE html>
<html>
<head>
    <link rel="stylesheet" href="{{asset('css/marquee.css')}}" />
</head>
<body>
<div class="content">
    <div class="simple-marquee-container">
        <div class="marquee-sibling">
            I am here to iritate you
        </div>
        <div class="marquee">
            <ul class="marquee-content-items">
                <li>Item 1</li>
                <li>Item 2</li>
                <li>Item 3</li>
                <li>Item 4</li>
                <li>Item 5</li>
            </ul>
        </div>
    </div>
</div>

<script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
<script type="text/javascript" src="{{asset('js/marquee.js')}}"></script>


<script>
    $(function (){
        $('.simple-marquee-container').SimpleMarquee();
    });
</script>
</body>
</html>
