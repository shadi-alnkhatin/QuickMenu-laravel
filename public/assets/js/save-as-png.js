
document.addEventListener('DOMContentLoaded', () => {
    const downloadButton = document.getElementById('download');

    if (downloadButton) {
        downloadButton.addEventListener('click', () => {
            const svgElement = document.querySelector('#preview svg');
            const fileName = 'qr-code.png';

            if (svgElement) {
                saveSvgAsPng(svgElement, fileName, { backgroundColor: 'white' });
            } else {
                console.log("hi from qr failed");
            }
        });
    }
});
