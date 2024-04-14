<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Be+Vietnam+Pro:wght@700&family=Figtree:wght@700&display=swap"
        rel="stylesheet">
    <link rel="icon" type="image/x-icon" href="{{ general_settings('favicon') }}" />

    <style>
        * {
            padding: 0;
            margin: 0;
            box-sizing: border-box;
        }

        .font-medium.text-sm.text-green-600.dark\:text-green-400.mb-4 {
            position: absolute;
            background: white;
            top: 1rem;
            left: 1rem;
            padding: 10px 30px;
            border-radius: 10px;
            font-family: cursive;
        }

        body {
            display: flex;
            width: 100vw;
            height: 100vh;
            background-color: #24242c;
        }

        .container {
            width: 50%;
            height: 100%;
            background-color: #24242c;
            display: flex;
            flex-direction: column;
            justify-content: center;
            align-items: center;
            gap: 15px;
        }

        .pic {
            width: 50%;
            height: 100%;
            overflow: hidden;
            background-image: url("https://img.freepik.com/free-vector/colorful-icons-set-design_79603-1268.jpg?t=st=1711446188~exp=1711449788~hmac=80744816af9e1f0a76ec188f5a6ba1eaa67c71f9c65de3e260e1940d5bca06a1&w=740");
            background-size: cover;
            background-position: center;
        }

        .flex.items-center.justify-end.mt-4 {
            display: flex;
            flex-direction: column;
            margin-top: 1rem;
        }

        /* .pic2 {
    width: 100%;
    height: 15px;
    position: absolute;
    display: none;
    top: 0;
    background-image: url("https://4kwallpapers.com/images/wallpapers/dark-blue-pink-2560x2560-12661.jpg");
    background-size: cover;
    background-position: center;
} */

        .inp {
            width: 350px;
            height: 50px;
            max-height: 50px;
            min-height: 50px;
            display: flex;
            align-items: center;
            position: relative;
        }

        label {
            position: absolute;
            left: 20px;
            color: #777780;
            height: 20px;
            transform: translateY(2.5px);
            padding-left: 5px;
            cursor: text;
            padding-right: 5px;
            transition: .2s;
            font-family: Arial, Helvetica, sans-serif;
        }

        input {
            width: 100%;
            height: 100%;
            background-color: transparent;
            border: 2px solid #494954;
            border-radius: 10px;
            outline: none;
            transition: .4s;
            color: #fff;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 15px;
        }

        input:focus {
            border: 2px solid #1f1fff;
            box-shadow: #6767ff 0px 1px 1px, #6767ff 0px 0px 0px 1px;
        }

        input:focus+label {
            left: 20px;
            transform: translateY(-22px);
            font-size: 12px;
            background-color: #24242c;
        }

        .up {
            left: 20px;
            transform: translateY(-22px);
            font-size: 12px;
            background-color: #24242c;
        }

        button {
            width: 350px;
            height: 50px;
            min-height: 50px;
            max-height: 50px;
            background-color: #2020db;
            border: 2px solid #1f1fff;
            border-radius: 50px;
            outline: none;
            transition: .4s;
            color: #fff;
            padding-left: 20px;
            padding-right: 20px;
            font-size: 15px;
            cursor: pointer;
            font-family: 'Figtree', sans-serif;
        }

        button:hover {
            background-color: #1717c2;
            border: 2px solid #1717c2;
        }

        h1 {
            font-family: 'Be Vietnam Pro', sans-serif;
            font-family: 'Figtree', sans-serif;
            color: #fff;
            margin-bottom: 20px;
        }

        a {
            color: #bbbbbb;
            text-decoration: none;
            font-size: 12px;
            font-family: 'Figtree', sans-serif;
        }

        a:hover {
            text-decoration: underline;
        }

        img {
            width: 70px;
            border-radius: 10px;
            border: 1px solid #494954;
        }

        @media only screen and (max-width: 750px) {
            .pic {
                display: none;
            }

            /* .pic2 {
        display: block;
    } */

            .container {
                width: 100%;
            }
        }

        @media only screen and (max-height: 450px) {
            .pic {
                display: none;
            }

            .container {
                width: 100%;
            }

            body {
                padding-bottom: 10px;
                overflow: scroll;
                height: 100%;
            }
        }

        .inp {
            margin-top: 1rem;
            margin-bottom: 10px !important;
        }
    </style>
</head>

<body>
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="container">
        <div class="pic2"></div>
        <img src="{{ general_settings('favicon') }}" alt="">
        <h1>Log in To Continue</h1>
        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="inp">
                <input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')"
                    required autofocus autocomplete="username" />
                <label onclick="focusinp('usr')" for="Username">Email</label>
                <x-input-error :messages="$errors->get('email')" class="mt-2" />

            </div>
            <div class="inp">
                <input id="password" class="block mt-1 w-full" type="password" name="password" required
                    autocomplete="current-password" />
                <label onclick="focusinp('pass')" for="Password">Password</label>
            </div>
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('password.request') }}">
                        {{ __('Forgot your password?') }}
                    </a>
                @endif

                <x-primary-button class="ms-3">
                    {{ __('Log in') }}
                </x-primary-button>

                <!-- don't have an account -->
                <a href="{{ route('register') }}" style="text-align: center">Don't have an account?</a>
            </div>



        </form>
    </div>
    <div class="pic">
    </div>

    <script>
        document.addEventListener("DOMContentLoaded", function() {
            const inputs = document.querySelectorAll(".inp input");

            inputs.forEach(input => {
                input.addEventListener("input", function() {
                    const label = this.nextElementSibling;
                    label.classList.toggle("up", this.value.trim() !== "");
                });
            });
        });

        function focusinp(inp) {
            if (inp == 'usr') {
                document.getElementById("username").focus();
            } else if (inp == 'pass') {
                document.getElementById("password").focus();
            } else {
                document.getElementById("username").focus();
            }
        }
    </script>
</body>
