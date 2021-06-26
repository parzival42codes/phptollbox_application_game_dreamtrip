<div style="display: flex;">
    <div style="flex: 2;">
        <div class="card-container card-container--shadow">
            <div class="card-container-header"> {$crudName}</div>
            <div class="card-container-content">
                <div class="flex-container">

                </div>
            </div>
            <div class="card-container-footer"></div>
        </div>

        <div class="card-container card-container--shadow">
            <div class="card-container-header"> {$crudName}</div>
            <div class="card-container-content">
                <div class="flex-container">
                    <CMS function="_table">
                        {
                        "_config": {
                        "cssClass": "template-table-standard template-table-standard-small template-table-standard-monospace",
                        "table": "Table",
                        "source": "Table"
                        },
                        "choiceNr": {
                        "titleHeader": "{insert/language class="ApplicationDreamtrip" path="/table/choiceNr"
                        language-de_DE="Auswahl"
                        language-en_US="Choice"}"
                        },
                        "text": {
                        "titleHeader": "{insert/language class="ApplicationDreamtrip" path="/table/text"
                        language-de_DE=""
                        language-en_US=""}",
                        "classCell": "withFill"
                        },
                        "required": {
                        "titleHeader": "{insert/language class="ApplicationDreamtrip" path="/table/required"
                        language-de_DE="Benötigt"
                        language-en_US="Required"}"
                        },
                        "duration": {
                        "titleHeader": "{insert/language class="ApplicationDreamtrip" path="/table/duration"
                        language-de_DE="Dauer"
                        language-en_US="Duration"}"
                        }
                        }
                    </CMS>
                </div>
            </div>
            <div class="card-container-footer"></div>

            <div class="card-container card-container--shadow">
                <div class="card-container-header"> {$crudName}</div>
                <div class="card-container-content">
                    <div class="flex-container">

                    </div>
                </div>
                <div class="card-container-footer"></div>
            </div>
        </div>
    </div>
    <div style="flex: 1;">

        <div style="display: flex; flex-direction: column;">
            <div style="flex: 1;">
                <div class="card-container card-container--shadow">
                    <div class="card-container-header"> {$crudName}</div>
                    <div class="card-container-content">
                        <div class="flex-container">

                        </div>
                    </div>
                    <div class="card-container-footer"></div>
                </div>
            </div>
            <div style="flex: 1;">
                <div class="card-container card-container--shadow">
                    <div class="card-container-header"> {$crudName}</div>
                    <div class="card-container-content">
                        <div class="flex-container">

                        </div>
                    </div>
                    <div class="card-container-footer"></div>
                </div>
            </div>
        </div>

    </div>

</div>
