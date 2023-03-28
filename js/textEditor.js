// WYSIWYG Text Editor Logic
// Elements 
const elements = document.querySelectorAll(".btn-text-editor");

// Event
elements.forEach(element => {
    element.addEventListener("click", () => {
        let command = element.dataset["element"];

        if (command == "createLink" || command == "insertImage") {
            let url = prompt("Enter The Link Here", "https://")
            document.execCommand(command, false, url);
        } else if (command == "fontSize") {
            document.execCommand(command, false, "5");
        } else {
            document.execCommand(command, false, null);
        }

    });
});

// Put the content in a hide input
var contentText = document.querySelector('.text-editor-content');
var hiddenInput = document.querySelector('#hidden-input');
console.log(contentText)
console.log(hiddenInput)


// copy the text to input when the user writes in contentText div
contentText.onkeyup = function () {
    hiddenInput.innerHTML = contentText.innerHTML; // 'this' is pointing to contentText
    console.log(contentText)
    console.log(hiddenInput)
}