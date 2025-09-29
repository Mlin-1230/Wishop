function sendcheck() {
    var inputUDate = document.getElementById("Date");

    let date = new Date();
    const checkdate = date.toISOString().split('T')[0];

    inputUDate.value = checkdate;

    return addOrder_Check();
}