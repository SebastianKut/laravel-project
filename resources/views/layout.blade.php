<!DOCTYPE HTML>
<!--
	Projection by TEMPLATED
	templated.co @templatedco
	Released for free under the Creative Commons Attribution 3.0 license (templated.co/license)
-->
<html>

<head>
    <title>Projection by TEMPLATED</title>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <link rel="stylesheet" href="/assets/css/main.css" />
    <link rel="stylesheet" href="/css/app.css" />
    @yield('head')




</head>

<body>

    <!-- Header -->
    <header id="header">
        <div class="inner">
            <a href="index.html" class="logo"><strong>Projection</strong> by TEMPLATED</a>
            <nav id="nav">
                <a href="/">Home</a>
                <a href="/test">Test</a>
                <a href="/posts">Posts</a>
                <a href="/archive">Archive</a>
                <a href="/posts/create">Add Post</a>

            </nav>
            <a href="#navPanel" class="navPanelToggle"><span class="fa fa-bars"></span></a>
        </div>
    </header>

    <!-- Banner -->
    <section id="banner">
        <div class="inner">
            <header>
                <h1>Welcome to Projection</h1>
            </header>

            <div class="flex ">

                <div>
                    <span class="icon fa-car"></span>
                    <h3>Aliquam</h3>
                    <p>Suspendisse amet ullamco</p>
                </div>

                <div>
                    <span class="icon fa-camera"></span>
                    <h3>Elementum</h3>
                    <p>Class aptent taciti ad litora</p>
                </div>

                <div>
                    <span class="icon fa-bug"></span>
                    <h3>Ultrices</h3>
                    <p>Nulla vitae mauris non felis</p>
                </div>

            </div>

            <footer>
                <a href="#" class="button">Get Started</a>
            </footer>
        </div>
    </section>

    @yield('content')

    <!-- Footer -->
    <footer id="footer">
        <div class="inner">

            <h3>Get in touch</h3>

            <form action="/contact" method="post">

                @csrf

                {{-- <div class="field half first">
                    <label for="name">Name</label>
                    <input name="name" id="name" type="text" placeholder="Name">
                </div> --}}
                <div class="field half">
                    <label for="email">Email</label>
                    <input name="email" id="email" type="email" placeholder="Email">
                </div>
                @error('email')

                <p>{{$message}}</p>

                @enderror
                {{-- <div class="field">
                    <label for="message">Message</label>
                    <textarea name="message" id="message" rows="6" placeholder="Message"></textarea>
                </div> --}}
                <ul class="actions">
                    <li><input value="Subscribe" class="button alt" type="submit"></li>
                </ul>
            </form>

            @if (session('message'))
            <div>{{session('message')}}</div>
            @endif

            <div class="copyright">
                &copy; Untitled. Design: <a href="https://templated.co">TEMPLATED</a>. Images: <a
                    href="https://unsplash.com">Unsplash</a>.
            </div>

        </div>
    </footer>

    <!-- Scripts -->
    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/js/skel.min.js"></script>
    <script src="assets/js/util.js"></script>
    <script src="assets/js/main.js"></script>

</body>

</html>