        var optionsButtonsEdit = document.querySelectorAll(".option-button-edit");
        var advancedOptionButtonEdit = document.querySelectorAll(".adv-option-button-edit");
        var fontNameEdit = document.getElementById("fontName-edit");
        var fontSizeRefEdit = document.getElementById("fontSize-edit");
        // var writingArea = document.getElementById("idtxtdescripcionE");
        // var writingAreaEdit = document.querySelectorAll(".editor");
        var linkButtonEdit = document.getElementById("createLink-edit");
        var alignButtonsEdit = document.querySelectorAll(".align-edit");
        var spacingButtonsEdit = document.querySelectorAll(".spacing-edit");
        var formatButtonsEdit = document.querySelectorAll(".format-edit");
        var scriptButtonsEdit = document.querySelectorAll(".script-edit");
      

        //List of fontlistEdit
        // var fontListEdit = [
        //   "Arial",
        //   "Verdana",
        //   "Times New Roman",
        //   "Garamond",
        //   "Georgia",
        //   "Courier New",
        //   "cursive",
        // ];

        //Initial Settings
        function initializerEdit() {
          //function calls for highlighting buttons
          //No highlights for link, unlink,lists, undo,redo since they are one time operations
          highlighterEdit(alignButtonsEdit, true);
          highlighterEdit(spacingButtonsEdit, true);
          highlighterEdit(formatButtonsEdit, false);
          highlighterEdit(scriptButtonsEdit, true);

          //create options for font names
          // fontListEdit.map((value) => {
          //   var option = document.createElement("option");
          //   option.value = value;
          //   option.innerHTML = value;
          //   fontNameEdit.appendChild(option);
          // });

          //fontSize allows only till 7
          // for (var i = 1; i <= 7; i++) {
          //   var option = document.createElement("option");
          //   option.value = i;
          //   option.innerHTML = i;
          //   fontSizeRefEdit.appendChild(option);
          // }

          //default size
          // fontSizeRefEdit.value = 3;
        };

        //main logic
        function modifyTextEdit(command, defaultUi, value) {
          //execCommand executes command on selected text
          document.execCommand(command, defaultUi, value);
          // console.log(document.execCommand(command, defaultUi, value));
        };

        // Para operaciones básicas que no necesitan parámetro de valor
        optionsButtonsEdit.forEach((button) => {
          button.addEventListener("click", () => {
            modifyTextEdit(button.id, false, null);
          });
        });

        // opciones que requieren parámetro de valor (por ejemplo, colores, fuentes)
        advancedOptionButtonEdit.forEach((button) => {
          button.addEventListener("change", () => {
            modifyTextEdit(button.id, false, button.value);
            console.log(button);
            console.log(button.id);
            console.log(button.value);
          });
        });

        //link
        linkButtonEdit.addEventListener("click", () => {
          var userLink = prompt("Enter a URL");
          //if link has http then pass directly else add https
          if (/http/i.test(userLink)) {
            modifyTextEdit(linkButtonEdit.id, false, userLink);
          } else {
            userLink = "http://" + userLink;
            modifyTextEdit(linkButtonEdit.id, false, userLink);
          }
        });

        //Highlight clicked button
        function highlighterEdit(className, needsRemoval) {
          className.forEach((button) => {
            button.addEventListener("click", () => {
              //needsRemoval = true means only one button should be highlight and other would be normal
              if (needsRemoval) {
                var alreadyActive = false;

                //If currently clicked button is already active
                if (button.classList.contains("active")) {
                  alreadyActive = true;
                }

                //Remove highlight from other buttons
                highlighterEditRemover(className);
                if (!alreadyActive) {
                  //highlight clicked button
                  button.classList.add("active");
                }
              } else {
                //if other buttons can be highlighted
                button.classList.toggle("active");
              }
            });
          });
        };

        function highlighterEditRemover(className) {
          className.forEach((button) => {
            button.classList.remove("active");
          });
        };

        function ShowSelectedName() {
          var fontnameEdit = document.getElementById("ProductfontName").value;
          // alert(fontnameEdit);
          document.execCommand('fontName', false, fontnameEdit);
        }

        function ShowSelected() {
          var cod = document.getElementById("producto").value;
          // alert(cod);
          document.execCommand('fontSize', false, cod);
        }

        initializerEdit();











      
                