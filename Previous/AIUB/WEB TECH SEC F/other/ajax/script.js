function change()
{
    // creating a new request
    const xhr = new XMLHttpRequest();

    // what to do when reponse arrives
    xhr.onload = function()
    {
        const container = document.getElementById('demo');
        demo.innerHTML = xhr.responseText;
    };

    xhr.open('post','data.txt');

    xhr.send();
}