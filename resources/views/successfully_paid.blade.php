<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>successful</title>
    <style>
        *{
        margin:0;
        padding:0;
        box-sizing:border-box;
    }
    .body{
        font-family: 'Poppins', sans-serif;
        background-color:white;
        min-height:100vh;
        display: flex;
        align-items: center;
        justify-content: center;
    }
    .wrapper{
        text-align: center;
    }
    .wrapper h2{
        margin:40px 0;
        font-size:2.5rem;
    }
    .wrapper img{
        width:600px;
        max-width:75%;
    }
    .wrapper h4{
        margin:40px 0 20px;
        font-size:1.2rem;
    }
    .main-btn{
        padding:15px;
        background-color: #6A9758;
        color:#fff;
        border:none;
        font-weight:700;
        letter-spacing: 1px;
        border-radius: 6px;
        cursor: pointer;
    }

    @media (max-width:767px){
        .wrapper h2{
            font-size:2rem;
        }
        .wrapper h4{
            font-size:1rem;
        }
    }

      </style>

</head>
<body>
    <script>
        setTimeout(function() {
        window.location.href = "{{ url('/') }}";
        }, 3000); // 1000 milliseconds = 1 second
        </script>
  <div class="body" >
    <div class="wrapper">
        <h3>Payment was successful</h3>
        <div>
            <img  src="/storage/images/successful.svg" alt="successful" />
        </div>
    </div>
</div>


</body>
</html>

