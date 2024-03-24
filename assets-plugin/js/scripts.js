        var optionsButtons = document.querySelectorAll(".option-button");
        var advancedOptionButton = document.querySelectorAll(".adv-option-button");
        var fontName = document.getElementById("fontName");
        var fontSizeRef = document.getElementById("fontSize");
        // var writingArea = document.getElementById("idtxtdescripcionE");
        var writingArea = document.querySelectorAll(".editor");
        var linkButton = document.getElementById("createLink");
        var alignButtons = document.querySelectorAll(".align");
        var spacingButtons = document.querySelectorAll(".spacing");
        var formatButtons = document.querySelectorAll(".format");
        var scriptButtons = document.querySelectorAll(".script");
        var el = document.getElementById("#elemento");

        //List of fontlist
        var fontList = [
          "Arial",
          "Verdana",
          "Times New Roman",
          "Garamond",
          "Georgia",
          "Courier New",
          "cursive",
        ];

        //Initial Settings
        function initializer(){
          //function calls for highlighting buttons
          //No highlights for link, unlink,lists, undo,redo since they are one time operations
          highlighter(alignButtons, true);
          highlighter(spacingButtons, true);
          highlighter(formatButtons, false);
          highlighter(scriptButtons, true);

          //create options for font names
          fontList.map((value) => {
            var option = document.createElement("option");
            option.value = value;
            option.innerHTML = value;
            fontName.appendChild(option);
          });

          //fontSize allows only till 7
          for (var i = 1; i <= 7; i++) {
            var option = document.createElement("option");
            option.value = i;
            option.innerHTML = i;
            fontSizeRef.appendChild(option);
          }

          //default size
          fontSizeRef.value = 3;
        };

        //main logic
        function modifyText(command, defaultUi, value) {
          //execCommand executes command on selected text
          document.execCommand(command, defaultUi, value);
        };

        //For basic operations which don't need value parameter
        optionsButtons.forEach((button) => {
          button.addEventListener("click", () => {
            modifyText(button.id, false, null);
          });
        });

        //options that require value parameter (e.g colors, fonts)
        advancedOptionButton.forEach((button) => {
          button.addEventListener("change", () => {
            modifyText(button.id, false, button.value);
            console.log(button);
            console.log(button.id);
            console.log(button.value);
          });
        });

        //link
        linkButton.addEventListener("click", () => {
          var userLink = prompt("Enter a URL");
          //if link has http then pass directly else add https
          if (/http/i.test(userLink)) {
            modifyText(linkButton.id, false, userLink);
          } else {
            userLink = "http://" + userLink;
            modifyText(linkButton.id, false, userLink);
          }
        });

        //Highlight clicked button
        function highlighter(className, needsRemoval) {
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
                highlighterRemover(className);
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

        function highlighterRemover (className) {
          className.forEach((button) => {
            button.classList.remove("active");
          });
        };

        initializer();