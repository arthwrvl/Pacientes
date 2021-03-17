var inp = document.querySelector('#arquivo');
var label = document.querySelector('#lab');
var labelVal = label.innerHTML;

inp.addEventListener("change", function (e) {
    var fileName = '';
    if (this.files && this.files.length > 1)
        fileName = (this.getAttribute('data-multiple-caption') || '').replace('{count}', this.files.length);
    else
        fileName = e.target.value.split('\'').pop();

    if (fileName)
        label.querySelector('span').innerHTML = fileName;
    else
        label.innerHTML = labelVal;
});