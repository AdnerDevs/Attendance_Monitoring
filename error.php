<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Monoton&display=swap');

        body{
            background-color: #111111;
        }
        div{
            margin-top: 90px;
            padding: 40px;
            font-size: 95px;
            font-family: 'Monoton', cursive;
            text-align: center;
            text-transform: uppercase;
            text-shadow: 0 0 80px red, 0 0 30px firebrick, 0 0 6px darkred;
            color: red;
        }

        div p{
            margin: 5px;
        }

        #error:hover{
            text-shadow: 0 0 200px #ffffff, 0 0 80px #008000, 0 0 6px #0000ff;
        }
        #code:hover{
            text-shadow: 0 0 80px red, 0 0 30px firebrick, 0 0 6px darkred;

        }
     
        #error{
            color: #fff;
            text-shadow: 0 0 200px #ffffff, 0 0 80px #008000, 0 0 6px #0000ff;
        }
        #error span{
            animation: upper 11s linear infinite;
        }

        #code span:nth-of-type(2){
            animation: lower 10s linear infinite;
        }

        #code span:nth-of-type(1){
            text-shadow: none;
            opacity: .4;
        }

        @keyframes upper{
            0%, 19.999%, 62.999%, 70%, 100%{
                opacity: .99;
                text-shadow: 0 0 200px #ffffff, 0 0 80px #008000, 0 0 6px #0000ff;

            }
            20%, 21.999%, 63%, 63.999%, 65%, 69.999%{
                opacity: .4;
                text-shadow: none;
            }
        }

        @keyframes lower{
            0%, 12%, 18.999%, 31.999%, 46%, 49.999%, 51%, 58.999%, 68.999%, 71%, 78.999%, 96%, 100%{
                opacity: .99;
                text-shadow: 0 0 80px red, 0 0 30px firebrick, 0 0 6px darkred;
            }
            19%, 22.999%, 32%, 36.999%, 50%, 55.999%, 64%, 69.999%, 86%, 89.999%{
                opacity: .4;
                text-shadow: none;
            }
        }
    </style>
</head>
<body>
    <div>
        <p id="error">E <span>r</span>ror</p>
        <p id="code">4 <span>0</span>4</p>
    </div>


</body>
</html>