<!DOCTYPE html>
<html lang="fi">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link rel="icon" type="image/x-icon" href="https://jenniina.fi/wp-content/uploads/2022/09/favicon.ico" />
    <title>Web-ohjelmointikoulutus - Omnia</title>
    <style>
        :root {
            font-size: 16px;
            font-family: Arial, Helvetica, sans-serif;
            --size: 1rem;
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
            background-color: midnightblue;
            color: silver;
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
                1.6rem 2rem 0.3rem 0 hsla(0, 0%, 100%, 0.1);
            background-color: hsla(0, 0%, 0%, 0.1);
            margin: 0 calc(var(--size) * 1.7) 0 0;
            padding: 0;
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
            color: dodgerblue;
        }

        a:visited {
            color: mediumslateblue;
        }

        li::marker {
            color: darkgray;
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
            <label for="deployattu">Deployments</label>
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
                    <a href="api">API: Currency converter free version</a>
                </li>
                <li>
                    <a href="https://jenniina.fi/web/currency/">API2: Currency converter with hidden api key</a>
                    <ul>
                        <li>
                            Huom. ei toimi azurewebsites-pohjalla, koska gitignorattu scrt.php ei siirry githubiin ja sitä kautta Azureen. Siksi oman domainin piirissä.
                        </li>
                    </ul>
                </li>
            </ol>
        </section>
    </main>