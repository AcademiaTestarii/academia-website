<style>
    #tab7 {
        display: none;
    }
</style>
<div class="mainbody">

    <div class="jumbotron" ng-app="cursuri">
        <p style="font-size: 18px;">
            <b>
                Modul I: Iniţiere în Software Testing durează 6 săptămâni şi este compus din 12 sesiuni.
                <br>
                Orele de curs se vor desfăşura în zilele de Luni şi Miercuri, între 19:00 - 21:00, în DBConnect din cadrul DB Global Technology.
            </b>
        </p>
        <p style="font-size: 18px;">Trecerea de la iniţiere la aplicabilitate se face treptat, în două etape:</p>
        <ul style="font-size: 18px;">
            <li>
                <b style="margin-right: 5px;">
                    Formare: Sesiunile 1-7
                </b>
                <br>
                Ne vom concentra pe iniţierea în Software Testing, învăţarea tehnicilor şi practicilor de testare şi aplicarea lor.
            </li>

            <li>
                <b>
                    Simulare: Sesiunile 8-12
                </b>
                <br>
                Vom aborda în totalitate partea practică. Pe parcursul orelor de curs vei putea identifica şi rezolva defecte software în timp real, cu ajutorul şi sub supravegherea celor 3 traineri.
            </li>
        </ul>
        <center>
            <h2>
                Program cursuri 2017
            </h2>
        </center>

        <hr style="border-top: dotted 2px;">
        <center>
            <div ng-controller="course" ng-cloak>
            <button class="btn btn-alert" onclick="formGo()" style="color: white; background-color: #4db8ff;">
            Curs 1
            <br>
            <br>
            {{curs1}}
        </button>

        <button class="btn btn-alert" onclick="formGo()" style="color: white; background-color: #4db8ff;">
            Curs 2
            <br>
            <br>
            {{curs2}}
        </button>

        <button class="btn btn-alert"  style="color: white; background-color: #4db8ff;">
            Curs 3
            <br>
            <br>
            {{curs3}}
        </button>

            <button class="btn btn-alert" onclick="formGo()" style="color: white; background-color: #4db8ff;">
            Curs 4
            <br>
            <br>
            {{curs4}}
        </button>
</div>
            <br>
            <br>
            <br>
            <p style="font-size: 18px;">
            În funcţie de cerere, acest program poate suferi modificări.
            </p>
        </center>
    <hr style="border-top: dotted 2px;">

    </div>

</div>
<script src="javascript/dateRequest.js"></script>
