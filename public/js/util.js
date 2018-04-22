/**
 * filter digits in string lines
 * @param text input text
 * @returns digits
 */
function getId(text) {
    var digit = text.replace(/[^0-9]/ig, "");
    return digit;
}

/**
 * filter letters in string lines
 * @param text input text
 * @returns string
 */
function getString(text) {
    var string = text.replace(/[^a-z]+/ig, "");
    return string;
}

/**
 * get data ID
 * @param event
 * @param dataTitle
 * return id
 */
function getDataId(event, dataTitle) {
    var target = event.target;
    var data = $(target).data(dataTitle);
    var id = getId(data);
    return id;
}

