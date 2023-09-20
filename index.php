<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="favicon.ico" />
    <meta name="description" content="Index of tasks made for the course Web-ohjelmointikoulutus in Omnia">
    <title>Web-ohjelmointikoulutus - Omnia</title>
    <style>
        :root {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            --size: 1rem;
            --hue: 240;
            --sat: 64%;
        }

        * {
            box-sizing: border-box;
            line-height: 1.6;
        }

        body {
            display: flex;
            flex-flow: column nowrap;
            align-items: center;
            justify-content: center;
            min-height: 100vh;
            background-color: hsl(var(--hue), var(--sat), 13%);
            color: white;
        }

        h1,
        main {
            max-width: 800px;
            margin: 0 auto 1em;
            padding: 1rem;
        }

        header,
        h1 {
            width: 100%;
        }

        main {
            box-shadow: 0.05rem 0.1rem 0 0.05rem slateblue,
                1.6rem 2rem 0.5rem 0 hsla(0, 0%, 100%, 0.1);
            background-color: hsla(var(--hue), var(--sat), 80%, 0.2);
            margin: 0 calc(var(--size) * 1.7) 0 0;
            padding: 0;
            border-radius: 6px;
        }

        section {
            padding: 1rem;
        }

        label {
            display: inline-block;
            margin-bottom: 0.4em;
        }

        ol,
        ul {
            padding-left: 1rem;
        }

        ol {
            margin-top: 0;
        }


        a {
            color: lightblue;
            text-decoration: none;
        }

        a:visited {
            color: thistle;
        }

        a:hover,
        a:focus {
            color: skyblue;
            text-decoration: underline;
        }

        li::marker {
            color: silver;
        }

        abbr {
            text-decoration: none;
        }

        @media(min-width:440px) {
            :root {
                font-size: 20px;
            }

            ol,
            ul {
                padding-left: 2rem;
            }
        }

        @media(min-width:700px) {
            header {
                padding: 0 calc(var(--size) * 1.7) 0 0;
            }
        }
    </style>
</head>

<body>
    <header>
        <h1> Web-&shy;ohjelmointi&shy;koulutuksen tehtäviä</h1>
    </header>
    <main>
        <section>
            <a href="https://github.com/devinnuendo/asemointi/tree/main">Github</a>
        </section>
        <section>
            <label for="deployattu">Löydettävissä:</label>
            <nav>
                <ol id="deployattu">
                    <li>
                        <a href="asemointi/asemointi.html">Asemointi</a>
                    </li>
                    <li>
                        <a href="verkkosivusto">Verkkosivusto</a>
                    </li>
                    <li>
                        <a href="neilikka">Puutarhaliike Neilikka</a>
                    </li>
                    <li>
                        <a href="api">API: ilmainen versio</a>
                    </li>
                    <li>
                        <a href="api2">API2: piilotettu API avain <abbr title="External"><span aria-hidden="true">&#129125;</span></abbr></a>
                    </li>
                    <li>
                        <a href="tietokanta">Tietokanta Sakila<abbr title="External"><span aria-hidden="true">&#129125;</span></abbr></a>
                    </li>
                </ol>
            </nav>
        </section>
    </main>